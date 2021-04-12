<?php include "header.php"; ?>
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
        $user_id = $fetch_info['id'];
		$status = $fetch_info['role_id'];
		$code = $fetch_info['code'];
        $profile_image = $fetch_info['profile_image'];
		if ($status == 0)
		{
			if ($code != 0)
			{
				header('Location: password-reset.php');
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
	header('Location: index.php');
}
?>
	<section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Dashboard</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

	<section class="dashboard_page pt-70 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="nav nav-pills nav-justified">
						<a class="nav-item nav-link" href="pending_ads.php">Pending Ads</a>
						<a class="nav-item nav-link" href="dashboard.php">Ad Listings</a>
						<a class="nav-item nav-link active" href="user_list.php">Users</a>
						<a class="nav-item nav-link" href="category_list.php">Categories</a>
						<a class="nav-item nav-link" href="spam_list.php">Spammed Users</a>
					</nav><br/>
					<!-- <div class="sidebar_profile mt-50">
						<div class="profile_user">
							<div class="user_author d-flex align-items-center">
								<div class="author"> <img src="profile_images/<?php echo "$profile_image" ?>" alt=""> </div>
								<div class="user_content media-body">
									<h6 class="author_name">User</h6>
									<p><?php echo $fetch_info['username'] ?></p>
								</div>
							</div>
							<div class="user_list">
								<ul>
									<li><a class="active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
									<li><a href="profile-settings.php"><i class="fas fa-cog"></i> Profile Settings</a></li>
									<li><a href="my-ads.html"><i class="fal fa-layer-group"></i> My Ads</a></li>
									<li><a href="offermessages.html"><i class="fal fa-envelope"></i> Offers/Messages</a></li>
									<li><a href="payments.html"><i class="fal fa-wallet"></i> Payments</a></li>
									<li><a href="favourite-ads.html"><i class="fal fa-heart"></i> My Favourites</a></li>
									<li><a href="privacy-setting.html"><i class="fal fa-star"></i> Privacy Settings</a></li>
									<li><a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>

				<div class="col-lg-12">

                    <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> text-center">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                    </div>
                    <?php endif ?>

					<div class="dashboard_content mt-20">
						<div class="post_title">
							<h5 class="title">Dashboard</h5> </div>
						<div class="row">
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-user"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Total Registered Users</a></h6>
										<?php
											$user_sql = "SELECT COUNT(*) AS count FROM `users` WHERE 1";
											$user_run_Sql = mysqli_query($con, $user_sql);
											while($row = mysqli_fetch_assoc($user_run_Sql)) {
												$output = $row['count'];
											}
										?>
										<p><?php echo $output;?> Users</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-user"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Total Banned Users</a></h6>
										<?php
											$user_sql = "SELECT COUNT(*) AS count FROM `users` WHERE `banned_on` = 1";
											$user_run_Sql = mysqli_query($con, $user_sql);
											while($row = mysqli_fetch_assoc($user_run_Sql)) {
												$banned_output = $row['count'];
											}
										?>
										<p><?php echo $banned_output;?>  Users</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-user"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Total Verified Users</a></h6>
										<?php
											//$user_sql = "SELECT COUNT(*) AS count FROM `users` WHERE `status` = 'verified'";

											$user_verified_sql = "SELECT COUNT(*) AS count FROM users as U WHERE U.status = 'verified'";
											$user__verified_run_Sql = mysqli_query($con, $user_verified_sql);
											while($row = mysqli_fetch_assoc($user__verified_run_Sql)) {
												$verified_output = $row['count'];
											}
										?>
										<p><?php echo $verified_output;?> Users</p>
									</div>
								</div>
							</div>
						</div>
						<div class="ads_table table-responsive mt-30">
							<table class="table">
								<thead>
									<tr>
										<th class="id">id</th>
										<th class="image">profile image</th>
										<th class="username">username</th>
										<th class="name">full name</th>
										<th class="email">email</th>
										<th class="phone">phone</th>
                                        <th class="status">status</th>
                                        <th class="banned">banned?</th>
                                        <th class="action">action</th>
									</tr>
								</thead>
								<tbody>

                                <?php 
                                    $sql = "SELECT * FROM users";
                                    $run_Sql = mysqli_query($con, $sql);
                                ?>
                                <?php while ($row = mysqli_fetch_assoc($run_Sql)): ?>
                                    <?php
                                        $sql_category = "SELECT * FROM category";
                                        $run_sql_category = mysqli_query($con, $sql_category);
                                        $fetch_info = mysqli_fetch_assoc($run_sql_category);
                                    ?>
                                    <tr>
										<td class="id">
                                            <div class="table_title">
												<p><?php echo $row['id']; ?></p>
											</div>
										</td>
										<td class="status">
                                            <div class="table_category">
												<div class="author"> <img src="../profile_images/<?php echo $row['profile_image']; ?>" alt=""> </div>
											</div>
										</td>
										<td class="user">
											<div class="table_title">
												<h6 class="titles"><?php echo $row['username']; ?></h6>
											</div>
										</td>
										<td class="status">
											<div class="table_category">
												<p><?php echo $row['full_name']; ?></p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p><?php echo $row['email']; ?></p>
											</div>
										</td>
										<td class="status">
                                            <div class="table_category">
												<p><?php echo $row['phone']; ?></p>
											</div>
										</td>

                                        <td class="status">
                                            <div class="table_category">
												<p><?php echo $row['status']; ?></p>
											</div>
										</td>
										<td class="status">
                                            <?php if ($row['banned_on'] == 0) { ?>
											<div class="table_status"> <span class="active">active</span> </div>
                                            <?php } else { ?>
                                            <div class="table_status"> <span class="inactive">banned</span> </div>
                                            <?php } ?>
										</td>
										<td class="action">
											<div class="table_action">
                                            <form action="dashboard.php" method="POST" autocomplete="">
												<ul>
                                                    <li><a data-toggle="modal" data-target="#id<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a></li>
													<?php if ($row['banned_on'] == 0) { ?>
													<li><a href="user_list.php?ban_user=<?php echo $row['id']; ?>"><i class="fas fa-ban"></i></a></li>
													<?php } else { ?>
													<li><a href="user_list.php?unban_user=<?php echo $row['id']; ?>"><i class="fas fa-check-circle"></i></a></li>
													<?php } ?>
													<li><a href="user_list.php?delete_user=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
                                            </form>
											</div>
										</td>
									</tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="id<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
<div class="col-lg">
    <div class="post_form">
        <div class="post_title">
            <h5 class="title">Ad Detail</h5>
        </div>
        <form action="dashboard.php" method="POST" autocomplete="" enctype="multipart/form-data">
            <div class="single_form">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required>
                <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" required>
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
                <input type="number" name="price" placeholder="Ad Your Price" value="<?php echo $row['price']; ?>" required>
            </div>
            <div class="single_form">
                <textarea name="adpost" placeholder="Ad Post" required><?php echo $row['content']; ?></textarea>
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
<div class="col-lg">
    <div class="sidebar_post_form">
        <div class="post_title">
            <h5 class="title">Contact Detail</h5>
        </div>
        <!-- <form action="#"> -->
            <div class="single_form">
                <input type="text" name="phone" placeholder="Phone" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="single_form">
                <input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
            </div>
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
            <div class="single_form">
                <button class="main-btn" type="submit" name="update_ad" value="Post Ad">Update</button>
            </div>
        </form>
    </div>
</div>

                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                <?php endwhile; ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>