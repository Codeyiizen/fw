<style>
.myaccountForm-inner .user-profile ul li span {
    vertical-align: top;
}
@media screen and (max-width:767px){
	.myaccountForm-inner .user-profile ul li span{
		width: 100%;
	}
}
</style>
<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/friend-banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
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
					
					
                    
						<table class="responsive">
							<table class="table table-sm">
							    <!-- <?php if(!empty($is_friend)  && !empty($is_friend['status'])){ ?>
                                <tr>
                                    <th style="width:40%">User Bio</th>
                                    <td>
                                        <?php $data = html_entity_decode(!empty($userInfo['user_bio']) ? $userInfo['user_bio'] :'');
									echo $data; ?>
                                    </td>
                                </tr>
								<?php }?> -->
								<tr>
									<th>Full Name</th>
									<td><?php print $userInfo['first_name']; ?>  <?php print $userInfo['last_name']; ?></td>
								</tr>
								<!-- <?php if (!empty($userInfo['email']) && !empty($is_friend)) { ?> 
								<tr>
									<th>Email</th>
									<td><?php print $userInfo['email']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['contact_no']) && !empty($is_friend) && !empty($is_friend['status'])) { ?> 
								<tr>
									<th>Contact No</th>
									<td><?php print $userInfo['contact_no']; ?></td>
								</tr>
								<?php } ?> -->
								<?php if (!empty($userInfo['dob'])) { ?> 
								<tr>
									<th>Birthday</th>
									<td><?php print $userInfo['dob']; ?></td>
								</tr>
								<?php } ?>
								<!-- <?php if (!empty($userInfo['gender']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>Gender</th>
									<td><?php print $userInfo['gender']; ?></td>
								</tr>
								<?php } ?>   -->
								<?php if (!empty($userInfo['favorite_charity'])) { ?>
								<tr>
									<th>Favorite Charity</th>
									<td><?php print $userInfo['favorite_charity']; ?></td>
								</tr>
								<?php } ?>
								<!-- <?php if (!empty($userInfo['address']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>Address</th>
									<td><?php print $userInfo['address']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['city']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>City</th>
									<td><?php print $userInfo['city']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['state']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>State</th>
									<td><?php print $userInfo['state']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['zip']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>Zip</th>
									<td><?php print $userInfo['zip']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_country']) && !empty($is_friend) && !empty($is_friend['status'])) { ?> 
								<tr>
									<th>Favorite Gift Cards</th>
									<td><?php print $userInfo['favorite_country']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favoripublic_outfit_wear']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>Favorite Public Outfit To Wear</th>
									<td><?php print $userInfo['favoripublic_outfit_wear']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_sports_teams'])) { ?>
								<tr>
									<th>Favorite Sports Teams</th>
									<td><?php print $userInfo['favorite_sports_teams']; ?></td>
								</tr>
								<?php } ?>
								<?php if (!empty($userInfo['favorite_music']) && !empty($is_friend) && !empty($is_friend['status'])) { ?>
								<tr>
									<th>Favorite Jewelry</th>
									<td><?php print $userInfo['favorite_music']; ?></td>
								</tr>
								<?php } ?> -->
							</table>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>