<?php require_once "admin_controller.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false)
{
	$sql = "SELECT * FROM admins WHERE email = '$email'";
	$run_Sql = mysqli_query($con, $sql);
	// if ($run_Sql)
	// {
	// 	$fetch_info = mysqli_fetch_assoc($run_Sql);
    //     $user_id = $fetch_info['id'];
	// 	$status = $fetch_info['role_id'];
	// 	$code = $fetch_info['code'];
    //     $profile_image = $fetch_info['profile_image'];
	// 	if ($status == 0)
	// 	{
	// 		if ($code != 0)
	// 		{
	// 			header('Location: password-reset.php');
	// 		}
	// 	}
	// 	else
	// 	{
	// 		header('Location: user-otp.php');
	// 	}
	// }
}
else
{
	header('Location: index.php');
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Pinterest-mockup</title>

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
                            <!-- <li>
                                <a class="active" href="dashboard.php">Dashboard <span class="line"></span></a>
                            </li> -->
                            <!-- <li>
                                <a href="#">Contact <span class="line"></span></a>
                            </li> -->
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
                                            <!-- <li><a href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li> -->
                                            <li><a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="sign-up" href="logout.php">logout</a></li>
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
