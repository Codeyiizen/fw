<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">

    <title><?php echo $title; ?> - Favorite Wish</title>

    <!-- Fav Icon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/site-image/favicon.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/color.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/elpath.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/emojionearea.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
    <script>
    var BASE_URL = "<?php echo base_url() ?>"
    </script>
    <style>
    .dropdown-toggle::after {
        display: none;
    }
    </style>
</head>
<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <!-- main header -->
        <header class="main-header">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo">
                            <a href="<?php echo base_url('/home/page'); ?>">
                                <img src="<?php echo base_url(); ?>assets/images/site-image/logo1.png"
                                    alt="Favorite Wish" class="img-fluid">
                            </a>
                        </figure>
                    </div>
                    <div class="menu-area d-flexs align-items-center d-none">
                        <nav class="main-menu mr-5">
                            <ul class="navigation">
                                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url('/about-us'); ?>">About Us</a></li>
                                <li><a href="<?php echo base_url('/contact-us'); ?>">Contact Us</a></li>
                            </ul>
                        </nav>
                        <div class="header-btn d-none d-xl-block">
                            <a href="javascript:void();" class="theme-btn yellow-bg">Join Us</a>
                            <a href="javascript:void();" class="theme-btn outline-btn">Sign In</a>
                        </div>
                    </div>
                    <nav class="fullscreen-nav">

                <?php  
                    $sessionArray = $this->session->userdata('ci_seesion_key');
                    $CI =& get_instance(); 
                    $CI->load->model('Favoritewish_Model');
                    $notifyAllData = $CI->Favoritewish_Model->getNotyfyAllData();
                    $notification = $CI->Favoritewish_Model->getNotification($sessionArray['user_id']);
                ?>
                    <?php
                      if(!empty($notifyAllData)){
                          $varNotification = array();
                          $addClass = array();
                          $addBorderClass = 'border-0';
                          foreach($notifyAllData as $allData){  
                            if($allData->from_friend == $sessionArray['user_id']){
                                 $fromData = $CI->Favoritewish_Model->getDataFromFriend($allData->to_friend,$sessionArray['user_id']);
                                 $getObjFromUser = $CI->Favoritewish_Model->getObjUserDetailsById($sessionArray['user_id']);
                                if(!empty($fromData)){
                                        if($fromData->notyfy_status == 1){
                                            if($fromData->read_status == 0){
                                                if(!empty($getObjFromUser) && $getObjFromUser->friend_request_notify == 1){
                                                    $varNotification[] = '<a class="dropdown-item" href="'.base_url('user/friends/notyfy/read').'">friend request Accpted By'.'   '.$fromData->first_name.'</a>';
                                                    $addClass ='fa fa-circle icon';
                                                }
                                            }
                                        }
                                 }
                            }else if($allData->to_friend == $sessionArray['user_id']){  
                                $toData = $CI->Favoritewish_Model->getDataToFriend($allData->from_friend,$sessionArray['user_id']);
                                $getObjToUser = $CI->Favoritewish_Model->getObjUserDetailsById($sessionArray['user_id']);
                                if(!empty($toData)){
                                        if($toData->notyfy_status == 0){
                                          if(!empty($getObjToUser) && $getObjToUser->friend_request_notify == 1){
                                                $varNotification[] = '<a class="dropdown-item" href="'.base_url('user/friends/details/'.$toData->from_friend.'').'">friend Request Found By'.'   '.$toData->first_name.'</a>';
                                                $addClass ='fa fa-circle icon';
                                          }
                                        }
                                    
                                }
                            }
                        
                        }
                    }else{
                        $varNotification = array();
                        $addClass = array();
                    }
				?>
             <?php
                
                $sessionArray = $this->session->userdata('ci_seesion_key');
                $CI =& get_instance(); 
                $CI->load->model('Favoritewish_Model');
                $get = '';
                if($sessionArray !=''){
                     $getBirthday = $CI->Favoritewish_Model->getFriendBirthdayNotify($get);
                      if(!empty($getBirthday)){
                         foreach($getBirthday as $friends){ 
                             if($friends->from_friend == $sessionArray['user_id']){ 
                                $currentYear = date("Y-m-d"); 
                                 $dob = $friends->dob;
                                if($currentYear == $dob){ 
                                    if($friends->friend_birthday_notify == 0){ 
                                        $showBirthdayClass = 'fa fa-circle icon';
                                    }
                                }
                             }else if($friends->to_friend == $sessionArray['user_id']){
                                 $currentYear = date("Y-m-d"); 
                                 $dob = $friends->dob;
                                if(!empty($currentYear == $dob)){
                                    if($friends->to_friend_birthday_notify == 0){
                                        $showBirthdayClass = 'fa fa-circle icon';
                                    }
                                }
                             }
                         }
                     }
                 }
              ?>  
              
             <a href="javacript:void()" class="dropdown">
                 <a href="javacript:void()" class="dropdown-toggle user-account notification mr-4"
                     id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">
                     <i class="fas fa-bell fa-lg"></i>
                     <span class="<?php echo !empty($addClass) ? $addClass :'' ?><?php echo !empty($showBirthdayClass) ? $showBirthdayClass :'' ;?>"></span>
                 </a> 
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                 <?php
                 foreach($varNotification as $fri){ echo $fri; } 
             ?>
             <?php if(!empty($getBirthday)){   ?>
                 <?php  foreach($getBirthday as $friends){  ?>
                     
                 <?php 
                  $bday = ''; 
                   if($friends->from_friend == $sessionArray['user_id']){
                     if($friends->friend_birthday_notify == 0){ 
                         $currentYear = date("Y-m-d"); 
                         $dob = $friends->dob;    
                         if($currentYear == $dob){  
                             $bday = '<a class="dropdown-item updateFromFriendBirthday" href="javascript:;" id="'.$friends->from_friend.'">'.$friends->first_name.' '.$friends->last_name.' '.'Birthday Today</a>';
                         }
                     }
                    }else if($friends->to_friend == $sessionArray['user_id']){
                     if($friends->to_friend_birthday_notify == 0){ 
                         $currentYear = date("Y-m-d"); 
                         $dob = $friends->dob;    
                         if($currentYear == $dob){  
                             $bday = '<a class="dropdown-item updateToFriendBirthday" href="javascript:;" id="'.$friends->to_friend.'">'.$friends->first_name.' '.$friends->last_name.' '.'Birthday Today</a>';
                         }
                     }
                   }
                     
                 ?>
                 <?php echo $bday   ?>
                 <?php } } ?>
             </div>
             </a>


                        <?php
