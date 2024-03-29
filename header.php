<!doctype html>
<html class="no-js" lang="en">
<?php 
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$admin = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$user_id = isset($user_id) ? $user_id : '';
?>
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

    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
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
                            <?php if ($admin == "admin") { ?>                            
                            <li>
                                <a href="admin/dashboard.php">Dashboard <span class="line"></span></a>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a href="index.php">Home <span class="line"></span></a>
                            </li>
                            <li>
                                <a href="dashboard.php">Dashboard <span class="line"></span></a>
                            </li>
                            <?php } ?>
                            <?php
                                $sql_noti = "SELECT * FROM `moderate_user` WHERE user_id = '$user_id'";
                                $run_sql_noti = mysqli_query($con, $sql_noti);
                                $fetch_noti = mysqli_fetch_assoc($run_sql_noti);
                            ?>
                            <?php if (isset($fetch_noti) && $fetch_noti['reason'] != "") { ?>
                            <li>
                                <a data-toggle="modal" data-target="#idnoti">Notification <i style="color:red;" class="fas fa-bell"></i><span class="line"></span></a>
                                <!-- <a href="#">Notification <span class="line"></span></a> -->
                            </li>
                            <?php } else {}?>

                        </ul>
                    </div>

                    <?php if ($admin == "admin") { ?>

                    <div class="navbar_btn">
                        <ul>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My Account</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ul>
                                            <li><a href="admin/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                                            <li><a href="admin/logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a class="sign-up" href="admin/logout.php">Log Out</a></li>
                        </ul>
                    </div>

                    <?php } elseif ($email != false && $password != false) { ?>

                    <div class="navbar_btn">
                        <ul>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My Account</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ul>
                                            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                                            <li><a href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li>
                                            <li><a href="favourite-ads.php"><i class="fas fa-heart"></i> My Favourites</a></li>
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

            <!-- Modal -->
            <div class="modal fade" id="idnoti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">You Are Banned</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-lg">
                        <div class="post_form">
                            <div class="post_title">
                            <?php if (isset($fetch_noti)) { ?>
                                  <h5 class="title"><?php echo $fetch_noti['reason']; ?></h5>
                            <?php }?>        
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

    <!--====== HEADER PART ENDS ======-->
