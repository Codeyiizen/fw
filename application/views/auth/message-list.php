<style>
    .custom-file.chatroom-file-upload input[type="file"] {
        display: none;
    }
 
    .chatroom-file-upload .custom-file-label {
        cursor:pointer;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        line-height: 2.5;
        text-align: center;
        left: auto;
    }

    .chatroom-file-upload .custom-file-input:lang(en) ~ .custom-file-label::after{
      display:none;
    }

    .chat-messages .img-preview,
    .input-group .img-thumbnail{
        max-height: 45px;
        object-fit: contain;
    }

    .input-group .img-thumbnail{
        margin-top: 2px;
    }

    @media screen and (max-width:575px){
        .input-group .form-control, .chatroom-file-upload .custom-file-label{
           height: 40px;
        }

        .chatroom-file-upload .custom-file-label{
            width:40px;
        line-height: 1.5;
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
            <div class="card chat-room">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="py-2 px-4 border-bottom d-none">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"
                                        class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong>Sharon Lessman</strong>
                                    <div class="text-muted small"><em>Typing...</em></div>
                                </div>
                                <div>
                                    <button class="btn btn-success rounded-pill py-2 mr-1">
                                        <i class="fa fa-phone fa-rotate-90"></i>
                                    </button>
                                    <button class="btn btn-info rounded-pill py-2 mr-1  d-none d-md-inline-block">
                                        <i class="fa fa-video"></i>
                                    </button>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light border rounded-pill px-3 dropdown-toggle"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="chat-messages p-4">
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
                                                class="img-fluid rounded-circle profile-img mr-1" alt="Chris Wood"
                                                width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">
                                                <?php echo $newDateTime = date('h:i A', strtotime($object->created_on));  ?>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light position-relative rounded py-2 px-3">
                                            <div class="emoji-area  d-none"
                                                id="showAction-<?php echo $object->id  ?>">
                                                <input type="text" class="emojionearea"  id="emojionearea" />
                                            </div>
                                              <div class="font-weight-bold mb-1">
                                                <a href="<?php echo ($userLoginInfo['user_id'] === $object->from_user)?"javascript:void(0)":base_url("user/friends/details/".$object->from_user) ?>">
                                                    <?php echo ($userLoginInfo['user_id'] === $object->from_user) ?'You':$object->from_name; ?></a>
                                               </div>
                                                  
                                                <div id="massage_id-<?php echo $object->id  ?>" class="massage_id<?php echo $i; ?> status"
                                                    massage-id="<?php echo $object->id  ?>"  form-user="<?php echo $userLoginInfo['user_id']  ?>" to-user ="<?php echo $object->to_user  ?>"  form-userss="<?php echo $object->from_status ?>" to-userss="<?php echo $object->to_status ?>"
                                                    from-status="<?php echo $object->from_user  ?>" to-status="<?php echo $object->to_user  ?>"  data-user-type="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? 'from_user':'to_user'?>" >
                                                    
                                                    <?php if($object->msg_type == 'msg'){  ?>
                                                       <?php echo $object->message  ?>  
                                                   <?php    }else if($object->msg_type == 'img'){  ?>
                                                    <a href="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>" data-fancybox data-caption="Massage image">
                                                    <img src="<?php echo base_url() . 'assets/uploads/massge_photo/' . $object->msg_image; ?>"class="img-fluid img-preview">
                                                            </a>
                                                    <?php  } ?>
                                               </div> 
                                            <span class="icon-emoji position-absolute"><img src="<?php echo ($userLoginInfo['user_id'] === $object->from_user) ? $object->emoji:$object->toEmoji;?>" alt="" class="img-fluid"></span>
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
                        </div>
                        <div class="flex-grow-0 py-3 px-2 px-sm-4 border-top">
                            <?php echo form_open_multipart('favoritewish/messageFormSubmission'); ?>
                            <div class="row">
                                <div class="col-md-1 col-3 fileHide">
                                    <div class="custom-file chatroom-file-upload">
                                        <input type="file" name="msg_image" class="custom-file-input fileClick" id="customFile" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="customFile"><i class="fa fa-upload"></i></label>
                                    </div>
                                </div>
                                <div class="col-md-11 col-9 pl-0">
                                    <div class="input-group">                                        
                                         <img id="blah"  class="img-thumbnail img-fluid show d-none" />
                                        <input type="hidden" name="friend_id" value="<?php echo $friend_id;  ?>">
                                        <input type="text" class="form-control rounded-pill messageClick" name="message"
                                            placeholder="Type your message">
                                        <button type="submit" class="theme-btn yellow-bg ml-3 px-3 px-sm-4">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>