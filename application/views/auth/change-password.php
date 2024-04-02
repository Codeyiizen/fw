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
					<div class="card bg-light border-0 p-4">
						<h2>Update New Password</h2>
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
							<div class="col-lg-6">
								<div class="form-group">
									<label for="First Name">Password</label>
									<div class="input-group">
										<input type="password" name="change_pwd_password" class="form-control" id="change-pwd-password">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
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
