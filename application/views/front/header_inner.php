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
                $CI = &get_instance();
                $CI->load->model('Favoritewish_Model');
                $notifyAllData = $CI->Favoritewish_Model->getNotyfyAllData();
                // $notification = $CI->Favoritewish_Model->getNotification($sessionArray['user_id']);
            ?>
        <?php
  if (!empty($notifyAllData)) {
    $varNotification = array();
    $addClass = array();
    $addBorderClass = 'border-0';
    if ($sessionArray != '') {
        foreach ($notifyAllData as $allData) {
            if ($allData->from_friend == $sessionArray['user_id']) {
                $fromData = $CI->Favoritewish_Model->getDataFromFriend($allData->to_friend, $sessionArray['user_id']);
                $getObjFromUser = $CI->Favoritewish_Model->getObjUserDetailsById($sessionArray['user_id']);
                if (!empty($fromData)) {
                    if ($fromData->notyfy_status == 1) {
                        if ($fromData->read_status == 0) {
                            if (!empty($getObjFromUser) && $getObjFromUser->friend_request_notify == 1) {
                                $varNotification[] = '<li>
                                                        <a class="dropdown-item d-flex align-items-center bg-white border-top" href="' . base_url('user/friends/notyfy/read') . '">
                                                                <span
                                                                    class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                    <i class="icon icon-36 fs_15"></i>
                                                                </span>
                                                                <div>
                                                                    <p class="fs_14 mb-0 lh_20 font-weight-semibold text-success">Friend request Accpted By' . '   ' . $fromData->first_name . ' !</p>                                                                                        </p>
                                                                </div>
                                                                <div>
                                                                  <button type="button"
                                                                           class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle"><i
                                                                    class="fa fa-times fs_10"></i>
                                                                </button>
                                                        </div>
                                                        </a>
                                                     </li>';
                                $addClass = 'fa fa-circle icon';
                            }
                        }
                    }
                }
            } else if ($allData->to_friend == $sessionArray['user_id']) {
                $toData = $CI->Favoritewish_Model->getDataToFriend($allData->from_friend, $sessionArray['user_id']);
                $getObjToUser = $CI->Favoritewish_Model->getObjUserDetailsById($sessionArray['user_id']);
                $dateStr  = $toData->created_on;
                $test =  \DateTime::createFromFormat('Y-m-d H:i:s', $dateStr)->getTimestamp();
                $post_date = $test;
                $now = time();
                $daatTime = timespan($post_date, $now) . ' ago';
                if (!empty($toData)) {
                    if ($toData->notyfy_status == 0) {
                        if (!empty($getObjToUser) && $getObjToUser->friend_request_notify == 1) {
                            $varNotification[] = '<li>
                                                    <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                        <div class="d-flex align-items-start mr-2">
                                                            <span
                                                                class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                <i class="icon icon-36 fs_15"></i>
                                                            </span>
                                                            <div>
                                                                <p class="fs_14 mb-0 lh_20 font-weight-semibold">' . $toData->first_name . ' ' . $toData->last_name . '  ' . 'had send you a friend request.
                                                                    <button type="button" class="btn btn-primary btn-sm acceptFriendRequest" data-token=' . $toData->token . '>Accept</button>
                                                                    <button type="button" class="btn btn-danger btn-sm removeFriend" data-token=' . $toData->token . '>Reject</button>
                                                                </p>
                                                                <small> '.$daatTime .'</small>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle removeFriend" data-token=' . $toData->token . '><i
                                                                    class="fa fa-times fs_10 removeFriend"></i></button>
                                                        </div>
                                                    </a>
                                                </li>';
                            $addClass = 'fa fa-circle icon';
                        }
                    }

                }
            }

        }
        }
    } else {
        $varNotification = array();
        $addClass = array();
    }
    ?>
    
                        <?php
                        $sessionArray = $this->session->userdata('ci_seesion_key');
                        $CI = &get_instance();
                        $CI->load->model('Favoritewish_Model');
                        $get = '';
                        if ($sessionArray != '') {
                            $getBirthday = $CI->Favoritewish_Model->getFriendBirthdayNotify($get);
                            if (!empty($getBirthday)) {
                                foreach ($getBirthday as $friends) {
                                    if ($friends->from_friend == $sessionArray['user_id']) {
                                        $currentYear = date("Y-m-d");
                                        $dob = $friends->dob;
                                        if ($currentYear == $dob) {
                                            if ($friends->friend_birthday_notify == 0) {
                                                $showBirthdayClass = 'fa fa-circle icon';
                                            }
                                        }
                                    } else if ($friends->to_friend == $sessionArray['user_id']) {
                                        $currentYear = date("Y-m-d");
                                        $dob = $friends->dob;
                                        if (!empty($currentYear == $dob)) {
                                            if ($friends->to_friend_birthday_notify == 0) {
                                                $showBirthdayClass = 'fa fa-circle icon';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        
                        <?php  
                           $CI = &get_instance();
                           $CI->load->model('Favoritewish_Model');
                           $sessionArray = $this->session->userdata('ci_seesion_key');
                           $msgNotify= array();
                           $msg = $CI->Favoritewish_Model->getMsgTableData(); 
                            foreach($msg as $msgData){ 
                               if ($msgData->from_user == $sessionArray['user_id']){  
                                 $fromMsg = $CI->Favoritewish_Model->getDataFromMsg($msgData->to_user,$sessionArray['user_id']);
                                 $getObjFromUser = $CI->Favoritewish_Model->getObjMsgUser($sessionArray['user_id']);
                                if($getObjFromUser->check_msg_status == 0){ 
                                  $msgNotify[] ='';
                               }
                               }else if ($msgData->to_user == $sessionArray['user_id']){   
                                 $toMsg = $CI->Favoritewish_Model->getDataToMsg($msgData->from_user,$sessionArray['user_id']);
                                 $getObjtoUser = $CI->Favoritewish_Model->getObjMsgUser($sessionArray['user_id']);
                                if(!empty($toMsg)){
                                    $dateStr  = $toMsg->created_on;
                                    $test =  \DateTime::createFromFormat('Y-m-d H:i:s', $dateStr)->getTimestamp();
                                    $post_date = $test;
                                    $now = time();
                                    $msgDate = timespan($post_date, $now) . ' ago';
                                    $msgNotify[] ='<li>
                                                    <a class="dropdown-item d-flex align-items-start justify-content-between" href="'.base_url('/user/friends/'.$toMsg->id.'/massages').'">
                                                        <span
                                                            class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                            <i class="icon icon-36 fs_15 text-dark"></i>
                                                        </span>
                                                        <span>
                                                            <p  class="fs_14 mb-0 lh_20 font-weight-semibold">'.$toMsg->first_name.' send a message.
                                                                Reply him now.</p>
                                                            <small>'.$msgDate.'</small>
                                                        </span>
                                                            <button type="button"
                                                            class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle ml-2 upDateMassageStatus" data-id="'.$getObjtoUser->id.'" msg-id="'.$toMsg->id.'"><i
                                                                class="fa fa-times fs_10"></i></button>                                                        
                                                    </a>
                                             </li>';
                                      $msNotifyClass = 'fa fa-circle icon';
                                 }
                                }
                            }
                        ?>

                        <a href="javacript:void()" class="dropdown">
                            <a href="javacript:void()" class="dropdown-toggle user-account notification mr-4"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-bell fa-lg"></i>
                                <span
                                    class="<?php echo !empty($addClass) ? $addClass : '' ?><?php echo !empty($showBirthdayClass) ? $showBirthdayClass : ''; ?> <?php echo !empty($msNotifyClass) ? $msNotifyClass : ''; ?> "></span>
                            </a>
                        </a>   
                      <?php  
                      foreach ($varNotification as $fri){
                         if($fri != ''){ 
                         }
                       ?>    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <div
                                class="dropdown-header d-flex justify-content-between align-items-center text-dark fs_16">
                                <span><i class="icon icon-15 mr-2"></i>Notifications</span>
                                <button type="button" class="btn btn-link text-dark p-0"><i
                                        class="fas fa-cog"></i></button>
                            </div>
                            <ul class="list-unstyled list-notification">
                                <?php if (!empty($varNotification)) {?>
                                    <?php foreach ($varNotification as $fri) {
                                            echo $fri;
                                       }?>
                                <?php }?>
                                 
                                <?php if (!empty($getBirthday)) {?>
                                <?php foreach ($getBirthday as $friends) {?>

                                    <?php
                                 $bday = '';
                                    if ($friends->from_friend == $sessionArray['user_id']) {
                                        if ($friends->friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob){
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateFromFriendBirthday" id="' . $friends->from_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>Today</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle updateFromFriendBirthday" id="' . $friends->from_friend . '"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                        </li>';
                                            }
                                        }
                                    } else if ($friends->to_friend == $sessionArray['user_id']) {
                                        if ($friends->to_friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob) {
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateToFriendBirthday" id="' . $friends->to_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>Today</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle updateToFriendBirthday" id="' . $friends->to_friend . '"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                 </li>';
                                            }
                                        }
                                    }

                                    ?>
                                  <?php echo $bday ?>
                                <?php } }?>

                            </ul>
                            <div class="dropdown-footer text-center">
                                <button type="button" class="btn btn-link text-dark fs_14 p-0">Read all</button>
                            </div>
                        </div>
               <?php  } ?> 
               
                <?php if (!empty($getBirthday)) {?>
                        <?php foreach ($getBirthday as $friends) {?>
                            <?php
                            $bday = '';
                            if ($friends->from_friend == $sessionArray['user_id']) {
                                if ($friends->friend_birthday_notify == 0) {
                                    $currentYear = date("Y-m-d");
                                    $dob = $friends->dob;
                                    if ($currentYear == $dob){
                                        $bday = $friends->first_name;
                                    }
                                }
                            } else if ($friends->to_friend == $sessionArray['user_id']) {
                                if ($friends->to_friend_birthday_notify == 0) {
                                    $currentYear = date("Y-m-d");
                                    $dob = $friends->dob;
                                    if ($currentYear == $dob) {
                                        $bday = $friends->first_name;
                                    }
                                }
                            }

                            ?>
                    <?php if($bday != ''){  ?>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <div
                                class="dropdown-header d-flex justify-content-between align-items-center text-dark fs_16">
                                <span><i class="icon icon-15 mr-2"></i>Notifications</span>
                                <button type="button" class="btn btn-link text-dark p-0"><i
                                        class="fas fa-cog"></i></button>
                            </div>
                            <ul class="list-unstyled list-notification">
                                <?php if (!empty($varNotification)) {?>
                                    <?php foreach ($varNotification as $fri) {
                                            echo $fri;
                                       }?>
                                <?php }?>
                                 
                                <?php if (!empty($getBirthday)) {?>
                                <?php foreach ($getBirthday as $friends) {?>

                                    <?php
                                 $bday = '';
                                    if ($friends->from_friend == $sessionArray['user_id']) {
                                        if ($friends->friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob){
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateFromFriendBirthday" id="' . $friends->from_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>Today</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle updateFromFriendBirthday" id="' . $friends->from_friend . '"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                        </li>';
                                            }
                                        }
                                    } else if ($friends->to_friend == $sessionArray['user_id']) {
                                        if ($friends->to_friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob) {
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateToFriendBirthday" id="' . $friends->to_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>Today</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle updateToFriendBirthday" id="' . $friends->to_friend . '"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                 </li>';
                                            }
                                        }
                                    }

                                    ?>
                                  <?php echo $bday ?>
                                <?php } }?>
                                

                            </ul>
                            <div class="dropdown-footer text-center">
                                <button type="button" class="btn btn-link text-dark fs_14 p-0">Read all</button>
                            </div>
                        </div> 
                    <?php } ?>
                <?php } }?>
                
                <?php if (!empty($msgNotify)) {?>
                    <?php foreach ($msgNotify as $fri) {   ?>
                      <?php if($fri != ''){  ?>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <div
                                class="dropdown-header d-flex justify-content-between align-items-center text-dark fs_16">
                                <span><i class="icon icon-15 mr-2"></i>Notifications</span>
                                <button type="button" class="btn btn-link text-dark p-0"><i
                                        class="fas fa-cog"></i></button>
                            </div>
                            <ul class="list-unstyled list-notification">
                                <?php if (!empty($varNotification)) {?>
                                    <?php foreach ($varNotification as $fri) {
                                            echo $fri;
                                       }?>
                                <?php }?>
                                 
                                <?php if (!empty($getBirthday)) {?>
                                <?php foreach ($getBirthday as $friends) {?>

                                    <?php
                                 $bday = '';
                                    if ($friends->from_friend == $sessionArray['user_id']) {
                                        if ($friends->friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob){
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateFromFriendBirthday" id="' . $friends->from_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>3d</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                        </li>';
                                            }
                                        }
                                    } else if ($friends->to_friend == $sessionArray['user_id']) {
                                        if ($friends->to_friend_birthday_notify == 0) {
                                            $currentYear = date("Y-m-d");
                                            $dob = $friends->dob;
                                            if ($currentYear == $dob) {
                                               $bday = '<li>
                                                            <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                <div class="d-flex align-items-start mr-2">
                                                                    <span
                                                                        class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                        <i class="icon icon-36 fs_15"></i>
                                                                    </span>
                                                                    <div>
                                                                        <p class="fs_14 mb-0 lh_20 font-weight-semibold updateToFriendBirthday" id="' . $friends->to_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                                        <small>3d</small>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle"><i
                                                                            class="fa fa-times fs_10"></i></button>
                                                                </div>
                                                            </a>
                                                 </li>';
                                            }
                                        }
                                    }

                                    ?>
                                  <?php echo $bday ?>
                                <?php } }?>
                                
                               <?php if (!empty($msgNotify)) {?>
                                    <?php foreach ($msgNotify as $fri) {
                                            echo $fri;
                               } }?>

                            </ul>
                            <div class="dropdown-footer text-center">
                                <button type="button" class="btn btn-link text-dark fs_14 p-0">Read all</button>
                            </div>
                        </div> 
              <?php  } } }?>
            

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