
<section class="hero-section background-image section-padding" data-background="https://fw.kurieta.ca/assets/images/site-image/banner-bg.png" style="background-image: url(&quot;https://fw.kurieta.ca/assets/images/site-image/banner-bg.png&quot;);" https:="" fw.kurieta.ca="" assets="" images="" site-image="" banner-bg.png");"="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="hero-section-content">
                    <h1 class="position-relative">Discover the Joy of<br class="d-sm-none d-block"> Surprise Gifting</h1>
                    <p>Favorite Wish is a gift-giving platform that takes the guesswork out of shopping by letting you know exactly what sizes, colors, brands, and styles your friends and loved ones want.</p>
                    <!-- <div class="btn-box position-relative">
                        <a href="https://fw.kurieta.ca/sign-up" class="theme-btn yellow-bg mr-3">Join Us</a>
                        <a href="https://fw.kurieta.ca/sign-in" class="theme-btn outline-btn">Sign In</a>  
                    </div> -->
                    <div class="header-btn px-0">
							<?php
							if ($this->session->userdata('ci_session_key_generate') == FALSE) {								
								echo '<a href="'.base_url().'sign-up" class="theme-btn yellow-bg mx-1">Join Us</a>';
								echo '<a href="'.base_url().'sign-in" class="theme-btn outline-btn  mx-1  d-none d-md-inline-block">Sign In</a>';
							} else {
								
								echo '<a href="'.base_url().'user-dashboard" class="theme-btn yellow-bg mx-1">My Account</a>';
								echo '<a href="'.base_url().'favoritewish/logout" class="theme-btn dark-btn mx-1  d-none d-md-inline-block">Logout</a>';
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
   // $data = html_entity_decode(!empty($hometext->homepage_content) ? $hometext->homepage_content : '' );
   $data = html_entity_decode($hometext->homepage_content, ENT_QUOTES, 'UTF-8');
    echo $data;
?>

<section class="third-section wishlist-section mt-5 theme-bg alt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="wishlist text-center">
                    <h2 class="entry-title">Create Your Wish List Here!</h2>
                    <p>Let’s bring back the art of surprise gifting together</p>
                    <div class="gift-btn-box">
                        <a href="https://favoritewish.com/sign-in" class="theme-btn yellow-bg">Join us</a>
                         <div class="theme-btn yellow-bg addSrc" data-toggle="modal" data-target="#myModal" >Explainer video
                        </div>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--<div class="modal-header">-->
                                    <!--    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                    <!--</div>-->
                                    <div class="modal-body">
                                    <iframe width="460" height="315" id="close" src="https://www.youtube.com/embed/wb_jZlwcmdo" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default closeButton" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>