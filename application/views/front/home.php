<style>
@import url(//cdn.rawgit.com/rtaibah/dubai-font-cdn/master/dubai-font.css);


*,
*:after,
*:before {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -o-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    -moz-user-select: none;
    user-select: none;
    cursor: default;
}

html {
    width: 100%;
    height: auto;
}


.testim {
    width: 100%;
    position: absolute;
    top: 50%;
    -webkit-transform: translatey(-50%);
    -moz-transform: translatey(-50%);
    -ms-transform: translatey(-50%);
    -o-transform: translatey(-50%);
    transform: translatey(-50%);
}

.testim .wrap {
    position: relative;
    width: 100%;
    max-width: 1020px;
    padding: 40px 20px;
    margin: auto;
}

.testim .arrow {
    display: block;
    position: absolute;
    cursor: pointer;
    font-size: 2em;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    -webkit-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    padding: 5px;
    z-index: 22222222;
}

.testim .arrow:before {
    cursor: pointer;
}

.testim .arrow:hover {
    color: #ea830e;
}


.testim .arrow.left {
    left: 10px;
}

.testim .arrow.right {
    right: 10px;
}

.testim .dots {
    text-align: center;
    position: absolute;
    width: 100%;
    bottom: 60px;
    left: 0;
    display: block;
    z-index: 3333;
    height: 12px;
}

.testim .dots .dot {
    list-style-type: none;
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 1px solid #eee;
    margin: 0 10px;
    cursor: pointer;
    -webkit-transition: all .5s ease-in-out;
    -ms-transition: all .5s ease-in-out;
    -moz-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;
    position: relative;
}

.testim .dots .dot.active,
.testim .dots .dot:hover {
    background: #ea830e;
    border-color: #ea830e;
}

.testim .dots .dot.active {
    -webkit-animation: testim-scale .5s ease-in-out forwards;
    -moz-animation: testim-scale .5s ease-in-out forwards;
    -ms-animation: testim-scale .5s ease-in-out forwards;
    -o-animation: testim-scale .5s ease-in-out forwards;
    animation: testim-scale .5s ease-in-out forwards;
}

.testim .cont {
    position: relative;
    overflow: hidden;
}

.testim .cont>div {
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 0 70px 0;
    opacity: 0;
}

.testim .cont>div.inactive {
    opacity: 1;
}


.testim .cont>div.active {
    position: relative;
    opacity: 1;
}


.testim .cont div .img img {
    display: block;
    width: 100px;
    height: 100px;
    margin: auto;
    border-radius: 50%;
}

.testim .cont div h2 {
    font-size: 1em;
    margin: 15px 0;
}

.testim .cont div p {
    font-size: 1.15em;
    width: 80%;
    margin: auto;
}

.testim .cont div.active .img img {
    -webkit-animation: testim-show .5s ease-in-out forwards;
    -moz-animation: testim-show .5s ease-in-out forwards;
    -ms-animation: testim-show .5s ease-in-out forwards;
    -o-animation: testim-show .5s ease-in-out forwards;
    animation: testim-show .5s ease-in-out forwards;
}

.testim .cont div.active h2 {
    -webkit-animation: testim-content-in .4s ease-in-out forwards;
    -moz-animation: testim-content-in .4s ease-in-out forwards;
    -ms-animation: testim-content-in .4s ease-in-out forwards;
    -o-animation: testim-content-in .4s ease-in-out forwards;
    animation: testim-content-in .4s ease-in-out forwards;
}

.testim .cont div.active p {
    -webkit-animation: testim-content-in .5s ease-in-out forwards;
    -moz-animation: testim-content-in .5s ease-in-out forwards;
    -ms-animation: testim-content-in .5s ease-in-out forwards;
    -o-animation: testim-content-in .5s ease-in-out forwards;
    animation: testim-content-in .5s ease-in-out forwards;
}

.testim .cont div.inactive .img img {
    -webkit-animation: testim-hide .5s ease-in-out forwards;
    -moz-animation: testim-hide .5s ease-in-out forwards;
    -ms-animation: testim-hide .5s ease-in-out forwards;
    -o-animation: testim-hide .5s ease-in-out forwards;
    animation: testim-hide .5s ease-in-out forwards;
}

.testim .cont div.inactive h2 {
    -webkit-animation: testim-content-out .4s ease-in-out forwards;
    -moz-animation: testim-content-out .4s ease-in-out forwards;
    -ms-animation: testim-content-out .4s ease-in-out forwards;
    -o-animation: testim-content-out .4s ease-in-out forwards;
    animation: testim-content-out .4s ease-in-out forwards;
}

.testim .cont div.inactive p {
    -webkit-animation: testim-content-out .5s ease-in-out forwards;
    -moz-animation: testim-content-out .5s ease-in-out forwards;
    -ms-animation: testim-content-out .5s ease-in-out forwards;
    -o-animation: testim-content-out .5s ease-in-out forwards;
    animation: testim-content-out .5s ease-in-out forwards;
}

@-webkit-keyframes testim-scale {
    0% {
        -webkit-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -webkit-box-shadow: 0px 0px 10px 5px #eee;
        box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
        -webkit-box-shadow: 0px 0px 10px 5px #ea830e;
        box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
        -webkit-box-shadow: 0px 0px 0px 0px #ea830e;
        box-shadow: 0px 0px 0px 0px #ea830e;
    }
}

@-moz-keyframes testim-scale {
    0% {
        -moz-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -moz-box-shadow: 0px 0px 10px 5px #eee;
        box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
        -moz-box-shadow: 0px 0px 10px 5px #ea830e;
        box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
        -moz-box-shadow: 0px 0px 0px 0px #ea830e;
        box-shadow: 0px 0px 0px 0px #ea830e;
    }
}

@-ms-keyframes testim-scale {
    0% {
        -ms-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -ms-box-shadow: 0px 0px 10px 5px #eee;
        box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
        -ms-box-shadow: 0px 0px 10px 5px #ea830e;
        box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
        -ms-box-shadow: 0px 0px 0px 0px #ea830e;
        box-shadow: 0px 0px 0px 0px #ea830e;
    }
}

@-o-keyframes testim-scale {
    0% {
        -o-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -o-box-shadow: 0px 0px 10px 5px #eee;
        box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
        -o-box-shadow: 0px 0px 10px 5px #ea830e;
        box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
        -o-box-shadow: 0px 0px 0px 0px #ea830e;
        box-shadow: 0px 0px 0px 0px #ea830e;
    }
}

@keyframes testim-scale {
    0% {
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
        box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
        box-shadow: 0px 0px 0px 0px #ea830e;
    }
}

@-webkit-keyframes testim-content-in {
    from {
        opacity: 0;
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
    }

    to {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}

@-moz-keyframes testim-content-in {
    from {
        opacity: 0;
        -moz-transform: translateY(100%);
        transform: translateY(100%);
    }

    to {
        opacity: 1;
        -moz-transform: translateY(0);
        transform: translateY(0);
    }
}

@-ms-keyframes testim-content-in {
    from {
        opacity: 0;
        -ms-transform: translateY(100%);
        transform: translateY(100%);
    }

    to {
        opacity: 1;
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}

@-o-keyframes testim-content-in {
    from {
        opacity: 0;
        -o-transform: translateY(100%);
        transform: translateY(100%);
    }

    to {
        opacity: 1;
        -o-transform: translateY(0);
        transform: translateY(0);
    }
}

@keyframes testim-content-in {
    from {
        opacity: 0;
        transform: translateY(100%);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@-webkit-keyframes testim-content-out {
    from {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

    to {
        opacity: 0;
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
    }
}

@-moz-keyframes testim-content-out {
    from {
        opacity: 1;
        -moz-transform: translateY(0);
        transform: translateY(0);
    }

    to {
        opacity: 0;
        -moz-transform: translateY(-100%);
        transform: translateY(-100%);
    }
}

@-ms-keyframes testim-content-out {
    from {
        opacity: 1;
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    to {
        opacity: 0;
        -ms-transform: translateY(-100%);
        transform: translateY(-100%);
    }
}

@-o-keyframes testim-content-out {
    from {
        opacity: 1;
        -o-transform: translateY(0);
        transform: translateY(0);
    }

    to {
        opacity: 0;
        transform: translateY(-100%);
        transform: translateY(-100%);
    }
}

@keyframes testim-content-out {
    from {
        opacity: 1;
        transform: translateY(0);
    }

    to {
        opacity: 0;
        transform: translateY(-100%);
    }
}

@-webkit-keyframes testim-show {
    from {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    to {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}

@-moz-keyframes testim-show {
    from {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }

    to {
        opacity: 1;
        -moz-transform: scale(1);
        transform: scale(1);
    }
}

@-ms-keyframes testim-show {
    from {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }

    to {
        opacity: 1;
        -ms-transform: scale(1);
        transform: scale(1);
    }
}

@-o-keyframes testim-show {
    from {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }

    to {
        opacity: 1;
        -o-transform: scale(1);
        transform: scale(1);
    }
}

@keyframes testim-show {
    from {
        opacity: 0;
        transform: scale(0);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

@-webkit-keyframes testim-hide {
    from {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    to {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
}

@-moz-keyframes testim-hide {
    from {
        opacity: 1;
        -moz-transform: scale(1);
        transform: scale(1);
    }

    to {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }
}

@-ms-keyframes testim-hide {
    from {
        opacity: 1;
        -ms-transform: scale(1);
        transform: scale(1);
    }

    to {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }
}

@-o-keyframes testim-hide {
    from {
        opacity: 1;
        -o-transform: scale(1);
        transform: scale(1);
    }

    to {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }
}

@keyframes testim-hide {
    from {
        opacity: 1;
        transform: scale(1);
    }

    to {
        opacity: 0;
        transform: scale(0);
    }
}

@media all and (max-width: 300px) {
    body {
        font-size: 14px;
    }
}

@media all and (max-width: 500px) {
    .testim .arrow {
        font-size: 1.5em;
    }

    .testim .cont div p {
        line-height: 25px;
    }

}
.testimonial .carousel-indicators{
    bottom: -2.5rem;
}

.carousel-indicators li {
    background-color: #ddd;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

.carousel-indicators li.active {
    background-color: #ffc629;
}
</style>
<section class="hero-section background-image section-padding"
    data-background="https://fw.kurieta.ca/assets/images/site-image/banner-bg.png"
    style="background-image: url(&quot;https://fw.kurieta.ca/assets/images/site-image/banner-bg.png&quot;);" https:=""
    fw.kurieta.ca="" assets="" images="" site-image="" banner-bg.png");"="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="hero-section-content">
                    <h1 class="position-relative">Discover the Joy of<br class="d-sm-none d-block"> Surprise Gifting
                    </h1>
                    <p>Favorite Wish is a gift-giving platform that takes the guesswork out of shopping by letting you
                        know exactly what sizes, colors, brands, and styles your friends and loved ones want.</p>
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
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-1.png" alt=""
                        class="img-fluid banner-icon-1">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-2.png" alt=""
                        class="img-fluid banner-icon-2">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-3.png" alt=""
                        class="img-fluid banner-icon-3">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-4.png" alt=""
                        class="img-fluid banner-icon-4">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-5.png" alt=""
                        class="img-fluid banner-icon-5">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-6.png" alt=""
                        class="img-fluid banner-icon-6">
                    <img src="https://fw.kurieta.ca/assets/images/site-image/banner-icon-7.png" alt=""
                        class="img-fluid banner-icon-7">
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
                        <div class="theme-btn yellow-bg addSrc" data-toggle="modal" data-target="#myModal">Explainer
                            video
                        </div>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--<div class="modal-header">-->
                                    <!--    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                    <!--</div>-->
                                    <div class="modal-body">
                                        <iframe width="460" height="315" id="close"
                                            src="https://www.youtube.com/embed/wb_jZlwcmdo" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default closeButton"
                                            data-dismiss="modal">Close</button>
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
<h4 class="text-center mt-4">Testimonials</h4>
<section class="third-section mt-5 theme-bg alt testimonial">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators m-0 p-0">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h2>John M.</h2>
                            <p>“Favorite Wish has completely transformed how I approach gift-giving! I no longer
                                have to guess
                                sizes or worry about returns. Everything I need is listed, from favorite brands to
                                colors and
                                styles. It’s saved me so much time, and I’ve never seen my family happier with their
                                surprise
                                gifts. The mobile view is seamless, too! I highly recommend signing up—you won’t
                                regret it!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Sarah T.</h2>
                            <p>“As a busy mom, Favorite Wish has been a lifesaver! I use it to keep track of my
                                kids’ growing
                                sizes, so buying clothes that fit has never been easier. No more exchanges! Plus, I
                                recently won
                                a prize through their referral program—such a fun bonus. 5 stars all the way!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2> Michael R.</h2>
                            <p>“Gift-giving used to stress me out, but now it’s a breeze with Favorite Wish. I know
                                exactly what
                                my friends and family love, and the surprise factor is still there! The referral
                                program is
                                awesome, too. I got lucky in one of their monthly drawings and received a great
                                gift! I can’t
                                recommend this site enough!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Amanda C.</h2>
                            <p>“Favorite Wish has brought back the joy of giving gifts. I love how easy it is to
                                check my loved
                                ones’ sizes and favorite styles—it’s all right there. Plus, it works great on my
                                phone, so I can use
                                it anywhere. It’s made gift shopping for holidays and birthdays way more fun!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Brian L.</h2>
                            <p>“I used Favorite Wish to help me get the perfect gifts for my wife and kids. No more
                                returns! The
                                platform is super convenient, and having all the information in one place saves so
                                much time. I
                                even won a referral prize this month, which was such a nice surprise. Highly
                                recommend this
                                site to anyone!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Jessica P.</h2>
                            <p>“I never realized how much easier gift shopping could be until I found Favorite Wish.
                                Having
                                everyone’s size and preferences at my fingertips is a game changer. It’s saved me
                                from so
                                many returns and exchanges, and the mobile version works perfectly on my phone. Love
                                it!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>David H.</h2>
                            <p>“Favorite Wish has made gifting so much simpler! I used to struggle with finding the
                                right sizes,
                                but now I just check their profiles, and it’s all there. I even won a prize through
                                their referral
                                program, which was such a fun bonus. This site is 5 stars for sure!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Emily G.</h2>
                            <p>“As someone who loves to give gifts, Favorite Wish has been a dream! I no longer
                                stress over
                                whether the gift will fit. It’s all listed in their profile, and the surprise
                                element is still there. Plus, I
                                love the convenience of using the site on my phone. It’s a must-have for any
                                gift-giver!”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Chris S.</h2>
                            <p>“Favorite Wish has made birthdays, holidays, and special occasions so much better. I
                                don’t
                                have to guess sizes or preferences anymore—it’s all right there. And I recently won
                                a referral
                                drawing, which was a great surprise! This site is incredibly easy to use and so
                                worth it.”</p>
                        </div>
                        <div class="carousel-item">

                            <h2>Laura D.</h2>
                            <p>“I can’t believe how much easier Favorite Wish has made my life. I keep my kids’
                                sizes updated,
                                so buying clothes is hassle-free, and I know the gifts will fit. I even got a
                                referral prize for
                                recommending the site to friends. Gift-giving has never been this exciting!”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
<script>
'use strict'
var testim = document.getElementById("testim"),
    testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
    touchStartPos,
    touchEndPos,
    touchPosDiff,
    ignoreTouch = 30;;

window.onload = function() {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length - 1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;

        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })

    testim.addEventListener("touchstart", function(e) {
        touchStartPos = e.changedTouches[0].clientX;
    })

    testim.addEventListener("touchend", function(e) {
        touchEndPos = e.changedTouches[0].clientX;

        touchPosDiff = touchStartPos - touchEndPos;

        console.log(touchPosDiff);
        console.log(touchStartPos);
        console.log(touchEndPos);


        if (touchPosDiff > 0 + ignoreTouch) {
            testimLeftArrow.click();
        } else if (touchPosDiff < 0 - ignoreTouch) {
            testimRightArrow.click();
        } else {
            return;
        }

    })
}
</script>