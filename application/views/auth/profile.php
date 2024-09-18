<style>
.myaccountForm-inner .user-profile ul li span {
    vertical-align: top;
}

.myaccountForm-inner .user-profile ul li span+span {
    width: 52%;
}

.copy-notification {
    color: #ffffff;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 20px;
    border-radius: 30px;
    position: fixed;
    top: 50%;
    left: 50%;
    width: 150px;
    margin-top: -30px;
    margin-left: -85px;
    display: none;
    text-align: center;
}

/* Social media container styling */
#socialMediaLinks {
    display: none;
    margin-top: 15px;
    padding: 15px;
    border-radius: 8px;
    background-color: #f4f4f4;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#socialMediaLinks a {
    display: inline-block;
    margin: 5px 10px;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

#socialMediaLinks a:hover {
    background-color: #0056b3;
}

/* Styling individual social media buttons */
.facebook {
    background-color: #3b5998;
}

.twitter {
    background-color: #1da1f2;
}

.instagram {
    background-color: #e1306c;
}

.linkedin {
    background-color: #0077b5;
}

/* Button styling */
.toggle-btn {
    padding: 8px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-left: 10px;
    transition: background-color 0.3s ease;
}

.toggle-btn:hover {
    background-color: #0056b3;
}
</style>

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
                    <div class="card bg-light border-0 user-profile">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h2>Overview</h2>
                            </div>
                            <?php  
                              $referalLink = base64_encode($userInfo['referral_code']); 
                            ?>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="row">
                                        <span>Referal Link</span>
                                        <span class="font-weight-normal mr-0">
                                            <input type="text" class="form-control" id="referalLinkInput" value="<?php echo base_url('sign-up/'.$referalLink.''); ?>" readonly>
                                            <button class="referlUrl theme-btn outline-btn mb-3 mb-lg-0" data-url="<?php echo base_url('sign-up/'.$referalLink.''); ?>" id="click-to-copy">Copy Referral Link</button>
                                            
                                            <!-- <button class="referlUrl theme-btn outline-btn mb-3 mb-lg-0"
                                                id="click-to-copy"
                                                data-url="<?php echo base_url('sign-up/'.$referalLink.''); ?>">Copy
                                                Referal
                                                Link</button> -->
                                            <button id="toggleSocialLinks"
                                                class="theme-btn outline-btn mb-3 mb-lg-0">Share Links</button>
                                        </span>

                                    </div>
                                    <?php  
                                    $whatsapp_message = base_url('sign-up/'.$referalLink.''); 
                                    $share_text = "Share Referral";
                                    // $whatsapp_link = "https://api.whatsapp.com/send?text=" . $whatsapp_message;
                                    $email_link = "mailto:?subject=" . urlencode($share_text) . "&body=" . urlencode($whatsapp_message);
                                    $instagram_link = "https://www.instagram.com/sharer.php?u=". urlencode($whatsapp_message);
                                    $linkedin_link = "https://www.linkedin.com/shareArticle?mini=true&url=" . $whatsapp_message;
                                    $facebook_link = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($whatsapp_message);
                                    $twitter_link = "https://twitter.com/intent/tweet?text=" . urlencode($share_text) . "&url=" . urlencode( $whatsapp_message);
                                ?>

                                    <div id="socialMediaLinks">
                                        <a href="<?php echo $facebook_link  ?>" target="_blank"
                                            class="facebook">Facebook</a>
                                        <a href="<?php echo $twitter_link  ?>" target="_blank" class="twitter">Twitter</a>
                                        <a href="<?php echo $linkedin_link  ?>" target="_blank"
                                            class="linkedin">LinkedIn</a>
                                        <a href="<?php echo $email_link ?>" target="_blank"
                                            class="linkedin">Email</a>
                                        <a href="<?php echo $instagram_link ?>" target="_blank"
                                            class="linkedin">Instagram</a>     
                                        <!-- <a href="<?php echo $whatsapp_link ?>" target="_blank"
                                            class="linkedin">WhatsApp</a> -->
                                    </div>

                                </li>
                                <li>
                                    <span>User Bio</span>
                                    <span class="font-weight-normal mr-0">
                                        <?php $data = html_entity_decode(!empty($userInfo['user_bio']) ? $userInfo['user_bio'] :'');
                                         echo $data; ?>
                                    </span>
                                </li>
                                <?php if(!empty($userInfo['first_name'])) { ?>
                                <li><span>Full Name</span> <span
                                        class="font-weight-normal mr-0"><?php print $userInfo['first_name']; ?>
                                        <?php print $userInfo['last_name']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['email'])){ ?>
                                <li><span>Email Address</span> <span
                                        class="font-weight-normal mr-0"><?php print $userInfo['email']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['contact_no'])) { ?>
                                <li><span>Phone:</span> <span
                                        class="font-weight-normal mr-0"><?php print $userInfo['contact_no']; ?></span>
                                </li>
                                <?php } ?>
                                <?php if(!empty($userInfo['dob'])) { ?>
                                <li><span>Birthday </span> <span
                                        class="font-weight-normal mr-0"><?php print $userInfo['dob']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['gender'])) { ?>
                                <li><span>Sex</span> <span
                                        class="font-weight-normal mr-0"><?php print $userInfo['gender']; ?></span></li>
                                <?php } ?>
                                <?php if(!empty($userInfo['favorite_charity'])) { ?>
                                <li><span>Favorite Charity</span><span
                                        class="font-weight-normal mr-0"><?php print $userInfo['favorite_charity']; ?></span>
                                </li>
                                <?php } ?>
                                <!-- Add other profile fields here -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('toggleSocialLinks').addEventListener('click', function() {
    var socialLinks = document.getElementById('socialMediaLinks');
    if (socialLinks.style.display === "none" || socialLinks.style.display === "") {
        socialLinks.style.display = "block";
        this.textContent = "Share Links";
    } else {
        socialLinks.style.display = "none";
        this.textContent = "Share Links";
    }
});
</script>