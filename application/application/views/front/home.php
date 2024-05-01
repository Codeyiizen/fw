
<section class="hero-section background-image section-padding" data-background="https://fw.kurieta.ca/assets/images/site-image/banner-bg.png" style="background-image: url(&quot;https://fw.kurieta.ca/assets/images/site-image/banner-bg.png&quot;);" https:="" fw.kurieta.ca="" assets="" images="" site-image="" banner-bg.png");"="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="hero-section-content">
                    <h1 class="position-relative">Discover the Joy of<br class="d-sm-none d-block"> Surprise Gifting</h1>
                    <p>Favorite Wish is a gift giving platform that eliminates the guessing game, and provides
                        specifics in regard to the size, color, brand, and style clothing that your family and friends
                        actually want.</p>
                    <!-- <div class="btn-box position-relative">
                        <a href="https://fw.kurieta.ca/sign-up" class="theme-btn yellow-bg mr-3">Join Us</a>
                        <a href="https://fw.kurieta.ca/sign-in" class="theme-btn outline-btn">Sign In</a>  
                    </div> -->
                    <div class="header-btn d-none d-xl-block">
							<?php
							if ($this->session->userdata('ci_session_key_generate') == FALSE) {								
								echo '<a href="'.base_url().'sign-up" class="theme-btn yellow-bg mr-3">Join Us</a>';
								echo '<a href="'.base_url().'sign-in" class="theme-btn outline-btn">Sign In</a>';
							} else {
								
								echo '<a href="'.base_url().'user-dashboard" class="theme-btn yellow-bg mr-3">My Account</a>';
								echo '<a href="'.base_url().'favoritewish/logout" class="theme-btn dark-btn">Logout</a>';
							}
							?>
						</div>
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-1.png" alt="" class="img-fluid banner-icon-1">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-2.png" alt="" class="img-fluid banner-icon-2">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-3.png" alt="" class="img-fluid banner-icon-3">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-4.png" alt="" class="img-fluid banner-icon-4">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-5.png" alt="" class="img-fluid banner-icon-5">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-6.png" alt="" class="img-fluid banner-icon-6">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-7.png" alt="" class="img-fluid banner-icon-7">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $data = html_entity_decode(!empty($hometext->homepage_content) ? $hometext->homepage_content : '' );
    echo $data;
?>