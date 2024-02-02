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
						<a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn yellow-bg">Back to Dashboard</a>
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
					<div class="card p-4">
						<h2>Updated New Password</h2>
						<?php if (validation_errors()) { ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php } ?>
						<?php if (!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
							<div class="alert alert-danger">
								Please Enter Your Valid Information.
							</div>
						<?php } ?>

						<?php echo form_open('favoritewish/actionChangePwd'); ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="First Name">Password</label>
									<div class="input-group">
										<input type="password" name="change_pwd_password" class="form-control" id="change-pwd-password">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="Last Name">Confirm Password</label>
									<div class="input-group">
										<input type="password" name="change_pwd_confirm_password" class="form-control" id="change-pwd-confirm-password">
									</div>
								</div>
							</div>
						</div>
						<div class="row"> 
							<div class="col-lg-12">
								<div class="form-group pull-right mb-0">
									<button type="submit" id="change_password" class="theme-btn yellow-bg">Change Password</button>
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