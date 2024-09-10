<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/site-image/favicon.jpg" type="image/x-icon">
	
	<style>
		.form-group {
			position: relative;
		}
		#togglePassword {
			position: absolute;
			right: 0;
			top: 0;
			height: 100%;
			width: 45px;
			line-height: 3.175rem;
			text-align: center;
			cursor: pointer;
			/* background: var(--primary); */
			color: var(--primary);
			border-radius: 0.25rem;
		}
	</style>
	
  </head>
<body>
    <div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth">
				<div class="row flex-grow">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left p-5">
						<div class="brand-logo text-center">
						  <img src="<?php echo base_url(); ?>assets/images/site-image/logo1.png" width="200" height="100">
						</div>
						<h4>Hello! Admin</h4>
						<h6 class="font-weight-light">Sign in to continue.</h6>
						<?php
							echo "<div class='error_msg text-danger'>";
							if (isset($error_message)) {
								echo $error_message;
							}
							echo validation_errors();
							echo "</div>";
						?>
						<form method="POST" class="pt-3">
							<div class="form-group">
								<input type="email" name="admin_email" class="form-control form-control-lg" value="<?php echo set_value('admin_email'); ?>" placeholder="Enter your email address">
							</div>
							<div class="form-group">
								<input type="password" name="admin_password" value="<?php echo set_value('admin_password'); ?>" class="form-control form-control form-control-lg" placeholder="Password" id="password">
								<i class="mdi mdi-eye mdi-24px" id="togglePassword"></i>
							</div>
							<div class="mt-3">
								<button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
							</div>
							<div class="my-2 d-flex justify-content-between align-items-center">
								<div class="form-check">
									<label class="form-check-label text-muted">
									<input type="checkbox" class="form-check-input"> Keep me signed in </label>
								</div>
								<a href="<?php echo base_url(); ?>admin_fpassword" class="auth-link text-black">Forgot password?</a>
							</div>
							<!--
							<div class="mb-2">
								<button type="button" class="btn btn-block btn-facebook auth-form-btn">
								<i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
							</div>
							<div class="text-center mt-4 font-weight-light"> Don't have an account? 
								<a href="register.html" class="text-primary">Create</a>
							</div>
							-->
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>assets/admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/misc.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/script.js"></script>
</body>
</html>