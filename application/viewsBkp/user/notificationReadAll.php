<style>
.notification-card h5 {
    margin-bottom: .5rem;
    font-size: 1.125rem;
}

.notification-card p {
    margin-bottom: 0;
    font-size: 1rem;
}
</style>
<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo))?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader')?>
        <h4>All Notification</h4>
        <?php
                $sessionArray = $this->session->userdata('ci_seesion_key');
                $CI = &get_instance();
                $CI->load->model('Favoritewish_Model');
                $notifyAllData = $CI->Favoritewish_Model->getNotyfyReadAllData();
               // echo"<pre>"; var_dump($notifyAllData); exit;
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
                                $varNotification[] = '<div class="card bg-light notification-card">
                                                        <div class="card-body p-0">
                                                            <div class="border-bottom p-3 notification-card position-relative unread">
                                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                                    <div class="mr-3 status-online avatar avatar-xl">
                                                                       <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                            <i class="icon icon-36 fs_15"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="flex-1 mt-2 ml-0 mr-auto">
                                                                       <a href="' . base_url('user/friends/notyfy/read') . '">Friend request Accpted By' . '   ' . $fromData->first_name . ' !</a>         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';

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
                            $varNotification[] ='<div class="card bg-light notification-card">
                                                        <div class="card-body p-0">
                                                            <div class="border-bottom p-3 notification-card position-relative unread">
                                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                                    <div class="mr-3 status-online avatar avatar-xl">
                                                                       <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                                            <i class="icon icon-36 fs_15"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="flex-1 mt-2 ml-0 mr-auto">
                                                                        <h5>' . $toData->first_name . ' ' . $toData->last_name . '</h5>
                                                                        <p><span class="me-1 fw-bold fs-10">💬</span><span>had send you a friend request</strong><span
                                                                                class="ms-2 text-body-quaternary text-opactity-75 fw-bold fs-10"></span></p>
                                                                        <p><small><i class="fa fa-clock mr-1"></i>'.$daatTime .'</small></p>
                                                                    </div>
                                                                    <div>
                                                                    <button type="button" class="btn btn-primary btn-sm acceptFriendRequest" data-token=' . $toData->token . '> Accept </button>
                                                                    <button type="button" class="btn btn-danger btn-sm removeFriend" data-token=' . $toData->token . '> Reject </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
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
            $getBirthday = $CI->Favoritewish_Model->getFriendBirthdayNotifyReadAll($get);
        }
 ?>
<?php if (!empty($getBirthday)) { ?>
    <?php foreach ($getBirthday as $friends) {?>
        <?php
            $bday = '';
            if ($friends->from_friend == $sessionArray['user_id']) {
                if ($friends->friend_birthday_notify == 0) {
                    $currentYear = date("Y-m-d");
                    $dob = $friends->dob;
                    if ($currentYear == $dob){
                        $bday = '<div class="card bg-light notification-card">
                                    <div class="card-body p-0">
                                        <div class="border-bottom p-3 notification-card position-relative unread">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="mr-3 status-online avatar avatar-xl">
                                                    <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                        <i class="icon icon-36 fs_15"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 mt-2 ml-0 mr-auto">
                                                    <p class="fs_14 mb-0 lh_20 font-weight-semibold updateFromFriendBirthday" id="' . $friends->from_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                   <small>Today</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }
                }
            } else if ($friends->to_friend == $sessionArray['user_id']) {
                if ($friends->to_friend_birthday_notify == 0) {
                    $currentYear = date("Y-m-d");
                    $dob = $friends->dob;
                    if ($currentYear == $dob) {
                        $bday ='<div class="card bg-light notification-card">
                                    <div class="card-body p-0">
                                        <div class="border-bottom p-3 notification-card position-relative unread">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="mr-3 status-online avatar avatar-xl">
                                                    <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                        <i class="icon icon-36 fs_15"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1 mt-2 ml-0 mr-auto">
                                                    <p class="fs_14 mb-0 lh_20 font-weight-semibold updateToFriendBirthday" id="' . $friends->to_friend . '">'.$friends->first_name . ' ' . $friends->last_name . ' ' . 'a happy birthday, it s his birthday today</p>
                                                   <small>Today</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                     }
                }
            }

            ?>
        <?php echo $bday ?>
        <?php } }?>
        
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
                    $msgNotify[] = '<div class="card bg-light notification-card">
                                    <div class="card-body p-0">
                                        <div class="border-bottom p-3 notification-card position-relative unread">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="mr-3 status-online avatar avatar-xl">
                                                    <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                                        <i class="icon icon-36 fs_15"></i>
                                                    </span>
                                                </div>
                                                <div class="message-content flex-1 mt-2 ml-0 mr-auto">
                                                    
                                                    <a  href="'.base_url('/user/friends/'.$toMsg->id.'/massages').'" class="fs_14 mb-0 lh_20 font-weight-semibold upDateMassageStatus" data-id="'.$getObjtoUser->id.'" msg-id="'.$toMsg->id.'">'.$toMsg->first_name.' send a message.
                                                    Reply him now.</a> <small></small>
                                                    <br>
                                                  <small>'.$msgDate.'</small>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                    }
                }
            }
        ?>
          <?php if (!empty($msgNotify)) {?>
            <?php foreach ($msgNotify as $fri) {
                        echo $fri;
           } }?>

      <?php if (!empty($varNotification)){ ?>
        <?php foreach ($varNotification as $fri){
                echo $fri;
          }?>
        <?php }else { ?>
            <div class="card bg-light notification-card">
                <div class="card-body p-0">
                    <div class="border-bottom p-3 notification-card position-relative unread">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="mr-3 status-online avatar avatar-xl">
                                <span class="mr-3 d-flex justify-content-center align-items-center w_35 h_35 rounded-circle bg-light box-shadow2">
                                    <i class="icon icon-36 fs_15"></i>
                                 </span>
                            </div>
                            <div class="flex-1 mt-2 ml-0 mr-auto">
                                <p><span class="me-1 fw-bold fs-10"></span><span> No Friend Request Found </strong><span
                                        class="ms-2 text-body-quaternary text-opactity-75 fw-bold fs-10"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>  
          
    </div>
</section>