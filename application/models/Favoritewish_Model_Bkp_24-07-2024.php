<?php
/*
* https://www.google.com/search?q=how+to+change+user+status+in+codeigniter+3&sca_esv=562779362&sxsrf=AB5stBi93feoR3kjJvHJkYd01-oCG_1Jsg%3A1693936150707&ei=Fmr3ZNLmKpGO2roPuNCkwAY&oq=how+to+change+user+status+in+code&gs_lp=Egxnd3Mtd2l6LXNlcnAiIWhvdyB0byBjaGFuZ2UgdXNlciBzdGF0dXMgaW4gY29kZSoCCAEyBRAhGKABMgUQIRigATIFECEYoAEyBRAhGKABSMXsAVAAWKPXAXACeACQAQCYAcUDoAH_OKoBCjAuNDUuMi4wLjG4AQPIAQD4AQHCAgQQIxgnwgIHECMYigUYJ8ICCBAAGIoFGJECwgILEC4YigUYsQMYgwHCAgsQABiABBixAxiDAcICERAuGIMBGMcBGLEDGNEDGIAEwgILEC4YgAQYsQMYgwHCAgUQABiABMICCBAAGIAEGLEDwgILEAAYigUYsQMYgwHCAgcQABgNGIAEwgIGEAAYHhgNwgIIEAAYCBgeGA3CAgQQIRgVwgIIECEYFhgeGB3CAhEQLhiABBixAxiDARjHARjRA8ICBRAuGIAEwgIEEAAYA8ICCBAAGIAEGMsBwgIGEAAYFhgewgIIEAAYFhgeGA_iAwQYACBBiAYB&sclient=gws-wiz-serp
* https://elevenstechwebtutorials.com/detail/22/active-inactive-status-using-codeigniter
* https://techarise.com/full-featured-registration-login-module-codeigniter/
* https://www.guru99.com/codeigniter-url-routing.html
* https://www.webslesson.info/2020/10/how-to-implement-google-recaptcha-in-codeigniter.html
*/

defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
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
   public function messageFrmSubmit($data){
    $this->db->insert('messages', $data);
   } 
   
   public function getMessage($id,$userId){
        $this->db->select("messages.*,CONCAT(from.first_name,' ',from.last_name) as from_name,CONCAT(to.first_name,' ',to.last_name) as to_name,from.profile_photo as from_photo,to.profile_photo as to_photo");
        $this->db->from("messages");
        $this->db->join('users as from','from.id=messages.from_user','left');
        $this->db->join('users as to','to.id=messages.to_user','left');
        $this->db->where('(to_user='.$id." and from_user=".$userId.')');
        $this->db->or_where('(to_user='.$userId." and from_user=".$id.')');
        $query = $this->db->get();
        return $query->result();
        
   }
   public function getUserMessage($userId){
    $this->db->select("*");
    $this->db->from("messages");
    $this->db->where('from_user',$userId);
    $query = $this->db->get();
   return $query->result();
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
    private $_termsAccepted;
    private $_token;
	
	private $_adType;
	private $_airportIdentifier;
	private $_alertPeriodFrom;
	private $_alertPeriodTo;
    private $_userActiveStatus;
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
 
     public function setUserBio($user_bio) {
        $this->_user_bio = $user_bio;
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
    
    public function setfavorite_country($favorite_country) {     
        $this->_favorite_country = $favorite_country;  
    }

    public function setfavoripublic_outfit_wear($favorite_public_outfit_wear) {     
        $this->_favoripublic_outfit_wear = $favorite_public_outfit_wear;  
    }

    public function setfavorite_sports_teams($favorite_s_team) {     
        $this->_favorite_s_team = $favorite_s_team;  
    }

    public function setfavorite_music($favorite_music) {     
        $this->_favorite_music = $favorite_music;  
    }
    public function set_dob($dob) {     
        $this->_dob = $dob;  
    }
    public function setprofile_photo($profile_photo) { // echo"<pre>"; var_dump($profile_photo);  exit;
        $this->_profile_photo = $profile_photo;  
    }
    public function setcover_photo($cover_photo) { // echo"<pre>"; var_dump($profile_photo);  exit;
        $this->_cover_photo = $cover_photo;  
    }
    public function setfavorite_charity($favorite_charity){ // echo"<pre>"; var_dump($profile_photo);  exit;
        $this->_favorite_charity = $favorite_charity;  
    }
    public function set_gender($gender){
        $this->_gender = $gender;  
    }
    public function setVerificationCode($verificationCode) {
        $this->_verificationCode = $verificationCode;
    }
 public function setUserActiveStatus($status) {
        $this->_userActiveStatus = $status;
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
    public function setToken($setToken) {
        $this->_token = $setToken;
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
			'user_bio' => $this->_user_bio,
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
        $this->db->where('user_active_status', 1);
        //{OR}
        $this->db->or_where('user_name', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        $this->db->where('user_active_status', 1);
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
      //  echo"<pre>";var_dump($this->_cover_photo); exit;
        $data = array(
            'first_name' => $this->_firstName,
            'last_name' => $this->_lastName,
            'contact_no' => $this->_contactNo,
			'user_type' => $this->_userType,
			'company' => $this->_company,
			'user_bio' => $this->_user_bio,
            'address' => $this->_address,
            'city' => $this->_city,
			'state' => $this->_state,
			'zip' => $this->_zip,
            'favorite_country' => $this->_favorite_country, 
            'Favoripublic_outfit_wear' => $this->_favoripublic_outfit_wear,
            'favorite_sports_teams' => $this->_favorite_s_team,
            'favorite_music' => $this->_favorite_music,
            'dob' => $this->_dob,
            'profile_photo' => $this->_profile_photo,
            'cover_photo' => $this->_cover_photo,  
            'favorite_charity' => $this->_favorite_charity,
            'gender' => $this->_gender,
            'modified_date' => $this->_timeStamp,
        );

       // echo"<pre>";var_dump($data); exit;
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
        $this->db->select(array('m.id as user_id', 'CONCAT(m.first_name, " ", m.last_name) as full_name', 'm.first_name', 'm.last_name', 'm.email', 'm.contact_no', 'm.user_type', 'm.company', 'm.user_bio', 'm.address', 'm.city', 'm.state', 'm.zip','m.favorite_country','m.favoripublic_outfit_wear','m.favorite_sports_teams','m.favorite_music','m.profile_photo','m.cover_photo','m.dob','m.favorite_charity','m.gender'));
        $this->db->from('users as m');
        $this->db->where('m.id', $this->_userID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    public function getFriendDetails($id){ 
        $this->db->select(array('m.id as user_id', 'CONCAT(m.first_name, " ", m.last_name) as full_name', 'm.first_name', 'm.last_name', 'm.email', 'm.contact_no', 'm.user_type', 'm.company', 'm.user_bio', 'm.address', 'm.city', 'm.state', 'm.zip','m.favorite_country','m.favoripublic_outfit_wear','m.favorite_sports_teams','m.favorite_music','m.token','m.cover_photo','m.profile_photo','m.dob','m.dob','m.gender','m.favorite_charity'));
        $this->db->from('users as m');
        $this->db->where('m.id',$id);
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
            'user_active_status' => 1,
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

    public function getWishInfo($get){
        $this->db->select('user_wish.*,categories.name as cat_name,categories.id as cat_id');
        $this->db->from('user_wish');
        $this->db->join('categories','categories.id=user_wish.categories_id','left');
        $this->db->where('user_id',$this->_userID);
        if(!empty($get['cat'])){
            $this->db->where('user_wish.categories_id',$get['cat']);
        }
        $query = $this->db->get();
       return $query->result();
    }
    public function getRegistryInfo($get){
        $this->db->select('user_registry.*,categories.name as cat_name');
        $this->db->from('user_registry');
        $this->db->join('categories','categories.id=user_registry.cat_id','left');
        $this->db->where('user_id',$this->_userID);
        if(!empty($get['cat'])){
            $this->db->where('user_registry.cat_id',$get['cat']);
        }
        $query = $this->db->get();
       return $query->result();
    }
    // Function to get all categories
    
   public function getFamilyWishInfo($get){  
        $this->db->select('family_wish_add.*,categories.name as cat_name');
        $this->db->from('family_wish_add');
        $this->db->join('categories','categories.id=family_wish_add.cat_id','left');
        $this->db->where('user_id',$this->_userID);
        if(!empty($get['cat'])){
            $this->db->where('family_wish_add.cat_id',$get['cat']);
        }
        if(!empty($get['family'])){
            $this->db->where('family_wish_add.family_member',$get['family']);
        }
        $query = $this->db->get();
        return $query->result();
   }
  
    public function getCategories() {

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', NULL);

        $parent = $this->db->get();
        
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;

    }

    public function getCategories_Wish_Edit(){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', NULL);
        $query = $this->db->get();
       return $query->result();

    }
    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
      //  print_r($categories);
        return $categories;       
    }

    // public function showCategory(){
    //     $this->db->select('*')->from('user_wish');
    //     $this->db->join('categories','categories.id=user_wish.categories_id');
    //     $this->db->where('categories.parent_id',NULL);
    //     $query = $this->db->get();
    //     if ($query->num_rows() == 1) {
    //     	return $query->result();
    //     } else {
    //     	return false;
    //     }
    // }
    // public function showSubCategory(){
    //     $this->db->select('*')->from('user_wish');
    //     $this->db->join('categories','categories.id=user_wish.type');
    //     $this->db->where('categories.parent_id','categories.id');
    //     $query = $this->db->get();
    //     if ($query->num_rows() == 1) {
    //     	return $query->result();
    //     } else {
    //     	return false;
    //     }  
    // }

   public function getWhishList($get){
    $this->db->select('*,categories.name as cat_name');
    $this->db->from('user_wish');
    $this->db->join('categories','categories.id=user_wish.categories_id','left');
    $this->db->where('user_id',$this->_userID);
    if(!empty($get['cat'])){
        $this->db->where('user_wish.categories_id',$get['cat']);
    }
    $query = $this->db->get();
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
    public function getUsersList($params){ 
        $search = (!empty($params['q']))?$params['q']:'';
        $sql ='SELECT
            `users`.*,
            `friends`.`status` AS `friends_status`,
            `friends`.`to_friend`,
            `friends`.`from_friend`,
            (
            SELECT
                (friends.to_friend) FROM friends WHERE
                (
                    users.id = friends.to_friend OR users.id = friends.from_friend
                ) AND (
                    friends.to_friend = '.$this->_userID.' OR friends.from_friend = '.$this->_userID.'
                )
        ) AS check_to_friend,
        (
            SELECT
                (friends.from_friend)
            FROM
                friends
            WHERE
                (
                    users.id = friends.to_friend OR users.id = friends.from_friend
                ) AND (
                    friends.to_friend = '.$this->_userID.' OR friends.from_friend = '.$this->_userID.'
                )
        ) AS check_from_friend,
         (
            SELECT
                (friends.status)
            FROM
                friends
            WHERE
                (
                    users.id = friends.to_friend OR users.id = friends.from_friend
                ) AND (
                    friends.to_friend = ' .$this->_userID.' OR friends.from_friend = '.$this->_userID.'
                )
        ) AS check_status
        FROM
            `users`
        LEFT JOIN `friends` ON `friends`.`from_friend` = `users`.`id` OR `friends`.`to_friend` = `users`.`id`
        WHERE
            `users`.`id` != '.$this->_userID;

        if(!empty($search)){
            $arrExplodedKeyword = explode(" ",$search);  
            foreach($arrExplodedKeyword as $key=>$value){
                if($key > 0){  
                    $sql.= " OR CONCAT(first_name,last_name,user_name,email)" . " LIKE '%" . $value . "%'";
                } else { 
                    $sql.= " AND CONCAT(first_name,last_name,user_name,email)" . " LIKE '%" . $value . "%'";
                    
                }
            }
        }else{
            $sql.= " AND CONCAT(first_name,last_name,user_name,email)" . " LIKE '%" . $search. "%'";   
        }
        $sql.= ' GROUP BY `users`.`id`';
        $condition = "";
        return $this->db->query($sql, $condition)->result();
    }


    public function getUserByToken($token) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.token', $token);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    public function getUserFriendsList($params){
        $search = (!empty($params['q']))?$params['q']:'';
        
        $this->db->select('users.*, friends.status as friends_status,friends.to_friend,friends.from_friend,user_family_member.family_member_id');
        $this->db->from('friends');
        $this->db->join('users', '(friends.from_friend = users.id OR friends.to_friend = users.id) AND friends.status=1');
        $this->db->join('user_family_member', '(user_family_member.to_user_id = friends.from_friend )','left');
        if(!empty($search)){
            $condition = "CONCAT(users.first_name,users.last_name,users.user_name,users.email)" . "LIKE '%" . $search . "%'";
            $this->db->where($condition);
        }
        $this->db->where("(friends.from_friend=".$this->_userID." OR friends.to_friend=".$this->_userID.")");
        $this->db->where("friends.status",1);
        $this->db->where("users.id!=".$this->_userID);
        $this->db->group_by('users.id'); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
        	return false;
        }
    }

    public function getFriendDatails($params){  
        $search = (!empty($params['q']))?$params['q']:'';
        
        $this->db->select('users.*, friends.status as friends_status,friends.to_friend,friends.from_friend');
        $this->db->from('friends');
        $this->db->join('users', '(friends.from_friend = users.id OR friends.to_friend = users.id) AND friends.status=1');
        if(!empty($search)){
            $condition = "CONCAT(users.first_name,users.last_name,users.user_name,users.email)" . "LIKE '%" . $search . "%'";
            $this->db->where($condition);
        }
        $this->db->where("(friends.from_friend=".$this->_userID." OR friends.to_friend=".$this->_userID.")");
        $this->db->where("friends.status",1);
        $this->db->where("users.id!=".$this->_userID);
        $this->db->group_by('users.id'); 
        $this->db->limit(3); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
        	return false;
        }
    }
    public function getUserPendingFriendsList($params){
        $search = (!empty($params['q']))?$params['q']:'';
        
        $this->db->select('users.*, friends.status as friends_status,friends.to_friend,friends.from_friend');
        $this->db->from('friends');
        $this->db->join('users', '(friends.from_friend = users.id) AND friends.status=0');
        if(!empty($search)){
            $condition = "CONCAT(users.first_name,users.last_name,users.user_name,users.email)" . "LIKE '%" . $search . "%'";
            $this->db->where($condition);
        }
        $this->db->where("friends.to_friend=".$this->_userID." ");
        $this->db->where("friends.status",0);
        $this->db->where("users.id!=".$this->_userID);
        $this->db->group_by('users.id'); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
        	return false;
        }
    }
    public function checkIfUserIsFriend($id,$userId) {
        $this->db->select('*');
        $this->db->from('friends');
        $this->db->where('to_friend = '.$id." and from_friend=".$userId);
        $this->db->or_where('(from_friend = '.$id." and to_friend=".$userId.")");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    public function getSubCat($id) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    public function updateWishData($data){  
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($table_name, array('categories_id' => $categories_id,
                                             'type' => $type,
                                             'other_accessories' =>$other_accessories,
                                             'brand' => $brand,
                                             'color' => $color,
                                             'size' => $size,
                                             'style' => $style,
                                             'created_on' => date('Y-m-d H:i:s'),
                                         ));
                                         return true;
    }
    public function updateRegistryData($data){  //echo"<pre>"; var_dump($data);exit;
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($table_name, array('cat_id' => $cat_id,
                                             'type' => $type,
                                             'other_accessories' => $other_accessories,
                                             'brand' => $brand,
                                             'occasion' => $occasion,
                                             'color' => $color,
                                             'size' => $size,
                                             'style' => $style,
                                             'created_on' => date('Y-m-d H:i:s'),
                                         ));
                                         return true; 
    }
    public function wishDelete($wishId){
        $this->db-> where('id',$wishId);
        $this->db-> delete('user_wish');
        return true;
    }
    public function registryDelete($registryId){
        $this->db-> where('id',$registryId);
        $this->db-> delete('user_registry');
        return true;
    }
    public function getWishListById($wishId){
        $this->db->select('*');
        $this->db->from('user_wish');
        $this->db->where('id',$wishId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function getcatById($catId){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id',$catId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function getcatByIdEdit($cat_id){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id',$cat_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function getRegistryListById($registryId){
        $this->db->select('*');
        $this->db->from('user_registry');
        $this->db->where('id',$registryId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        } 
    }
     
    public function getCategoryById($id) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function getRegistryInfoBtUser($id,$get){
        $this->db->select('user_registry.*,categories.name as cat_name');
        $this->db->from('user_registry');
        $this->db->join('categories','categories.id=user_registry.cat_id','left');
        $this->db->where('user_id',$id);
        if(!empty($get['cat'])){
            $this->db->where('user_registry.cat_id',$get['cat']);
        }
        $query = $this->db->get();
       return $query->result();
    }

    public function getFamilyWishInfoByUser($id,$get){ 
        $this->db->select('family_wish_add.*,categories.name as cat_name');
        $this->db->from('family_wish_add');
        $this->db->join('categories','categories.id=family_wish_add.cat_id','left');
        $this->db->where('user_id',$id);
        if(!empty($get['cat'])){
            $this->db->where('family_wish_add.cat_id',$get['cat']);
        }
        $query = $this->db->get();
       return $query->result();
    }
    public function getObjFamilyMemberDetails() {
        $this->db->select('*');
        $this->db->from('family_member');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getObjUserFamilyChk($fromUserId,$toUserId){
        $this->db->select('*');
        $this->db->from('user_family_member');
        $this->db->where('from_user_id', $fromUserId);
        $this->db->where('to_user_id', $toUserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function getObjFamilyDetailsByUserId($loginUserId){
        $this->db->select('user_family_member.*,users.id as userId,CONCAT(users.first_name, " ", users.last_name) as full_name, users.first_name, users.last_name,family_member.fm_name');
        $this->db->from('user_family_member');
        $this->db->join('users','users.id=user_family_member.to_user_id');
        $this->db->join('family_member','family_member.id=user_family_member.family_member_id');
        $this->db->where('from_user_id',$loginUserId);
        $this->db->order_by("user_family_member.to_user_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getObjgetObjUserDetails($loginid){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $loginid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function deleteUser($arrCheck){
        $this->db->where($arrCheck);
        $this->db->delete('users');
    }
    public function deletefriendUser($arrCheck){
        $this->db->where($arrCheck);
        $this->db->delete('friends');
    }

    function Is_already_register($id){ 
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {  
        return true;
        }
        else
        {
        return false;
        }
    }
    function Insert_user_data($data)
    {
      $this->db->insert('users', $data);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }
    public function InsertDataById($insertUser){  
        $this->db->where('id',$insertUser);
        $query = $this->db->get('users');
        $row = $query->row();
        return $row; 
    }
    function Update_user_data($data, $id)     
    { 
     $this->db->where('id', $id);
     $this->db->update('users', $data);
    }
    public function getObjUserGoogleDetails($loginid){ 
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $loginid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    
    public function checkEmailExit($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
  
    public function AllUserList(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
   }  
   public function checkUserId($data){
       extract($data);
        $this->db->where('id', $id);
        $this->db->update($table_name, array('user_active_status' => $user_active_status,
                                         ));
                                         return true;
   }
   public function getCount() {
    return $this->db->count_all('users');
}
public function getUsers($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->get('users');
    return $query->result();
}

function InsertHomeContent($insertData){
  $this->db->insert('admin_homepage_content', $insertData);
  $insert_id = $this->db->insert_id();
  return $insert_id;
}
public function getHomeData(){
    $this->db->select('*');
    $this->db->from('admin_homepage_content');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return FALSE;
    }
}

public function UpdateHomeContent($id,$updatetData){
    $this->db->where('id', $id);
     $this->db->update('admin_homepage_content',$updatetData);
}
 
    public function homeAllData(){
        $this->db->select('*');
        $this->db->from('admin_homepage_content');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
       }
    }

   public function InsertAboutUsContent($insertData){
    $this->db->insert('admin_aboutus_content', $insertData);
    return true;
   } 

   public function getAboutUsData(){
    $this->db->select('*');
    $this->db->from('admin_aboutus_content');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return FALSE;
    }
  }

  public function UpdateAboutUsContent($id,$updatetData){
    $this->db->where('id', $id);
     $this->db->update('admin_aboutus_content',$updatetData);
  }

  public function AboutUsData(){
    $this->db->select('*');
    $this->db->from('admin_aboutus_content');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return FALSE;
   }
}

 public function InsertContactUsContent($insertData){
    $this->db->insert('admin_contact_content', $insertData);
    return true;
   } 

   public function contactAllData(){
        $this->db->select('*');
        $this->db->from('admin_contact_content');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
    }
 }

    public function UpdateContactUsContent($id,$updatetData){
        $this->db->where('id', $id);
        $this->db->update('admin_contact_content',$updatetData);
    }

    public function getfamilyDataById($familyWishId){
        $this->db->select('*');
        $this->db->from('family_wish_add');
        $this->db->where('id',$familyWishId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        } 
    }

    public function updateFamilyWishData($data){  //echo"<pre>"; var_dump($data);exit;
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($table_name, array('family_member' => $family_member,
                                             'child_name' => $child_name,
                                             'child_birthday' => $child_birthday,
                                             'sex' => $sex,
                                             'cat_id' => $cat_id,
                                             'type_id' => $type_id,
                                             'other_accessories' => $other_accessories,
                                             'brand' => $brand,
                                             'color' => $color,
                                             'size' => $size,
                                             'style' => $style,
                                             'created_on' => date('Y-m-d H:i:s'),
                                         ));
                                         return true; 
    }
    public function familyWishDataDelete($familyWishId){  
        $this->db-> where('id',$familyWishId); 
        $this->db-> delete('family_wish_add');
        return true;
    }

    public function UpdateMassageEmoji($massgeId,$updateEmojiById){
        $this->db->where('id', $massgeId);
        $this->db->update('messages',$updateEmojiById);
        return true;
    }

    public function totalUserCount(){
        $query = $this->db->query('SELECT * FROM users');
        return  $query->num_rows();
    }

    public function totalWishCount(){
        $query = $this->db->query('SELECT * FROM user_wish');
        return  $query->num_rows();
    }

    public function totalRegistryCount(){
        $query = $this->db->query('SELECT * FROM user_registry');
        return  $query->num_rows(); 
    }

    public function totalFamilyWishCount(){
        $query = $this->db->query('SELECT * FROM family_wish_add');
        return  $query->num_rows();
    }

    public function getAllUserEmail(){
        $query = $this->db->query('SELECT * FROM users');
        return  $query->result();
    }

    public function getUsersById($data){
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($table_name, array('isSubscribe' => '0',
                                         ));
                                         return true;
    }

    public function getFirstUser(){
        $this->db->select('*');
        $this->db->from('users');
      //  $this->db->where('id', '107');
        $query = $this->db->get();
        return  $query->result();
    }

}
