<section class="fav-hero-section background-image section-padding" data-background="<?php echo base_url(); ?>assets/images/site-image/signup-bg-Image.jpg">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-sm-12">
				
			</div>
			<div class="col-lg-5 col-sm-12">
				<div class="fav-login-panel">
					<div id="first">
						<div class="myform form background-image" data-background="<?php echo base_url(); ?>assets/images/site-image/signup-form-bg.png">
							<div class="logo mb-3 form-header">
								<div class="d-flex align-items-center justify-content-between">
									<h3>Welcome to <span>Favorite Wish</span></h3>
									<p>No Account?<br><a href="<?php echo base_url(); ?>sign-up" id="signups">Sign up</a></p>
								</div>
								<h1>Sign In</h1>
								<div class="social-login my-4 text-center">
									<a href="#" class="social-login-btn"><img src="<?php echo base_url(); ?>assets/images/site-image/google.png" alt="google" width="22">Sign in with Google</a>
								</div>
							</div>
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
							<?php echo form_open('favoritewish/loginSubmit'); ?>
							
							   <div class="form-group">
								  <label for="Username">Enter your username or email address</label>
								  <input type="text" name="user_name"  class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username or email address">
							   </div>
							   <div class="form-group">
								  <label for="Password">Enter your password</label>
								  <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="password">
							   </div>
							   <div class="form-group">
								  <p class="text-right"><a href="<?php print site_url(); ?>forgot-password">Forgot Password</a></p>
							   </div>
							   <div class="col-md-12 text-center ">
								  <button type="submit" class="yello-shadow-btn">Sign In</button>
							   </div>
							
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>