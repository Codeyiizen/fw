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
    padding-left: 2.5rem;
}

.search-form .search-icon {
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
    background-color:transparent;
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
    right: 1rem;
}

.chat-room .theme-btn,
.chat-room .chatroom-file-upload,
.search-form .search-icon {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
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
    <?php $this->load->view('user/Common/friend-banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeaderFriends', array('data' => $user_profile_id, 'is_friend' => $is_friend)) ?>
        <div class="profile-content-inner  d-none">
            <div class="form-group p-0 col-5">
                <select class="form-control form-select form-select-lg mb-3 filter_by_cat_wish"
                    data-id="<?php echo $user_profile_id;  ?>" aria-label="Default select example">
                    <option value="">Filter By Category</option>
                    <?php if (!empty($categories)) {
                        foreach ($categories as $cat) {
                    ?>
                    <option <?php echo (!empty($get['cat']) && $get['cat'] == $cat->id) ? "selected" : '' ?>
                        value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="added-wishes">
                <div class="row">
                    <?php
                    $i = 0;
                    foreach ($wishInfo as $wishInfos) {
                        $i = $i + 1;
                        $CI = &get_instance();
                        $CI->load->model('Favoritewish_Model');
                        $getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type);
                        $subCatName = !empty($getObjssubCat->name) ? $getObjssubCat->name : '';
                    ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="card bg-gradient-<?php echo $i; ?> border-0 mb-4">
                            <div class="card-body">
                                <h5 class="mb-1"><strong>Wish - </strong>
                                    <?php print_r($wishInfos->cat_name); ?></h5>
                                <p class="mb-1 font-weight-semibold font-italic">Details - </p>
                                <ul class="list-unstyled font-italic text-capitalize mb-0">
                                    <?php if (!empty($subCatName)) { ?>
                                    <li>Type - <?php echo $subCatName; ?></li>
                                    <?php } ?>
                                    <li>Brand - <?php print_r($wishInfos->brand); ?></li>
                                    <li>Color - <?php print_r($wishInfos->color); ?></li>
                                    <li>Size - <?php print_r($wishInfos->size); ?></li>
                                    <li>Style - <?php print_r($wishInfos->style); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="profile-content-inner">
            <div class="chat-room">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body p-0 pb-1">
                                <div class="px-4 pt-3">
                                    <h5>Messages</h5>
                                    <div class="search-form">
                                        <i class="fa fa-search search-icon"></i>
                                        <input type="text" class="form-control my-3" placeholder="Search...">
                                    </div>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action border-0 selected">
                                    <!-- <div class="badge bg-success text-white float-right">5</div> -->
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar3.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Jane Carr</h6>
                                                <small class="time mt-1 ml-3">11:54am</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">I can't join, sorry! Have fun!</p>
                                                <small class="mt-1 ml-3"><i
                                                        class="fas fa-circle text-danger"></i></small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar2.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Mike Smith</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">Thanks, I can't wait to see you tomorrow for
                                                    coffee!</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar3.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Angel Lubin</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">No</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0 selected">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar4.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Kaiya Levin</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">Have you seen Janes new dog??????</p>
                                                <small class="mt-1 ml-3"><i
                                                        class="fas fa-circle text-danger"></i></small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar5.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Phillip Aminoff</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">I know! Where is the time going?!</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar2.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Mariya Carder</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">Too freaking cute!!! I love puppies!</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar4.png"
                                            class="rounded-circle mr-1" alt="Image" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Haylie Schleifer</h6>
                                                <small class="time mt-1 ml-3">11:22pm</small>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="fs_14 lh_16 mb-0">Too freaking cute!!! I love puppies!</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8">
                        <div class="card border-bottom">
                            <div class="card-header bg-white">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/avatar3.png"
                                            class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong>Rahul U.p</strong>
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
                                        if(!empty($form_massage)){   
                                        $i = 1;   
                                        foreach ($form_massage as $object) { 
                                            ?>
                                    <div
                                        class="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ?'chat-message-right':"chat-message-left" ?> mb-4">

                                        <div class="inner">
                                            <div class="user-area">
                                                <img src="<?php echo getUserProfilePhoto($object->from_photo); ?>"
                                                    class="img-fluid rounded-circle profile-img mr-1"
                                                    alt="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ?'You':$object->from_name; ?>"
                                                    width="40" height="40">
                                            </div>
                                            <div class="user-message">
                                                <div class="message-box position-relative">
                                                    <div class="emoji-area d-none"
                                                        id="showAction-<?php echo $object->id  ?>">
                                                        <input type="text" class="emojionearea" id="emojionearea" />
                                                    </div>
                                                    <div class="font-weight-bold mb-1 d-none">
                                                        <a
                                                            href="<?php echo ($userLoginInfo['user_id'] === $object->from_user)?"javascript:void(0)":base_url("user/friends/details/".$object->from_user) ?>">
                                                            <?php echo ($userLoginInfo['user_id'] === $object->from_user) ?'You':$object->from_name; ?></a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <div id="massage_id-<?php echo $object->id ?>"
                                                            class="text-wrap dropdown-toggle p-2 px-3 massage_id<?php echo $i; ?> status"
                                                            massage-id="<?php echo $object->id  ?>"
                                                            form-user="<?php echo $userLoginInfo['user_id']  ?>"
                                                            to-user="<?php echo $object->to_user  ?>"
                                                            form-userss="<?php echo $object->from_status ?>"
                                                            to-userss="<?php echo $object->to_status ?>"
                                                            from-status="<?php echo $object->from_user  ?>"
                                                            to-status="<?php echo $object->to_user  ?>"
                                                            data-user-type="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'from_user':'to_user'?>"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">

                                                            <?php if($object->msg_type == 'msg'){  ?>
                                                            <p class="mb-0 fs_14 lh_20"><?php echo $object->message  ?>
                                                            </p>
                                                            <?php    }else if($object->msg_type == 'img'){  ?>
                                                            <a href="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                data-fancybox data-caption="Massage image">
                                                                <img src="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"
                                                                    class="img-fluid img-preview b_radius_6">
                                                            </a>
                                                            <?php  } ?>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right bg-dark"
                                                            aria-labelledby="massage_id-<?php echo $object->id ?>">
                                                            <ul class="list-unstyled">
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-conversation">Delete for
                                                                        me</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Delete for
                                                                        both</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <span class="icon-emoji position-absolute"><img
                                                            src="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? $object->emoji:$object->toEmoji;?>"
                                                            alt="" class="img-fluid"></span>
                                                </div>
                                                <div class="meta-info text-nowrap mt-2">
                                                    <small><?php echo $newDateTime = date('h:i A', strtotime($object->created_on));?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  $i++ ?>
                                    <?php  } } else { ?>
                                    <div>
                                        <p class="text-center">No chat found</p>
                                    </div>
                                    <?php } ?>
                                </div>
                                <input type="hidden" class="msgid" value="">
                                <div class="flex-grow-0 pt-4 file-upload-area">
                                    <?php echo form_open_multipart('favoritewish/messageFormSubmission'); ?>
                                    <div class="position-relative">
                                        <div class="custom-file chatroom-file-upload fileHide">
                                            <input type="file" name="msg_image" class="custom-file-input fileClick"
                                                id="customFile"
                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="customFile"><i
                                                    class="fa fa-paperclip"></i></label>
                                        </div>
                                        <div class="input-box">
                                            <img id="blah" class="img-thumbnail img-fluid show d-none" />
                                            <input type="hidden" name="friend_id" value="<?php echo $friend_id;  ?>">
                                            <input type="text" class="form-control messageClick px-5" name="message"
                                                placeholder="Type your message">
                                        </div>
                                        <button type="submit" class="theme-btn yellow-bg"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Delete Conversation -->
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
                <button type="button" class="btn btn-danger px-4 px-md-5">Yes</button>
                <button type="button" class="btn btn-light px-4 px-md-5" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Conversation -->