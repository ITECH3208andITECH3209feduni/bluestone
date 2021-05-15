<!DOCTYPE html>

<?php
    # Starting session
    session_start();
    # if user is logged in
    if(isset($_SESSION["user_info"]) && !empty($_SESSION["user_info"])){
         # if user is student
         if($_SESSION["user_info"]['user_type']=='student'){
            echo "Student Logged In";
        }
        # if user is admin
        if($_SESSION["user_info"]['user_type']=='admin'){
            /* Redirect browser */
            header("Location: http://localhost/bluestone/admin.php"); 
            exit();
        }
    }else{
        /* Redirect browser */
        header("Location: http://localhost/bluestone/login.php"); 
        exit();
    }
?>

<html lang="en" class="js-focus-visible" data-js-focus-visible="" style="height: auto">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Basic Page Needs
	================================================== -->

    <title>Bluestone Overseas Consultants - One Stop for All your International Needs</title>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Favicons
	================================================== -->
    <link rel="icon" href="https://bluestoneocs.com/img/favicon/favicon-32x32.png" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://bluestoneocs.com/img/favicon/favicon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://bluestoneocs.com/img/favicon/favicon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" href="https://bluestoneocs.com/img/favicon/favicon-54x54.png" />

    <!-- CSS
	================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- Template styles-->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Responsive styles-->
    <link rel="stylesheet" href="./css/responsive.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" href="./css/animate.css" />
    <!-- Prettyphoto -->
    <link rel="stylesheet" href="./css/prettyPhoto.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.css" />
    <link rel="stylesheet" href="./css/owl.theme.css" />
    <!-- Flexslider -->
    <link rel="stylesheet" href="./css/flexslider.css" />
    <!-- Flexslider -->
    <link rel="stylesheet" href="./css/cd-hero.css" />
    <!-- Custom CSS-->
    <link rel="stylesheet" href="./css/custom.css" />
    <!-- Style Swicther -->
    <link id="style-switch" href="./css/preset3.css" media="screen" rel="stylesheet" type="text/css" />



    <style type="text/css">
        @font-face {
            font-weight: 400;
            font-style: normal;
            font-family: "Circular-Loom";
            src: url("https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2") format("woff2");
        }
        
        @font-face {
            font-weight: 500;
            font-style: normal;
            font-family: "Circular-Loom";
            src: url("https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2") format("woff2");
        }
        
        @font-face {
            font-weight: 700;
            font-style: normal;
            font-family: "Circular-Loom";
            src: url("https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2") format("woff2");
        }
        
        @font-face {
            font-weight: 900;
            font-style: normal;
            font-family: "Circular-Loom";
            src: url("https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2") format("woff2");
        }
    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1010.0" data-gr-ext-installed="">
    <div class="body-inner">
        <!-- Header start -->
        <header id="header" class="navbar-fixed-top header header-solid animated fadeInDown" role="banner">
            <div class="container">
                <div class="row">
                    <!-- Logo start -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        <div class="navbar-brand navbar-bg">
                            <a href="https://bluestoneocs.com/index.php">
                                <img class="img-responsive" src="./images/logo.png" alt="logo" />
                            </a>
                        </div>
                    </div>
                    <!--/ Logo end -->
                    <nav class="collapse navbar-collapse clearfix" role="navigation">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="https://bluestoneocs.com/index.php">Home </a>
                            </li>
                            <li class="dropdown">
                                <a href="https://bluestoneocs.com/gallery.html#" class="dropdown-toggle" data-toggle="dropdown">Company <i class="fa fa-angle-down"></i
									></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="https://bluestoneocs.com/about.html">About Us</a></li>
                                        <li><a href="https://bluestoneocs.com/countries.html">Countries</a></li>
                                        <li><a href="https://bluestoneocs.com/testimonial.html">Testimonials</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="https://bluestoneocs.com/gallery.html">Gallery</a>
                            </li>
                            <li>
                                <a href="https://bluestoneocs.com/register.html">Events</a>
                            </li>
                            <li>
                                <a href="https://bluestoneocs.com/faq.html">Faq</a>
                            </li>
                            <li>
                                <a href="https://bluestoneocs.com/contact.html">Contact</a>
                            </li>
                            <?php 
                                # if user is logged in
                                if(isset($_SESSION["user_info"]) && !empty($_SESSION["user_info"])){ ?>
                                    <li class="active">
                                        <a href="logout.php">Logout</a>
                                    </li>
                               <?php } else { ?>
                                <li class="active">
                                    <a href="index.php">Register</a>
                                </li>
                                <li>
                                    <a href="login.php">Login</a>
                                </li>
                               <?php } ?>


                        </ul>
                    </nav>
                    <!--/ Navigation end -->
                </div>
                <!--/ Row end -->
            </div>
            <!--/ Container end -->
        </header>
        <!--/ Header end -->
        <section class="main">
        <h1>Student Panel</h1>  
        </section>
        <!-- footer -->

        <div class="gap-40"></div>

        <!-- Copyright start -->
        <section id="copyright" class="copyright angle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-social unstyled">
                            <li>
                                <a title="Twitter" href="https://www.twitter.com/bluestoneocs" target="_blank">
                                    <span class="icon-pentagon wow bounceIn" style="
												visibility: hidden;
												-webkit-animation-name: none;
												-moz-animation-name: none;
												animation-name: none;
											"><i class="fa fa-twitter"></i
										></span>
                                </a>
                                <a title="Facebook" href="https://www.facebook.com/bluestoneocs" target="_blank">
                                    <span class="icon-pentagon wow bounceIn" style="
												visibility: hidden;
												-webkit-animation-name: none;
												-moz-animation-name: none;
												animation-name: none;
											"><i class="fa fa-facebook"></i
										></span>
                                </a>
                                <a title="linkedin" href="https://www.linkedin.com/company/bluestoneocs" target="_blank">
                                    <span class="icon-pentagon wow bounceIn" style="
												visibility: hidden;
												-webkit-animation-name: none;
												-moz-animation-name: none;
												animation-name: none;
											"><i class="fa fa-linkedin"></i
										></span>
                                </a>
                                <a title="Web" href="https://bluestoneocs.business.site/" target="_blank">
                                    <span class="icon-pentagon wow bounceIn" style="
												visibility: hidden;
												-webkit-animation-name: none;
												-moz-animation-name: none;
												animation-name: none;
											"><i class="fa fa-dribbble"></i
										></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Row end -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright-info">
                            © Copyright 2021.
                            <span>Designed by
									<a href="http://www.feduni.com/" target="_blank"
										>M1 Team:Feduni</a
									></span
								>
							</div>
						</div>
					</div>
					<!--/ Row end -->
					<div
						id="back-to-top"
						data-spy="affix"
						data-offset-top="10"
						class="back-to-top affix-top"
						data-original-title=""
						title=""
					>
						<button class="btn btn-primary" title="Back to Top">
							<i class="fa fa-angle-double-up"></i>
						</button>
					</div>
				</div>
				<!--/ Container end -->
			</section>
			<!--/ Copyright end -->

			<!-- Javascript Files
