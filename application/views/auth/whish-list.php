<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content">
	<div class="container">
		<?php $this->load->view('user/Common/mainHeaderFriends', array('data' => $user_profile_id, 'is_friend' => $is_friend)) ?>
		<div class="profile-content-inner">
			<div class="form-group p-0 col-5">
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
						<div class="col-lg-3 col-md-4">
							<div class="card bg-gradient-1 border-0 mb-4">
								<div class="card-body">
									<h5 class="mb-1"><strong>Wish - </strong>
										<?php print_r($wishInfos->cat_name); ?></h5>
										<p class="mb-1 font-weight-semibold font-italic">Details - </p>
										<ul class="list-unstyled font-italic text-capitalize mb-0">
										<?php if (!empty($subCatName)) { ?>
											<li>Type - <?php echo $subCatName; ?></li>
										<?php } ?>
										<li>Brand - <?php print_r($wishInfos->brand); ?></li>
										<li>Color - <?php print_r($wishInfos->color); ?></li>
										<li>Size - <?php print_r($wishInfos->size); ?></li>
										<li>Style - <?php print_r($wishInfos->style); ?></li>
										<li>Created on - <?php print_r(date("D m M Y",strtotime($wishInfos->created_on))); ?></li>
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