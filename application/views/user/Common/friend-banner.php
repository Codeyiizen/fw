<div class="profile-banner">
    <?php $coverImage = $userInfo['cover_photo'];
    if (file_exists(FCPATH . 'assets/uploads/cover_photo/' . $userInfo['cover_photo']) && !empty($userInfo['cover_photo'])) {  ?>
        <img class="user-banner" src="<?php echo base_url() . 'assets/uploads/cover_photo/' . $coverImage; ?>" alt="" class="img-fluid">
    <?php } else {  ?>
        <img class="user-banner" src="<?php echo base_url(); ?>assets/images/site-image/profile-banner-1.png" alt="" class="img-fluid">
    <?php  } ?>
</div>
<div class="hero-title-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="profile-picture">
                    <!--<img src="assets/images/site-image/avatar.png" alt="" class="img-thumbnail img-fluid">-->
                    <?php
                    $profileImage = $userInfo['profile_photo'];
                    if (file_exists(FCPATH . 'assets/uploads/profile_photo/' . $userInfo['profile_photo']) && !empty($userInfo['profile_photo'])) {  ?>
                        <object class="user-thumb" type="image/svg+xml" data="<?php echo base_url() . 'assets/uploads/profile_photo/' . $profileImage; ?>"></object>
                    <?php } else {  ?>
                        <object type="image/svg+xml" type="user-thumb" data="<?php echo base_url(); ?>assets/images/site-image/user-icon.svg"></object>
                    <?php  } ?>
                    <div class="profile-name">
                        <h3><?php print $userInfo['full_name']; ?></h3>
                        <h5><?php print $userInfo['company']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="update-profile text-right">
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