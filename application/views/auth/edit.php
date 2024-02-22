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
                    <div class="card bg-light border-0 p-4">
                        <h2>Update Your Profile</h2>
                        <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>

                        <?php echo form_open('favoritewish/editUser'); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="First Name">First Name</label>
                                    <div class="input-group">
                                        <input type="text" name="first_name" class="form-control" id="first_name"
                                            value="<?php print $userInfo['first_name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Last Name">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" name="last_name" class="form-control" id="last_name"
                                            value="<?php print $userInfo['last_name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Email Address">Email</label>
                                    <div class="input-group">
                                        <input type="email" disabled="disabled" name="email" class="form-control"
                                            id="email" placeholder="Email" value="<?php print $userInfo['email']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Username">Phone</label>
                                    <div class="input-group">
                                        <input type="text" name="contact_no" class="form-control" id="user_phone"
                                            value="<?php print $userInfo['contact_no']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Email Address">User Type</label>
                                    <div class="input-group">
                                        <input type="text" name="user_type" class="form-control" id="user_type"
                                            placeholder="User Type" value="<?php print $userInfo['user_type']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Designation</label>
                                    <div class="input-group">
                                        <input type="text" name="company" class="form-control" id="company"
                                            value="<?php print $userInfo['company']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Company">User Bio</label>
                                    <div class="input-group">
                                        <textarea class="editor form-control" name="user_bio">
											<?php print $userInfo['user_bio']; ?>	
										</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Address</label>
                                    <div class="input-group">
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="<?php print $userInfo['address']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">City</label>
                                    <div class="input-group">
                                        <input type="text" name="city" class="form-control" id="city"
                                            value="<?php print $userInfo['city']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">State</label>
                                    <div class="input-group">
                                        <input type="text" name="state" class="form-control" id="state"
                                            value="<?php print $userInfo['state']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Zip</label>
                                    <div class="input-group">
                                        <input type="text" name="zip" class="form-control" id="zip"
                                            value="<?php print $userInfo['zip']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Favorite Country</label>
                                    <div class="input-group">
                                        <input type="text" name="favorite_country" class="form-control"
                                            id="favorite_country" value="<?php print $userInfo['favorite_country']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Favorite public outfit to wear</label>
                                    <div class="input-group">
                                        <input type="text" name="favorite_p_wear" class="form-control"
                                            id="favorite_p_wear"
                                            value="<?php print $userInfo['favoripublic_outfit_wear']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Favorite Sports Teams</label>
                                    <div class="input-group">
                                        <input type="text" name="favorite_s_team" class="form-control"
                                            id="favorite_s_team"
                                            value="<?php print $userInfo['favorite_sports_teams']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Favorite Music</label>
                                    <div class="input-group">
                                        <input type="text" name="favorite_music" class="form-control"
                                            id="favorite_music" value="<?php print $userInfo['favorite_music']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Update profile photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profilePhoto">
                                        <label class="custom-file-label" for="profilePhoto">Choose file</label>
                                    </div>
                                    <div class="preview profile-photo mt-3">
                                        <img class="img-fluid img-thumbnail"
                                            src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="Preview">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Update cover photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="coverPhoto">
                                        <label class="custom-file-label" for="coverPhoto">Choose file</label>
                                    </div>
                                    <div class="preview cover-photo mt-3">
                                        <img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group pull-right mb-0">
                                    <button type="submit" id="register" class="theme-btn yellow-bg">Update
                                        Profile</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>