if ($this->session->userdata('ci_session_key_generate') == false) {
    echo '';
} else {
    //echo '<span class="user-info mr-4">Hello! '.$userInfo['full_name'].'</span>';
    //echo '<a href="avascript:void();" class="theme-btn dark-bg mr-5">Advertise</a>';

	
    echo '<a href="' . base_url() . 'user-dashboard" class="user-account mr-4"><i class="fas fa-user-circle fa-lg"></i></a>';
    echo '<a href="' . base_url() . 'favoritewish/logout" class="user-account"><i class="fas fa-sign-out-alt fa-lg"></i></a>';
}
?>



                        <button class="fs-toggle-menu">
                            <span></span>
                        </button>
                    </nav>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div id="fs-menu" class="">
            <nav class="fs-main-nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('/about-us'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('/contact-us'); ?>">Contact Us</a></li>
                    <?php
if ($this->session->userdata('ci_session_key_generate') == false) {
    echo '<a href="' . base_url() . 'sign-in">Login/Register</a>';
} else {
    echo '<a href="' . base_url() . 'user-dashboard">My Account</a>';
}
?>
                </ul>
            </nav>
            <!--<footer class="menu-footer">
				<nav class="footer-nav">
					<ul>
						<li>
							<a href="#">
								<object type="image/svg+xml" data="assets/images/site-image/twitter.svg"></object>
								Twitter
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-envelope fa-fw"></i>
								Subscribe
							</a>
						</li>
					</ul>
				</nav>
			</footer>-->
        </div><!-- End Mobile Menu -->

        <main class="main-content">