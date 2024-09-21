<section class="fav-profile-section pb-0 pb-md-5">
    <?php $this->load->view('user/Common/banner', array('userInfo' => $userInfo)) ?>
</section>
<section class="section-padding profile-content pt-0 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->load->view('front/template/template_profile_sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <div class="myaccountForm-inner">
                    <h4>Notification Settings</h4>
                    <div class="card notification-setting">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0 pl-md-5">
                                    <h5>Notifications</h5>
                                    <p>For important updates, certain notifications cannot be disabled</p>
                                    <p>
                                    (If our notifications end up in your spam or junk folder, please move them to your inbox to improve future delivery and recognition)</p>
                                </div>
                                <div class="offset-md-1 col-md-7">
                                    <div class="d-flex align-items-top justify-content-between" style="margin-right: 3px;">
                                    <div class="w-75">  
                                    <h5>Type</h5></div>
                                    <div class="w-25"> <h5>Email</h5></div>
                                    </div>
                                <?php echo form_open_multipart('favoritewish/notificationSettingUpdate'); ?>    
                                    <div class="d-flex align-items-top justify-content-between mb-2">
                                        <div class="mail-notification-settings mr-3 w-75">
                                            <p class="mb-0">Inbox Message</p>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" class="form-check-input" name="inbox_massage" value="<?php !empty($userDataById->Inbox_message) ? $userDataById->Inbox_message :'0' ?>" <?php echo ($userDataById->Inbox_message == 1 ? 'checked' : null); ?>>
                                            <label class="form-check-label" for="inbox-message">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-top justify-content-between mb-2">
                                        <div class="mail-notification-settings mr-3 w-75">
                                            <p class="mb-0">Friend Request</p>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" class="form-check-input" name="friend_request" value="<?php echo $userDataById->friend_request ?>" <?php echo ($userDataById->friend_request == 1 ? 'checked' : null); ?>>
                                            <label class="form-check-label" for="friend-request">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-top justify-content-between mb-2">
                                        <div class="mail-notification-settings mr-3 w-75">
                                            <p class="mb-0">Upcoming birthday alert</p>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" class="form-check-input" name="upcomming_birthday" value="<?php echo $userDataById->upcoming_birthday ?>" <?php echo ($userDataById->upcoming_birthday == 1 ? 'checked' : null); ?>>
                                            <label class="form-check-label" for="birthday-alert">&nbsp;</label>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>                            
                            <div class="text-center mb-0 mt-4">
                                <button type="submit" class="theme-btn yellow-bg">Submit</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>