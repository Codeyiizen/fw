<section class="hero-section background-image section-padding" data-background="<?php echo base_url(); ?>assets/images/site-image/banner-bg.png">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-1.png" alt="" class="img-fluid banner-icon-1">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-2.png" alt="" class="img-fluid banner-icon-2">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-3.png" alt="" class="img-fluid banner-icon-3">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-4.png" alt="" class="img-fluid banner-icon-4">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-5.png" alt="" class="img-fluid banner-icon-5">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-6.png" alt="" class="img-fluid banner-icon-6">
	<img src="<?php echo base_url(); ?>assets/images/site-image/banner-icon-7.png" alt="" class="img-fluid banner-icon-7">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12">
				<div class="hero-section-content">
					<h1>Discover the Joy of Surprise Gifting</h1>
					<p>Favorite Wish is a gift giving platform that eliminates the guessing game, and provides
specifics in regard to the size, color, brand, and style clothing that your family and friends
actually want.</p>
					<div class="btn-box">
						<?php
						if ($this->session->userdata('ci_session_key_generate') == FALSE) {								
							echo '<a href="'.base_url().'sign-up" class="theme-btn yellow-bg mr-3">Join Us</a>';
							echo '<a href="'.base_url().'sign-in" class="theme-btn outline-btn">Sign In</a>';
						} else {							
							echo '<a href="'.base_url().'user-dashboard" class="theme-btn yellow-bg mr-3">My Account</a>';
							echo '<a href="'.base_url().'favoritewish/logout" class="theme-btn dark-btn">Signout</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="second-section section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12">
				<div class="section-header text-center mb-4">
					<h2 class="entry-title">Don’t inconvenience yourself with<br> the return instructions</h2>
					<p>Have you ever felt odd regifting a gift, or even wasted your time and energy with a return and
exchange process ? Sheesh, so time consuming! Favorite Wish is here to give you your time
back, and make sure that you give and receive the right gift, at the right time, with the right size.</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-4 col-sm-2 col-12">
				<div class="gift-items text-center mt-4">
					<div class="gift-thumb mb-4">
						<img src="<?php echo base_url(); ?>assets/images/right_size_time_resized.jpg" alt="" class="img-fluid">
					</div>
					<div class="gift-content">
						<h3>Right Size/Time</h3>
						<p>When we talk about the concept of "right size," we are usually referring to finding the appropriate or ideal size..[+]</p>
						<div class="gift-btn-box">
							<a href="javascript:void();" data-toggle="modal" data-target="#rightSize" class="theme-btn yellow-bg">Learn more</a>
						</div>
					</div>
				</div>
			</div>
			<!-- The Modal -->
			<div class="modal" id="rightSize">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header d-none">
							<h4 class="modal-title">Right Size</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="gift-thumb mb-4">
								<img src="<?php echo base_url(); ?>assets/images/right_size_time_resized.jpg" alt="" class="img-fluid">
							</div>
							<div class="gift-content">
								<h3>Right Size</h3>
								<p>When we talk about the concept of "right size," we are usually referring to finding the appropriate or ideal size for something. It means that we want to make sure that something is not too big or too small, but rather just the right size for its intended purpose.</p>
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-2 col-12">
				<div class="gift-items text-center mt-4">
					<div class="gift-thumb mb-4">
						<img src="<?php echo base_url(); ?>assets/images/right_color-resized.jpg" alt="" class="img-fluid">
					</div>
					<div class="gift-content">
						<h3>Right Color</h3>
						<p>When we choose clothes, we often consider which colors
look good on us and suit our personal style. Different colors..[+]</p>
						<div class="gift-btn-box">
							<a href="javascript:void();" data-toggle="modal" data-target="#rightColor" class="theme-btn yellow-bg">Learn more</a>
						</div>
					</div>
				</div>
			</div>
			<!-- The Modal -->
			<div class="modal" id="rightColor">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header d-none">
							<h4 class="modal-title">Right Color</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="gift-thumb mb-4">
								<img src="<?php echo base_url(); ?>assets/images/right_color-resized.jpg" alt="" class="img-fluid">
							</div>
							<div class="gift-content">
								<h3>Right Color</h3>
								<p>When we choose clothes, we often consider which colors
look good on us and suit our personal style. Different colors can enhance our appearance and
make us feel confident. For example, if you have a warm skin tone, colors like red, yellow, and
brown might complement you well. On the other hand, if you have a cool skin tone, colors like
blue, purple, and gray might look better on you. The right color of clothing is the one that
makes us feel good and enhances our overall look.</p>
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-2 col-12">
				<div class="gift-items text-center mt-4">
					<div class="gift-thumb mb-4">
						<img src="<?php echo base_url(); ?>assets/images/right_brand_style.jpg" alt="" class="img-fluid">
					</div>
					<div class="gift-content">
						<h3>Right Brand/Style</h3>
						<p>In the world of fashion and accessories, brands play a significant role in determining our choices. Some brands..[+]</p>
						<div class="gift-btn-box">
							<a href="javascript:void();" data-toggle="modal" data-target="#rightBrand" class="theme-btn yellow-bg">Learn more</a>
						</div>
					</div>
				</div>
			</div>
			<!-- The Modal -->
			<div class="modal" id="rightBrand">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header d-none">
							<h4 class="modal-title">Right Brand/Style</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="gift-thumb mb-4">
							<img src="<?php echo base_url(); ?>assets/images/right_brand_style.jpg" alt="" class="img-fluid">
							</div>
							<div class="gift-content">
								<h3>Right Brand/Style</h3>
								<p>In the world of fashion and accessories, brands play a significant role in determining our choices. Some brands are known for their trendy and fashionable designs, while others are known for their timeless classics or sustainable practices. When we choose a brand in this industry, we often consider factors like style, quality, durability, and ethical considerations. The right brand in fashion and accessories is the one that resonates with our personal style, provides the desired level of quality, and reflects our values.</p>
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="third-section">
	<div class="container-fluid p-0">
		<div class="row align-items-center no-gutters">
			<div class="col-lg-6">
				<div class="column-thumbnail">
					<img src="<?php echo base_url(); ?>assets/images/site-image/man-surprising-woman-with-present.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="content why-content">
					<h2 class="entry-title">Why Favorite Wish?</h2>
					<p>Favorite Wish serves as a free gift preference platform for adult teenagers, adults without
children, and all parents and grandparents. This service automates the clothing details that you
create, and if applicable, you can also include your children and their sizes, brand, style, and
color. We also have a miscellaneous option for you to include your furry family member! What
makes Favorite Wish unique, is the visibility of the updated profile display date, to ensure that
your family and friends capture the most recent and accurate size data.</p>
					<p>Join our community of thoughtful gift givers today and start making every occasion and “just
because” a memorable one. Say goodbye to returned gifts, and hello to heartfelt kept
surprises!</p>
					<div class="gift-btn-box">
						<a href="<?php echo base_url('about-us') ?>" class="theme-btn yellow-bg">Learn more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="third-section wishlist-section mt-5 theme-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="wishlist text-center">
					<h2 class="entry-title">Create your Wishlist Here and Now!</h2>
					<p>Let’s bring back the art of surprise gifting together</p>
					<div class="gift-btn-box">
						<a href="<?php echo base_url('sign-in') ?>" class="theme-btn yellow-bg">Join us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section class="fav-hero-section background-image section-padding" data-background="assets/images/site-image/man-surprising-woman-with-present.jpg">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-sm-12">
				
			</div>
			<div class="col-lg-4 offset-lg-1 col-sm-12">
				<div class="fav-login-panel">
					<div id="first">
						<div class="myform form">
							 <div class="logo mb-3">
								 <div class="col-md-12 text-center">
									<h1>Login</h1>
								 </div>
							</div>
							<form action="" method="post" name="login">
							   <div class="form-group">
								  <label for="exampleInputEmail1">Email Address</label>
								  <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
							   </div>
							   <div class="form-group">
								  <label for="exampleInputEmail1">Password</label>
								  <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
							   </div>
							   <div class="form-group d-none">
								  <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
							   </div>
							   <div class="col-md-12 text-center ">
								  <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm d-none">Login</button>
								  <a href="user-profile.html" class=" btn btn-block mybtn btn-primary tx-tfm">Login</a>
							   </div>
							   <div class="col-md-12 ">
								  <div class="login-or">
									 <hr class="hr-or">
									 <span class="span-or">or</span>
								  </div>
							   </div>
							   <div class="col-md-12 mb-3">
								  <p class="text-center">
									 <a href="javascript:void();" class="google btn mybtn">
									 <i class="fab fa-google-plus-g"></i> Sign in with Google
									 </a>
								  </p>
							   </div>
							   <div class="form-group">
								  <p class="text-center">Don't have account? <a href="#" id="signup">Sign up here</a></p>
							   </div>
							</form>
						</div>
					</div>
					
					<div id="second">
						<div class="myform form ">
							<div class="logo mb-3">
							   <div class="col-md-12 text-center">
								  <h1 >Signup</h1>
							   </div>
							</div>
							<form action="#" name="registration">
								<div class="form-group">
									<label for="exampleInputEmail1">First Name</label>
									<input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Last Name</label>
									<input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label>
									<input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
								</div>
								<div class="col-md-12 text-center mb-3">
									<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Create New Account</button>
									</div>
							   <div class="col-md-12 ">
									<div class="form-group">
										<p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
									</div>
								</div>											
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->