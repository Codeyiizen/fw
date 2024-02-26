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
						<!-- <a href="<?php echo base_url(); ?>user-dashboard" class="theme-btn yellow-bg">Back to Dashboard</a> -->
						<!-- <a href="<?php echo base_url(); ?>favoritewish/logout" class="theme-btn dark-btn">Logout</a> -->
						<?php if (empty($is_friend)) { ?>
							<button type="button" class="theme-btn yellow-bg sendFriendRequest" data-token="<?php echo $userInfo['token'] ?>">Add Friend</button>
							<?php } else if (!empty($is_friend) && $is_friend['status'] == 0) {
							if ($is_friend['to_friend'] == $userLoginInfo['user_id']) {
							?>
								<button type="button" class="theme-btn yellow-bg acceptFriendRequest bg-success" data-token="<?php echo $userInfo['token'] ?>">Accept</button>
							<?php } else { ?>
								<button type="button" class="theme-btn yellow-bg removeFriend bg-danger" data-token="<?php echo $userInfo['token'] ?>">Cancel</button>
							<?php }
						} else if (!empty($is_friend) && $is_friend['status'] == 1) { ?>
							<button type="button" class="theme-btn red-btn px-4 mr-0 bg-danger removeFriend" data-token="<?php echo $userInfo['token'] ?>">Unfriend</button>
						<?php }  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-padding profile-content">
	<div class="container">
		<?php $this->load->view('user/Common/mainHeaderFriends', array('data' => $user_profile_id, 'is_friend' => $is_friend)) ?>
		<div class="profile-content-inner">
			<div class="col-5">
				<select class="form-control form-select form-select-lg mb-3 filter_by_cat_wish" data-id="<?php echo $user_profile_id;  ?>" aria-label="Default select example">
					<option value="">Filter By Category</option>
					<?php if (!empty($categories)) {
						foreach ($categories as $cat) {
					?>
							<option  <?php echo (!empty($get['cat']) && $get['cat']==$cat->id)?"selected":'' ?> value="<?php echo $cat->id ?>" ><?php echo $cat->name ?></option>
					<?php }
					} ?>
				</select>
			</div>
			<div class="added-wishes">
				<div class="row">
					<?php
					$i = 0;
					foreach ($wishInfo as $wishInfos) {
						$i = $i + 1;
						$CI = &get_instance();
						$CI->load->model('Favoritewish_Model');
						$getObjssubCat = $CI->Favoritewish_Model->getCategoryById($wishInfos->type);
						$subCatName = !empty($getObjssubCat->name) ? $getObjssubCat->name : '';
					?>
						<div class="col-lg-4">
							<div class="card bg-gradient-<?php echo $i; ?> text-center border-0 mb-4">
								<div class="card-body">
									<h5 class="mb-2"><strong>Wish - </strong>
										<?php print_r($wishInfos->cat_name); ?></h5>
									<ul class="list-unstyled mb-0">
										<?php if (!empty($subCatName)) { ?>
											<li>Type - <?php echo $subCatName; ?></li>
										<?php } ?>
										<li>Brand - <?php print_r($wishInfos->brand); ?></li>
										<li>Color - <?php print_r($wishInfos->color); ?></li>
										<li>Size - <?php print_r($wishInfos->size); ?></li>
										<li>Style - <?php print_r($wishInfos->style); ?></li>
									</ul>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>