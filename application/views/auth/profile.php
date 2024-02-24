<section class="fav-profile-section">
    <div class="profile-banner">
    <?php 
        $coverImage = $userInfo['cover_photo']; 
        if(file_exists(FCPATH.'assets/uploads/cover_photo/'.$userInfo['cover_photo']) && !empty($userInfo['cover_photo'])){  ?>
            <img src="<?php echo base_url().'assets/uploads/cover_photo/'.$coverImage;?>" alt="" class="img-fluid">
            <?php }else{  ?>
                <img src="<?php echo base_url(); ?>assets/images/site-image/profile-banner-1.png" alt="" class="img-fluid">
        <?php  } ?>
        
    </div>
    <div class="hero-title-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="profile-picture">
                        <!--<img src="assets/images/site-image/avatar.png" alt="" class="img-thumbnail img-fluid">-->
                        <?php 
                        $profileImage = $userInfo['profile_photo']; 
                        if(file_exists(FCPATH.'assets/uploads/profile_photo/'.$userInfo['profile_photo']) && !empty($userInfo['profile_photo'])){  ?>
                            <object type="image/svg+xml" data="<?php echo base_url().'assets/uploads/profile_photo/'.$profileImage;?>"></object>
                         <?php }else{  ?>
                             <object type="image/svg+xml" data="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"></object>
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
                        <a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn yellow-bg">Back to
                            Dashboard</a>
                        <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding profile-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->load->view('front/template/template_profile_sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <div class="myaccountForm-inner">
                    <div class="card bg-light border-0 user-profile">
                        <div class="card-body">
                            <h2>Overview</h2>
                            <?php print $userInfo['user_bio']; ?>
							<ul class="list-unstyled">
								<?php if(!empty($userInfo['email'])){ ?>
									<li><span>Email Address</span> <?php print $userInfo['email']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['contact_no'])) { ?>
									<li><span>Phone:</span> <?php print $userInfo['contact_no']; ?></li> 
								<?php } ?>
								<?php  if(!empty($userInfo['user_type'])) { ?> 
									<li><span>User Type</span> <?php print $userInfo['user_type']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['company'])) { ?> 
									<li><span>Designation</span> <?php print $userInfo['company']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['address'] && $userInfo['city'] &&  $userInfo['state'])){ ?>
									<li><span>Address</span> <?php print $userInfo['address']; ?>, <?php print $userInfo['city']; ?>,
									<?php print $userInfo['state']; ?>, <?php print $userInfo['zip']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['favorite_country'])) { ?> 
									<li><span>Favorite Country</span><?php print $userInfo['favorite_country']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['favoripublic_outfit_wear'])){ ?> 
									<li><span>Favoripublic Outfit Wear</span><?php print $userInfo['favoripublic_outfit_wear']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['favorite_sports_teams'])) {  ?> 
									<li><span>Favorite Sports Teams</span> <?php print $userInfo['favorite_sports_teams']; ?></li> 
								<?php  } ?>
								<?php if(!empty($userInfo['favorite_music'])) {  ?> 
									<li><span>Favorite Music</span><?php print $userInfo['favorite_music']; ?></li>
								<?php  } ?>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>