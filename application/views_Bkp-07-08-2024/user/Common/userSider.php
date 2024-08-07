<div class="col-lg-3">
    <div class="profile-sidebar left">
        <div class="sidebar-about sidebar-widget sidebar-bg">
            <h3>Friends</h3>
            <div class="friends-list">
                <div class="media align-items-center">
                    <div class="media-body">
                        <h5><a class="<?php echo checkMenuActive('user/friends'); ?>" href="<?php echo base_url('user/friends') ?>">All Friends</a></h5>
                    </div>
                </div>
                <div class="media align-items-center">
                    <div class="media-body">
                        <h5><a class="<?php echo checkMenuActive('user/friends/requests'); ?>"  href="<?php echo base_url('user/friends/requests') ?>">Friend Request</a></h5>
                    </div>
                </div>
                <div class="media align-items-center">
                    <div class="media-body">
                        <h5><a class="<?php echo checkMenuActive('user/friends/search'); ?>" href="<?php echo base_url('user/friends/search') ?>">Search Friends</a></h5>
                    </div>
                </div>
                <div class="media align-items-center">
                    <div class="media-body">
                        <h5><a class="<?php echo checkMenuActive('user/friends/birthday'); ?>" href="<?php echo base_url('user/friends/birthday') ?>">Birthdays</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>