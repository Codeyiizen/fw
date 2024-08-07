<section class="fav-profile-section">
	<?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>			
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
										<form class="wishlist-form" method="post">
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Categories</label>
												<select class="form-control" id="sel1">
													<option value="">Select Category</option>
													<?php foreach ($categories as $category): ?>
														<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Type</label>
												<select class="form-control" id="sel1">
													<option>Choose Type</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												</select>
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Brand</label>
												<input type="text" class="form-control" id="email">
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Color</label>
												<input type="text" class="form-control" id="email">
											</div>
											<div class="form-group form-inline mb-4">
												<label for="email" class="mr-sm-2">Style & Size</label>
												<input type="text" class="form-control" id="email">
											</div>
											<div class="form-group text-center">
												<input type="submit" name="submit" class="theme-btn yellow-bg" value="Create List">
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
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Kathy Parry</a></h5>
									<p>NYC, USA</p>
								</div>
							</div>
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Miley Cyrus</a></h5>
									<p>NYC, USA</p>
								</div>
							</div>
							<div class="media align-items-center">
								<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
								<div class="media-body">
									<h5><a href="#">Rajeev Singh</a></h5>
									<p>India</p>
								</div>
							</div>
						</div>
						<div class="text-center common-link">
							<a href="#">See All</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>