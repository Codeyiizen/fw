<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Favoritewish extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or - 
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{ // create constructor for Hangar model
		parent::__construct();
		$this->load->model('Favoritewish_Model'); // Loading models defined in Favoritewish_Model.php
		$this->load->model('Mail', 'mail');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('encryption');
		$this->load->helper('custom');
		$this->load->library("pagination");
		$sql = "SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));";
    $this->db->query($sql );
	}

	public function index()
	{  
		$arr['data'] = $this->Favoritewish_Model->bannerSection('home'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Home Page Meta Description';
		$data['metaKeywords'] = 'Home Page Meta Title';
		$data['title'] = "Home";
		$data['breadcrumbs'] = array('Home' => '#');
		$data['hometext'] = $this->Favoritewish_Model->homeAllData();
		$this->load->view('front/header_main', $data);
		//$this->load->view('bannerSection',$arr);
		$this->load->view('front/home',$data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}

	public function aboutus()
	{
		$arr['data'] = $this->Favoritewish_Model->bannerSection('aboutus'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'About Us Page Meta Description';
		$data['metaKeywords'] = 'About Us Page Meta Title';
		$data['title'] = "About Us";
		$data['breadcrumbs'] = array('About Us' => '#');
		$data['aboutUsText'] = $this->Favoritewish_Model->AboutUsData();
		$this->load->view('front/header_main', $data);
		//$this->load->view('front/bannerSection',$arr);
		$this->load->view('front/aboutus', $data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}
	public function contactus()
	{
		$arr['data'] = $this->Favoritewish_Model->bannerSection('contactus'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Contact Us Page Meta Description';
		$data['metaKeywords'] = 'Contact Us Page Meta Title';
		$data['title'] = "Contact Us";
		$data['breadcrumbs'] = array('Contact Us' => '#');
		$data['contacttext'] = $this->Favoritewish_Model->contactAllData();
		$this->load->view('front/header_main', $data);
		//$this->load->view('front/bannerSection',$arr);  
		$this->load->view('front/contactus', $data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}

	public function contactFormSubmission()
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('errors', validation_errors());

			header("Location: {$_SERVER['HTTP_REFERER']}");
			//exit();

		} else {

			$data = array(
				'name'					=>	$this->input->post('name'),
				'email'					=>	$this->input->post('email'),
				'phone'					=>	$this->input->post('phone'),
				'subject'				=>	$this->input->post('subject'),
				'message'				=>	$this->input->post('message'),
				'added_on'				=>	date("Y-m-d H:i:s")
			);


			$is_cf_submitted = $this->Favoritewish_Model->cf_submit($data);

			if ($is_cf_submitted) {

				$this->load->library('encryption');
				$this->load->library('email');

				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$subject = $this->input->post('subject');
				$message = $this->input->post('message');

				$data = array(
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'subject' => $subject,
					'message' => $message
				);

				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);

				$this->email->to(MAIL_TO);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('FavoriteWish Contact Form Submission!');

				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/contact_form_template', $data, true));
				$this->email->send();

				/*    
				* For confirmation Email
				*/

				$this->email->initialize($config);

				$this->email->to($email);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('FavoriteWish Contact Form Submission!');

				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/contact_form_user_confirmation', $data, true));

				if ($this->email->send()) {

					//redirect('join-hangar-waiting-list');
					$this->session->set_flashdata('success_message', 'Data Stored Successfully');
					redirect(base_url() . 'thankyou');
					// Redirect to the previous page
					//header("Location: {$_SERVER['HTTP_REFERER']}");
					//exit();

				} else {

					//redirect('join-hangar-waiting-list');
					$this->session->set_flashdata('errors', 'Something is wrong while sending email. Please check with your server admin');

					// Redirect to the previous page
					header("Location: {$_SERVER['HTTP_REFERER']}");
					exit();
				}
			} else {

				echo 'not done';
			}
		}
	}

	public function termsandconditions()
	{
		$arr['data'] = $this->Favoritewish_Model->bannerSection('termsandconditions'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Terms and Conditions Page Meta Description';
		$data['metaKeywords'] = 'Terms and Conditions Page Meta Title';
		$data['title'] = "Terms and Conditions";
		$data['breadcrumbs'] = array('Terms and Conditions' => '#');
		$this->load->view('front/header_main', $data);
		//$this->load->view('front/bannerSection',$arr);
		$this->load->view('front/termsandconditions', $data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}

	public function thankyou()
	{
		$arr['data'] = $this->Favoritewish_Model->bannerSection('thankyou'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Thank You Page Meta Description';
		$data['metaKeywords'] = 'Thank You Page Meta Title';
		$data['title'] = "Thank you";
		$data['breadcrumbs'] = array('Thank You' => '#');
		$this->load->view('front/header', $data);
		$this->load->view('front/thankyou', $arr);
		$this->load->view('front/footer');
	}



	/*
	User Login Functionlity
	*/

	public function register()
	{  
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('register'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'New User Registration';
			$data['metaKeywords'] = 'New User Registration';
			$data['title'] = "Registration";
			$data['breadcrumbs'] = array('Registration' => '#');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$google_client = new Google_Client();
		    $google_client->setClientId(GOOGLE_CLIENT_ID); //Define your ClientID
	        $google_client->setClientSecret(GOOGLE_CLIENT_SECRET); //Define your Client Secret Key
	        $google_client->setRedirectUri(GOOGLE_REDITECT_URL); //Define your Redirect Uri
			$google_client->addScope('email');
			$google_client->addScope('profile');
			$google_client->setApprovalPrompt('force');
			$google_client->setPrompt('consent');
			$login_button = '<a href="'.$google_client->createAuthUrl().'" class="social-login-btn" ><img src="'.base_url().'assets/images/site-image/google.png" />Sign up with Google</a>';	
			$data['login_button'] = $login_button;
			$this->template->load('default_layout', 'contents', 'auth/sign-up',$data);
			$this->load->view('front/footer_main');
		} else {
			redirect('user-dashboard');
		}
	}
    
	public function googleSignUp(){
		include_once "vendor/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId(GOOGLE_CLIENT_ID); //Define your ClientID
	    $google_client->setClientSecret(GOOGLE_CLIENT_SECRET); //Define your Client Secret Key
	    $google_client->setRedirectUri(GOOGLE_REDITECT_URL); //Define your Redirect Uri
	    $google_client->addScope('email');
	    $google_client->addScope('profile');
		$google_client->setApprovalPrompt('force');
		$google_client->setPrompt('consent');
		$varToken = random_strings(8);
	    if(isset($_GET["code"]))
		{  
		 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	     if(!isset($token["error"]))
		 {
		  $google_client->setAccessToken($token['access_token']);
		  $this->session->set_userdata('access_token', $token['access_token']);
		  $google_service = new Google_Service_Oauth2($google_client);
		  $data = $google_service->userinfo->get();
		  $checkEmailExit = $this->Favoritewish_Model->checkEmailExit($data['email']);
		  if(!empty($checkEmailExit)){
		  $randam = mt_rand(10000000,99999999); 
		  $getObjUserDataById = $this->Favoritewish_Model->getObjUserGoogleDetails($checkEmailExit['id']); 
						if(!empty($getObjUserDataById)){
							$updateData = array(
								'first_name' => $checkEmailExit['first_name'],
								'last_name'  => $checkEmailExit['last_name'],
								'user_name'  => $checkEmailExit['first_name'].$checkEmailExit['last_name'],
								'email' =>    $checkEmailExit['email'],
								'password'   =>    password_hash($randam, PASSWORD_BCRYPT),
								'login_oauth_uid' => $data['id'],
								'status' => 1,
								'verification_code' => 1,
							);  
							$this->Favoritewish_Model->Update_user_data($updateData, $getObjUserDataById->id);
						}else{
							$insertUser = $this->Favoritewish_Model->Insert_user_data($user_data); 
						}
				}else{
					$randam = mt_rand(10000000,99999999);
					$user_data = array(
						'first_name' => $data['given_name'],
						'last_name'  => $data['family_name'],
						'user_name'  => $data['given_name'].$data['family_name'],
						'email' => $data['email'],
						'password'   => password_hash($randam, PASSWORD_BCRYPT),
						'login_oauth_uid' => $data['id'],
						'status' => 1,
						'verification_code' => 1,
						'token'=>$varToken,
						'user_active_status'=>1
					);
					$insertUser = $this->Favoritewish_Model->Insert_user_data($user_data);
				}
			    $userId = !empty($getObjUserDataById) ? $getObjUserDataById->id : $insertUser;
				$this->db->where('id', $userId);
				$getFinalUserDetails =  $this->Favoritewish_Model->InsertDataById($userId);
				$authArray = array(
						'user_id' => $getFinalUserDetails->id,
						'email' => $getFinalUserDetails->email,
						'first_name' => $getFinalUserDetails->first_name,
						'last_name' => $getFinalUserDetails->last_name,
						'contact_no' => !empty($getFinalUserDetails->contact_no) ? $getFinalUserDetails->contact_no :'',
						'company' => !empty($getFinalUserDetails->company) ? $getFinalUserDetails->company :'',
						'token'=>$varToken,
						'user_active_status'=>1
					);
					$this->session->set_userdata('ci_session_key_generate',TRUE);
					$this->session->set_userdata('ci_seesion_key', $authArray);
					$toMail = $data['email'];
					$userName = $data['given_name'].$data['family_name'];
				//	echo"<pre>"; var_dump($toMail); exit;
					$this->load->library('encryption');
					$this->load->library('email');
					$dataEmail = array(
						'user_name' => $userName,
						'password' => $randam,
					);
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->to($toMail);
					$this->email->from(MAIL_FROM, FROM_TEXT);
					$this->email->subject('Favorite Wish User Registration!');
	
					$this->email->set_newline("\r\n");
					$this->email->message('UserName-'.$userName.'<br> Password-'.$randam.' ');
					$chkStatus = $this->email->send();
                    if ($chkStatus === TRUE) {  
						$this->session->set_flashdata('success', ' Complete one last action to enhance security and safeguard your
						identity. Please activate your account in the email message we’ve sent. We appreciate
						your decision to become part of Favorite Wish');
						redirect('sign-in');
					} else { 
						echo 'Error';
					}
				redirect('favoritewish/logout');
		  }else{
			  $this->session->set_flashdata('error', 'Something wents wrong by google token!');
			  redirect('sign-in');
		  }
	     }else{
			 $this->session->set_flashdata('error', 'Something wents wrong by google code!');
			 redirect('sign-in');
		 }
	}

	public function registerSubmit()
	{  
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',array('is_unique'=>'This email has been already used!'));
		$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|required|min_length[8]|max_length[20]');
	//	$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('terms', 'Terms and Conditions', 'required');

		//$this->form_validation->set_rules('user_type', 'User Type', 'required');
		//$this->form_validation->set_rules('company', 'Company', 'required');	
		//$this->form_validation->set_rules('address', 'Address', 'required');
		//$this->form_validation->set_rules('city', 'City', 'required');
		//$this->form_validation->set_rules('state', 'State', 'required');
		//$this->form_validation->set_rules('zip', 'Zip', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$firstName = $this->input->post('first_name');
			$lastName = $this->input->post('last_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$contactNo = $this->input->post('contact_no');
			$userType = $this->input->post('user_type');
			$company = $this->input->post('company');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zip = $this->input->post('zip');
			$timeStamp = time();
			$status = 0;
			$termsAccepted = 1;
			$verificationCode = uniqid();
			$verificationLink = base_url() . 'sign-in?usid=' . urlencode(base64_encode($verificationCode));
			$userName = $this->mail->generateUnique('users', trim($firstName . $lastName), 'user_name', NULL, NULL);
			$varToken = random_strings(8);

			$this->Favoritewish_Model->setUserName($userName);
			$this->Favoritewish_Model->setFirstname(trim($firstName));
			$this->Favoritewish_Model->setLastName(trim($lastName));
			$this->Favoritewish_Model->setEmail($email);
			$this->Favoritewish_Model->setPassword($password);
			$this->Favoritewish_Model->setContactNo($contactNo);
			$this->Favoritewish_Model->setUserType($userType);
			$this->Favoritewish_Model->setCompany($company);
			$this->Favoritewish_Model->setAddress($address);
			$this->Favoritewish_Model->setCity($city);
			$this->Favoritewish_Model->setState($state);
			$this->Favoritewish_Model->setZip($zip);
			$this->Favoritewish_Model->setVerificationCode($verificationCode);
			$this->Favoritewish_Model->setTimeStamp($timeStamp);
			$this->Favoritewish_Model->setStatus($status);
			$this->Favoritewish_Model->setTermsAccepted($termsAccepted);
			$this->Favoritewish_Model->setToken($varToken);
			$chk = $this->Favoritewish_Model->createUser();
			//print_r($chk);
			//exit();
			if ($chk === TRUE) {
				$this->load->library('encryption');
				$this->load->library('email');

				$data = array(
					'first_name' => $firstName,
					'last_name' => $lastName,
					'email' => $email,
					'contact_no' => $contactNo,
					'user_name' => $userName,
					'password' => $password,
					'varificationlink' => $verificationLink
				);

				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$this->email->to($email);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('Favorite Wish User Registration!');

				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/user_registration', $data, true));
				$chkStatus = $this->email->send();

				if ($chkStatus === TRUE) {
					$this->session->set_flashdata('success', 'Please activate your account from the link that has been sent to you on your email');
					redirect('sign-in');
				} else {
					echo 'Error';
				}
			} else {

			}
		}
	}
    
	public function googleLogin(){
		include_once "vendor/autoload.php";
		$google_client = new Google_Client();
	    $google_client->setClientId(GOOGLE_CLIENT_ID); //Define your ClientID
	    $google_client->setClientSecret(GOOGLE_CLIENT_SECRET); //Define your Client Secret Key
	    $google_client->setRedirectUri(GOOGLE_REDITECT_URL); //Define your Redirect Uri
	    $google_client->addScope('email');
	    $google_client->addScope('profile');
		$google_client->setApprovalPrompt('force');
		$google_client->setPrompt('consent');
		$varToken = random_strings(8);
	    if(isset($_GET["code"]))
		{  
		 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	     if(!isset($token["error"]))
		 {
		  $google_client->setAccessToken($token['access_token']);
		  $this->session->set_userdata('access_token', $token['access_token']);
		  $google_service = new Google_Service_Oauth2($google_client);
		  $data = $google_service->userinfo->get();
		  $checkEmailExit = $this->Favoritewish_Model->checkEmailExit($data['email']);
		  if(!empty($checkEmailExit)){
		  $getObjUserDataById = $this->Favoritewish_Model->getObjUserGoogleDetails($checkEmailExit['id']); 
						if(!empty($getObjUserDataById)){  
							$updateData = array(
								'first_name' => $checkEmailExit['first_name'],
								'last_name'  => $checkEmailExit['last_name'],
								'user_name'  => $checkEmailExit['first_name'].$checkEmailExit['last_name'],
								'email' =>    $checkEmailExit['email'],
								'login_oauth_uid' => $data['id'],
								'status' => 1,
								'verification_code' => 1,
							);  
							$this->Favoritewish_Model->Update_user_data($updateData, $getObjUserDataById->id);
						}else{
							$insertUser = $this->Favoritewish_Model->Insert_user_data($user_data); 
						}
				}else{
					$user_data = array(
						'first_name' => $data['given_name'],
						'last_name'  => $data['family_name'],
						'user_name'  => $data['given_name'].$data['family_name'],
						'email' => $data['email'],
						'login_oauth_uid' => $data['id'],
						'status' => 1,
						'verification_code' => 1,
						'token'=>$varToken,
						'user_active_status'=>1
					);
					$insertUser = $this->Favoritewish_Model->Insert_user_data($user_data);
				}
			    $userId = !empty($getObjUserDataById) ? $getObjUserDataById->id : $insertUser;
				$this->db->where('id', $userId);
				$getFinalUserDetails =  $this->Favoritewish_Model->InsertDataById($userId);
				$authArray = array(
						'user_id' => $getFinalUserDetails->id,
						'email' => $getFinalUserDetails->email,
						'first_name' => $getFinalUserDetails->first_name,
						'last_name' => $getFinalUserDetails->last_name,
						'contact_no' => !empty($getFinalUserDetails->contact_no) ? $getFinalUserDetails->contact_no :'',
						'company' => !empty($getFinalUserDetails->company) ? $getFinalUserDetails->company :'',
						'token'=>$varToken,
						'user_active_status'=>1
					);
					$this->session->set_userdata('ci_session_key_generate', TRUE);
					$this->session->set_userdata('ci_seesion_key', $authArray);
				redirect('user-dashboard');
		  }else{
			  $this->session->set_flashdata('error', 'Something wents wrong by google token!');
			  redirect('sign-in');
		  }
	     }else{
			 $this->session->set_flashdata('error', 'Something wents wrong by google code!');
			 redirect('sign-in');
		 }
		
	}
	public function login() // Login Controller for users
	{   
	   //	echo"<pre>"; var_dump($timeStamp = time();); exit;
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			if (!empty($this->input->get('usid'))) {
				$verificationCode = urldecode(base64_decode($this->input->get('usid')));
				$this->Favoritewish_Model->setVerificationCode($verificationCode);
                $this->Favoritewish_Model->setVerificationCode($verificationCode);
				$this->Favoritewish_Model->activate();
				$this->session->set_flashdata('successemail', 'Your email verified successfully!');
				redirect('sign-in');
			}
			$arr['data'] = $this->Favoritewish_Model->bannerSection('login'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'New User Login';
			$data['metaKeywords'] = 'New User Login';
			$data['title'] = "Login";
			$data['breadcrumbs'] = array('Login' => '#');
			$this->load->view('front/header_inner', $data);
			   include_once "vendor/autoload.php";
			    $google_client = new Google_Client();
                 $google_client->setClientId(GOOGLE_CLIENT_ID); //Define your ClientID
	             $google_client->setClientSecret(GOOGLE_CLIENT_SECRET); //Define your Client Secret Key
	             $google_client->setRedirectUri(GOOGLE_REDITECT_URL); //Define your Redirect Uri
                $google_client->addScope('email');
                $google_client->addScope('profile');
                $google_client->setPrompt('consent');
				$login_button = '<a href="'.$google_client->createAuthUrl().'" class="social-login-btn" ><img src="'.base_url().'assets/images/site-image/google.png" />Sign in with Google</a>';	
				$data['login_button'] = $login_button;
				$this->template->load('default_layout', 'contents', 'auth/sign-in',$data);
			    $this->load->view('front/footer_main');
				
		}else{ 
			redirect('home/page');
		}
	}

	// action login method
	function loginSubmit()
	{   
		// Check form  validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'User Name/Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			//Field validation failed.  User redirected to login page
			//$this->login;
			redirect('sign-in');
		} else {
			$sessArray = array();
			//Field validation succeeded.  Validate against database
			$username = $this->input->post('user_name');
			$password = $this->input->post('password');

			$this->Favoritewish_Model->setUserName($username);
			$this->Favoritewish_Model->setPassword($password);
			//query the database
			$result = $this->Favoritewish_Model->userLogin();
			if (!empty($result) && count($result) > 0) {
				foreach ($result as $row) {  
					    $id = $row->user_id;
						$updateMassageStatus = array(
						'msg_notify_status' => 1,
				   ); 
			      $updateMassageStatus = $this->Favoritewish_Model->updateMsgStatus($id,$updateMassageStatus);   		
					$authArray = array(
						'user_id' => $row->user_id,
						'user_name' => $row->user_name,
						'email' => $row->email,
						'contact_no' => $row->contact_no,
						'first_name' => $row->first_name,
						'last_name' => $row->last_name,
						'company' => $row->company,
					);
					$this->session->set_userdata('ci_session_key_generate', TRUE);
					$this->session->set_userdata('ci_seesion_key', $authArray);
				}
				redirect('home/page');
			} else {
				redirect('sign-in?msg=1');
			}
		}
	}

	// user profile
	public function user_dashboard()
	{   // die('dashbord');
		
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$get = $this->input->get();
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Dashboard';
			$data['metaKeywords'] = 'User Dashboard';
			$data['title'] = "User Dashboard";
			$data['breadcrumbs'] = array('User Dashboard' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
		  //	echo"<pre>"; var_dump($sessionArray); exit;
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
		//	echo"<pre>"; var_dump($data['userInfo']); exit;
			$data['frienddetails'] = $this->Favoritewish_Model->getFriendDatails('');
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['wishInfo'] = $this->Favoritewish_Model->getWishInfo($get);
			$data['get'] = $get;
			$data['getObjFamilyDetails'] = $this->Favoritewish_Model->getObjFamilyDetailsByUserId($sessionArray['user_id']);
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
	       //	echo"<pre>"; var_dump($data['friendRequestCount']); exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/user-dashboard');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
    
	

	public function user_registry()
	{ 
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			 $get = $this->input->get();
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Registry';
			$data['metaKeywords'] = 'User Dashboard';
			$data['title'] = "User Registry";
			$data['breadcrumbs'] = array('User Dashboard' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['frienddetails'] = $this->Favoritewish_Model->getFriendDatails('');
		//	echo"<pre>"; var_dump($data['frienddetails']); exit;
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['wishInfo'] = $this->Favoritewish_Model->getRegistryInfo($get);
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$data['get'] = $get;
			$this->load->view('front/header_inner', $data);
			$this->template->load('default_layout', 'contents', 'auth/user-registry');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
   
	public function family_wishes(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			 $get = $this->input->get();  
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Family Wish';
			$data['metaKeywords'] = 'User Dashboard';
			$data['title'] = "User Family Wish";
			$data['breadcrumbs'] = array('User Dashboard' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['frienddetails'] = $this->Favoritewish_Model->getFriendDatails('');
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['wishInfo'] = $this->Favoritewish_Model->getFamilyWishInfo($get);
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$data['get'] = $get;
			$this->load->view('front/header_inner', $data);
			$this->template->load('default_layout', 'contents', 'auth/family-wishes');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}


	// user profile
	public function user_profile()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'UUser Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
          //  echo"<pre>"; var_dump($data['userInfo']); exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/profile');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getUserFriendsDetails($id)
	{
		// die('ok');
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {

			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'UUser Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$data['user_profile_id'] = $id;
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
			$data['is_friend'] = $isFriend;
			$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
			//	$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			if (!empty($id)) {
				$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
				// echo"<pre>"; var_dump($data['userInfo']);exit;
			}
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/friend-details');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getwishlist($id)
	{  
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$get = $this->input->get();
			$data = array();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'UUser Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$data['user_profile_id'] = $id;
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($id);
			$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
			$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
			$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
			$data['is_friend'] = $isFriend;
			//	$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			if (!empty($id)) {
				$data['wishInfo'] = $this->Favoritewish_Model->getWhishList($get);
				// echo"<pre>"; var_dump($data['userInfo']);exit;
			}
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/whish-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
	public function getSubCat()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$data = array();
			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			if (!empty($stream)) {
				$objPost = json_decode(trim($stream), true);
				$typeData = $this->Favoritewish_Model->getSubCat($objPost['id']);
				$arrayHtml = "<option value=''>Select Type</option>";
				if (!empty($typeData)) {
					foreach ($typeData as $type) {
						$arrayHtml .= "<option value=" . $type['id'] . ">" . $type['name'] . "</option>";
					}
				}
				$data['code'] = 200;
				$data['html'] = $arrayHtml;
				echo json_encode($data);
			}
		}
	}
    
	public function getSubCat_cat_id(){ 
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$data = array();
			$wishId =  $this->input->post('wish_id');
		//	echo"<pre>"; var_dump($cat_id);exit;
			if (!empty($wishId)){
				$getObjWishData = $this->Favoritewish_Model->getWishListById($wishId);
				$categories = $this->Favoritewish_Model->getCategories_Wish_Edit();
			//	echo"<pre>"; var_dump($categories);exit;
				$subCategories = $this->Favoritewish_Model->getSubCat($getObjWishData->categories_id);
				//echo"<pre>"; var_dump($subCategories);exit;
		     	$arrayHtml = "";
				$arrayHtml .= "<option value=''>Select Category</option>";
				if (!empty($categories)) {
					foreach ($categories as $cat_data) {   
						$selected = (!empty($getObjWishData) && ($getObjWishData->categories_id == $cat_data->id)) ? 'selected' :'';
					//	$arrayHtml .= "<option value=" . $cat_data->id . ">" . $cat_data->name . "</option>";
					$arrayHtml .= '<option value="' . $cat_data->id .'" '.$selected.'>'.$cat_data->name . '</option>';
						
					}
				}
				$arrayHtmlType = "";
				$arrayHtmlType .= "<option value=''>Select Type</option>";
				if (!empty($subCategories)) {
					foreach ($subCategories as $subCatData) {  
					$subCatId =  $subCatData['id'];
					$subCatName =  $subCatData['name'];
						$selected = (!empty($getObjWishData) && ($getObjWishData->type == $subCatData['id'])) ? 'selected' :'';
					//	$arrayHtml .= "<option value=" . $cat_data->id . ">" . $cat_data->name . "</option>";
					$arrayHtmlType .= '<option value="' . $subCatId .'" '.$selected.'>'.$subCatName . '</option>';
						
					}
				}
			//	echo"<pre>"; var_dump($getObjWishData->other_accessories); exit;
				$data['code'] = 200;
				$data['html'] = $arrayHtml;
				$data['htmlType'] = $arrayHtmlType;
				$data['htmlotherAccessories'] = $getObjWishData->other_accessories;
				$data['htmlBrand'] = $getObjWishData->brand;
				$data['htmlColor'] = $getObjWishData->color;
				$data['htmlsize'] = $getObjWishData->size;
				$data['htmlstyle'] = $getObjWishData->style;
				$data['htmlwish_id'] = $getObjWishData->id;
				echo json_encode($data);
			}
		}
	}
    
	public function getCategorySucategory_registry_id(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); 
		} else {
			$data = array();
			$registryId =  $this->input->post('registry_id');
			if (!empty($registryId)){
				$getObjWishData = $this->Favoritewish_Model->getRegistryListById($registryId); 
				$categories = $this->Favoritewish_Model->getCategories();
				$subCategories = $this->Favoritewish_Model->getSubCat($getObjWishData->cat_id);
		     	$arrayHtml = "";
				$arrayHtml .= "<option value=''>Select Category</option>";
				if (!empty($categories)) {
					foreach ($categories as $cat_data) {   
						$selected = (!empty($getObjWishData) && ($getObjWishData->cat_id == $cat_data->id)) ? 'selected' :'';
					$arrayHtml .= '<option value="' . $cat_data->id .'" '.$selected.'>'.$cat_data->name . '</option>';
						
					}
				}
				$arrayHtmlType = "";
				$arrayHtmlType .= "<option value=''>Select Type</option>";
				if (!empty($subCategories)) {
					foreach ($subCategories as $subCatData) {  
					$subCatId =  $subCatData['id'];
					$subCatName =  $subCatData['name'];
						$selected = (!empty($getObjWishData) && ($getObjWishData->type == $subCatData['id'])) ? 'selected' :'';
					$arrayHtmlType .= '<option value="' . $subCatId .'" '.$selected.'>'.$subCatName . '</option>';
						
					}
				}
				$data['code'] = 200;
				$data['html'] = $arrayHtml;
				$data['htmlRegistryType'] = $arrayHtmlType;
				$data['htmlOtherAsseccores'] = $getObjWishData->other_accessories;
				$data['htmlRegistryOccasionType'] =  $getObjWishData->occasion;
				$data['htmlRegistryBrand'] = $getObjWishData->brand;
				$data['htmlRegistryColor'] = $getObjWishData->color;
				$data['htmlRegistrysize'] = $getObjWishData->size;
				$data['htmlRegistrystyle'] = $getObjWishData->style;
				$data['htmlRegistry_id'] = $getObjWishData->id;
				echo json_encode($data);
			}
		}
	}
	// edit method

	public function showPlaceHolderBycatName(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); 
		} else {
			$data = array();
			$catId =  $this->input->post('catId');
			$getCategory = $this->Favoritewish_Model->getcatById($catId); 
			$categoryName = !empty($getCategory->name) ? $getCategory->name :'NULL';
			if (!empty($categoryName)){
				$data['code'] = 200;
				$data['category'] = $categoryName;
				echo json_encode($data);
			}
		}
	}
    public function showPlaceHolderBycatNameEdit(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); 
		} else {
			$data = array();
			$cat_id =  $this->input->post('cat_id');
			$getCategory = $this->Favoritewish_Model->getcatByIdEdit($cat_id); 
			$categoryNameEdit = !empty($getCategory->name) ? $getCategory->name :'NULL';
			if (!empty($categoryNameEdit)){
				$data['code'] = 200;
				$data['category'] = $categoryNameEdit;
				echo json_encode($data);
			}
		}
	}
	public function edit()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {

			$arr['data'] = $this->Favoritewish_Model->bannerSection('editprofile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'Update Profile';
			$data['metaKeywords'] = 'Update Profile';
			$data['title'] = "Update Profile";
			$data['breadcrumbs'] = array('Update Profile' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['genderSelect'] = $this->Favoritewish_Model->getUserDetails();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			// echo "<pre>";var_dump($data['userInfo']); exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/edit');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	// action update user 
	public function editUser()
	{  
		// echo"<pre>"; var_dump($this->input->post('friend_request_notify')); exit;
	    $sessionArray = $this->session->userdata('ci_seesion_key');
		$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
		$userInfo = $this->Favoritewish_Model->getUserDetails(); 
      //  echo"<pre>"; var_dump($userInfo['profile_photo']); exit; 
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
	 //	$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->edit();
		} else {    
			$firstName = $this->input->post('first_name');
			$lastName = $this->input->post('last_name');
			$contactNo = $this->input->post('contact_no');
			$userType = $this->input->post('user_type');
			$company = $this->input->post('company');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$user_bio = $this->input->post('user_bio');
			$zip = $this->input->post('zip');
			$favorite_country = $this->input->post('favorite_country');
			$favorite_public_outfit_wear = $this->input->post('favorite_p_wear');
			$favorite_s_team = $this->input->post('favorite_s_team');
			$favorite_music = $this->input->post('favorite_music');
			$dob = !empty($this->input->post('dob')) ? $this->input->post('dob') : NULL;
			$favorite_charity =   $this->input->post('favorite_charity');
			$gender =   $this->input->post('gender');
			$friendRequestNotify =   $this->input->post('friend_request_notify');
			// Upload profile photo in folder
			if(!empty($_FILES['profile_photo']['name'])){
				$config['upload_path']          = './assets/uploads/profile_photo/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				 if ( ! $this->upload->do_upload('profile_photo'))
				 {
						 $error = array('error' => $this->upload->display_errors());
						redirect('user-profile/edit',$this->session->set_flashdata("error_msg", $error));
				 }
				 else
				 {
					$profileImageData = array('upload_data' => $this->upload->data());
				 } 
				 $profile_photo = $profileImageData['upload_data']['file_name'];
				// echo"<pre>"; var_dump($profile_photo); exit;
			}else{
				$profile_photo = $userInfo['profile_photo'];
			}
			  
			// Upload cover photo in folder
			if(!empty($_FILES['cover_photo']['name'])){
				$config['upload_path']          = './assets/uploads/cover_photo/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2048;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				 if ( ! $this->upload->do_upload('cover_photo'))
				 {
						 $error = array('error' => $this->upload->display_errors());
						redirect('user-profile/edit',$this->session->set_flashdata("error_msg", $error));
				 }
				 else
				 {
					$coverImageData = array('upload_data' => $this->upload->data());
				 } 
				 $cover_photo = $coverImageData['upload_data']['file_name'];
			}else{
				$cover_photo = $userInfo['cover_photo'];
			}
			
			$timeStamp = time();
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$this->Favoritewish_Model->setFirstName(trim($firstName));
			$this->Favoritewish_Model->setLastName(trim($lastName));
			$this->Favoritewish_Model->setContactNo($contactNo);
			$this->Favoritewish_Model->setUserType($userType);
			$this->Favoritewish_Model->setCompany($company);
			$this->Favoritewish_Model->setUserBio($user_bio);
			$this->Favoritewish_Model->setAddress($address);
			$this->Favoritewish_Model->setCity($city);
			$this->Favoritewish_Model->setState($state);
			$this->Favoritewish_Model->setZip($zip);
			$this->Favoritewish_Model->setfavorite_country($favorite_country);
			$this->Favoritewish_Model->setfavoripublic_outfit_wear($favorite_public_outfit_wear);
			$this->Favoritewish_Model->setfavorite_sports_teams($favorite_s_team);
			$this->Favoritewish_Model->setfavorite_music($favorite_music);
			$this->Favoritewish_Model->set_dob($dob);
			$this->Favoritewish_Model->setprofile_photo($profile_photo);
			$this->Favoritewish_Model->setcover_photo($cover_photo);
			$this->Favoritewish_Model->setfavorite_charity($favorite_charity);
			$this->Favoritewish_Model->set_gender($gender);
			$this->Favoritewish_Model->set_frienf_Request_Notify($friendRequestNotify);
			$this->Favoritewish_Model->setTimeStamp($timeStamp);
			$status = $this->Favoritewish_Model->update();
			if ($status == TRUE) {
				$this->session->set_flashdata('success', 'Your profile updated successfully!');
				redirect('user-profile/edit');
			}
		}
	}

	//forgot password method
	public function forgotpassword()
	{  
		if ($this->session->userdata('ci_session_key_generate') == TRUE) {
			redirect('user-dashboard'); // the user is logged in, redirect them!
		} else {

			$arr['data'] = $this->Favoritewish_Model->bannerSection('forgotpassword'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'Forgot Password';
			$data['metaKeywords'] = 'Forgot Password';
			$data['title'] = "Forgot Password";
			$data['breadcrumbs'] = array('Forgot Password' => '#');
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/forgot-password');
			$this->load->view('front/footer_main');
		}
	}

	//action forgot password method
	public function actionForgotPassword()
	{    
		$this->form_validation->set_rules('forgot_email', 'Your Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			//Field validation failed.  User redirected to Forgot Password page
			$this->forgotpassword();
		} else {
			$login = base_url() . 'sign-in';
			$email = $this->input->post('forgot_email');
			$this->Favoritewish_Model->setEmail($email);
			$pass = $this->generateRandomPassword(8);
			$this->Favoritewish_Model->setPassword($pass);
			$status = $this->Favoritewish_Model->updateForgotPassword();
            $checkEmailExit =  $this->Favoritewish_Model->checkEmailExit($email);
			if ($status == TRUE) {

				$this->load->library('encryption');
				$this->load->library('email');

				$data = array(
					'username' => $email,
					'password' => $pass,
					'loginlink' => $login
				);

				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$this->email->to($email);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('Favorite Wish Forgot Password!');

				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/forgot_password', $data, true));
				$chkStatus = $this->email->send();
                
                if($checkEmailExit == TRUE){
					redirect('forgot-password?msg=3');
				}else{
					redirect('forgot-password?msg=4');
				}
				if ($chkStatus === TRUE) {
					redirect('forgot-password?msg=2');
				} else {
					redirect('forgot-password?msg=1');
				}
			} else {
				redirect('forgot-password?msg=1');
			}
		}
	}

	// edit method
	public function changepwd()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('signin'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('changepassword'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'Password Setting';
			$data['metaKeywords'] = 'Password Setting';
			$data['title'] = "Change Password";
			$data['breadcrumbs'] = array('Change Password' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/change-password');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function actionChangePwd()
	{
		$this->form_validation->set_rules('change_pwd_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('change_pwd_confirm_password', 'Password Confirmation', 'trim|required|matches[change_pwd_password]');
		if ($this->form_validation->run() == FALSE) {
			$this->changepwd();
		} else {
			$change_pwd_password = $this->input->post('change_pwd_password');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$this->Favoritewish_Model->setPassword($change_pwd_password);
			$status = $this->Favoritewish_Model->changePassword();
			if ($status == TRUE) {
				redirect('profile');
			}
		}
	}


	//generate random password
	public function generateRandomPassword($length = 10)
	{
		$alphabets = range('a', 'z');
		$numbers = range('0', '9');
		$final_array = array_merge($alphabets, $numbers);
		$password = '';
		while ($length--) {
			$key = array_rand($final_array);
			$password .= $final_array[$key];
		}
		return $password;
	}

	//logout method
	public function logout()
	{
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$id = $sessionArray['user_id'];
		 $updateMsgStatus = array(
			'msg_notify_status' => 0,
		); 
		$this->Favoritewish_Model->updateMassageStatus($id,$updateMsgStatus);
		$this->session->unset_userdata('ci_seesion_key');
		$this->session->unset_userdata('ci_session_key_generate');
		$this->session->sess_destroy();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		redirect('sign-in');
	}




	/* Admin Functionality   ==============================================================================================================
	*
	*
	*
	* Admin Functionality Started
	* Functions included
	* Contact Form Submission Inquiry Listing
	* Contact Form Submission Inquiry Details page
	* Contact Form Submission Export to Excel & CSV
	* Administrator Login, Logout & Forgot Password
	*
	*
	*
	END OF ADMIN FUNCTIONALITY ================================================================================================================== */







	public function administrator()
	{ 
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if (isset($this->session->userdata['logged_in'])) {
				//echo 'Logged In!';
				header("Access-Control-Allow-Origin: *");
				$data['title'] = 'Welcome to Favorite Wish';
				//$data['inquiries'] = $this->Favoritewish_Model->count_inquiries();
				//$data['useraccounts'] = $this->Favoritewish_Model->count_user_accounts();
				//$data['hangar_entries'] = $this->Favoritewish_Model->count_hangars();
				$data['totalUserCount'] = $this->Favoritewish_Model->totalUserCount();
				$data['totalWishCount'] = $this->Favoritewish_Model->totalWishCount();
				$data['totalRegistryCount'] = $this->Favoritewish_Model->totalRegistryCount();
				$data['totalFamilyWishCount'] = $this->Favoritewish_Model->totalFamilyWishCount();
				$this->load->view('layouts/admin_header', $data);
				$this->template->load('default_layout', 'contents', 'home', $data);
				$this->load->view('layouts/admin_footer');
			} else {
				$data['title'] = 'Admin Login';
				$this->load->view('admin/login', $data);
			}
		} else {
			$data = array(
				'email' => $this->input->post('admin_email'),
				//'password' => md5($this->input->post('admin_password'))
				'password' => $this->input->post('admin_password')
			);
			$result = $this->Favoritewish_Model->adminLogin($data);
			if ($result == TRUE) {

				$username = $this->input->post('admin_email');
				$result = $this->Favoritewish_Model->read_admin_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->admin_email,
						'name' => $result[0]->admin_name,
						'id' => $result[0]->id
					);
					$this->session->set_userdata('logged_in', $session_data);
					//echo 'Logged In Thanks';
					header("Access-Control-Allow-Origin: *");
					$data['title'] = 'Welcome to Favorite Wish';
					//$data['inquiries'] = $this->Favoritewish_Model->count_inquiries();
					//$data['useraccounts'] = $this->Favoritewish_Model->count_user_accounts();
					//$data['hangar_entries'] = $this->Favoritewish_Model->count_hangars();
					$data['totalUserCount'] = $this->Favoritewish_Model->totalUserCount();
				$data['totalWishCount'] = $this->Favoritewish_Model->totalWishCount();
				$data['totalRegistryCount'] = $this->Favoritewish_Model->totalRegistryCount();
				$data['totalFamilyWishCount'] = $this->Favoritewish_Model->totalFamilyWishCount();
					$this->load->view('layouts/admin_header', $data);
					$this->template->load('default_layout', 'contents', 'home', $data);
					$this->load->view('layouts/admin_footer');
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$data['title'] = 'Admin Login';
				$this->load->view('admin/login', $data);
			}
		}
	}

	public function adminSignout()
	{
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect(base_url() . 'administrator');
	}

	public function admin_forgot_password()
	{
		$this->form_validation->set_rules('admin_email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Reset Your Admin Password';
			$this->load->view('admin/forgot_password', $data);
		} else {
			$email = $this->input->post('admin_email');
			$this->db->where('admin_email', $email);
			$this->db->from('administrator');
			$num_res = $this->db->count_all_results();
			if ($num_res == 1) {
				$code = mt_rand('5000', '200000');
				$data = array(
					//'admin_password' => password_hash($code, PASSWORD_BCRYPT),
					'admin_password' => $code,
					//'url' => base_url().'administrator',
				);

				$this->db->where('admin_email', $email);
				if ($this->db->update('administrator', $data)) {

					$this->load->library('encryption');
					$this->load->library('email');

					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);

					$this->email->to(MAIL_TO);
					$this->email->from(MAIL_FROM, FROM_TEXT);
					$this->email->subject('Favorite Wish Admin - Reset Your Password!');

					$this->email->set_newline("\r\n");
					$this->email->message($this->load->view('email/admin/reset_admin_password', $data, true));
					$chkStatus = $this->email->send();

					if ($chkStatus) {
						$this->session->set_flashdata('success', 'New password has been sent to your email.');
						redirect(base_url() . 'administrator');
					}
				} else {
					redirect(base_url() . 'admin_fpassword');
				}
			} else {

				$this->session->set_flashdata('error', 'Email does not match the database!');
				redirect(base_url() . 'admin_fpassword');
			}
		}
	}
	public function getUserProfile()
	{   
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'User Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();

			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/profile');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
	public function getUserFriends()
	{   //  die('ok');
		checkMenuActive(true);
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get(); //echo"<pre>"; var_dump($get); exit;
			$data['metaDescription'] = 'User Friends';
			$data['metaKeywords'] = 'User Friends';
			$data['title'] = "User Friends";
			$data['breadcrumbs'] = array('User Friends' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['get'] = $get;
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['userData'] = $this->Favoritewish_Model->getUserFriendsList($get); 
			$data['categories'] = $this->Favoritewish_Model->getCategories();
            $data['getObjFamilyMember'] = $this->Favoritewish_Model->getObjFamilyMemberDetails();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/friends');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

  

	public function getUserFriendsSearch()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$get = $this->input->get();
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'Search Friends';
			$data['metaKeywords'] = 'Search Friends';
			$data['title'] = "Search Friends";
			$data['breadcrumbs'] = array('User Friends' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();

			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['get'] = $get;
			$data['userData'] = $this->Favoritewish_Model->getUsersList($get);
		//	echo"<pre>"; var_dump($data['userData']); exit;
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/search', $data);
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
	public function sendFriendsRequest()
	{  
		$user = getUser();
		$arrData = array();
		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		if (!empty($stream)) {
			$objPost = json_decode(trim($stream), true);
			if (!empty($objPost['token'])) {
				$objUser = $this->Favoritewish_Model->getUserByToken($objPost['token']);
			//	echo"<pre>"; var_dump($objUser["email"]); exit;
				if (!empty($objUser)) {
					$arrInsert = array('to_friend' => $objUser['id'], 'from_friend' => $user['user_id'], 'status' => 0 , 'created_on' => date('Y-m-d H:i:s'));
					$this->db->insert('friends', $arrInsert);
					$arrInsertNotification = array(   
													'to_id' => $objUser['id'],
													'from_id' => $user['user_id'],
													'notification_type' =>'friend_request_send',
													'notification_massage' =>''.$user['first_name'].' '.$user['last_name'].' has sent you a friend request',
													'created_on'	    =>	date("Y-m-d H:i:s")
												);
					$this->db->insert('notification', $arrInsertNotification);
					if($objUser['friend_request'] == 1){
						$sessionArray = $this->session->userdata('ci_seesion_key');
						$formUser = $this->Favoritewish_Model->getFromUser($sessionArray['user_id']);
						$arrData['firstName'] =$formUser->first_name;
						$arrData['lastName'] =$formUser->last_name;
						$arrData['url'] = base_url('user/friends/requests');
						$config = array(
							'protocol'  => 'smtp',
							'smtp_host' => 'smtp.gmail.com',
							'smtp_port' => 587, //if 80 dosenot work use 24 or 21
							'smtp_user'  => 'codeyiizen.test@gmail.com',  
							'smtp_pass'  => 'wdxdkwcbygukszqv',
							'smtp_crypto' => 'tls',
							'charset' => 'iso-8859-1',
							'wordwrap' => TRUE
						);
						$this->load->library('encryption');
						$this->load->library('email');
						$config['charset'] = 'iso-8859-1';
						$config['wordwrap'] = TRUE;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						$this->email->to($objUser['email']);
						$this->email->from(MAIL_FROM, FROM_TEXT);
						$this->email->subject('FavoriteWish New Friend Request');
						$this->email->set_newline("\r\n");
						$this->email->message($this->load->view('email/friendRequestNotify',$arrData, true));
						$this->email->send();
				   }
					if(!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
						echo returnSuccessResponse($arrInsert);
					} else {
						echo returnSuccessResponse($arrInsert, "Something went wrong please try after some time");
					}
				}
			}
		} else {
			echo returnSuccessResponse([], "Invalid data send ");
		}
	}
	public function acceptFriendsRequest()
	{
		$user = getUser();
		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		if (!empty($stream)) {
			$objPost = json_decode(trim($stream), true);
			if (!empty($objPost['token'])) {
				$objUser = $this->Favoritewish_Model->getUserByToken($objPost['token']);
				if (!empty($objUser)) {
					$arrCheck = array('to_id' => $user['user_id'], 'from_id' => $objUser['id']);
					$arrUpdate = array('to_id' => $user['user_id'],'from_id' => $objUser['id'], 'req_accept' => 1);
					$this->db->where($arrCheck);
					$this->db->update('notification', $arrUpdate);
				}
				if (!empty($objUser)) {
				$arrInsertNotification = array(   
					'to_id' => $objUser['id'],
					'from_id' =>$user['user_id'],
					'notification_type' =>'friend_request_Accept',
					'notification_massage' =>''.$user['first_name'].' '.$user['last_name'].' accepted your friend request',
					'created_on'	    =>	date("Y-m-d H:i:s")
				);
                $this->db->insert('notification', $arrInsertNotification);
			   }

				if (!empty($objUser)) {
					$arrCheck = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id']);
					$arrUpdate = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id'], 'status' => 1);
					$arrNotificationUpdate = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id'],'notyfy_status' => 1,'created_on' => date('Y-m-d H:i:s'));
					$this->db->where($arrCheck);
					if ($this->db->update('friends', $arrUpdate)) {
						echo returnSuccessResponse($arrUpdate);
					} else {
						echo returnSuccessResponse($arrUpdate, "Something went wrong please try after some time");
					}
				}
			}
		} else {
			echo returnSuccessResponse([], "Invalid data send ");
		}
	}
	public function removeFriendsRequest()
	{
		$user = getUser(); 
		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		if (!empty($stream)) {
			$objPost = json_decode(trim($stream), true);
			if (!empty($objPost['token'])) {
				$objUser = $this->Favoritewish_Model->getUserByToken($objPost['token']);
				if (!empty($objUser)) {
					$arrCheck = array('to_id' => $user['user_id'], 'from_id' => $objUser['id']);
					$arrUpdate = array('to_id' => $user['user_id'],'from_id' => $objUser['id'], 'req_accept' => 1);
					$this->db->where($arrCheck);
					$this->db->update('notification', $arrUpdate);
				}
				if (!empty($objUser)) {
                   
					// if (!empty($objPost['type']) && $objPost['type'] == 'cancel') {
					// 	$arrCheck = array('from_id' => $user['user_id'], 'to_id' => $objUser['id']);
					// 	$this->db->where($arrCheck);
					// } else if (!empty($objPost['type']) && $objPost['type'] == 'decline') {
					// 	$arrCheck = array('to_id' => $user['user_id'], 'from_friend' => $objUser['id']);
					// 	$this->db->where($arrCheck);
					// } else if (!empty($objPost['type']) && $objPost['type'] == 'remove') { 
					// 	$arrCheck = array('from_id' => $user['user_id'], 'to_id' => $objUser['id']);  
					// 	$arrCheckOr = array('to_id' => $user['user_id'], 'from_friend' => $objUser['id']);
					// 	$this->db->group_start();
					// 	$this->db->where($arrCheck);
                    //     $this->db->group_end();
					// 	$this->db->or_group_start();
					// 	$this->db->where($arrCheckOr);
					// 	$this->db->group_end();
					// }
					// $this->db->delete('notification');

					if (!empty($objPost['type']) && $objPost['type'] == 'cancel') {
						$arrCheck = array('from_friend' => $user['user_id'], 'to_friend' => $objUser['id']);
						$this->db->where($arrCheck);
					} else if (!empty($objPost['type']) && $objPost['type'] == 'decline') {
						$arrCheck = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id']);
						$this->db->where($arrCheck);
					} else if (!empty($objPost['type']) && $objPost['type'] == 'remove') { 
						$arrCheck = array('from_friend' => $user['user_id'], 'to_friend' => $objUser['id']);  
						$arrCheckOr = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id']);
						$this->db->group_start();
						$this->db->where($arrCheck);
                        $this->db->group_end();
						$this->db->or_group_start();
						$this->db->where($arrCheckOr);
						$this->db->group_end();
					}
					if ($this->db->delete('friends')) {
						echo returnSuccessResponse([]);
					} else {
						echo returnSuccessResponse([], "Something went wrong please try after some time");
					}
				}
			}
		} else {
			echo returnSuccessResponse([], "Invalid data send ");
		}
	}
	public function getUserPendingFriends()
	{    
		checkMenuActive(true);
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get();
			$data['metaDescription'] = 'User Friends';
			$data['metaKeywords'] = 'User Friends';
			$data['title'] = "User Friends";
			$data['breadcrumbs'] = array('User Friends' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['get'] = $get;
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['userData'] = $this->Favoritewish_Model->getUserPendingFriendsList($get);
			$data['categories'] = $this->Favoritewish_Model->getCategories();
            $data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/friends');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function addYourWish()
	{   
		
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('brand', 'brand', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('size', 'size', 'required');
		$this->form_validation->set_rules('style', 'style', 'required');
		if ($this->form_validation->run()){
			$array = array(
				'categories_id'     => $this->input->post('category'),
				'type'  => $this->input->post('type'),
				'other_accessories'  => $this->input->post('accessories'),
				'brand'   => $this->input->post('brand'),
				'color' => $this->input->post('color'),
				'size' => $this->input->post('size'),
				'style' => $this->input->post('style'),
				'user_id' => $sessionArray['user_id'],
				'created_on' => date('Y-m-d H:i:s')
			);
			//	echo"<pre>"; var_dump($array); exit;
			$this->db->insert(' user_wish', $array);
			$array = array(
				'success' => '<div class="alert alert-warning">Wish Added Successfully</div>'
			);
		} else {
			$array = array(
				'error'   => true,
				'category' => form_error('category'),
				'type' => form_error('type'),
				'brand' => form_error('brand'),
				'color' => form_error('color'),
				'size' => form_error('size'),
				'style' => form_error('style')

			);
		}
		echo json_encode($array);
	}
  
	public function wishEditPost(){   
		//echo"<pre>"; var_dump($this->input->post('accessories')); exit;
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$this->load->library('form_validation');
	 //	$this->form_validation->set_rules('category', 'category', 'required');
	//	$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('brand', 'brand', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('size', 'size', 'required');
		$this->form_validation->set_rules('style', 'style', 'required');
		if ($this->form_validation->run()) { 
			 	$data = array(
						'table_name' => 'user_wish', // pass the real table name
						'id' => $this->input->post('wish_id'),
						'categories_id' => $this->input->post('cat_id'),
						'type' => $this->input->post('type_id'),
						'other_accessories' => $this->input->post('accessories'),
						'brand' => $this->input->post('brand'),
						'color' => $this->input->post('color'),
						'size' => $this->input->post('size'),
						'style' => $this->input->post('style'),
					    'created_on' => date('Y-m-d H:i:s')
					);
					$this->Favoritewish_Model->updateWishData($data);
			$array = array(
				'success' => '<div class="alert alert-warning">Wish Update Successfully</div>'
			);
		} else { 
			$array = array(
				'error'   => true,
				'category' => form_error('category'),
				'type' => form_error('type'),
				'brand' => form_error('brand'),
				'color' => form_error('color'),
				'size' => form_error('size'),
				'style' => form_error('style')

			);
		}
		echo json_encode($array);
	}

	public function registryEditPost(){ 
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$this->load->library('form_validation');
	 	$this->form_validation->set_rules('registry_catId', 'Category', 'required');
		$this->form_validation->set_rules('registry_typeId', 'type', 'required');
		$this->form_validation->set_rules('registry_occasion', 'occasion', 'required');
		$this->form_validation->set_rules('registry_brand', 'brand', 'required');
		$this->form_validation->set_rules('registry_color', 'color', 'required');
		$this->form_validation->set_rules('registry_size', 'size', 'required');
		$this->form_validation->set_rules('registry_style', 'style', 'required');
		if ($this->form_validation->run()) { 
			 	$data = array(
						'table_name' => 'user_registry', 
						'id' => $this->input->post('registryId'),
						'cat_id' => $this->input->post('registry_catId'),
						'type' => $this->input->post('registry_typeId'),
						'other_accessories' => !empty($this->input->post('accessories')) ? $this->input->post('accessories') :NULL,
						'occasion' => $this->input->post('registry_occasion'),
						'brand' => $this->input->post('registry_brand'),
						'color' => $this->input->post('registry_color'),
						'size' => $this->input->post('registry_size'),
						'style' => $this->input->post('registry_style'),
						'created_on' => date('Y-m-d H:i:s')
					);
					$this->Favoritewish_Model->updateRegistryData($data);
			$array = array(
				'success' => '<div class="alert alert-warning">Wish Update Successfully</div>'
			);
		} else { 
			$array = array(
				'error'   => true,
				'category' => form_error('registry_catId'),
				'type' => form_error('registry_typeId'),
				'brand' => form_error('registry_occasion'),
				'occasion' => form_error('registry_brand'),
				'color' => form_error('registry_color'),
				'size' => form_error('registry_size'),
				'style' => form_error('registry_style')

			);
		}
		echo json_encode($array);
	} 
	public function wishDelete(){
		$wishId = $this->input->post('wishId'); 
		$this->Favoritewish_Model->wishDelete($wishId);
		$array = array(
			'delete' => '<div class="alert alert-warning">Wish Delete Successfully</div>'
		);
		echo json_encode($array);
	}
    public function registryDelete(){
		$registryId = $this->input->post('registryId'); 
		$this->Favoritewish_Model->registryDelete($registryId);
		$array = array(
			'delete' => '<div class="alert alert-warning">Wish Delete Successfully</div>'
		);
		echo json_encode($array);
	}

	public function addRegistry()
	{   
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('occasion', 'occasion', 'required');
		$this->form_validation->set_rules('brand', 'brand', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('size', 'size', 'required');
		$this->form_validation->set_rules('style', 'style', 'required');
		if ($this->form_validation->run()) {  
			$array = array(
				'cat_id'     => $this->input->post('category'),
				'type'  => $this->input->post('type'),
				'other_accessories'  => $this->input->post('accessories'),
				'occasion'   => $this->input->post('occasion'),
				'brand'   => $this->input->post('brand'),
				'color' => $this->input->post('color'),
				'size' => $this->input->post('size'),
				'style' => $this->input->post('style'),
				'user_id' => $sessionArray['user_id'],
				'created_on' => date('Y-m-d H:i:s')
			);
			//	echo"<pre>"; var_dump($array); exit;
			$this->db->insert('user_registry', $array);
			$array = array(
				'success' => '<div class="alert alert-warning">Registry Added Successfully</div>'
			);
		} else {
			$array = array(
				'error'   => true,
				'category' => form_error('category'),
				'type' => form_error('type'),
				'occasion' => form_error('occasion'),
				'brand' => form_error('brand'),
				'color' => form_error('color'),
				'size' => form_error('size'),
				'style' => form_error('style')
			);
		//	echo"<pre>"; var_dump($array);exit;
		}
		echo json_encode($array);
	}

	public function addFamilyAdd(){   
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('familyMamber', 'Family Member', 'required');
		$this->form_validation->set_rules('childName', 'Child Name', 'required');
		$this->form_validation->set_rules('childBirthday','Child Birthday', 'required');
		$this->form_validation->set_rules('sex','sex', 'required');
		$this->form_validation->set_rules('familyCategory', 'Category', 'required');
		$this->form_validation->set_rules('familyType', 'Type', 'required');
		$this->form_validation->set_rules('familyBrand', 'Brand', 'required');
		$this->form_validation->set_rules('familyColor', 'Color', 'required');
		$this->form_validation->set_rules('familySize', 'Size', 'required');
		$this->form_validation->set_rules('familyStyle', 'Style', 'required');
		if ($this->form_validation->run()) {  
			$array = array(
				'family_member'     => $this->input->post('familyMamber'),
				'child_name'     => $this->input->post('childName'),
				'child_birthday'     => $this->input->post('childBirthday'),
				'sex'     => $this->input->post('sex'),
				'cat_id'     => $this->input->post('familyCategory'),
				'type_id'  => $this->input->post('familyType'),
				'other_accessories'  => $this->input->post('accessories'),
				'brand'   => $this->input->post('familyBrand'),
				'color'   => $this->input->post('familyColor'),
				'size' => $this->input->post('familySize'),
				'style' => $this->input->post('familyStyle'),
				'user_id' => $sessionArray['user_id'],
				'created_on' => date('Y-m-d H:i:s')
			);
			//	echo"<pre>"; var_dump($array); exit;
			$this->db->insert('family_wish_add', $array);
			$array = array(
				'success' => '<div class="alert alert-warning">Family Wish Added Successfully</div>'
			);
		} else {
			$array = array(
				'error'   => true,
				'family_member' => form_error('familyMamber'),
				'child_name' => form_error('childName'),
				'child_birthday' => form_error('childBirthday'),
				'sex' => form_error('sex'),
				'cat_id' => form_error('familyCategory'),
				'type_id' => form_error('familyType'),
				'brand' => form_error('familyBrand'),
				'color' => form_error('familyColor'),
				'size' => form_error('familySize'),
				'style' => form_error('familyStyle')
			);
		//	echo"<pre>"; var_dump($array);exit;
		}
		echo json_encode($array);
	}
	public function getregistrylist($id)
	{  
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'UUser Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$data['user_profile_id'] = $id;
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($id);
			$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
			$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
			$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
			$data['is_friend'] = $isFriend;
			//	$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			if (!empty($id)) {
				$data['wishInfo'] = $this->Favoritewish_Model->getRegistryInfoBtUser($id,$get);
				// echo"<pre>"; var_dump($data['userInfo']);exit;
			}
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/registry-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getFamilyWish($id){ 
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get();
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'UUser Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$data['user_profile_id'] = $id;
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($id);
			$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
			$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
			$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
			$data['is_friend'] = $isFriend;
			//	$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			if (!empty($id)) {
				$data['wishInfo'] = $this->Favoritewish_Model->getFamilyWishInfoByUser($id,$get);
				// echo"<pre>"; var_dump($data['wishInfo']);exit;
			}
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/familywish-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getMessagelist($id){    
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$search_query = $this->input->get('q');  // Get the search query from GET parameter
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get();
			
			$data['metaDescription'] = 'User Profile';
			$data['metaKeywords'] = 'User Profile';
			$data['title'] = "User Profile";
			$data['breadcrumbs'] = array('User Profile' => '#');
			$data['user_profile_id'] = $id;
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($id);
			$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
			$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
			$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
			$data['is_friend'] = $isFriend;
			if (!empty($id)) {
				$data['wishInfo'] = $this->Favoritewish_Model->getRegistryInfoBtUser($id,$get);
			}
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['friend_id'] = $id;
			if($id){  
			  $data['form_massage'] = $this->Favoritewish_Model->getMessage($id,$sessionArray['user_id']);
			  $sendMail = $this->Favoritewish_Model->sendMail($id,$sessionArray['user_id']);
			  $data['showFriendMassage'] = $this->Favoritewish_Model->get_user_friends_messages($sessionArray['user_id'],$search_query);
			  $data['friendName'] = $this->Favoritewish_Model->getObjFriendName($id);
				$updateSeenStatus = array(
				'seen_class' => '',
				); 
			$this->Favoritewish_Model->updateSeenStatus($id,$updateSeenStatus);
			 // echo"<pre>"; var_dump($data['showFriendMassage']); exit;
			}
			$data['user_massage'] = $this->Favoritewish_Model->getUserMessage($sessionArray['user_id']);
			$data['sessionData'] = $this->session->userdata('ci_seesion_key');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/message-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}
    

	public function messageFormSubmission(){ 
		$msg_image = $this->input->post('msg_image'); 
        $id = $this->input->post('friend_id');
		$checkUserLoginStatus = $this->Favoritewish_Model->checkUserLoginStatus($id);
	//	echo"<pre>"; var_dump($checkUserLoginStatus->check_msg_status); exit;
	    if($checkUserLoginStatus->check_msg_status == 0){
			$user = getUser();
			$arrInsertNotification = array(   
				'to_id' => $checkUserLoginStatus->id,
				'from_id' => $user['user_id'],
				'notification_type' =>'inbox_massage',
				'notification_massage' =>''.$user['first_name'].'  has sent a message. Reply now',
				'created_on'	    =>	date("Y-m-d H:i:s")
			);
        $this->db->insert('notification', $arrInsertNotification);
			if($checkUserLoginStatus->Inbox_message == 1){
				$userId = $user['user_id'];
				$data = array(
					'name'  => $user['user_name'].' '.'send you massage',
					'link'  => base_url()."user/friends/$userId/message",
				);

				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 587, //if 80 dosenot work use 24 or 21
					'smtp_user'  => 'codeyiizen.test@gmail.com',  
					'smtp_pass'  => 'wdxdkwcbygukszqv',
					'smtp_crypto' => 'tls',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);
				$this->load->library('encryption');
				$this->load->library('email');
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to($checkUserLoginStatus->email);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('Inbox Massage Notification');
				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/inboxMassageNotify',$data, true));
				$this->email->send();
			} 
		}
		$msgStatus = $checkUserLoginStatus->msg_notify_status;
		$id = $id;
		$updatetMsgStatus = array(
			'check_msg_status' => $checkUserLoginStatus->msg_notify_status,
		); 
		$this->Favoritewish_Model->UpdateMsgStatusById($id,$updatetMsgStatus); 

		$mag = $this->input->post('message'); 
        $sessionArray = $this->session->userdata('ci_seesion_key');
		if(!empty($mag)){
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			header("Location: {$_SERVER['HTTP_REFERER']}");
			//exit();

		}else{    
				$data = array(
					'from_user'	        =>	$sessionArray['user_id'],
					'to_user'	        =>	$this->input->post('friend_id'),
					'message'	        =>	$this->input->post('message'),
					'seen_class'	    =>	'fas fa-circle text-danger',
					'msg_type'	        =>	'msg',
					'seen'	            =>	'0',
					'status'	        =>	'0',
					'created_on'	    =>	date("Y-m-d H:i:s"),
				);	
          // echo"<pre>"; var_dump($this->input->post('friend_id')); exit;
		  $is_cf_submitted = $this->Favoritewish_Model->messageFrmSubmit($data,$msgStatus);
		  redirect('massage/list?f_id='.$id.'');
	}
   }else{
	if(!empty($_FILES['msg_image']['name'])){
		$config['upload_path']          = './assets/uploads/massge_photo/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		 if ( ! $this->upload->do_upload('msg_image'))
		 {
				 $error = array('error' => $this->upload->display_errors());
				redirect('massage/list?f_id='.$id.'',$this->session->set_flashdata("error_msg", $error));
		 }
		 else
		 {
			$profileImageData = array('upload_data' => $this->upload->data());
		 } 
		 $profile_photo = $profileImageData['upload_data']['file_name'];
	}
		$data = array(
			'from_user'	        =>	$sessionArray['user_id'],
			'to_user'	        =>	$this->input->post('friend_id'),
			'msg_image'	        =>	$profile_photo,
			'msg_type'	        =>	'img',
			'seen'	            =>	'0',
			'status'	        =>	'0',
			'created_on'	    =>	date("Y-m-d H:i:s")
		);
		$is_cf_submitted = $this->Favoritewish_Model->messageFrmSubmit($data,$msgStatus);
		redirect('massage/list?f_id='.$id.'');
   }
 }
 public function familyRequest(){
	   $user = getUser();
	   //echo "<pre>";var_dump($user);exit;
	   $stream = $this->security->xss_clean($this->input->raw_input_stream);
	   if (!empty($stream)) {
		   $objPost = json_decode(trim($stream), true);
		   if (!empty($objPost['id'])) {
				$getObjUserFamilyChk = $this->Favoritewish_Model->getObjUserFamilyChk($user['user_id'],$objPost['to_user_id']);
				if(!empty($getObjUserFamilyChk)){
					$arrCheck = array('from_user_id'=> $user['user_id'],
					'to_user_id'=> $objPost['to_user_id']);
					$this->db->where($arrCheck);
					$this->db->delete('user_family_member');
				}
				$array = array(
						'from_user_id'=> $user['user_id'],
						'to_user_id'=> $objPost['to_user_id'],
						'family_member_id'=> $objPost['id'],
						'created_on'=> Date('Y-m-d H:i:s')
					);
				  if ($this->db->insert('user_family_member', $array)) {
					$array = array('code'=>200,
						           'success' => '<div class="alert alert-warning">Family Member Added Successfully</div>'
					);
				   } else {
					$array = array('code'=>201,
						           'error' => '<div class="alert alert-danger">Something wents wrong!</div>'
					);
					   echo returnSuccessResponse($arrUpdate, "Something went wrong please try after some time");
				   } 
		   }else{
				$array = array(
					'code'=>201,
					'error' => '<div class="alert alert-danger">Choose Family First!</div>'
				);
		   }
	   } else {
		$array = array(
			'code'=>201,
			'error' => '<div class="alert alert-danger">Invalid Data!</div>'
		);
	   }
	   echo json_encode($array);
 }
 public function userAccountRemove(){
	   $user = getUser();
	   //echo "<pre>";var_dump($user);exit;
	   $stream = $this->security->xss_clean($this->input->raw_input_stream);
	   if (!empty($stream)) {
		   $objPost = json_decode(trim($stream), true);
		   //echo "<pre>";var_dump($objPost);exit;
		   if (!empty($objPost['user_id']) &&($objPost['user_id'] == 'account')) {
				$getObjUserChk = $this->Favoritewish_Model->getObjgetObjUserDetails($user['user_id']);
				if(!empty($getObjUserChk)){
					$arrCheck = array('id'=> $user['user_id']);
					$arrCheckTofriend = array('to_friend'=> $user['user_id']);
					$arrCheckFromfriend = array('from_friend'=> $user['user_id']);
					$deleteUser = $this->Favoritewish_Model->deleteUser($arrCheck);
					$deleteToFriends = $this->Favoritewish_Model->deletefriendUser($arrCheckTofriend);
					$deleteFromFriends = $this->Favoritewish_Model->deletefriendUser($arrCheckFromfriend);
					$this->session->unset_userdata('ci_seesion_key');
					$this->session->unset_userdata('ci_session_key_generate');
					$this->session->sess_destroy();
					$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
					$this->output->set_header("Pragma: no-cache");
				   }
				   $array = array('code'=>200,
						         'success' => '<div class="alert alert-warning">User Remove Successfully</div>'
					);
				   
		   }else{
				$array = array(
					'code'=>201,
					'error' => '<div class="alert alert-danger">Invalid Data!</div>'
				);
		   }
	   } else {
		$array = array(
			'code'=>201,
			'error' => '<div class="alert alert-danger">Invalid Data!</div>'
		);
	   }
	   echo json_encode($array);
 }
 
 public function adminUserList(){
	$config = array();
	$config["base_url"] = base_url() . "admin/user/list";
	$config["total_rows"] = $this->Favoritewish_Model->getCount();
	$config["per_page"] = 10;
	$config["uri_segment"] = 4;
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	$data["links"] = $this->pagination->create_links();
	$data['title'] = 'User List';

	$data['allUserList'] = $this->Favoritewish_Model->getUsers($config["per_page"], $page);
	$this->load->view('layouts/admin_header', $data);
	$this->template->load('default_layout', 'contents', 'adminUserList', $data);
	$this->load->view('layouts/admin_footer');
}

public function adminUserActiveStatusChange(){
$data = array(
	'table_name' => 'users', 
	'id' => $this->input->post('id'),
	'user_active_status' => $this->input->post('status'),
);
$cehckUserid = $this->Favoritewish_Model->checkUserId($data);
}

public function adminHomePageDynamic(){
$data['title'] = 'User List';
$data['homedata'] = $this->Favoritewish_Model->getHomeData();
$this->load->view('layouts/admin_header', $data);
$this->template->load('default_layout', 'contents', 'adminHomePageContent', $data);
$this->load->view('layouts/admin_footer');
}

public function adminHomePageDynamicPost(){ 
	$id = $this->input->post('updateHometext');
	$this->form_validation->set_rules('homepagetext', 'home page text', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->adminHomePageDynamic();
		}else{
			$insertData = array(
				'homepage_content' => $this->input->post('homepagetext'),
				'created_on' => date('Y-m-d H:i:s')
			); 
			if(empty($id)){
				$this->Favoritewish_Model->InsertHomeContent($insertData);
			}else{
				$updatetData = array(
					'homepage_content' => $this->input->post('homepagetext'),
					'created_on' => date('Y-m-d H:i:s')
				); 
				$this->Favoritewish_Model->UpdateHomeContent($id,$updatetData);
			}
		   redirect('admin/home/page/dynamic');
		}
}

public function adminAboutUsPageDynamic(){
	$data['title'] = 'About Us Page';
	$data['aboutus'] = $this->Favoritewish_Model->getAboutUsData();
	$this->load->view('layouts/admin_header', $data);
	$this->template->load('default_layout', 'contents', 'adminAboutUsPageContent', $data);
	$this->load->view('layouts/admin_footer');
}

public function adminAboutUsPageDynamicPost(){
	$id = $this->input->post('updateaboutustext');
	$this->form_validation->set_rules('aboutuspagetext', 'about page text', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->adminAboutUsPageDynamic();
		}else{
			$insertData = array(
				'aboutus_content' => $this->input->post('aboutuspagetext'),
				'created_on' => date('Y-m-d H:i:s')
			); 
			if(empty($id)){
				$this->Favoritewish_Model->InsertAboutUsContent($insertData);
			}else{
				$updatetData = array(
					'aboutus_content' => $this->input->post('aboutuspagetext'),
					'created_on' => date('Y-m-d H:i:s')
				); 
				$this->Favoritewish_Model->UpdateAboutUsContent($id,$updatetData);
			}
		   redirect('admin/aboutus/page/dynamic');
	}
}

public function adminContactPageDynamic(){
	$data['title'] = 'Contact Us Page';
	$data['contacttext'] = $this->Favoritewish_Model->contactAllData();
	$this->load->view('layouts/admin_header', $data);
	$this->template->load('default_layout', 'contents', 'adminContactPageContent', $data);
	$this->load->view('layouts/admin_footer');
}

public function adminContactPageDynamicPost(){ 
	$id = $this->input->post('updatecontactustext');
	$this->form_validation->set_rules('contactpagetext', 'Contact page text', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->adminContactPageDynamic();
		}else{
			$insertData = array(
				'contact_content ' => $this->input->post('contactpagetext'),
				'created_on' => date('Y-m-d H:i:s')
			); 
			if(empty($id)){
				$this->Favoritewish_Model->InsertContactUsContent($insertData);
			}else{
				$updatetData = array(
					'contact_content ' => $this->input->post('contactpagetext'),
					'created_on' => date('Y-m-d H:i:s')
				); 
				$this->Favoritewish_Model->UpdateContactUsContent($id,$updatetData);
			}
		   redirect('admin/contact/page/dynamic');
	}
}

public function getCategorySucategory_familywish_id(){ 
	if ($this->session->userdata('ci_session_key_generate') == FALSE) {
		redirect('sign-in'); 
	} else {
		$data = array();
		$familyWishId =  $this->input->post('familyWishesId');
		if (!empty($familyWishId)){
			$getObjWishData = $this->Favoritewish_Model->getfamilyDataById($familyWishId); 
			$categories = $this->Favoritewish_Model->getCategories();
			$subCategories = $this->Favoritewish_Model->getSubCat($getObjWishData->cat_id);
			 $arrayHtml = "";
			$arrayHtml .= "<option value=''>Select Category</option>";
			if (!empty($categories)) {
				foreach ($categories as $cat_data) {   
					$selected = (!empty($getObjWishData) && ($getObjWishData->cat_id == $cat_data->id)) ? 'selected' :'';
				$arrayHtml .= '<option value="' . $cat_data->id .'" '.$selected.'>'.$cat_data->name . '</option>';
					
				}
			}
			$arrayHtmlType = "";
			$arrayHtmlType .= "<option value=''>Select Type</option>";
			if (!empty($subCategories)) {
				foreach ($subCategories as $subCatData) {  
				$subCatId =  $subCatData['id'];
				$subCatName =  $subCatData['name'];
					$selected = (!empty($getObjWishData) && ($getObjWishData->type_id == $subCatData['id'])) ? 'selected' :'';
				$arrayHtmlType .= '<option value="' . $subCatId .'" '.$selected.'>'.$subCatName . '</option>';
					
				}
			}
			if(!empty($getObjWishData->family_member)){
				$arrayHtmlFamilyMember = "";
				$selected1 = (!empty($getObjWishData) && ($getObjWishData->family_member =='First Born' )) ? 'selected' :'';
				$selected2 = (!empty($getObjWishData) && ($getObjWishData->family_member =='Second Born' )) ? 'selected' :'';
				$selected3 = (!empty($getObjWishData) && ($getObjWishData->family_member =='Third Born' )) ? 'selected' :'';
				$selected4 = (!empty($getObjWishData) && ($getObjWishData->family_member =='Fourth Born' )) ? 'selected' :'';
				$selected5 = (!empty($getObjWishData) && ($getObjWishData->family_member =='Fifth Born' )) ? 'selected' :'';
				$arrayHtmlFamilyMember .= "<option value=''>Select Family member</option>";
				$arrayHtmlFamilyMember .= '<option value="First Born" '.$selected1.'>First Born</option>';
				$arrayHtmlFamilyMember .= '<option value="Second Born" '.$selected2.'>Second Born</option>';
				$arrayHtmlFamilyMember .= '<option value="Third Born" '.$selected3.'>Third Born</option>';
				$arrayHtmlFamilyMember .= '<option value="Fourth Born" '.$selected4.'>Fourth Born</option>';
				$arrayHtmlFamilyMember .= '<option value="Fifth Born" '.$selected5.'>Fifth Born</option>';
			}
			if(!empty($getObjWishData->sex)){
				$arrayHtmlSex = "";
				$selected1 = (!empty($getObjWishData) && ($getObjWishData->sex =='male' )) ? 'selected' :'';
				$selected2 = (!empty($getObjWishData) && ($getObjWishData->sex =='female' )) ? 'selected' :'';
				$selected3 = (!empty($getObjWishData) && ($getObjWishData->sex =='not applicable' )) ? 'selected' :'';
				$selected4 = (!empty($getObjWishData) && ($getObjWishData->sex =='prefer not to say' )) ? 'selected' :'';
				$arrayHtmlSex .= "<option value=''>Select Sex</option>";
				$arrayHtmlSex .= '<option value="male" '.$selected1.'>male</option>';
				$arrayHtmlSex .= '<option value="female" '.$selected2.'>female</option>';
				$arrayHtmlSex .= '<option value="not applicable" '.$selected3.'>not applicable</option>';
				$arrayHtmlSex .= '<option value="prefer not to say" '.$selected4.'>prefer not to say</option>';
			}

			$data['code'] = 200;
			$data['htmlFamilyMember'] = $arrayHtmlFamilyMember;
			$data['htmlChildName'] = $getObjWishData->child_name;
			$data['htmlChildBirthDay'] = $getObjWishData->child_birthday;
			$data['htmlSex'] = $arrayHtmlSex;
			$data['html'] = $arrayHtml;
			$data['htmlFamilyWishesType'] = $arrayHtmlType;
			$data['otherAssecceries'] = $getObjWishData->other_accessories;
			$data['htmlFamilyWishesBrand'] = $getObjWishData->brand;
			$data['htmlFamilyWishesColor'] = $getObjWishData->color;
			$data['htmlFamilyWishessize'] = $getObjWishData->size;
			$data['htmlFamilyWishesstyle'] = $getObjWishData->style;
			$data['htmlFamilyWishesId'] = $getObjWishData->id;
			echo json_encode($data);
		}
	}
}

public function familyWishEditPost(){  
	$sessionArray = $this->session->userdata('ci_seesion_key');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('familyWishMember', 'Family Member', 'required');
	$this->form_validation->set_rules('familyWishChildName', 'Child Name', 'required');
	$this->form_validation->set_rules('familyWishBirthday', 'Birthday', 'required');
	$this->form_validation->set_rules('familyWishSex', 'Sex', 'required');
	$this->form_validation->set_rules('familyWishCatId', 'Category', 'required');
	$this->form_validation->set_rules('familyWishTypeId', 'Type', 'required');
	$this->form_validation->set_rules('familyWishBrand', 'Brand', 'required');
	$this->form_validation->set_rules('familyWishColor', 'Color', 'required');
	$this->form_validation->set_rules('familyWishSize', 'Size', 'required');
	$this->form_validation->set_rules('familyWishStyle', 'Style', 'required');
	if ($this->form_validation->run()) { 
			 $data = array(
					'table_name' => 'family_wish_add', 
					'id' => $this->input->post('familyWishId'),
					'family_member' => $this->input->post('familyWishMember'),
					'child_name' => $this->input->post('familyWishChildName'),
					'child_birthday' => $this->input->post('familyWishBirthday'),
					'sex' => $this->input->post('familyWishSex'),
					'cat_id' => $this->input->post('familyWishCatId'),
					'type_id' => $this->input->post('familyWishTypeId'),
					'other_accessories' => !empty($this->input->post('accessories')) ? $this->input->post('accessories') :NULL,
					'brand' => $this->input->post('familyWishBrand'),
					'color' => $this->input->post('familyWishColor'),
					'size' => $this->input->post('familyWishSize'),
					'style' => $this->input->post('familyWishStyle'),
					'created_on' => date('Y-m-d H:i:s')
				);
				$this->Favoritewish_Model->updateFamilyWishData($data);
		$array = array(
			'success' => '<div class="alert alert-warning">Wish Update Successfully</div>'
		);
	} else { 
		$array = array(
			'error'   => true,
			'familyMamber' => form_error('familyWishMember'),
			'childName' => form_error('familyWishChildName'),
			'birthday' => form_error('familyWishBirthday'),
			'sex' => form_error('familyWishSex'),
			'category' => form_error('familyWishCatId'),
			'type' => form_error('familyWishTypeId'),
			'brand' => form_error('familyWishBrand'),
			'color' => form_error('familyWishColor'),
			'size' => form_error('familyWishSize'),
			'style' => form_error('familyWishStyle')

		);
	}
	echo json_encode($array);
} 

public function familyWishDelete(){  
	$familyWishId = $this->input->post('familyWishId'); 
	$this->Favoritewish_Model->familyWishDataDelete($familyWishId);
	$array = array(
		'delete' => '<div class="alert alert-warning">Wish Delete Successfully</div>'
	);
	echo json_encode($array);
}

	public function saveEmojii(){ 
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$massgeId = $this->input->post('messageId');
		$chkTypeUser = $this->input->post('chkTypeUser');
		if(!empty($massgeId)){
			if($chkTypeUser == 'from_user'){
                $updateEmojiById = array(
					'emoji ' => $this->input->post('emoji'),
					'toEmoji ' => $this->input->post('emoji'),
					'from_status ' => 1,
				);
			}else{
				$updateEmojiById = array(
					'emoji ' => $this->input->post('emoji'),
					'toEmoji ' => $this->input->post('emoji'),
					'to_status' => 1,
				);
			}	 
			$this->Favoritewish_Model->UpdateMassageEmoji($massgeId,$updateEmojiById); 
		}
		 
	}

	public function sendEmail(){ 
	//	$this->load->view('email/quarterly_email');
		$login = base_url() . 'send/email/unsubscribe';  
		$allUserEmail = $this->Favoritewish_Model->getFirstUser();
	//	echo"<pre>"; var_dump($allUserEmail); exit;
		foreach($allUserEmail as $email){ 
		  $userEmail = $email->email;
			if ($email->isSubscribe == '1'){
				$this->load->library('encryption');
				$this->load->library('email');
				$data = array(
					'loginlink' => $login,
					'id'        => $email->id
				);
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to($userEmail);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('Keep Your Favorite Wish List Fresh: Quarterly Update Reminder!');
				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/quarterly_email', $data, true));
				$this->email->send();
			}
		}
		echo 'Email sent!';
	}

	public function sendEmailStatusChange(){
	  $id = $this->input->get('id');
	  $data = array(
		'table_name' =>'users', 
		'id' => $id,
		'isSubscribe' =>'0'
	  );
	  $getUserById = $this->Favoritewish_Model->getUsersById($data);
	  redirect('user-dashboard');
	}

	public function privacyPolicy()
	{
	
		$arr['data'] = $this->Favoritewish_Model->bannerSection('termsandconditions'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Privacy Policy Page Meta Description';
		$data['metaKeywords'] = 'Privacy Policy Page Meta Title';
		$data['title'] = "Privacy Policy";
		$data['breadcrumbs'] = array('Terms and Conditions' => '#');
		$this->load->view('front/header_main', $data);
		//$this->load->view('front/bannerSection',$arr);
		$this->load->view('front/privacyPolicy', $data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}

	public function friendNotyfyRead(){
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$id = $sessionArray['user_id'];
		$updatetNotyfyData = array(
			'read_status' => 1,
		); 
		$this->Favoritewish_Model->UpdateNotyfyData($id,$updatetNotyfyData);
		redirect('user/notification/realall');
	}

	public function birthdayStateUpdate(){
	    $id = $this->input->post('id'); 
	    $updateFromFriendtBirthday = array(
		'friend_birthday_notify' => 1,
		); 
		$this->Favoritewish_Model->UpdateBirthdayStatus($id,$updateFromFriendtBirthday);
	}

	public function birthdayTOStateUpdate(){
		$id = $this->input->post('id');
	    $updateToFriendtBirthday = array(
		'to_friend_birthday_notify' => 1,
		); 
		$this->Favoritewish_Model->UpdateToBirthdayStatus($id,$updateToFriendtBirthday);
		redirect('user/friends');
	}

	public function userFriendsBirthday(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); 
		} else {
			$get = $this->input->get();
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); 
			$data = array();
			$data['metaDescription'] = 'Search Friends';
			$data['metaKeywords'] = 'Search Friends';
			$data['title'] = "Search Friends";
			$data['breadcrumbs'] = array('User Friends' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['get'] = $get;$data['userData'] = $this->Favoritewish_Model->getUserFriendsList($get);
			$data['toDayBirthday'] = $this->Favoritewish_Model->getTodayBirthday();
			$firstMonth = date('m');
			$data['firstMonthBirthday'] = $this->Favoritewish_Model->getFirstMonthFirthday($firstMonth);
			$nextMonth = date('m', strtotime('+1 month')); 
			$data['secoundMonthBirthday'] = $this->Favoritewish_Model->getSecoundMonthFirthday($nextMonth);
		//	echo"<pre>"; var_dump($data['secoundMonthBirthday']); exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/userFrindsBirthday', $data);
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function notification()
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('signin'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('changepassword'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'Notificartion Setting';
			$data['metaKeywords'] = 'Notificartion Setting';
			$data['title'] = "Notificartion Setting";
			$data['breadcrumbs'] = array('Change Password' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['userDataById'] = $this->Favoritewish_Model->getUserDataById($sessionArray['user_id']);
		//	echo"<pre>"; var_dump($data['userDataById']); exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/notification-setting');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function notificationSettingUpdate()
	{   
	    $sessionArray = $this->session->userdata('ci_seesion_key');
		$inbox_massage = isset($_POST['inbox_massage']) ? 1 : 0;
		$friend_request = isset($_POST['friend_request']) ? 1 : 0;
		$upComming_birthday = isset($_POST['upcomming_birthday']) ? 1 : 0;
		$id = $sessionArray['user_id'];
		$updateInboxMassage = array(
			'Inbox_message' => $inbox_massage,
			); 
		$updateFriendRequest = array(
			'friend_request' => $friend_request,
			);	
		$updateBirthday = array(
			'upcoming_birthday' => $upComming_birthday,
			);	
		$this->Favoritewish_Model->updateInBoxMassage($id,$updateInboxMassage);
		$this->Favoritewish_Model->updateFriendRequest($id,$updateFriendRequest);
		$this->Favoritewish_Model->updateUpcommingBirthday($id,$updateBirthday);
	    redirect('notification');
	}



	public function updateMassageStatusById(){
	   $msgId = $this->input->post('msgId');   // echo"<pre>"; var_dump($msgId); exit;
	   $id = $this->input->post('id');
	    $updateMassageUserId = array(
		'check_msg_status' => 1,
		); 
		$updateMassageId = array(
			'msg_status' => 1,
	    );
		$this->Favoritewish_Model->UpdateMassageUserId($id,$updateMassageUserId);
		$this->Favoritewish_Model->UpdateMassgeById($msgId,$updateMassageId);
	}

	public function userNotifiReadAll(){
		if ($this->session->userdata('ci_session_key_generate') == FALSE){
			redirect('signin');
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('changepassword'); 
			$data = array();
			$data['metaDescription'] = 'All Notification';
			$data['metaKeywords'] = 'All Notification';
			$data['title'] = "All Notification";
			$data['breadcrumbs'] = array('Change Password' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
			$data['userDataById'] = $this->Favoritewish_Model->getUserDataById($sessionArray['user_id']);
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'user/notificationReadAll');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function userNotifyRead(){
		$id = $this->input->post('userId'); 
	    $updateReadStatus = array(
		'read_status' => 1,
		); 
		$this->Favoritewish_Model->updateReadStatus($id,$updateReadStatus);
	}

	public function userNotifyDelete(){
		$id = $this->input->post('msgId');
		$this->Favoritewish_Model->userNotifyDelete($id);
	}

	public function checkFriendBirthday(){
	    checkMenuActive(true);
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			redirect('sign-in'); // the user is not logged in, redirect them!
		} else {
			$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$get = $this->input->get(); 
			$data['breadcrumbs'] = array('User Friends' => '#');
			$sessionArray = $this->session->userdata('ci_seesion_key');
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['get'] = $get;
			$user = getUser();
			$getAllUser = $this->Favoritewish_Model->get_friends_with_birthday_today();
		   //	echo"<pre>"; var_dump($getAllUser); exit;
			foreach($getAllUser as $friendBirthday){ 
			   $getObjBirthdayData = $this->Favoritewish_Model->getfriendDataById($friendBirthday["friend_id"]);	 
			//	echo"<pre>"; var_dump($getObjBirthdayData->email); exit;

			  $arrInsertNotification = array(   
				'to_id' =>$friendBirthday["friend_id"],
				'from_id' => $friendBirthday["id"],
				'notification_type' =>'birthday_notification',
				'notification_massage' =>''.$friendBirthday["first_name"].' '.$friendBirthday["last_name"].' a happy birthday, it’s his birthday today',
				'created_on'	    =>	date("Y-m-d H:i:s")
			);
            $this->db->insert('notification', $arrInsertNotification);
            $data = array(
				'first_name' => $friendBirthday["first_name"],
				'last_name' => $friendBirthday["last_name"],
				'RecipientName' => $getObjBirthdayData->first_name.' '.$getObjBirthdayData->last_name,
			);
            if($getObjBirthdayData->upcoming_birthday == 1){
				$sessionArray = $this->session->userdata('ci_seesion_key');
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 587, //if 80 dosenot work use 24 or 21
					'smtp_user'  => 'codeyiizen.test@gmail.com',  
					'smtp_pass'  => 'wdxdkwcbygukszqv',
					'smtp_crypto' => 'tls',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);
				$this->load->library('encryption');
				$this->load->library('email');
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to($getObjBirthdayData->email);
				$this->email->from(MAIL_FROM, FROM_TEXT);
				$this->email->subject('FavoriteWish Today Birthday Notification');
				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/todayBithdayNotify',$data, true));
				$this->email->send();
			}

			}
           die('ok');

	}
}

public function massageUpdate(){
	$id = $this->input->post('id');
	$msg = $this->input->post('msg'); 
	$updatemassage = array(
	'message' => $msg,
	); 
	$this->Favoritewish_Model->updateMassage($id,$updatemassage);
}

public function massageDeleteBoth(){
	$id = $this->input->post('id');
	$this->Favoritewish_Model->massageDelete($id);
}

public function massageDeleteMe(){  
	$id = $this->input->post('id');
	$deleteme = array(
	'delete_status' => 1,
	); 
	$this->Favoritewish_Model->deleteMe($id,$deleteme);
}

 public function massageList(){   
	if ($this->session->userdata('ci_session_key_generate') == FALSE) {
		redirect('sign-in'); // the user is not logged in, redirect them!
	}else{
		$search_query = $this->input->get('q');  // Get the search query from GET parameter
		$arr['data'] = $this->Favoritewish_Model->bannerSection('profile'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$get = $this->input->get();
		
		$sessionArray = $this->session->userdata('ci_seesion_key');
		$data['freind_profile_id_from_url'] = !empty($id) ? $id : "";
		$id = $sessionArray['user_id'];
		$data['metaDescription'] = 'User Profile';
		$data['metaKeywords'] = 'User Profile';
		$data['title'] = "User Profile";
		$data['breadcrumbs'] = array('User Profile' => '#');
		$data['user_profile_id'] = $id;
		
		//$data['latestMassage'] = $this->Favoritewish_Model->getLatestMassage($get['f_id'],$sessionArray['user_id']);


		$this->Favoritewish_Model->setUserID($id);
		$data['userInfo'] = $this->Favoritewish_Model->getFriendDetails($id);
		$data['userLoginInfo'] = $this->Favoritewish_Model->getFriendDetails($sessionArray['user_id']);
		$isFriend = $this->Favoritewish_Model->checkIfUserIsFriend($id, $sessionArray['user_id']);
		$data['is_friend'] = $isFriend;
		if (!empty($id)) {
			$data['wishInfo'] = $this->Favoritewish_Model->getRegistryInfoBtUser($id,$get);
		}
		$data['categories'] = $this->Favoritewish_Model->getCategories();
		$data['friend_id'] = $id;

		$data['showFriendMassage'] = $this->Favoritewish_Model->get_user_friends_messages($sessionArray['user_id'],$search_query);
		//echo"<pre>"; var_dump($data['showFriendMassage']); exit;
		if(!empty($get['f_id'])){
			$id = $get['f_id'];
		}else{
			$id = !empty($data['showFriendMassage'][0]->friend_user_id) ?$data['showFriendMassage'][0]->friend_user_id : "";
		}
		
		if($id){  
		  $data['form_massage'] = $this->Favoritewish_Model->getMessage($id,$sessionArray['user_id']);
		 // echo"<pre>"; var_dump($id); exit;
		  //$sendMail = $this->Favoritewish_Model->sendMail($id,$sessionArray['user_id']);
		
		  //echo"<pre>"; var_dump($data['showFriendMassage']); exit;
		  	$data['friendName'] = $this->Favoritewish_Model->getObjFriendName($id);
			$updateSeenStatus = array(
			'seen_class' => '',
			); 
			$this->Favoritewish_Model->updateSeenStatus($id,$updateSeenStatus);
		 // echo"<pre>"; var_dump($data['showFriendMassage']); exit;
		}
		//$data['user_massage'] = $this->Favoritewish_Model->getUserMessage($sessionArray['user_id']);
		$data['sessionData'] = $this->session->userdata('ci_seesion_key');
		$this->load->view('front/header_inner', $data);
		//$this->load->view('front/bannerSection',$arr);
		$this->template->load('default_layout', 'contents', 'auth/message-list' ,$data);
		$this->load->view('front/template/template_footer');
		$this->load->view('front/footer_main');
	}	
 }
 
 public function deleteMeAllMsg(){
	$id = $this->input->post('id');
	$sessionArray = $this->session->userdata('ci_seesion_key');
	$massage = $this->Favoritewish_Model->getMessage($id,$sessionArray['user_id']);
	foreach($massage as $msg){
		$formId = $msg->from_user;
		$toId =  $msg->to_user;
		if($formId == $sessionArray['user_id']){
		    $deletemeallmsg = array(
				'delete_form' => $formId,
			);
		}else if($toId == $sessionArray['user_id']){
			$deletemeallmsg = array(
				'delete_to' =>$toId, 
			);
		}
		$this->Favoritewish_Model->deleteMeAllMsg($formId,$toId,$deletemeallmsg);
	}
 }

 public function deleteBothAllMsg(){
	$ids = $this->input->post('ids');


	$id = $this->input->post('id');
	$sessionArray = $this->session->userdata('ci_seesion_key');
	$massage = $this->Favoritewish_Model->getMyMessages($id,$sessionArray['user_id']);
	$massageFriend = $this->Favoritewish_Model->getFriendMessages($id,$sessionArray['user_id']);
	foreach($massageFriend as $msg){
		$formId = $msg->from_user;
		$toId =  $msg->to_user;
        $deletemeallmsg = array(
			'delete_to' =>$toId,
			'display_to_status' => $msg->from_user,
		);

	//	$this->Favoritewish_Model->deleteMeAllMsg($formId,$toId,$deletemeallmsg);
		$this->Favoritewish_Model->deleteBothAllMsg($formId,$toId,$deletemeallmsg);
	}
	foreach($massage as $msg){
		$formId = $msg->from_user;
		$toId =  $msg->to_user;
        $deletemeallmsg = array(
			'delete_to' =>$toId,
			'delete_form' =>  $formId,
			'display_to_status' => $msg->from_user,
		);

	//	$this->Favoritewish_Model->deleteMeAllMsg($formId,$toId,$deletemeallmsg);
		$this->Favoritewish_Model->deleteBothAllMsg($formId,$toId,$deletemeallmsg);
	}
 }

 public function checkFriendBirthdayAfter(){ 
	$date14 = date('Y-m-d', strtotime(date("Y-m-d"). ' + 14 days'));
	$month = date("m",strtotime($date14));
	$date = date("d",strtotime($date14));
	$getUserAfter14dayDob = $this->Favoritewish_Model->getUserBasedOnDob($month,$date);
	//echo"<pre>"; var_dump($getUserAfter14dayDob); exit;
	foreach($getUserAfter14dayDob as $after14dayDob){
		$getUserFriend = $this->Favoritewish_Model->getUserFriendById($after14dayDob->id);
	  //	echo"<pre>"; var_dump($getUserFriend); exit;
		 foreach($getUserFriend as $firends){   
		   $data = array(
			   'first_name' => $firends['user_first_name'],
			   'last_name' => $firends['user_last_name'],
			   'RecipientName' => $firends['friend_first_name'].' '.$firends['friend_last_name'],
		   );
		   if($firends['friend_upcoming_birthday_status'] == 1){
			   $config = array(
				   'protocol'  => 'smtp',
				   'smtp_host' => 'smtp.gmail.com',
				   'smtp_port' => 587, //if 80 dosenot work use 24 or 21
				   'smtp_user'  => 'codeyiizen.test@gmail.com',  
				   'smtp_pass'  => 'wdxdkwcbygukszqv',
				   'smtp_crypto' => 'tls',
				   'charset' => 'iso-8859-1',
				   'wordwrap' => TRUE
			   );
			   $this->load->library('encryption');
			   $this->load->library('email');
			   $config['charset'] = 'iso-8859-1';
			   $config['wordwrap'] = TRUE;
			   $config['mailtype'] = 'html';
			   $this->email->initialize($config);
			   $this->email->to($firends['friend_email']);
			   $this->email->from(MAIL_FROM, FROM_TEXT);
			   $this->email->subject('FavoriteWish After 14 Day Birthday Notification');
			   $this->email->set_newline("\r\n");
			   $this->email->message($this->load->view('email/friend-birthday-after-14day',$data, true));
			   $this->email->send();
		   }
	   }
	}
   //	echo"<pre>"; var_dump($getUserFriend); exit;
}

}


