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
						<h2>Overview</h2>
						<?php print $userInfo['user_bio']; ?>
						<hr>
						<p>Email Address: <?php print $userInfo['email']; ?></p>
						<p>Phone: <?php print $userInfo['contact_no']; ?></p>
						<p>User Type: <?php print $userInfo['user_type']; ?></p>
						<p>Designation: <?php print $userInfo['company']; ?></p>
						<p>Address: <?php print $userInfo['address']; ?>, <?php print $userInfo['city']; ?>, <?php print $userInfo['state']; ?>, <?php print $userInfo['zip']; ?></p>
					</div>					
				</div>		
			</div>
		</div>
	</div>
</section>