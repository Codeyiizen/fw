<style>
.list-group-item h6 {
    color: #243b53;
}

.list-group-item .time {
    color: #627d98;
}

.list-group-item p {
    color: #334e68;
}

.list-group-item.selected * {
    font-weight: 700;
}

.search-form {
    position: relative;
}

.search-form .form-control {
    border-color: #efefef;
    border-radius: 0.625rem;
    box-shadow: none;
    padding-left: 1.5rem;
}

.search-form .search-btn {
    left: 1rem;
    font-size: 1rem;
    color: #9f9f9f;
}

.search-form input::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: #cccc;
}

.search-form input::-moz-placeholder {
    /* Firefox 19+ */
    color: #cccc;
}

.search-form input:-ms-input-placeholder {
    /* IE 10+ */
    color: #cccc;
}

.search-form input:-moz-placeholder {
    /* Firefox 18- */
    color: #cccc;
}

.custom-file.chatroom-file-upload input[type="file"] {
    display: none;
}

.chatroom-file-upload .custom-file-label {
    cursor: pointer;
    width: auto;
    height: auto;
    border: 0;
    padding: 0;
    border-radius: 50%;
    line-height: 2.5;
    text-align: center;
    left: auto;
    background-color: transparent;
}

.chatroom-file-upload .custom-file-input:lang(en)~.custom-file-label::after {
    display: none;
}

.chat-messages .img-preview,
.input-group .img-thumbnail {
    max-height: 45px;
    object-fit: contain;
}

.input-group .img-thumbnail {
    margin-top: 2px;
}

.chat-room .theme-btn {
    border-radius: .625rem;
    padding: .5rem .625rem;
    right: .5rem;
}

.chat-room .theme-btn,
.chat-room .chatroom-file-upload {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 9;
}

.search-form .search-btn {
    position: absolute;
    top: 14px;
    z-index: 9;
}

.chat-room .chatroom-file-upload {
    left: 0;
    width: 30px;
}

.input-box .form-control {
    border-color: #a5a6f6;
    border-radius: 0.625rem;
}

.search-form input::-webkit-input-placeholder,
.input-box input::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: #cccc;
}

.search-form input::-moz-placeholder,
.input-box input::-moz-placeholder {
    /* Firefox 19+ */
    color: #cccc;
}

.search-form input:-ms-input-placeholder,
.input-box input:-ms-input-placeholder {
    /* IE 10+ */
    color: #cccc;
}

.search-form input:-moz-placeholder,
.input-box input:-moz-placeholder {
    /* Firefox 18- */
    color: #cccc;
}

