<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="<?php echo $metaDescription; ?>">
<meta name="keywords" content="<?php echo $metaKeywords; ?>">

<title><?php echo $title; ?> - Favorite Wish</title>

<!-- Fav Icon -->
<link rel="icon" href="<?php echo base_url(); ?>assets/images/site-image/favicon.jpg" type="image/x-icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome-all.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/owl.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/color.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/elpath.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
<script> var BASE_URL = "<?php echo base_url() ?>"</script>

</head>
<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">
        <!-- main header -->
        <header class="main-header">
            <!-- header-lower -->
			<div class="header-lower">
				<div class="outer-box">
					<div class="logo-box">
						<figure class="logo">
							<a href="<?php echo base_url(); ?>">
								<img src="<?php echo base_url(); ?>assets/images/site-image/logo1.png" alt="Favorite Wish" class="img-fluid">
							</a>
						</figure>
					</div>
					<div class="menu-area d-flexs align-items-center d-none">
						<nav class="main-menu mr-5">
							<ul class="navigation">
								<li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li><a href="<?php echo base_url('/about-us'); ?>">About Us</a></li>                           
								<li><a href="<?php echo base_url('/contact-us'); ?>">Contact Us</a></li>
							</ul>
						</nav>
						<div class="header-btn d-none d-xl-block">
							<a href="javascript:void();" class="theme-btn yellow-bg">Join Us</a>
							<a href="javascript:void();" class="theme-btn outline-btn">Sign In</a>
						</div>
					</div>	
					
					<nav class="fullscreen-nav">
						<?php
						if ($this->session->userdata('ci_session_key_generate') == FALSE) {								
							echo '';
						} else {
							//echo '<span class="user-info mr-4">Hello! '.$userInfo['full_name'].'</span>';
							//echo '<a href="avascript:void();" class="theme-btn dark-bg mr-5">Advertise</a>';
							echo '<a href="'.base_url().'user-dashboard" class="user-account mr-4"><i class="fas fa-user-circle fa-lg"></i></a>';
							echo '<a href="'.base_url().'favoritewish/logout" class="user-account"><i class="fas fa-sign-out-alt fa-lg"></i></a>';
						}
						?>
						<button class="fs-toggle-menu">
							<span></span>
						</button>
					</nav>
				</div>
			</div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div id="fs-menu" class="">
			<nav class="fs-main-nav">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url('/about-us'); ?>">About Us</a></li>                           
					<li><a href="<?php echo base_url('/contact-us'); ?>">Contact Us</a></li>
					<?php
					if ($this->session->userdata('ci_session_key_generate') == FALSE) {								
						echo '<a href="'.base_url().'sign-in">Login/Register</a>';
					} else {
						echo '<a href="'.base_url().'user-dashboard">My Account</a>';
					}
					?>
				</ul>
			</nav>
			<!--<footer class="menu-footer">
				<nav class="footer-nav">
					<ul>
						<li>
							<a href="#">
								<object type="image/svg+xml" data="assets/images/site-image/twitter.svg"></object>
								Twitter
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-envelope fa-fw"></i>
								Subscribe
							</a>
						</li>
					</ul>
				</nav>
			</footer>-->
		</div><!-- End Mobile Menu -->
		
		<main class="main-content">