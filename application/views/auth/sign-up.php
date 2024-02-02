<section class="fav-hero-section background-image section-padding" data-background="<?php echo base_url(); ?>assets/images/site-image/signup-bg-Image.jpg">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-sm-12">
				
			</div>
			<div class="col-lg-5 col-sm-12">
				<div class="fav-login-panel">
					<div id="seconds">
						<div class="myform form background-image" data-background="<?php echo base_url(); ?>assets/images/site-image/signup-form-bg.png">
							<div class="logo mb-3 form-header">
								<div class="d-flex align-items-center justify-content-between">
									<h3>Welcome to <span>Favorite Wish</span></h3>
									<p>Have an Account?<br><a href="<?php echo base_url(); ?>sign-in" id="signins">Sign In</a></p>
								</div>
								
								<div class="social-login mb-4">
									<h1>Sign Up</h1>
								</div>
							</div>
							<?php if (validation_errors()) { ?>
								<div class="alert alert-danger">
									<?php echo validation_errors(); ?>
								</div>
							<?php } ?>
							<?php echo form_open('favoritewish/registerSubmit'); ?>
							
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="Email Address">Email address</label>
											<input type="email" name="email"  class="form-control" id="user_email" aria-describedby="emailHelp" placeholder="Username or email address">
										</div>
									</div>
									<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label for="First name">First name</label>
											<input type="text"  name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="First Name">
										</div>
									</div>
									<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label for="Last Name">Last name</label>
											<input type="text"  name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" placeholder="First Name">
										</div>
									</div>
									<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label for="Phone number">Phone number</label>
											<input type="tel"  name="contact_no" class="form-control" id="user_phone" aria-describedby="emailHelp" placeholder="Mobile Number">
										</div>
									</div>
									<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label for="Password">Password</label>
											<input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Password">
										</div>
									</div>
									<div class="col-lg-12 col-sm-12">
										<div class="form-group">
											<label for="Confirm Password">Confirm Password</label>
											<input type="password" name="confirm_password" id="cpassword"  class="form-control" aria-describedby="emailHelp" placeholder="Password">
										</div>
									</div>
									<div class="col-lg-12 col-sm-12">
										<div class="form-group">
											<input type="checkbox" name="terms">
											<label for="terms">By signing up i agree to all the <a href="<?php echo base_url('/terms-and-conditions'); ?>">terms and conditions</a></label>
										</div>
									</div>
								</div>
								<div class="col-md-12 text-center mb-3">
									<button type="submit" class="yello-shadow-btn">Sign Up</button>
								</div>
								<div class="social-login my-4 text-center">
									<a href="#" class="social-login-btn"><img src="<?php echo base_url(); ?>assets/images/site-image/google.png" alt="google" width="22">Sign in with Google</a>
								</div>										
							
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>