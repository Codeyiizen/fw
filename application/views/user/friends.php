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
						<a href="<?php echo base_url(); ?>user-profile" class="theme-btn outline-btn">View Profile</a>
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
			<div class="col-sm-12">
				<div class="profile-header-tabs">
					<ul>
						<li><a href="<?php echo base_url(); ?>user/profile">Profile</a></li>
						<li class="active"><a href="<?php echo base_url(); ?>user/friends">Friends</a></li>
						<li><a href="#">Registry</a></li>
						<li><a href="#">Message</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-sidebar left">
					<div class="sidebar-about sidebar-widget sidebar-bg">
						<h3>Friends</h3>
						<div class="friends-list">
							<div class="media align-items-center">
								<div class="media-body">
									<h5><a href="#">All Friends</a></h5>
								</div>
							</div>
							<div class="media align-items-center">
								<div class="media-body">
									<h5><a href="#">Friend Request</a></h5>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="profile-content-inner">
					<div class="added-wishes">
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<div class="wishes-items">
									<h3>Polo</h3>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="wishes-items">
									<h3>Shoes</h3>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="wishes-items">
									<h3>Peter England</h3>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="wishes-items">
									<h3>T-Shirt</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>