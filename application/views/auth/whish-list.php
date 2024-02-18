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
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="update-profile text-right">
						<!--<a href="#" class="theme-btn yellow-bg">Edit Profile</a>-->
						<!-- <a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn yellow-bg">Back to Dashboard</a> -->
						<!-- <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a> -->
                        <a href="#" class="theme-btn yellow-bg"></a>
					</div>
				</div>
			</div>
		</div>
	</div>				
</section>
<section class="section-padding profile-content">
	<div class="container">
		<div class="row">
			<!-- <div class="col-lg-3">
				<?php $this->load->view('front/template/template_profile_sidebar'); ?>
			</div> -->
			<div class="col-lg-12 mt-4">
				<div class="myaccountForm-inner">
					<div class="card p-4">
						<h2>Whish list</h2>
						<hr>
						<div class="added-wishes">
						<?php foreach ($wishInfo as $wishInfos): ?>
						 <div class="row">
							<div class="col-lg-2">
							    <span><b>Categories</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->categories_id); ?></h3>
								</div>
							</div>
							<div class="col-lg-2">
							<span><b>Type</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->type); ?></h3>
								</div>
							</div>
							<div class="col-lg-2">
							<span><b>Brand</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->brand); ?></h3>
								</div>
							</div>
							<div class="col-lg-2">
							<span><b>Color</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->color); ?></h3>
								</div>
							</div>
							<div class="col-lg-2">
							<span><b>Size</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->size); ?></h3>
								</div>
							</div>
							<div class="col-lg-2">
							<span><b>Style</b></span>	
								<div class="wishes-items">
									<h3><?php print_r($wishInfos->style); ?></h3>
								</div>
							</div>
						</div>	
					    <?php  endforeach;  ?>	
					</div>
					</div>					
				</div>		
			</div>
		</div>
	</div>
</section>