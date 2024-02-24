<section class="fav-profile-section">
    <?php $this->load->view('user/Common/friend-banner', array('userInfo' => $userInfo,'is_friend'=>$is_friend,'userLoginInfo'=>$userLoginInfo)) ?>
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