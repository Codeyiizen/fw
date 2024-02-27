<div class="row">
    <div class="col-sm-12">
        <div class="profile-header-tabs">
            <ul>
                <li class="<?php echo checkMainMenuActive('user/friends/details/'.$data); ?>"><a href="<?php echo base_url(); ?>user/friends/details/<?php echo $data ?>">Profile</a></li>
                <?php if(!empty($is_friend)){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/detail/'.$data.'/wish'); ?>"><a href="<?php echo base_url(); ?>user/friends/detail/<?php echo $data ?>/wish">Whish</a></li>
                <?php } ?>
                <?php if(!empty($is_friend)){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/detail/'.$data.'/registry'); ?>"><a href="<?php echo base_url(); ?>user/friends/detail/<?php echo $data ?>/registry">Registry</a></li>
                <?php } ?>
                <li class="<?php echo checkMainMenuActive('user/friends/'.$data.'/massages'); ?>" ><a href="<?php echo base_url(); ?>user/friends/<?php echo $data ?>/massages">Message</a></li>
            </ul>
        </div>
    </div>
</div>