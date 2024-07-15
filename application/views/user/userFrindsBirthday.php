<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <?php $this->load->view('user/Common/mainHeader') ?>
        <div class="row">
            <?php $this->load->view('user/Common/userSider'); ?>
            <div class="col-lg-9">
                <div class="profile-content-inner">
                    <div class="added-wishes friends-birthday">
                    <?php if (!empty($toDayBirthday)) { ?>
                        <h4>Today's Birthday</h4>
                        <div class="row">
                                <?php foreach ($toDayBirthday as $birthday) { ?>
                                    <div class="col-md-6">
                                        <div class="card mb-4 box-shadow2 card-birthday-today">
                                            <div class="card-body">
                                                <div class="row align-items-center text-center text-sm-left">
                                                    <div class="col-sm-7 pr-md-0 mb-4 mb-md-0">
                                                        <h5 class="h5 card-title">
                                                            <?php echo $birthday->first_name . '  ' . $birthday->last_name ?>
                                                        </h5>
                                                        <p>Let's surprise her with a birthday gift.</p>
                                                        <a href="<?php echo base_url('user-dashboard') ?>"
                                                            class="theme-btn yellow-bg px-3 px-md-4">Chek her Wish List</a>
                                                    </div>
                                                    <?php if (!empty($birthday->profile_photo)) { ?>
                                                        <div class="col-sm-5 pl-md-4 text-md-right">
                                                            <img src="<?php echo base_url() . 'assets/uploads/profile_photo/' . $birthday->profile_photo; ?>"
                                                                alt="" class="img-fluid" height="100px" ; width="100px">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else { ?>
                                <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p class="card-title">Today is not any friend's birthday found</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           <?php  } ?>         
                        </div>
                        <?php if (!empty($firstMonthBirthday)) { ?>
                        <h4>Month of <?php echo date('M') ?>, <?php echo date('Y'); ?></h4>
                        <div class="row">
                                <?php foreach ($firstMonthBirthday as $thisMonthBirthday) { ?>
                                    <div class="col-md-4 pr-md-4">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="h5">
                                                    <?php echo $thisMonthBirthday->first_name . '  ' . $thisMonthBirthday->last_name ?>
                                                </h5>
                                                <p><?php echo date('M', strtotime($thisMonthBirthday->dob)) ?> <?php echo date('d', strtotime($thisMonthBirthday->dob)) ?>, <?php  echo date('D', strtotime($thisMonthBirthday->dob)) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                              <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="card-title">Month of <?php echo date('M') ?> is not any friend's birthday found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                        </div>
                        <?php if(!empty($secoundMonthBirthday)){  ?>
                        <h4>Month of <?php echo date('M', strtotime('+1 month')); ?>, <?php echo date('Y'); ?> </h4>
                        <div class="row mb-4">
                            <?php  foreach($secoundMonthBirthday as $secoundBirthday){ ?>
                                <div class="col-md-4 pr-md-4">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <h5 class="h5"><?php echo $secoundBirthday->first_name . '  ' . $secoundBirthday->last_name ?></h5>
                                            <p><?php echo date('M', strtotime($secoundBirthday->dob)) ?> <?php echo date('d', strtotime($secoundBirthday->dob)) ?>, <?php  echo date('D', strtotime($secoundBirthday->dob)) ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php }  }else{?>
                            <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="card-title">Month of <?php echo date('M', strtotime('+1 month')); ?> is not any friend's birthday found</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>