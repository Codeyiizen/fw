<section class="fav-profile-section">
	<?php $this->load->view('user/Common/friend-banner', array('userInfo' => $userInfo, 'is_friend' => $is_friend, 'userLoginInfo' => $userLoginInfo)) ?>
</section>
<section class="section-padding profile-content">
	<div class="container">
		<?php $this->load->view('user/Common/mainHeaderFriends', array('data' => $user_profile_id, 'is_friend' => $is_friend)) ?>
		<div class="row">
			<!-- <div class="col-lg-3">
				<?php $this->load->view('front/template/template_profile_sidebar'); ?>
			</div> -->
			<div class="col-lg-12">
				<div class="myaccountForm-inner">
					<div class="card bg-light border-0 p-4">
						<h2>Profile Overview</h2>
						<?php print $userInfo['user_bio']; ?>
						<table class="responsive">
							<table class="table table-sm">
								<tr>
									<th>Full Name</th>
									<td>Rahul Up</td>
								</tr>
								<?php if (!empty($userInfo['birthday']) && !empty($is_friend)) { ?> 
								<tr>
									<th>Birthday</th>
									<td><?php print $userInfo['birthday']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['gender']) && !empty($is_friend)) { ?>
								<tr>
									<th>Gender</th>
									<td><?php print $userInfo['gender']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_country']) && !empty($is_friend)) { ?> 
								<tr>
									<th>Favorite Country</th>
									<td><?php print $userInfo['favorite_country']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favoripublic_outfit_wear']) && !empty($is_friend)) { ?>
								<tr>
									<th>Favorite public outfit to wear</th>
									<td><?php print $userInfo['favoripublic_outfit_wear']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_sports_teams'])) { ?>
								<tr>
									<th>Favorite Sports Teams</th>
									<td><?php print $userInfo['favorite_sports_teams']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_music']) && !empty($is_friend)) { ?>
								<tr>
									<th>Favorite Music</th>
									<td><?php print $userInfo['favorite_music']; ?></td>
								</tr>
								<?php } ?>
							</table>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>