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
                        <object type="image/svg+xml" data="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"></object>
                        <div class="profile-name">
                            <h3><?php print $userInfo['full_name']; ?></h3>
                            <h5><?php print $userInfo['company']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="update-profile text-right">
                        <!--<a href="#" class="theme-btn yellow-bg">Edit Profile</a>-->
                        <a href="<?php echo base_url(); ?>user-profile" class="theme-btn outline-btn">View Profile</a>
                        <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <?php $this->load->view('user/Common/userSider'); ?>
            <div class="col-lg-9">
                <form>
                    <div class="form-group searchbar">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" name="q" id="form1" class="form-control rounded-pill py-2 pl-4" placeholder="Search..." value="<?php echo (!empty($get['q'])) ? $get['q'] : ''; ?>" />
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill rounded-left-0 px-3" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="profile-content-inner">
                    <div class="added-wishes">
                        <div class="row">
                            <?php if (!empty($userData)) {
                                foreach ($userData as $data) {
                            ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card mb-4">
                                         <a href="<?php echo base_url(); ?>user/friends/details/<?php echo $data->id;?>"> 
                                            <img class="card-image box-shadow3" src="<?php echo base_url(); ?>assets/images/site-image/banner-bg.png" alt="">
                                        </a>  
                                            <div class="card-body p-4">
                                                <h5 class="card-title"><?php echo $data->first_name . " " . $data->last_name; ?></h5>
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