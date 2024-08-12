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
                        if ($sessionArray != '') {
                        $CI = &get_instance();
                        $CI->load->model('Favoritewish_Model');
                        $notifyAllData = $CI->Favoritewish_Model->getNotyfyAllData($sessionArray['user_id']);
                       // echo"<pre>"; var_dump($notifyAllData); exit;
                        }
                     ?>
                     
                     <?php if(!empty($notifyAllData)){  ?>
                      <?php  
                      $varFriendRequestNotify = array();
                      $addReqAcceptButton = '';
                      ?>
                        <?php   foreach($notifyAllData as $Notify){    ?>
                            <?php if($Notify->to_id == $sessionArray['user_id']){   ?>
                                <?php  if($Notify->notification_type == 'friend_request_send'){ ?>
                                    <?php   
                                       $getObjtoken = $CI->Favoritewish_Model->getUserTocken($Notify->from_id);
                                     ?>
                                   <?php  
                                     if($Notify->read_status == 0){
                                        $addClass = 'fa fa-circle icon';
                                     }   
                                     if($Notify->req_accept == 0){
                                       $addReqAcceptButton = '<button type="button" class="btn btn-primary btn-sm acceptFriendRequest" data-token=' . $getObjtoken->token . '>Accept</button>
                                                             <button type="button" class="btn btn-danger btn-sm removeFriend" data-token='.$getObjtoken->token.'>Reject</button>';
                                     } 
                                     $message_time = new DateTime($Notify->created_on);
                                     $current_time = new DateTime();
                                     $interval = $current_time->diff($message_time);
                                     if ($interval->d >= 1) {
                                          $time_ago = $interval->d . ' days ago';
                                         } elseif ($interval->h >= 1) {
                                             $time_ago = $interval->h . ' hours ago';
                                         } else {
                                             $time_ago = $interval->i . ' minutes ago';
                                         }
                                     $date_format = 'd-M-Y'; 
                                     $exact_date = $message_time->format($date_format);
                                     $display_text = $time_ago . ' on ' . $exact_date;
                                      $varFriendRequest ='
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                                                            <div class="d-flex align-items-start mr-2">
                                                                                <span
                                                                                    class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                                    <i class="icon icon-36 fs_15"></i>
                                                                                </span>
                                                                                <div class="message-content">  
                                                                                    <p class="fs_14 mb-0 lh_20 font-weight-semibold">'.$Notify->notification_massage.'</p>
                                                                                    <small>'.$display_text.'</small>';
                                                                                if($Notify->req_accept == 0){    
                                                                                $varFriendRequest .='<button type="button" class="btn btn-primary btn-sm acceptFriendRequest" data-token=' . $getObjtoken->token . '>Accept</button>
                                                                                    <button type="button" class="btn btn-danger btn-sm removeFriend" data-token='.$getObjtoken->token.'>Reject</button>';
                                                                                }    
                                                                                $varFriendRequest .= '</div>
                                                                            </div>
                                                                            <div>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle deleteToNotify"
                                                                                    id="'.$Notify->id.'"><i
                                                                                        class="fa fa-times fs_10"></i></button>
                                                                            </div>
                                                                        </a>
                                                                    </li>'; 
                              $varFriendRequestNotify[]  = $varFriendRequest;
                                ?>  
                     <?php }else if($Notify->notification_type == 'friend_request_Accept'){ 
                                    if($Notify->read_status == 0){
                                        $addClass = 'fa fa-circle icon';
                                    }
                                $message_time = new DateTime($Notify->created_on);
                                $current_time = new DateTime();
                                $interval = $current_time->diff($message_time);
                                if ($interval->d >= 1) {
                                     $time_ago = $interval->d . ' days ago';
                                    } elseif ($interval->h >= 1) {
                                        $time_ago = $interval->h . ' hours ago';
                                    } else {
                                        $time_ago = $interval->i . ' minutes ago';
                                    }
                                $date_format = 'd-M-Y'; 
                                $exact_date = $message_time->format($date_format);
                                $display_text = $time_ago . ' on ' . $exact_date;
                                 $varFriendRequestNotify[] ='
                                 <li>
                                     <a class="dropdown-item d-flex align-items-start justify-content-between" href="javacript:void()">
                                         <div class="d-flex align-items-start mr-2">
                                             <span
                                                 class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                 <i class="icon icon-36 fs_15"></i>
                                             </span>
                                             <div class="message-content">  
                                                 <p class="fs_14 mb-0 lh_20 font-weight-semibold">'.$Notify->notification_massage.'</p>
                                                 <small>'.$display_text.'</small>
                                             </div>
                                         </div>
                                         <div>
                                             <button type="button"
                                                 class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle deleteToNotify"
                                                   id="'.$Notify->id.'"><i
                                                     class="fa fa-times fs_10"></i></button>
                                         </div>
                                     </a>
                                 </li>
                             ';
                     }else if($Notify->notification_type == 'birthday_notification'){
                        if($Notify->read_status == 0){
                            $addClass = 'fa fa-circle icon';
                        }
                        $message_time = new DateTime($Notify->created_on);
                        $current_time = new DateTime();
                        $interval = $current_time->diff($message_time);
                        if ($interval->d >= 1) {
                                $time_ago = $interval->d . ' days ago';
                            } elseif ($interval->h >= 1) {
                                $time_ago = $interval->h . ' hours ago';
                            } else {
                                $time_ago = $interval->i . ' minutes ago';
                            }
                        $date_format = 'd-M-Y'; 
                        $exact_date = $message_time->format($date_format);
                        $display_text = $time_ago . ' on ' . $exact_date;
                        $varFriendRequestNotify[] ='
                                 <li>
                                     <a class="dropdown-item d-flex align-items-start justify-content-between" href="javacript:void()">
                                         <div class="d-flex align-items-start mr-2">
                                             <span
                                                 class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                 <i class="icon icon-36 fs_15"></i>
                                             </span>
                                             <div class="message-content">  
                                                 <p class="fs_14 mb-0 lh_20 font-weight-semibold">'.$Notify->notification_massage.'</p>
                                                 <small>'.$display_text.'</small>
                                             </div>
                                         </div>
                                         <div>
                                             <button type="button"
                                                 class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle deleteToNotify"
                                                   id="'.$Notify->id.'"><i
                                                     class="fa fa-times fs_10"></i></button>
                                         </div>
                                     </a>
                                 </li>';
                     }else if($Notify->notification_type == 'inbox_massage'){
                        if($Notify->read_status == 0){
                            $addClass = 'fa fa-circle icon';
                        }
                        $message_time = new DateTime($Notify->created_on);
                        $current_time = new DateTime();
                        $interval = $current_time->diff($message_time);
                        if ($interval->d >= 1) {
                                $time_ago = $interval->d . ' days ago';
                            } elseif ($interval->h >= 1) {
                                $time_ago = $interval->h . ' hours ago';
                            } else {
                                $time_ago = $interval->i . ' minutes ago';
                            }
                        $date_format = 'd-M-Y'; 
                        $exact_date = $message_time->format($date_format);
                        $display_text = $time_ago . ' on ' . $exact_date;
                        $varFriendRequestNotify[] ='
                                 <li>
                                     <a class="dropdown-item d-flex align-items-start justify-content-between" href="'.base_url().'massage/list?f_id='.$Notify->from_id.' ">
                                         <div class="d-flex align-items-start mr-2">
                                             <span
                                                 class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                 <i class="icon icon-36 fs_15"></i>
                                             </span>
                                             <div class="message-content">  
                                                 <p class="fs_14 mb-0 lh_20 font-weight-semibold">'.$Notify->notification_massage.'</p>
                                                 <small>'.$display_text.'</small>
                                             </div>
                                         </div>
                                         <div>
                                             <button type="button"
                                                 class="btn btn-outline-dark d-flex justify-content-center align-items-center py-0 px-2 p-0 w_20 h_20 rounded-circle deleteToNotify"
                                                   id="'.$Notify->id.'"><i
                                                     class="fa fa-times fs_10"></i></button>
                                         </div>
                                     </a>
                                 </li>';
                     } } } }?>  
                        <?php if(!empty($sessionArray['user_id'])){  ?>
                            <?php if(!empty($notifyAllData)){  ?>
                               <?php $sessionArray = $this->session->userdata('ci_seesion_key'); ?>
                                <a href="javacript:void()" class="dropdown ">
                                    <a href="javacript:void()" class="dropdown-toggle user-account notification mr-4 readMsg"
                                        id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" msg-id="<?php echo $sessionArray['user_id']  ?>">
                                        <i class="fas fa-bell fa-lg"></i>
                                        <span class="<?php echo !empty($addClass) ? $addClass :'' ?>"></span>
                                    </a>
                                </a>
                            <?php }else{  ?>
                                <a href="javacript:void()" class="dropdown ">
                                    <a href="javacript:void()" class="dropdown-toggle user-account notification mr-4"
                                        id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fas fa-bell fa-lg"></i>
                                        <span class=""></span>
                                    </a>
                                </a>
                          <?php }?>
                       <?php  } ?>   


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <div
                                class="dropdown-header d-flex justify-content-between align-items-center text-dark fs_16">
                                <span><i class="icon icon-15 mr-2"></i>Notifications</span>
                                 <a href="<?php echo base_url('notification') ?>" class="btn btn-link text-dark p-0"><i
                                        class="fas fa-cog"></i></a>
                            </div> 
                            <div class="scrollbar-vertical" id="removeClass">    
                            <?php if (!empty($varFriendRequestNotify)) {?>
                                <ul class="list-unstyled list-notification">
                                <?php foreach ($varFriendRequestNotify as $fri) { ?>                                          
                                         <?php   echo $fri;  ?>                                           
                                   <?php    }?>
                                   </ul>  
                            <?php }else{ ?>
                                <ul class="list-unstyled list-notification">
                                <li>
                                    <a class="dropdown-item d-flex align-items-start justify-content-between" href="#">
                                        <div class="d-flex align-items-start mr-2">
                                            <div>  
                                                <p class="fs_14 mb-0 lh_20 font-weight-semibold updateFromFriendBirthday">No Notification Found</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                         <?php   } ?>

                        <?php if(!empty($notifyAllData) && count($notifyAllData) > 5){ ?>  

                            <div class="dropdown-footer text-center">
                                <button type="button" class="btn btn-link text-dark fs_14 p-0 showAllNotify">Read all</button>
                            </div>
                            <?php } ?>
                        </div>
                        </div>
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