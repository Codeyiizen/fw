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
            <div class="col-md-6">
                <div class="profile-picture">
                    <?php   ?>
                    <!--<img src="assets/images/site-image/avatar.png" alt="" class="img-thumbnail img-fluid">-->
                    <?php
                    $profileImage = $userInfo['profile_photo'];
                    if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $userInfo['profile_photo']) && !empty($userInfo['profile_photo'])) {  ?>
                        <object class="user-thumb" type="image/svg+xml" data="<?php echo base_url() . 'assets/uploads/profile_photo/' . $profileImage; ?>"></object>
                    <?php } else {  ?>
                        <object type="user-thumb" data="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"></object>
                    <?php  } ?>
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