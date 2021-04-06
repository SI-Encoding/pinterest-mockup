<?php require_once "controller.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false)
{
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$run_Sql = mysqli_query($con, $sql);
	if ($run_Sql)
	{
		$fetch_info = mysqli_fetch_assoc($run_Sql);
        $id = $fetch_info['id'];
		$name = $fetch_info['username'];
		$fullname = $fetch_info['full_name'];
		$phone = $fetch_info['phone'];
		$status = $fetch_info['status'];
		$code = $fetch_info['code'];
		if ($status == "verified")
		{
			if ($code != 0)
			{
				header('Location: verify-code.php');
			}
		}
		else
		{
			header('Location: user-otp.php');
		}
	}
}
else
{
	header('Location: login.php');
}
?>
<?php include "header.php"; ?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Post Ad</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Post Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


	<section class="post_ads_page pt-70 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="sidebar_profile mt-50">
						<div class="profile_user">
							<div class="user_author d-flex align-items-center">
								<div class="author">
									<img src="assets/images/author-1.jpg" alt="">
								</div>
								<div class="user_content media-body">
									<h6 class="author_name">User</h6>
									<p><?php echo $fetch_info['username'] ?></p>
								</div>
							</div>
							<div class="user_list">
								<ul>
									<li><a class="active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
									<li><a href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li>
									<!-- <li><a href="my-ads.html"><i class="fal fa-layer-group"></i> My Ads</a></li>
									<li><a href="offermessages.html"><i class="fal fa-envelope"></i> Offers/Messages</a></li>
									<li><a href="payments.html"><i class="fal fa-wallet"></i> Payments</a></li>
									<li><a href="favourite-ads.html"><i class="fal fa-heart"></i> My Favourites</a></li>
									<li><a href="privacy-setting.html"><i class="fal fa-star"></i> Privacy Settings</a></li> -->
									<li><a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">

                <?php echo $message['works']; ?>

                <?php if(count($success) == 1){ ?>

                <div class="alert alert-success text-center">
                    <?php foreach($success as $showerror){ echo $showerror; } ?>
                </div>

                <?php } elseif(count($success) > 1){ ?>

                <div class="alert alert-success">
                    <?php foreach($success as $showerror){ ?>
                        <li><?php echo $showerror; ?></li>
                    <?php } ?>
                </div>

                <?php } ?>

					<div class="post_form mt-50">
						<div class="post_title">
							<h5 class="title">Ad Detail</h5>
						</div>
						<form action="post-ad.php" method="POST" autocomplete="" enctype="multipart/form-data">
							<div class="single_form">
								<input type="text" name="title" placeholder="Title" required>
							</div>
							<div class="single_form">
								<select>
									<option value="none">Select Categories</option>
									<option value="none">Mobiles</option>
									<option value="none">Electronics</option>
									<option value="none">Real Estate</option>
									<option value="none">Vehicles</option>
								</select>
							</div>
							<div class="single_form">
								<input type="number" name="price" placeholder="Ad Your Price" required>
							</div>
							<div class="single_form">
								<textarea name="adpost" placeholder="Ad Post" required></textarea>
							</div>
							<div class="post_upload_file">
								<label for="upload">
								<span>Select image to upload</span>
								<span></span>
								<span class="main-btn">Select Files</span>
								<span>Maximum upload file size: 500 KB</span>
								<input type="file" name="file" id="upload">
								</label>
							</div>
						<!-- </form> -->
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar_post_form mt-50">
						<div class="post_title">
							<h5 class="title">Contact Detail</h5>
						</div>
						<!-- <form action="#"> -->
							<div class="single_form">
								<input type="text" name="phone" placeholder="Phone" value="<?php echo $phone ?>">
							</div>
							<div class="single_form">
								<input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
							</div>
							<!-- <div class="single_form">
								<input type="text" placeholder="Enter Address">
							</div> -->
							<div class="single_form">
								<select name="country" required>
									<option value="Canada">Canada</option>
									<option value="United States">United States</option>
								</select>
							</div>
							<div class="single_form">
								<select name="state" required>
									<option value="British Columbia">British Columbia</option>
									<option value="Alberta">Alberta</option>
								</select>
							</div>
							<div class="single_form">
								<select name="city" required>
									<option value="Vancouver">Vancouver</option>
									<option value="Edmonton">Edmonton</option>
								</select>
							</div>
							<!-- <div class="single_form">
								<input type="checkbox" name="checkbox" id="checkbox2">
								<label for="checkbox2"></label>
								<span>I agree to all Terms of Use & Posting Rules</span>
							</div> -->
							<div class="single_form">
								<button class="main-btn" type="submit" name="postad" value="Post Ad">Post Ad</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>