================================================== -->

			<!-- initialize jQuery Library -->
			<script type="text/javascript" src="./js/jquery.js"></script>
			<!-- Bootstrap jQuery -->
			<script type="text/javascript" src="./js/bootstrap.min.js"></script>
			<!-- Style Switcher -->
			<script type="text/javascript" src="./js/style-switcher.js"></script>
			<!-- Owl Carousel -->
			<script type="text/javascript" src="./js/owl.carousel.js"></script>
			<!-- PrettyPhoto -->
			<script type="text/javascript" src="./js/jquery.prettyPhoto.js"></script>
			<!-- Bxslider -->
			<script type="text/javascript" src="./js/jquery.flexslider.js"></script>
			<!-- CD Hero slider -->
			<script type="text/javascript" src="./js/cd-hero.js"></script>
			<!-- Isotope -->
			<script type="text/javascript" src="./js/isotope.js"></script>
			<script type="text/javascript" src="./js/ini.isotope.js"></script>
			<!-- Wow Animation -->
			<script type="text/javascript" src="./js/wow.min.js"></script>
			<!-- SmoothScroll -->
			<script type="text/javascript" src="./js/smoothscroll.js"></script>
			<!-- Eeasing -->
			<script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
			<!-- Counter -->
			<script type="text/javascript" src="./js/jquery.counterup.min.js"></script>
			<!-- Waypoints -->
			<script type="text/javascript" src="./js/waypoints.min.js"></script>
			<!-- Template custom -->
			<script type="text/javascript" src="./js/custom.js"></script>
			<script type="text/javascript" src="./js/js.js"></script>
			<script type="text/javascript" src="./js/form-validation.js"></script>
		</div>
		<!-- Body inner end -->
	</body>
</html>