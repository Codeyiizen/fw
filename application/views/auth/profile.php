<section class="fav-profile-section">
<?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
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
								<!-- <?php if(!empty($userInfo['email'])){ ?>
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
								<?php } ?> -->
								<?php if(!empty($userInfo['full_name'])) { ?> 
									<li><span>Full Name</span> <?php print $userInfo['full_name']; ?></li> 
								<?php } ?> 
								<?php if(!empty($userInfo['birthday'])) { ?> 
									<li><span>Date of Birth</span> <?php print $userInfo['birthday']; ?></li> 
								<?php } ?> 
								<?php if(!empty($userInfo['address'] && $userInfo['city'] &&  $userInfo['state'])){ ?>
									<li><span>Address</span> <?php print $userInfo['address']; ?>, <?php print $userInfo['city']; ?>,
									<?php print $userInfo['state']; ?>, <?php print $userInfo['zip']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['favorite_country'])) { ?> 
									<li><span>Favorite Country</span><?php print $userInfo['favorite_country']; ?></li> 
								<?php } ?>
								<?php if(!empty($userInfo['favoripublic_outfit_wear'])){ ?> 
									<li><span>Favorite Public Outfit Wear</span><?php print $userInfo['favoripublic_outfit_wear']; ?></li> 
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