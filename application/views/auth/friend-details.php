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
        <div class="row">
            <!-- <div class="col-lg-3">
				<?php $this->load->view('front/template/template_profile_sidebar'); ?>
			</div> -->
            <div class="col-lg-12">
                <div class="myaccountForm-inner">
                    <div class="card bg-light border-0 p-4">
                        <h2>Profile Overview</h2>
                        <?php print $userInfo['user_bio']; ?>
                        <table class="responsive">
                            <table class="table table-sm">
                                <tr>
                                    <th>Full Name</th>
                                    <td>Rahul Up</td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td>10 June 2001</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <th>Favorite Country</th>
                                    <td>Londan</td>
                                </tr>
                                <tr>
                                    <th>Favorite public outfit to wear</th>
                                    <td>Formal t-shirt</td>
                                </tr>
                                <tr>
                                    <th>Favorite Sports Teams</th>
                                    <td>CSK</td>
                                </tr>
                                <tr>
                                    <th>Favorite Music</th>
                                    <td>Pop Song</td>
                                </tr>
                            </table>
                        </table>
                        <!-- <?php //if (!empty($userInfo['first_name'])) { ?> <p>Full Name: -->
                        <?php //print $userInfo['first_name']; ?> <?php //print $userInfo['last_name']; ?></p>
                        <?php //} ?>
                        <?php if (!empty($userInfo['birthday']) && !empty($is_friend)) { ?> <p>Birthday:
                            <?php print $userInfo['birthday']; ?></p> <?php } ?>
                        <?php if (!empty($userInfo['gender']) && !empty($is_friend)) { ?><p>Gender :
                            <?php print $userInfo['gender']; ?></p><?php  } ?>
                        <?php if (!empty($userInfo['favorite_country']) && !empty($is_friend)) { ?> <p>Favorite Country:
                            <?php print $userInfo['favorite_country']; ?></p> <?php } ?>
                        <?php if (!empty($userInfo['favoripublic_outfit_wear']) && !empty($is_friend)) { ?><p>Favorite
                            public outfit to wear:<?php print $userInfo['favoripublic_outfit_wear']; ?></p> <?php } ?>
                        <?php if (!empty($userInfo['favorite_sports_teams'])) { ?><p>Favorite Sports
                            Teams:<?php print $userInfo['favorite_sports_teams']; ?></p> <?php } ?>
                        <?php if (!empty($userInfo['favorite_music']) && !empty($is_friend)) { ?><<p>Favorite
                            Music:<?php print $userInfo['favorite_music']; ?></p> <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>