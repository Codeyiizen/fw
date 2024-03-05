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
	}

	public function index()
	{  
		$arr['data'] = $this->Favoritewish_Model->bannerSection('home'); // Calling model function defined in Favoritewish_Model.php
		$data = array();
		$data['metaDescription'] = 'Home Page Meta Description';
		$data['metaKeywords'] = 'Home Page Meta Title';
		$data['title'] = "Home";
		$data['breadcrumbs'] = array('Home' => '#');
		$this->load->view('front/header_main', $data);
		//$this->load->view('bannerSection',$arr);
		$this->load->view('front/home');
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
			$this->template->load('default_layout', 'contents', 'auth/sign-up');
			$this->load->view('front/footer_main');
		} else {
			redirect('user-dashboard');
		}
	}

	public function registerSubmit()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',array('is_unique'=>'This email has been already used!'));
		$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|regex_match[/^[0-9]{10}$/]');
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
				$this->email->subject('Favorite Wish User Registeration!');

				$this->email->set_newline("\r\n");
				$this->email->message($this->load->view('email/user_registration', $data, true));
				$chkStatus = $this->email->send();

				if ($chkStatus === TRUE) {
					$this->session->set_flashdata('success', 'Thanks for signing up. Please verify your email which we already sent to your mail');
					redirect('sign-in');
				} else {
					echo 'Error';
				}
			} else {
			}
		}
	}

	public function login() // Login Controller for users
	{
		if ($this->session->userdata('ci_session_key_generate') == FALSE) {
			if (!empty($this->input->get('usid'))) {
				$verificationCode = urldecode(base64_decode($this->input->get('usid')));
				$this->Favoritewish_Model->setVerificationCode($verificationCode);
				$this->Favoritewish_Model->activate();
				$this->session->set_flashdata('success', 'Thanks for signing up. Please verify your email which we already sent to your mail');
				redirect('sign-in');
			}
			$arr['data'] = $this->Favoritewish_Model->bannerSection('login'); // Calling model function defined in Favoritewish_Model.php
			$data = array();
			$data['metaDescription'] = 'New User Login';
			$data['metaKeywords'] = 'New User Login';
			$data['title'] = "Login";
			$data['breadcrumbs'] = array('Login' => '#');
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/sign-in');
			$this->load->view('front/footer_main');
		} else {
			redirect('user-dashboard');
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
				redirect('user-dashboard');
			} else {
				redirect('sign-in?msg=1');
			}
		}
	}

	// user profile
	public function user_dashboard()
	{
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
			$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
			$data['userInfo'] = $this->Favoritewish_Model->getUserDetails();
		//	echo"<pre>"; var_dump($data['userInfo']); exit;
			$data['frienddetails'] = $this->Favoritewish_Model->getFriendDatails('');
			$data['categories'] = $this->Favoritewish_Model->getCategories();
			$data['wishInfo'] = $this->Favoritewish_Model->getWishInfo($get);
			$data['get'] = $get;
	    //	echo"<pre>"; var_dump($data['wishInfo']); exit;
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
			$data['get'] = $get;
			$this->load->view('front/header_inner', $data);
			$this->template->load('default_layout', 'contents', 'auth/user-registry');
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

			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/profile');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getUserFriendsDetails($id)
	{
		// die($id);
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
	// edit method
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
     
	    $sessionArray = $this->session->userdata('ci_seesion_key');
		$this->Favoritewish_Model->setUserID($sessionArray['user_id']);
		$userInfo = $this->Favoritewish_Model->getUserDetails(); 
      //  echo"<pre>"; var_dump($userInfo['profile_photo']); exit; 
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|regex_match[/^[0-9]{10}$/]');

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
			$zip = $this->input->post('zip');
			$favorite_country = $this->input->post('favorite_country');
			$favorite_public_outfit_wear = $this->input->post('favorite_p_wear');
			$favorite_s_team = $this->input->post('favorite_s_team');
			$favorite_music = $this->input->post('favorite_music');
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
			$this->Favoritewish_Model->setAddress($address);
			$this->Favoritewish_Model->setCity($city);
			$this->Favoritewish_Model->setState($state);
			$this->Favoritewish_Model->setZip($zip);
			$this->Favoritewish_Model->setfavorite_country($favorite_country);
			$this->Favoritewish_Model->setfavoripublic_outfit_wear($favorite_public_outfit_wear);
			$this->Favoritewish_Model->setfavorite_sports_teams($favorite_s_team);
			$this->Favoritewish_Model->setfavorite_music($favorite_music);
			$this->Favoritewish_Model->setprofile_photo($profile_photo);
			$this->Favoritewish_Model->setcover_photo($cover_photo);
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
			$get = $this->input->get();
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
			//echo "<Pre>";
			//var_dump($data['userData']);exit;
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
		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		if (!empty($stream)) {
			$objPost = json_decode(trim($stream), true);
			if (!empty($objPost['token'])) {
				$objUser = $this->Favoritewish_Model->getUserByToken($objPost['token']);
				if (!empty($objUser)) {
					$arrInsert = array('to_friend' => $objUser['id'], 'from_friend' => $user['user_id'], 'status' => 0);
					$this->db->insert('friends', $arrInsert);
					
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
					$arrCheck = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id']);
					$arrUpdate = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id'], 'status' => 1);
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
					if (!empty($objPost['type']) && $objPost['type'] == 'cancel') {
						$arrCheck = array('from_friend' => $user['user_id'], 'to_friend' => $objUser['id']);
					} else if (!empty($objPost['type']) && $objPost['type'] == 'decline') {
						$arrCheck = array('to_friend' => $user['user_id'], 'from_friend' => $objUser['id']);
					} else if (!empty($objPost['type']) && $objPost['type'] == 'remove') {
						$arrCheck = array('from_friend' => $user['user_id'], 'to_friend' => $objUser['id']);
					}
					$this->db->where($arrCheck);
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
		if ($this->form_validation->run()) {
			$array = array(
				'categories_id'     => $this->input->post('category'),
				'type'  => $this->input->post('type'),
				'brand'   => $this->input->post('brand'),
				'color' => $this->input->post('color'),
				'size' => $this->input->post('size'),
				'style' => $this->input->post('style'),
				'user_id' => $sessionArray['user_id']
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
				'occasion'   => $this->input->post('occasion'),
				'brand'   => $this->input->post('brand'),
				'color' => $this->input->post('color'),
				'size' => $this->input->post('size'),
				'style' => $this->input->post('style'),
				'user_id' => $sessionArray['user_id']
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
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/registry-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function getMessagelist($id){
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
			$data['friend_id'] = $id;
			if($id){
			  $data['form_massage'] = $this->Favoritewish_Model->getMessage($id,$sessionArray['user_id']);
			//   echo "<pre>";
			//   var_dump($data['form_massage']);exit;
			}
			$data['user_massage'] = $this->Favoritewish_Model->getUserMessage($sessionArray['user_id']);
			 // echo"<pre>"; var_dump($data['user_massage']);exit;
			$this->load->view('front/header_inner', $data);
			//$this->load->view('front/bannerSection',$arr);
			$this->template->load('default_layout', 'contents', 'auth/message-list');
			$this->load->view('front/template/template_footer');
			$this->load->view('front/footer_main');
		}
	}

	public function messageFormSubmission(){
        $id = $this->input->post('friend_id');
        $sessionArray = $this->session->userdata('ci_seesion_key');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			header("Location: {$_SERVER['HTTP_REFERER']}");
			//exit();

		} else {

			$data = array(
				'from_user'	        =>	$sessionArray['user_id'],
				'to_user'	        =>	$this->input->post('friend_id'),
				'message'	        =>	$this->input->post('message'),
				'seen'	            =>	'0',
				'status'	        =>	'0',
				'created_on'	    =>	date("Y-m-d H:i:s")
			);
		  $is_cf_submitted = $this->Favoritewish_Model->messageFrmSubmit($data);
		  redirect('user/friends/'.$id.'/massages');
	}
 }
 

}