@media screen and (max-width:575px) {

    .input-group .form-control,
    .chatroom-file-upload .custom-file-label {
        height: 40px;
    }

    .chatroom-file-upload .custom-file-label {
        width: auto;
        line-height: 1.5;
        margin-top: .5rem;
    }
}
</style>
<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/friend-banner', array('userInfo' => $userInfo))?>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeaderFriends', array('data' => $user_profile_id, 'is_friend' => $is_friend))?>
        <div class="profile-content-inner">
            <div class="chat-room">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body p-0 pb-1">
                                <div class="px-4 pt-3">
                                    <h5>Messages</h5>
                                    <form method="get"
                                        action="<?php echo base_url(); ?>user/friends/<?php echo $friendName->id ?>/massages">
                                        <div class="search-form">
                                            <!-- <i class="fa fa-search search-icon"></i> -->
                                            <input type="text" class="form-control my-3 test" name="q"
                                                placeholder="Search..." value="<?php echo $this->input->get('q'); ?>">
                                            <button type="submit" class="theme-btn yellow-bg"><i
                                                    class="fa fa-search search-icon"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <?php if (!empty($showFriendMassage)) {?>
                                <?php foreach ($showFriendMassage as $showMassage) {?>
                                <a href="<?php echo base_url(); ?>user/friends/<?php echo $showMassage->friend_user_id ?>/massages"
                                    class="list-group-item list-group-item-action border-0 selected">
                                    <!-- <div class="badge bg-success text-white float-right">5</div> -->
                                    <div class="d-flex align-items-center">
                                         <img src="<?php echo base_url(); ?>assets/uploads/profile_photo/<?php echo !empty($showMassage->friend_profile_photo) ? $showMassage->friend_profile_photo :'no-file.png'  ?>"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">
                                                    <?php echo $showMassage->friend_first_name . ' ' . $showMassage->friend_last_name ?>
                                                </h6>
                                                <small
                                                    class="time mt-1 ml-3"><?php echo $newDateTime = date('h:i A', strtotime($showMassage->created_on)); ?></small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0"><?php echo $showMassage->message ?></p>
                                                <?php  if($userLoginInfo['user_id'] != $showMassage->from_user){  ?>
                                                 <small class="mt-1 ml-3"><i
                                                        class="<?php echo $showMassage->seen_class ?>"></i></small>
                                                <?php  }else if($userLoginInfo['user_id'] == $showMassage->to_user){ ?>  
                                                    <small class="mt-1 ml-3"><i
                                                    class="<?php echo $showMassage->seen_class ?>"></i></small> 
                                                <?php  } ?>    
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php }} else {?>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ml-3">
                                        <div class="d-flex justify-content-between text-center">
                                            No Data Found
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8">
                        <div class="card border-bottom">
                            <div class="card-header bg-white">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="<?php echo base_url(); ?>assets/uploads/profile_photo/<?php echo !empty($friendName->profile_photo) ? $friendName->profile_photo :'no-file.png'?>"
                                            class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong>
                                            <?php echo $friendName->first_name . ' ' . $friendName->last_name ?>
                                        </strong>
                                        <!-- <div class="text-muted small"><em>Typing...</em></div> -->
                                    </div>
                                    <div>
                                        <!-- <button class="btn btn-success rounded-pill py-2 mr-1">
                                            <i class="fa fa-phone fa-rotate-90"></i>
                                        </button>
                                        <button class="btn btn-info rounded-pill py-2 mr-1  d-none d-md-inline-block">
                                            <i class="fa fa-video"></i>
                                        </button> -->
                                        <div class="dropdown d-inline-block">
                                            <button
                                                class="btn btn-warning btn-sm border-0 rounded-pill px-3 dropdown-toggle"
                                                type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-info text-white fs_16"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="chat-messages position-relative">
                                    <?php
if (!empty($form_massage)) {
    $i = 1;
    foreach ($form_massage as $object) {
        ?>
                                    <div
                                        class="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'chat-message-right' : "chat-message-left" ?> mb-4">
                                    <?php if($userLoginInfo['user_id'] === $object->from_user){  ?>
                                        <?php if($object->delete_status == 0){  ?>       
                                        <div class="inner">
                                            <div class="user-area">
                                                <img src="<?php echo getUserProfilePhoto($object->from_photo); ?>"
                                                    class="img-fluid rounded-circle profile-img mr-1"
                                                    alt="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'You' : $object->from_name; ?>"
                                                    width="40" height="40">
                                            </div>
                                            <div class="user-message">
                                                <div class="message-box position-relative">
                                                    <div class="emoji-area d-none"
                                                        id="showAction-<?php echo $object->id ?>">
                                                        <input type="text" class="emojionearea" id="emojionearea" />
                                                    </div>
                                                    <div class="font-weight-bold mb-1 d-none">
                                                        <a
                                                            href="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? "javascript:void(0)" : base_url("user/friends/details/" . $object->from_user) ?>">
                                                            <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'You' : $object->from_name; ?></a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <div id="massage_id-<?php echo $object->id ?>"
                                                            class="text-wrap dropdown-toggle p-2 px-3 massage_id<?php echo $i; ?> status"
                                                            massage-id="<?php echo $object->id ?>"
                                                            form-user="<?php echo $userLoginInfo['user_id'] ?>"
                                                            to-user="<?php echo $object->to_user ?>"
                                                            form-userss="<?php echo $object->from_status ?>"
                                                            to-userss="<?php echo $object->to_status ?>"
                                                            from-status="<?php echo $object->from_user ?>"
                                                            to-status="<?php echo $object->to_user ?>"
                                                            data-user-type="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'from_user' : 'to_user' ?>"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">

                                                            <?php if ($object->msg_type == 'msg') {?>
                                                              <p class="mb-0 fs_14 lh_20   <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'form_massage_edit'  : "to_massage_edit"?>" <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'id='.$object->id.'' : "to_massage_edit"?> >
                                                                 <?php echo $object->message  ?>  
                                                              </p>
                                                            <?php } else if ($object->msg_type == 'img') {?>
                                                            <a href="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                data-fancybox data-caption="Massage image">
                                                                <img src="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                    class="img-fluid img-preview b_radius_6">
                                                            </a>
                                                            <?php }?>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right bg-dark"
                                                            aria-labelledby="massage_id-<?php echo $object->id ?>">
                                                            <ul class="list-unstyled">
                                                                <li><button class="btn btn-link dropdown-item massage" data-id="<?php echo $object->id ?>" data-msg="<?php echo $object->message  ?>">Edit</button></li>  
                                                                <li><button class="btn btn-link dropdown-item deleteMe" 
                                                                        data-toggle="modal"
                                                                        data-target="#delete-conversation">Delete for
                                                                        me</button>
                                                                </li>
                                                                <li><button class="btn btn-link dropdown-item deleteMeBoth"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-both-conversation"
                                                                       >Delete for
                                                                        both</button></li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <span class="icon-emoji position-absolute"><img
                                                            src="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? $object->emoji : $object->toEmoji; ?>"
                                                            alt="" class="img-fluid"></span>
                                                </div>
                                                <div class="meta-info text-nowrap mt-2">
                                                    <small><?php echo $newDateTime = date('h:i A', strtotime($object->created_on)); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>  
                                        <?php }else if($userLoginInfo['user_id'] === $object->to_user){  ?>
                                            <div class="inner">
                                            <div class="user-area">
                                                <img src="<?php echo getUserProfilePhoto($object->from_photo); ?>"
                                                    class="img-fluid rounded-circle profile-img mr-1"
                                                    alt="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'You' : $object->from_name; ?>"
                                                    width="40" height="40">
                                            </div>
                                            <div class="user-message">
                                                <div class="message-box position-relative">
                                                    <div class="emoji-area d-none"
                                                        id="showAction-<?php echo $object->id ?>">
                                                        <input type="text" class="emojionearea" id="emojionearea" />
                                                    </div>
                                                    <div class="font-weight-bold mb-1 d-none">
                                                        <a
                                                            href="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? "javascript:void(0)" : base_url("user/friends/details/" . $object->from_user) ?>">
                                                            <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'You' : $object->from_name; ?></a>
                                                    </div>
                                                    
                                                    <div class="dropdown">
                                                        <div id="massage_id-<?php echo $object->id ?>"
                                                            class="text-wrap dropdown-toggle p-2 px-3 massage_id<?php echo $i; ?> status"
                                                            massage-id="<?php echo $object->id ?>"
                                                            form-user="<?php echo $userLoginInfo['user_id'] ?>"
                                                            to-user="<?php echo $object->to_user ?>"
                                                            form-userss="<?php echo $object->from_status ?>"
                                                            to-userss="<?php echo $object->to_status ?>"
                                                            from-status="<?php echo $object->from_user ?>"
                                                            to-status="<?php echo $object->to_user ?>"
                                                            data-user-type="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'from_user' : 'to_user' ?>"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">

                                                            <?php if ($object->msg_type == 'msg') {?>
                                                              <p class="mb-0 fs_14 lh_20  <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'form_massage_edit' : "to_massage_edit"?>" <?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'id='.$object->id.'' : "to_massage_edit"?> >
                                                                <?php if($userLoginInfo['user_id'] === $object->from_user){  ?>
                                                                   <?php if($object->delete_status == 0){  ?>
                                                                      
                                                                      <?php echo $object->message  ?>
                                                                   <?php }  ?>   
                                                                <?php }else if($userLoginInfo['user_id'] === $object->to_user){  ?>
                                                                   <?php echo $object->message ?>
                                                                <?php }  ?>    
                                                            </p>
                                                            <?php } else if ($object->msg_type == 'img') {?>
                                                            <a href="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                data-fancybox data-caption="Massage image">
                                                                <img src="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                    class="img-fluid img-preview b_radius_6">
                                                            </a>
                                                            <?php }?>
                                                        </div>
                                                    <?php if($userLoginInfo['user_id'] === $object->from_user){  ?>  
                                                        <div class="dropdown-menu dropdown-menu-right bg-dark"
                                                            aria-labelledby="massage_id-<?php echo $object->id ?>">
                                                            <ul class="list-unstyled">
                                                                <li><p class="dropdown-item massage">Edit</p></li>  
                                                                <li><p class="dropdown-item deleteMe" 
                                                                        data-toggle="modal"
                                                                        data-target="#delete-conversation">Delete for
                                                                        me</p>
                                                                </li>
                                                                <li><p class="dropdown-item deleteMeBoth"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-both-conversation"
                                                                       >Delete for
                                                                        both</p></li>
                                                            </ul>
                                                        </div>
                                                    <?php  } ?>     
                                                    </div>

                                                    <span class="icon-emoji position-absolute"><img
                                                            src="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? $object->emoji : $object->toEmoji; ?>"
                                                            alt="" class="img-fluid"></span>
                                                </div>
                                                <div class="meta-info text-nowrap mt-2">
                                                    <small><?php echo $newDateTime = date('h:i A', strtotime($object->created_on)); ?></small>
                                                </div>
                                            </div>
                                        </div> 
                                            


                                        <?php }  ?>    
                                    </div>
                                    <?php $i++?>
                                    <?php
}
} else {?>
                                    <div>
                                        <p class="text-center">No chat found</p>
                                    </div>
                                    <?php }?>
                                </div>
                                <input type="hidden" class="msgid" value="">
                                <div class="flex-grow-0 pt-4 file-upload-area">
                                    <?php echo form_open_multipart('favoritewish/messageFormSubmission'); ?>
                                    <div class="position-relative addClass">
                                        <div class="custom-file chatroom-file-upload fileHide">
                                            <input type="file" name="msg_image" class="custom-file-input fileClick"
                                                id="customFile"
                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="customFile"><i
                                                    class="fa fa-paperclip"></i></label>
                                        </div>
                                        <div class="input-box">
                                            <img id="blah" class="img-thumbnail img-fluid show d-none" />
                                            <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
                                            <input type="text" class="form-control messageClick px-5" name="message"
                                                placeholder="Type your message">
                                        </div>
                                        <button type="submit" class="theme-btn yellow-bg"><i
                                                class="fa fa-paper-plane"></i></button>
                                                
                                    </div>
                                    <?php echo form_close(); ?>
                                    
                                    <div class="position-relative removeClass d-none">
                                        <div class="input-box">
                                            <input type="text" class="form-control" id="show_msg">
                                        </div>
                                        <button type="submit" class="theme-btn yellow-bg updateMassage"><i
                                                class="fa fa-paper-plane"></i></button>
                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Delete me  Conversation -->
<div class="modal style2 fade" id="delete-conversation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pt-4 pb-0 text-center">
                <div
                    class="icon-container w_60 h_60 rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-3">
                    <i class="fa fa-trash-alt text-white fs_25"></i>
                </div>
                <h5 class="mb-0">Delete the conversation</h5>
                <p>Are you sure want to delete this conversation?</p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-danger px-4 px-md-5 deleteMeMassage" id="show_deleteme_id">Yes</button>
                <button type="button" class="btn btn-light px-4 px-md-5" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Conversation -->

<!-- Delete Both  Conversation -->
<div class="modal style2 fade" id="delete-both-conversation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pt-4 pb-0 text-center">
                <div
                    class="icon-container w_60 h_60 rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-3">
                    <i class="fa fa-trash-alt text-white fs_25"></i>
                </div>
                <h5 class="mb-0">Delete the conversation</h5>
                <p>Are you sure want to delete this conversation?dddd</p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-danger px-4 px-md-5 deleteMassageForBoth" id="show_delete_id">Yes</button>
                <button type="button" class="btn btn-light px-4 px-md-5" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Conversation -->