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
		<?php $this->load->view('user/Common/mainHeader') ?>
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-sidebar left">
					<div class="sidebar-about sidebar-widget sidebar-bg">
						<h3>Family Members</h3>
						<div class="friends-list">
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Maya Jonas</a></h5>
									<p>Sister</p>
								</div>
							</div>
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Rose Jonas</a></h5>
									<p>Sister</p>
								</div>
							</div>
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Rajeev Singh</a></h5>
									<p>Brother</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="profile-content-inner">
					<div class="create-wish mb-4">
						<h3>Have a wish in a mind?</h3>
						<a href="#" class="theme-btn yellow-bg" data-toggle="modal" data-target="#createWish"><i class="fas fa-plus-circle"></i> Let's Create</a>
						
						<!-- The Modal -->
						<div class="modal" id="createWish">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Create your Wish</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<form class="wishlist-form" method="post" action="user/add/wish">
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Categories</label>
												<select class="form-control" id="sel1" name="category">
													<option value="">Select Category</option>
													<?php foreach ($categories as $category): ?>
														<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Type</label>
												<select class="form-control" id="sel1" name="type">
													<option>Choose Type</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Brand</label>
												<select class="form-control" id="sel1" name="brand">
												<option>Choose Brand</option>
													<option>Nike</option>
													<option>Adddis</option>
													<option>pumo</option>
													<option>Polo</option>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Color</label>
												<select class="form-control" id="sel1" name="color">
													<option>Choose Color</option>
													<option>White</option>
													<option>Blue</option>
													<option>Yellow</option>
													<option>Red</option>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Size</label>
												<input type="text" class="form-control" id="email" name="size">
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Style</label>
												<input type="text" class="form-control" id="email" name="style">
											</div>
											<div class="form-group text-center">
											<button class="btn btn-success btn-submit">Submit</button>
											</div>
										</form>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer d-none">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>
						
					</div>
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
			
			  
			<div class="col-lg-3">
				<div class="profile-sidebar right">
					<div class="sidebar-about sidebar-widget sidebar-bg">
						<h3>Friends</h3>
						<div class="friends-list mb-4">
						<?php   
							foreach ($frienddetails as $friend) { ?>  
								<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#"><?php  echo $friend->first_name; ?></a></h5>
									<p>NYC, USA</p>
								</div>
							</div> 
							<?php }  ?> 
						
						</div>
						<div class="text-center common-link">
							<a href="<?php echo base_url(); ?>user/friends">See All</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
 
 $(document).ready(function() {   alert('ok'); 




});

</script>