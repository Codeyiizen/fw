<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <?php $this->load->view('user/Common/userSider'); ?>
            <div class="col-lg-9">
                <form>
                    <div class="form-group searchbar">
                    <div class="input-group justify-content-center justify-content-md-end">
                            <div class="form-outline">
                                <input type="search" name="q" id="form1" class="form-control rounded-pill py-2 pl-4" placeholder="Search..." value="<?php echo (!empty($get['q'])) ? $get['q'] : ''; ?>" />
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill rounded-left-0 px-3" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <span id="success_message"></span>
                <div class="profile-content-inner">
                    <div class="added-wishes">
                        <div class="row">
                            <?php if (!empty($userData)) {
                                foreach ($userData as $data) {
                            ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card mb-4 text-center">
                                            <a href="<?php echo base_url(); ?>user/friends/details/<?php echo $data->id; ?>">
                                                <?php
                                                $coverImage = $data->profile_photo;
                                                if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $data->profile_photo) && !empty($data->profile_photo)) {  ?>
                                                    <img class="user-banner" src="<?php echo base_url() . 'assets/uploads/profile_photo/' . $coverImage; ?>" alt="" class="img-fluid">
                                                <?php } else {  ?>
                                                    <img class="user-banner" src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="" class="img-fluid">
                                                <?php  } ?>
                                            </a>
                                            <div class="card-body p-4">
                                                <h5 class="card-title text-capitalize"><?php echo $data->first_name . " " . $data->last_name; ?></h5>
                                                <?php if ($data->from_friend == $userInfo['user_id']) {
                                                    if ($data->friends_status == 0) {

                                                ?>
                                                        <button type="button" class="theme-btn red-btn px-4 mr-0 bg-danger cancelFriend" data-token="<?php echo $data->token; ?>">Cancel Request</button>
                                                    <?php }
                                                    if ($data->friends_status == 1) {
                                                    ?>
                                                        <button type="button" class="theme-btn red-btn px-4 mr-0 bg-danger removeFriend" data-token="<?php echo $data->token; ?>">Unfriend</button>
                                                    <?php }
                                                } else if ($data->to_friend == $userInfo['user_id']) {
                                                    if ($data->friends_status == 0) {

                                                    ?>
                                                        <div class="btn-group w-100">
                                                            <button type="button" class="theme-btn yellow-bg px-3 mr-0 acceptFriendRequest bg-success w-50" data-token="<?php echo $data->token; ?>">Confirm</button>
                                                            <button type="button" class="theme-btn yellow-bg px-3 mr-0 declineFriend bg-danger w-50" data-token="<?php echo $data->token; ?>">Delete</button>
                                                        </div>
                                                    <?php }
                                                    if ($data->friends_status == 1) { ?>
                                                        <button type="button" class="theme-btn red-btn px-4 mr-0 bg-danger removeFriend" data-token="<?php echo $data->token; ?>">Unfriend</button>
                                                    <?php }
                                                } else {  ?>
                                                    <button type="button" class="theme-btn yellow-bg px-4 mr-0 sendFriendRequest" data-token="<?php echo $data->token; ?>">Add Friend</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php  }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>