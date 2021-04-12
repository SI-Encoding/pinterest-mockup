<?php include_once "admin_controller.php"; ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Home | ClassiFied</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="gray-bg">

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header_area">

        <div class="header_navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/images/logo.png" alt="logo">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="fasse" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li>
                                <a class="active" href="index.php">Home <span class="line"></span></a>
                            </li>
                            <li>
                                <a href="#">Categories <span class="line"></span></a>
                            </li>
                            <li>
                                <a href="#">Contact <span class="line"></span></a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    if($email != false && $password != false){ ?>

                    <div class="navbar_btn">
                        <ul>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My Account</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ul>
                                            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                                            <li><a href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li>
                                            <!-- <li><a href="my-ads.html"><i class="fas fa-layer-group"></i> My Ads</a></li>
                                            <li><a href="offermessages.html"><i class="fas fa-envelope"></i> Offers/Messages</a></li>
                                            <li><a href="payments.html"><i class="fas fa-wallet"></i> Payments</a></li>
                                            <li><a href="favourite-ads.html"><i class="fas fa-heart"></i> My Favourites</a></li>
                                            <li><a href="privacy-setting.html"><i class="fas fa-star"></i> Privacy Settings</a></li> -->
                                            <li><a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="sign-up" href="post-ad.php">Post Ads</a></li>
                        </ul>
                    </div>

                    <?php } else { ?>

                    <div class="navbar_btn">
                        <ul>
                            <li><a href="login.php">Login<span class="line"></span></a></li>
                            <li><a class="sign-up" href="register.php">Sign Up</a></li>
                        </ul>
                    </div>

                    <?php } ?>
                </nav>
            </div>
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Login</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sign_in_area pt-120 pb-120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-9">
                    <?php if(count($errors) > 0){ ?>

                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>

                    <?php } ?>
					<div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">Login Now</h5> </div>
						<form action="index.php" method="POST" autocomplete="">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="email" name="email" placeholder="Email Address" required value="test@test.com"> <i class="fas fa-user"></i> </div>
								<div class="single_form">
									<input type="password" name="password" placeholder="Password" required value="11"> <i class="fas fa-key"></i> </div>
								<div class="single_form">
									<button class="main-btn" type="submit" name="login" value="Login">Login</button>
								</div>
							</div>
						</form>
					</div>
                    <br/>
                    <div class="link login-link text-center">Not yet a member? <a href="register.php">Signup now</a></div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>