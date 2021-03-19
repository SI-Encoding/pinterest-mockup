<?php require_once "controller.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['username'];
        $fullname = $fetch_info['full_name'];
        $phone = $fetch_info['phone'];
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: verify-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
<?php include "header.php"?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Profile Settings</h3>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Profile Settings</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-settings_page pt-70 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="sidebar_profile mt-50">
						<div class="profile_user">
							<div class="user_author d-flex align-items-center">
								<div class="author"> <img src="assets/images/author-1.jpg" alt=""> </div>
								<div class="user_content media-body">
									<h6 class="author_name">User</h6>
									<p><?php echo $fetch_info['username'] ?></p>
								</div>
							</div>
							<div class="user_list">
								<ul>
									<li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
									<li><a class="active" href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li>
									<!-- <li><a href="my-ads.html"><i class="fal fa-layer-group"></i> My Ads</a></li>
									<li><a href="offermessages.html"><i class="fal fa-envelope"></i> Offers/Messages</a></li>
									<li><a href="payments.html"><i class="fal fa-wallet"></i> Payments</a></li>
									<li><a href="favourite-ads.html"><i class="fal fa-heart"></i> My Favourites</a></li>
									<li><a href="privacy-setting.html"><i class="fal fa-star"></i> Privacy Settings</a></li> -->
									<li><a href="logout.php"><i class="fas fa-door-open"></i> Sign Out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">

                    <?php if(count($errors) == 1){ ?>

                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>

                    <?php } elseif(count($errors) > 1){ ?>

                        <div class="alert alert-danger">
                            <?php foreach($errors as $showerror){ ?>
                                <li><?php echo $showerror; ?></li>
                            <?php } ?>
                        </div>

                    <?php } ?>

					<div class="post_form mt-50">
						<div class="post_title">
							<h5 class="title">Profile Settings</h5> </div>
						<form action="profile-settings.php" method="POST" autocomplete="">
							<div class="row">
								<div class="col-md-6">
									<div class="single_form">
										<input type="text" maxlength="30" name="username" placeholder="Username" required value="<?php echo $name ?>"> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input type="text" maxlength="50" name="name"  placeholder="Full Name" value="<?php echo $fullname ?>"> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>"> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input type="text" maxlength="15" name="phone" placeholder="Phone Number" value="<?php echo $phone ?>"> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input type="password" name="password" placeholder="Password" required> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<input type="checkbox" name="checkbox" id="checkbox">
										<label for="checkbox"></label> <span>Subscribe me to Newsletter</span> </div>
								</div>
								<div class="col-md-6">
									<div class="single_form">
										<button class="main-btn" type="submit" name="update" value="Update">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    
<?php include "footer.php"?>