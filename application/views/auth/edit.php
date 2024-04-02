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
                <?php  
                if(!empty($_SESSION['error_msg'])){
                    ?>
                    <div class="alert alert-danger">
                     <?php echo ($_SESSION['error_msg']['error']); ?>
                 </div>
                <?php  } ?>
                <?php if (!empty($this->session->flashdata('success'))) { ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('success') ?>
								</div>
							<?php } ?>
                <div class="myaccountForm-inner">
                    <div class="card bg-light border-0 p-4">
					<span id="success_message"></span>
				    <span id="error_message"></span>
					<div class="profile-content-inner">
						    <div class="create-wish border-0 p-0 d-block d-md-flex mb-3">							
                            <h3 class="mb-3 mb-md-0 d-inline-block">Update Your Profile</h3>
								<a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#removeAccount">Delete Account</a>
							</div>
							<!-- The Modal -->
								<div class="modal" id="removeAccount">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Remove your account</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
												<p>
												   Are you sure you want to delete your account? This is an irreversible change, and once your account is deleted, the data can not be recovered.
												</p>
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-success remove_account" data-user-id="account" data-dismiss="modal">Yes</button>
											</div>
									</div>
								</div>
							</div>
							</div>
                        <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>

                        <?php echo form_open_multipart('favoritewish/editUser'); ?>
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Username">Date of Birth </label>
                                    <div class="input-group">
                                        <input type="date" name="dob" min="1-01-01" max="2024-12-31" class="form-control" id="user_phone"
                                            value="<?php print $userInfo['dob']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Username">Sex Gender</label>
                                    <div class="input-group">
                                    <select class="form-control" name="gender">
                                        <option>Select Gender</option>
                                        <option value="male" <?php if($userInfo['gender'] == 'male') echo 'selected="selected"'; ?>>male</option>
                                        <option value="female" <?php if($userInfo['gender'] == 'female') echo 'selected="selected"'; ?>>female</option>
                                        <option value="not applicable" <?php if($userInfo['gender'] == 'not applicable') echo 'selected="selected"'; ?>>not applicable</option>
                                        <option value="prefer not to say" <?php if($userInfo['gender'] == 'prefer not to say') echo 'selected="selected"'; ?>>prefer not to say</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Username">Favorite Charity</label>
                                    <div class="input-group">
                                        <input type="text" name="favorite_charity" class="form-control" id="user_phone"
                                            value="<?php print $userInfo['favorite_charity']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
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
                            </div> -->
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
                                        <input type="file" class="custom-file-input" id="profilePhoto" name="profile_photo" onchange="profilephoto(event,'profilePhotos');">
										<small id="file-upload-help" class="form-text text-muted">File recomended size 250x250px</small>
                                        <label class="custom-file-label" for="profilePhoto">Choose file</label>
                                    </div>
                                    <div class="profile-banner">
                                        <?php
                                        $profileImage = $userInfo['profile_photo'];
                                        if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $userInfo['profile_photo']) && !empty($userInfo['profile_photo'])) {  ?>
                                            <img class="user-banners" id="profilePhotos" src="<?php echo base_url() . 'assets/uploads/profile_photo/' . $profileImage; ?>" alt="Preview">
                                        <?php } else {  ?>
                                            <img class="user-banners" id="profilePhotos" src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="Preview">
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Company">Update cover photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="coverPhoto" name="cover_photo" onchange="profilephoto(event,'coverphotoview');">
										<small id="file-upload-help" class="form-text text-muted">File recomended size 1232x234px</small>
                                        <label class="custom-file-label" for="coverPhoto">Choose file</label>
                                    </div>
                                    <div class="profile-banner">
                                        <?php 
                                            $coverImage = $userInfo['cover_photo']; 
                                            if(file_exists(FCPATH.'assets/uploads/cover_photo/'.$userInfo['cover_photo']) && !empty($userInfo['cover_photo'])){  ?>
                                                <img class="user-banners" id="coverphotoview" src="<?php echo base_url().'assets/uploads/cover_photo/'.$coverImage;?>" alt="" class="img-fluid" >
                                                <?php }else{  ?>
                                                    <img class="user-banners" id="coverphotoview" src="<?php echo base_url(); ?>assets/images/site-image/avatar.png" alt="Preview">
                                            <?php  } ?>
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