<section class="fav-hero-section background-image section-padding"
    data-background="<?php echo base_url(); ?>assets/images/site-image/signup-bg-Image.jpg">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12">

            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="fav-login-panel">
                    <div id="first">
                        <div class="myform form background-image"
                            data-background="<?php echo base_url(); ?>assets/images/site-image/signup-form-bg.png">
                            <div class="logo mb-3 form-header">
                                <div
                                    class="d-xl-flex align-items-center justify-content-between text-md-left text-center">
                                    <h3 class="mb-xl-0">Welcome to <span class="text-primary px-1 pt-1 pt-sm-0">Favorite
                                            Wish</span></h3>
                                    <p>No Account?&nbsp;<br class="d-none d-xl-block"><a
                                            href="<?php echo base_url(); ?>sign-up" id="signups">Sign up</a></p>
                                </div>
                                <h1 class="text-md-left text-center">Forgot Password</h1>
                                <div class="social-login my-4 text-center d-none">
                                    <a href="#" class="social-login-btn"><img
                                            src="<?php echo base_url(); ?>assets/images/site-image/google.png"
                                            alt="google" width="22">Sign in with Google</a>
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
                            <?php } elseif (!empty($this->input->get('msg')) && $this->input->get('msg') == 2) { ?>
                            <div class="alert alert-success">
                                Your password has been reset successfully. Please check your email.
                            </div>
                            <?php } ?>
                            
                            <?php if (!empty($this->input->get('msg')) && $this->input->get('msg') == 3) { ?>
                            <div class="alert alert-danger">
                            Your password has been reset successfully. Please check your email.
                            </div>
                            <?php } elseif (!empty($this->input->get('msg')) && $this->input->get('msg') == 4) { ?>
                            <div class="alert alert-danger">
                               User Email Isn't Registered.
                            </div>
                            <?php } ?>

                            <?php echo form_open('favoritewish/actionForgotPassword'); ?>

                            <div class="form-group">
                                <label for="Username">Email address</label>
                                <input type="text" name="forgot_email" class="form-control" id="username"
                                    aria-describedby="emailHelp" placeholder="Enter your registered email address">
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class="yello-shadow-btn">Reset Password</button>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
	<div class="bottom-footer background-image p-3" data-background="<?php echo base_url(); ?>assets/images/site-image/footer-bg.png">
		<div class="container">
			<div class="row">
				<!-- <div class="col-md-6 col-sm-12 text-center text-md-left">
					<div class="footer-menu-list">
						<a href="<?php echo base_url('/terms-and-conditions'); ?>">Terms and Conditions</a>
						<a href="<?php echo base_url(); ?>privacy/Policy">Privacy Policy</a>
					</div>
				</div> -->
				<div class="col-md-6 offset-md-6 text-center text-md-right">
					<p>Designed by <a href="https://www.kurieta.com">Kurieta.com</a></p>
				</div>
			</div>
		</div>
	</div>
</footer>