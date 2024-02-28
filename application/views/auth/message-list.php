<section class="fav-profile-section">
    <div class="profile-banner">
        <img src="<?php echo base_url(); ?>assets/images/site-image/profile-banner-1.png" alt="" class="img-fluid">
    </div>
    <div class="hero-title-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="profile-picture">
                        <!--<img src="assets/images/site-image/avatar.png" alt="" class="img-thumbnail img-fluid">-->
                        <object type="image/svg+xml"
                            data="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"></object>
                        <div class="profile-name">
                            <h3><?php print $userInfo['full_name']; ?></h3>
                            <h5><?php print $userInfo['company']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="update-profile text-right">
                        <!--<a href="#" class="theme-btn yellow-bg">Edit Profile</a>-->
                        <!-- <a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn yellow-bg">Back to Dashboard</a> -->
                        <!-- <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a> -->
                        <?php if (empty($is_friend)) { ?>
                        <button type="button" class="theme-btn yellow-bg sendFriendRequest"
                            data-token="<?php echo $userInfo['token'] ?>">Add Friend</button>
                        <?php } else if (!empty($is_friend) && $is_friend['status'] == 0) {
							if ($is_friend['to_friend'] == $userLoginInfo['user_id']) {
							?>
                        <button type="button" class="theme-btn yellow-bg acceptFriendRequest bg-success"
                            data-token="<?php echo $userInfo['token'] ?>">Accept</button>
                        <?php } else { ?>
                        <button type="button" class="theme-btn yellow-bg removeFriend bg-danger"
                            data-token="<?php echo $userInfo['token'] ?>">Cancel</button>
                        <?php }
						} else if (!empty($is_friend) && $is_friend['status'] == 1) { ?>
                        <button type="button" class="theme-btn red-btn px-4 mr-0 bg-danger removeFriend"
                            data-token="<?php echo $userInfo['token'] ?>">Unfriend</button>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <option <?php echo (!empty($get['cat']) && $get['cat']==$cat->id)?"selected":'' ?>
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
                                <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"
                                            class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">You</div>
                                        <?php  
                                           foreach ($form_massage as $object) {  ?>
                                            <span><?php echo $object->message   ?></span> <br>
                                       <?php } ?>
                                    </div>
                                </div>

                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"
                                            class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                        Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-0 py-3 px-4 border-top">
                        <?php echo form_open('favoritewish/messageFormSubmission'); ?>
                            <div class="input-group">
                                <input type="hidden" name="friend_id" value="<?php echo $friend_id;  ?>">
                                <input type="text" class="form-control rounded-pill" name="message" placeholder="Type your message">
                                <button type="submit" class="theme-btn yellow-bg ml-3">Send</button>
                            </div>
                        </div>
                       <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>