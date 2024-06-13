<div class="row">
    <div class="col-sm-12">
        <div class="profile-header-tabs">
            <ul>
               <?php if(!empty($is_friend)  && !empty($is_friend['status'])){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/details/'.$data); ?>"><a href="<?php echo base_url(); ?>user/friends/details/<?php echo $data ?>">Profile</a></li>
                <?php } ?>
                <?php if(!empty($is_friend)  && !empty($is_friend['status'])){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/detail/'.$data.'/wish'); ?>"><a href="<?php echo base_url(); ?>user/friends/detail/<?php echo $data ?>/wish">Wish</a></li>
                <?php } ?>
                <?php if(!empty($is_friend) && !empty($is_friend['status'])){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/detail/'.$data.'/registry'); ?>"><a href="<?php echo base_url(); ?>user/friends/detail/<?php echo $data ?>/registry">Registry</a></li>
                <?php } ?>
                 
                <?php if(!empty($is_friend) && !empty($is_friend['status'])){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/'.$data.'/familywish'); ?>" ><a href="<?php echo base_url(); ?>user/friends/<?php echo $data ?>/familywish">Family Wishes</a></li>
                <?php } ?>

                <?php if(!empty($is_friend) && !empty($is_friend['status'])){ ?>
                <li class="<?php echo checkMainMenuActive('user/friends/'.$data.'/massages'); ?>" ><a href="<?php echo base_url(); ?>user/friends/<?php echo $data ?>/massages">Message</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>