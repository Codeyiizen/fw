<section class="fav-profile-section">
	<?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content">
	<div class="container">
		<?php $this->load->view('user/Common/mainHeader') ?>
		<div class="row">
			<div class="col-lg-3">
				<div class="profile-sidebar right">
					<div class="sidebar-about sidebar-widget sidebar-bg">
						<h3>Family</h3>
						<div class="friends-list mb-4">
							<?php
							if (!empty($getObjFamilyDetails)) {
								foreach ($getObjFamilyDetails as $friend) { ?>
									<div class="media align-items-center">
										<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
										<div class="media-body">
											<h5><a href="<?php echo base_url(); ?>user/friends/details/<?php echo $friend->userId; ?>"><?php echo $friend->first_name; ?></a>
											</h5>
											<p><?php echo $friend->fm_name; ?></p>
										</div>
									</div>
							<?php }
							}else{  ?>
							    <p> Family Not Found</p>
							<?php } ?>

						</div>
						<div class="text-center common-link">
							<a href="<?php echo base_url(); ?>user/friends">See All</a>
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
										<span id="success_message"></span>
										<form class="wishlist-form" method="post" id="contact_form">
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Category</label>
												<select class="select-category form-control" id="category" name="category">
													<option value="">Select Category</option>
													<?php foreach ($categories as $category) : ?>
														<option value="<?php echo $category->id; ?>">
															<?php echo $category->name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<span id="category" class="text-danger text-center"></span>
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Type</label>
												<select class="select-type form-control" id="type" name="type">
													<option value="">Select Type</option>
												</select>
											</div>
											<span id="types" class="text-danger text-center"></span>
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Brand</label>
												<input type="text" class="form-control" id="brand" value="" name="brand" placeholder="Brand">
											</div>
											<span id="brands" class="text-danger text-center"></span>
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Color</label>
												<input type="text" class="form-control" id="color" value="" name="color" placeholder="color">
											</div>
											<span id="colors" class="text-danger text-center"></span>
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Size</label>
												<input type="text" class="form-control" id="size" value="" name="size">
											</div>
											<span id="sizes" class="text-danger text-center"></span>
											<div class="form-group form-inline">
												<label for="email" class="mr-sm-2">Style</label>
												<input type="text" class="form-control" id="style" value="" name="style">
											</div>
											<span id="styles" class="text-danger text-center"></span>
											<div class="form-group text-center">
												<input type="submit" name="contact" id="contact_form" class="theme-btn yellow-bg" value="Submit">
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
					<div class="row">
						<div class="col-7"></div>
						<div class="col-5">
							<select class="form-control form-select form-select-lg mb-3 filter_by_cat" aria-label="Default select example">
								<option value="">Filter By Category</option>
								<?php if (!empty($categories)) {
									foreach ($categories as $cat) {
								?>
										<option <?php echo (!empty($get['cat']) && $get['cat']==$cat->id)?"selected":'' ?> value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
								<?php }
								} ?>
							</select>
						</div>
					</div>
					<div class="added-wishes">
					<span id="success_message_delete"></span>
						<div class="row">
							<?php
							$i = 0;
							foreach ($wishInfo as $wishInfos) {
							//	$i = $i + 1;
								$CI = &get_instance();
								$CI->load->model('Favoritewish_Model');
								$getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type);
								$subCatName = !empty($getObjssubCat->name) ? $getObjssubCat->name : '';
							?>
								<div class="col-lg-6">
									<div class="card bg-gradient-1 border-0 mb-4">
										<div class="card-body">
											<h5 class="mb-1"><strong>Wish - </strong>
												<?php print_r($wishInfos->cat_name); ?></h5>
												<p class="mb-1 font-weight-semibold font-italic">Details - </p>
												<ul class="list-unstyled font-italic text-capitalize mb-2">
												<?php if (!empty($subCatName)) { ?>
													<li>Type - <?php echo $subCatName; ?></li>
												<?php } ?>
												<li class="brand" data-brand="<?php print_r($wishInfos->brand); ?>">Brand - <?php print_r($wishInfos->brand); ?></li>
												<li class="color" data-color="<?php print_r($wishInfos->color); ?>">Color - <?php print_r($wishInfos->color); ?></li>
												<li class="size" data-size="<?php print_r($wishInfos->size); ?>">Size - <?php print_r($wishInfos->size); ?></li>
												<li class="style" data-style="<?php print_r($wishInfos->style); ?>">Style - <?php print_r($wishInfos->style); ?></li>
												<li>Created on - <?php print_r(date("D d M Y",strtotime($wishInfos->created_on))); ?></li>
											</ul>
											<a href="#" class="theme-btn yellow-bg border btn-sm showCategory" data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal" data-target="#editWish"><i class="fas fa-pencil mr-1"></i>Edit</a>
											<a href="#" class="theme-btn yellow-bg border btn-sm wishDeleteModel" id="wish_delete" data-id="<?php print_r($wishInfos->id); ?>" data-toggle="modal" data-target="#removeWishAccount"><i class="fas fa-trash mr-1"></i>Delete</a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
            <!-- Edit Model Start -->
			<div class="modal" id="editWish">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Edit your Wish</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							<span id="success_message_edit"></span>
							<form class="wishlist-form" method="post" id="contact_form">
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Category</label>
									<select class="select-category form-control category-edit" id="category" name="category">
										<option value="">Select Category</option>
									</select>
								</div>
								<span id="category" class="text-danger text-center"></span>
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Type</label>
									<select class="select-type form-control type-edit" id="type" name="type">
										<option value="">Select Type</option>
									</select>
								</div>
								<span id="types" class="text-danger text-center"></span>
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Brand</label>
									<input type="text" class="form-control brand-edit" id="brand" value="" name="brand" placeholder="Brand">
								</div>
								<span id="brands_edit" class="text-danger text-center"></span>
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Color</label>
									<input type="text" class="form-control color-edit" id="color" value="" name="color" placeholder="color">
								</div>
								<span id="colors_edit" class="text-danger text-center"></span>
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Size</label>
									<input type="text" class="form-control size-edit" id="size" value="" name="size">
								</div>
								<span id="sizes_edit" class="text-danger text-center"></span>
								<div class="form-group form-inline">
									<label for="email" class="mr-sm-2">Style</label>
									<input type="text" class="form-control style-edit" id="style" value="" name="style">
								</div>
								<span id="styles_edit" class="text-danger text-center"></span>
								<input type="hidden" class="wish_id">
								<div class="form-group text-center">
									<input type="button" name="contact" id="contact_form_edit"  class="theme-btn yellow-bg" value="Submit">
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
			<!-- Edit Model End -->

			<!-- delete conformation model start -->
			<div class="modal" id="removeWishAccount">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Remove your Wish</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							<p>
								Are you sure you want to delete your Wish ?
							</p>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success wishDeleteId" data-user-id="account" data-dismiss="modal">Yes</button>
						</div>
				</div>
			</div>
			 </div>
            <!-- delete conformation model end -->
			<div class="col-lg-3">
				<div class="profile-sidebar right">
					<div class="sidebar-about sidebar-widget sidebar-bg">
						<h3>Friends</h3>
						<div class="friends-list mb-4">
							<?php
							if (!empty($frienddetails)) {
								foreach ($frienddetails as $friend) { ?>
									<div class="media align-items-center">
										<img src="assets/images/site-image/avatar.png" alt="" class="img-fluid">
										<div class="media-body">
											<h5><a href="<?php echo base_url(); ?>user/friends/details/<?php echo $friend->id; ?>"><?php echo $friend->first_name; ?></a>
											</h5>
											<p>NYC, USA</p>
										</div>
									</div>
							<?php }
							}  ?>

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