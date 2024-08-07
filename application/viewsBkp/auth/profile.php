<style>
.myaccountForm-inner .user-profile ul li span {
    vertical-align: top;
}

.myaccountForm-inner .user-profile ul li span+span {
    width: 52%;
}

</style>
<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
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
                            <ul class="list-unstyled">
                                <li>
                                    <span>User Bio</span>
                                    <span class="font-weight-normal mr-0">
                                        <?php $data = html_entity_decode(!empty($userInfo['user_bio']) ? $userInfo['user_bio'] :'');
                                         echo $data; ?>
                                    </span>
                                </li>
                                <?php if(!empty($userInfo['first_name'])) { ?>
                                <li><span>Full Name</span> <span class="font-weight-normal mr-0"><?php print $userInfo['first_name']; ?>
								<?php print $userInfo['last_name']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['email'])){ ?>
                                <li><span>Email Address</span> <span class="font-weight-normal mr-0"><?php print $userInfo['email']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['contact_no'])) { ?>
                                <li><span>Phone:</span> <span class="font-weight-normal mr-0"><?php print $userInfo['contact_no']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['dob'])) { ?>
                                <li><span>Birthday </span> <span class="font-weight-normal mr-0"><?php print $userInfo['dob']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['gender'])) { ?>
                                <li><span>Sex</span> <span class="font-weight-normal mr-0"><?php print $userInfo['gender']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['favorite_charity'])) { ?>
                                <li><span>Favorite Charity</span><span class="font-weight-normal mr-0"><?php print $userInfo['favorite_charity']; ?></span></li>
                                <?php } ?>

                                <?php if(!empty($userInfo['address'] && $userInfo['city'] &&  $userInfo['state'])){ ?>
                                <li><span>Address</span> <span class="font-weight-normal mr-0"><?php print $userInfo['address']; ?>,
                                    <?php print $userInfo['city']; ?>,
                                    <?php print $userInfo['state']; ?>, <?php print $userInfo['zip']; ?></span></li>
                                <?php } ?>

                                <?php if(!empty($userInfo['favorite_country'])) { ?>
                                <li><span>Favorite Country</span><span class="font-weight-normal mr-0"><?php print $userInfo['favorite_country']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['favoripublic_outfit_wear'])){ ?>
                                <li><span>Favorite Public Outfit
                                        Wear</span><span class="font-weight-normal mr-0"><?php print $userInfo['favoripublic_outfit_wear']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['favorite_sports_teams'])) {  ?>
                                <li><span>Favorite Sports Teams</span>
								<span class="font-weight-normal mr-0"><?php print $userInfo['favorite_sports_teams']; ?></span></li>
                                <?php  } ?>
                                <?php if(!empty($userInfo['favorite_music'])) {  ?>
                                <li><span>Favorite Music</span><span class="font-weight-normal mr-0"><?php print $userInfo['favorite_music']; ?></span></li>
                                <?php  } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>