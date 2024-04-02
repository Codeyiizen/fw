<div class="profile-banner">
    <?php 
        $coverImage = $userInfo['cover_photo']; 
        if(file_exists(FCPATH.'assets/uploads/cover_photo/'.$userInfo['cover_photo']) && !empty($userInfo['cover_photo'])){  ?>
            <img class="user-banner" src="<?php echo base_url().'assets/uploads/cover_photo/'.$coverImage;?>" alt="" class="img-fluid" >
            <?php }else{  ?>
                <img class="user-banner" src="<?php echo base_url(); ?>assets/images/site-image/profile-banner-1.png" alt="" class="img-fluid">
        <?php  } ?>
    </div>
<div class="hero-title-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-6 mb-3 mb-sm-5 mb-md-0">
                <div class="profile-picture">
                    <?php   ?>
                    <!--<img src="assets/images/site-image/avatar.png" alt="" class="img-thumbnail img-fluid">-->
                    <?php
                    $profileImage = $userInfo['profile_photo'];
                    if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $userInfo['profile_photo']) && !empty($userInfo['profile_photo'])) {  ?>
                    <img src="<?php echo base_url() . 'assets/uploads/profile_photo/' . $profileImage; ?>" alt="" class="user-thumb img-thumbnail img-fluid">
                    <?php } else {  ?>
                        <img src="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg" alt="" class="user-thumb img-thumbnail img-fluid">
                    <?php  } ?>
                    <div class="profile-name">
                        <h3 class="mb-md-0"><?php print $userInfo['full_name']; ?></h3>
                        <h5><?php print $userInfo['company']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 mt-5 mt-md-0">
                <div class="update-profile text-center text-md-right">
                    <!--<a href="#" class="theme-btn yellow-bg">Edit Profile</a>-->
                    <?php $uri = uri_string(); $arrCheck = ['user-profile','user-profile/edit','setting']; ?>
                    <?php if(in_array($uri,$arrCheck)){ ?>
                        <a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn outline-btn mb-3 mb-lg-0">Dashboard</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>user-profile" class="theme-btn outline-btn mb-3 mb-lg-0">View Profile</a>
                    <?php } ?>
                    <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>