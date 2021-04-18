<?php include "header.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false)
{
	$sql = "SELECT * FROM admins WHERE email = '$email'";
	$run_Sql = mysqli_query($con, $sql);
	if ($run_Sql)
	{
		$fetch_info = mysqli_fetch_assoc($run_Sql);
        $user_id = $fetch_info['id'];
		$status = $fetch_info['role_id'];
		if ($status == 0)
		{

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
						<a class="nav-item nav-link" href="user_list.php">Users</a>
						<a class="nav-item nav-link active" href="user_logs.php">User Logs</a>
					<!--	<a class="nav-item nav-link" href="category_list.php">Categories</a> -->
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
							<h5 class="title">Logs</h5> </div>
						<div class="ads_table table-responsive mt-30">
							<table class="table">
								<thead>
									<tr>
										<th class="id">id</th>
										<th class="action">action</th>
										<th class="date">date</th>
										<th class="info">info</th>
										<th class="id">user_id</th>
										<th class="username">username</th>
										<th class="email">email</th>
										<th class="full_name">full_name</th>
										<th class="phone">phone</th>
									</tr>
								</thead>
								<tbody>

                                <?php 
                                    $sql = "SELECT * FROM logs";
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
                                                <p><?php echo $row['action']; ?></p>
											</div>
										</td>
										<td class="status">
											<div class="table_category">
												<p><?php echo $row['date']; ?></p>
											</div>
										</td>
										<td class="status">
											<div class="table_category">
												<p><?php echo $row['info']; ?></p>
											</div>
										</td>
                                        <td class="status">
                                            <div class="table_category">
                                                <p><?php echo $row['user_id']; ?></p>
											</div>
										</td>

										<td class="status">
											<div class="table_category">
												<p><?php echo $row['username']; ?></p>
											</div>
										</td>
										<td class="status">
											<div class="table_category">
												<p><?php echo $row['email']; ?></p>
											</div>
										</td>
                                        <td class="status">
                                            <div class="table_category">
                                                <p><?php echo $row['full_name']; ?></p>
											</div>
										</td>

										<td class="status">
											<div class="table_category">
												<p><?php echo $row['phone']; ?></p>
											</div>
										</td>

									</tr>

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