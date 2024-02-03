<?php
/*
* https://www.google.com/search?q=how+to+change+user+status+in+codeigniter+3&sca_esv=562779362&sxsrf=AB5stBi93feoR3kjJvHJkYd01-oCG_1Jsg%3A1693936150707&ei=Fmr3ZNLmKpGO2roPuNCkwAY&oq=how+to+change+user+status+in+code&gs_lp=Egxnd3Mtd2l6LXNlcnAiIWhvdyB0byBjaGFuZ2UgdXNlciBzdGF0dXMgaW4gY29kZSoCCAEyBRAhGKABMgUQIRigATIFECEYoAEyBRAhGKABSMXsAVAAWKPXAXACeACQAQCYAcUDoAH_OKoBCjAuNDUuMi4wLjG4AQPIAQD4AQHCAgQQIxgnwgIHECMYigUYJ8ICCBAAGIoFGJECwgILEC4YigUYsQMYgwHCAgsQABiABBixAxiDAcICERAuGIMBGMcBGLEDGNEDGIAEwgILEC4YgAQYsQMYgwHCAgUQABiABMICCBAAGIAEGLEDwgILEAAYigUYsQMYgwHCAgcQABgNGIAEwgIGEAAYHhgNwgIIEAAYCBgeGA3CAgQQIRgVwgIIECEYFhgeGB3CAhEQLhiABBixAxiDARjHARjRA8ICBRAuGIAEwgIEEAAYA8ICCBAAGIAEGMsBwgIGEAAYFhgewgIIEAAYFhgeGA_iAwQYACBBiAYB&sclient=gws-wiz-serp
* https://elevenstechwebtutorials.com/detail/22/active-inactive-status-using-codeigniter
* https://techarise.com/full-featured-registration-login-module-codeigniter/
* https://www.guru99.com/codeigniter-url-routing.html
* https://www.webslesson.info/2020/10/how-to-implement-google-recaptcha-in-codeigniter.html
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Favoritewish_Model extends CI_Model {

	public function bannerSection($type)
	{
		if($type=='aboutus') {
			$arr=array('title'=>'About Us','content'=>'About Us Data');
		}elseif($type=='services'){
			$arr=array('title'=>'Our Services','content'=>'Services Data');
		}elseif($type=='resources'){
			$arr=array('title'=>'Our Resources','content'=>'Resources Data');
		}elseif($type=='blog'){
			$arr=array('title'=>'Blog','content'=>'Blog Data');
		}elseif($type=='contactus') {
			$arr=array('title'=>'Contact Us','content'=>'Contact Us Data');
		}elseif($type=='thankyou') {
			$arr=array('title'=>'Thank you for contacting us!!');
		}elseif($type=='faq') {
			$arr=array('title'=>'FAQs','content'=>'FAQ page data');
		}elseif($type=='termsandconditions') {
			$arr=array('title'=>'Terms And Conditions','content'=>'Description Content Area');
		}elseif($type=='testimonials') {
			$arr=array('title'=>'Testimonials','content'=>'Description Content Area');
		}elseif($type=='register') {
			$arr=array('title'=>'Register Now','content'=>'Description Content Area');
		}elseif($type=='login') {
			$arr=array('title'=>'User Login','content'=>'Description Content Area');
		}elseif($type=='profile') {
			$arr=array('title'=>'My Account','content'=>'Description Content Area');
		}elseif($type=='editprofile') {
			$arr=array('title'=>'Update Profile','content'=>'Description Content Area');
		}elseif($type=='forgotpassword') {
			$arr=array('title'=>'Forgot Password','content'=>'Description Content Area');
		}elseif($type=='changepassword') {
			$arr=array('title'=>'Change Password','content'=>'Description Content Area');
		}elseif($type=='postyourads') {
			$arr=array('title'=>'Post Your Ads','content'=>'Description Content Area');
		}elseif($type=='findhangar') {
			$arr=array('title'=>'Find Hangars','content'=>'Description Content Area');
		}elseif($type=='hangardetails') {
			$arr=array('title'=>'Hangar Details','content'=>'Description Content Area');
		}elseif($type=='joinwaitinglist') {
			$arr=array('title'=>'Join Waiting List','content'=>'Description Content Area');
		}elseif($type=='auction') {
			$arr=array('title'=>'HangarTrader Auctions','content'=>'Description Content Area');
		}elseif($type=='escrow') {
			$arr=array('title'=>'Escrow','content'=>'Description Content Area');
		}elseif($type=='directemail') {
			$arr=array('title'=>'Direct Email','content'=>'Description Content Area');
		}elseif($type=='brokerage') {
			$arr=array('title'=>'HangarTrader Brokerage','content'=>'Description Content Area');
		}else {
			$arr=array('title'=>'Home','content'=>'Home Data');
		}
		return $arr;
	}

	public function cf_submit($data) {
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }

	// Declaration of a variables
    private $_userID;
	private $_userName;
    private $_firstName;
	private $_lastName;
    private $_email;
	private $_password;	
    private $_contactNo;    
    private $_userType;
	private $_company;
    private $_address;
    private $_city;
	private $_state;
	private $_zip;
    private $_verificationCode;
    private $_timeStamp;
    private $_status;
	
	private $_adType;
	private $_airportIdentifier;
	private $_alertPeriodFrom;
	private $_alertPeriodTo;
	
	private $_token;

	//Declaration of a methods
    public function setUserID($userID) {
        $this->_userID = $userID;
    }
	
	public function setUserName($userName) {
        $this->_userName = $userName;
    }

	public function setFirstname($firstName) {
        $this->_firstName = $firstName;
    }

	public function setLastName($lastName) { 
        $this->_lastName = $lastName;
    }

	public function setEmail($email) {
        $this->_email = $email;
    }    
 
    public function setContactNo($contactNo) {
        $this->_contactNo = $contactNo;
    }

	public function setPassword($password) {
        $this->_password = $password;
    }
 
    public function setUserType($userType) {
        $this->_userType = $userType;
    }

	public function setCompany($company) {
        $this->_company = $company;
    }
 
    public function setAddress($address) {
        $this->_address = $address;
    }

	public function setCity($city) {
        $this->_city = $city;
    }

	public function setState($state) {
        $this->_state = $state;
    }
 
    public function setZip($zip) {
        $this->_zip = $zip;
    }
 
    public function setVerificationCode($verificationCode) {
        $this->_verificationCode = $verificationCode;
    }
 
    public function setTimeStamp($timeStamp) {
        $this->_timeStamp = $timeStamp;
    }
 
    public function setStatus($status) {
        $this->_status = $status;
    }

    public function setTermsAccepted($termsAccepted) {
        $this->_termsAccepted = $termsAccepted;
    }
	
	public function setAdType($adType) {
        $this->_adType = $adType;
    }
	
	public function setAirportIdentifier($airportIdentifier) {
        $this->_airportIdentifier = $airportIdentifier;
    }
	
	public function setAlertPeriodFrom($alertPeriodFrom) {
        $this->_alertPeriodFrom = $alertPeriodFrom;
    }
	
	public function setAlertPeriodTo($alertPeriodTo) {
        $this->_alertPeriodTo = $alertPeriodTo;
    }
	
	 public function setToken($token) {
        $this->_token = $token;
    }

	//create new user
    public function createUser() 
	{
        $hash = $this->hash($this->_password);
        $data = array(
			'user_name' => $this->_userName,
			'first_name' => $this->_firstName,
			'last_name' => $this->_lastName,            
			'email' => $this->_email,
			'password' => $hash,
			'contact_no' => $this->_contactNo,			
            'user_type' => $this->_userType,
			'company' => $this->_company,
            'address' => $this->_address,
			'city' => $this->_city,
			'state' => $this->_state,
			'zip' => $this->_zip,
            'verification_code' => $this->_verificationCode,
            'created_date' => $this->_timeStamp,
            'modified_date' => $this->_timeStamp,
            'status' => $this->_status,
            'terms_accepted' => $this->_termsAccepted,
			'token' => $this->_token
        );
		//print_r($this->db->insert('users', $data));
		//die();
        $this->db->insert('users', $data);
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // login method and password verify
    function userLogin() 
	{
        $this->db->select('id as user_id, user_name, email, password, contact_no, first_name, last_name, company');
        $this->db->from('users');
        $this->db->where('email', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        //{OR}
        $this->db->or_where('user_name', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
			//echo '<pre>';
			//print_r($result);
			//echo '</pre>';
			//exit();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }
	
	//update user
    public function update() 
	{
        $data = array(
            'first_name' => $this->_firstName,
            'last_name' => $this->_lastName,
            'contact_no' => $this->_contactNo,
			'user_type' => $this->_userType,
			'company' => $this->_company,
            'address' => $this->_address,
            'city' => $this->_city,
			'state' => $this->_state,
			'zip' => $this->_zip,
            'modified_date' => $this->_timeStamp,
        );
        $this->db->where('id', $this->_userID);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	// update Forgot Password
    public function updateForgotPassword() 
    {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('email', $this->_email);
        $msg = $this->db->update('users', $data);
        if ($msg > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	//change password
    public function changePassword() {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('id', $this->_userID);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	// get User Detail
    public function getUserDetails() {
        $this->db->select(array('m.id as user_id', 'CONCAT(m.first_name, " ", m.last_name) as full_name', 'm.first_name', 'm.last_name', 'm.email', 'm.contact_no', 'm.user_type', 'm.company', 'm.user_bio', 'm.address', 'm.city', 'm.state', 'm.zip'));
        $this->db->from('users as m');
        $this->db->where('m.id', $this->_userID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

	// get Email Address
    public function activate() {
        $data = array(        
            'status' => 1,
            'verification_code' => 1,
        );
        $this->db->where('verification_code', $this->_verificationCode);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {			
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    // password hash
    public function hash($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
 
    // password verify
    public function verifyHash($password, $vpassword) {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

    // Function to update the terms_accepted field
    public function updateTermsAcceptance($userID, $accepted = true) {
        $this->db->where('id', $userID);
        $this->db->update('users', array('terms_accepted' => $accepted));
    }



    // Function to get all categories
    public function getCategories() {
        $query = $this->db->get('categories');
        return $query->result();
    }



	
	
	
	
	/*
	* End Of Waiting List Admin Models
	*/

	public function adminLogin($data) {
        $condition = "admin_email =" . "'" . $data['email'] . "' AND " . "admin_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('administrator');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        	return true;
        } else {
        	return false;
        }
    }

	public function read_admin_user_information($username) {
        $condition = "admin_email =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('administrator');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        	return $query->result();
        } else {
        	return false;
        }
    }
}
