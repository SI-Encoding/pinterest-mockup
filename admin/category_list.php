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
						<a class="nav-item nav-link" href="user_list.php">Users</a>
						<a class="nav-item nav-link active" href="category_list.php">Categories</a>
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
							<h5 class="title">Categories </h5> <br/><div class="text-right"><button data-toggle="modal" data-target="#addCat" type="button" class="btn main-btn btn-sm">Add a Category</button></div>
                        </div>
						<!-- <div class="row">
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-file-alt"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Total Ad Posted</a></h6>
										<p>480 Add Posted</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-file"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Featured Ads</a></h6>
										<p>80 Add Posted</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-envelope-open-text"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Offers / Messages</a></h6>
										<p>2040 Add Posted</p>
									</div>
								</div>
							</div>
						</div> -->
						<div class="ads_table table-responsive mt-30">
							<table class="table">
								<thead>
									<tr>
										<th class="id">id</th>
										<th class="name">name</th>
										<th class="description">description</th>
                                        <th class="action">action</th>
									</tr>
								</thead>
								<tbody>

                                <?php 
                                    $sql = "SELECT * FROM `category`";
                                    $run_Sql = mysqli_query($con, $sql);
                                ?>
                                <?php while ($row = mysqli_fetch_assoc($run_Sql)): ?>
                                    <tr>
										<td class="id">
                                            <div class="table_title">
												<p><?php echo $row['id']; ?></p>
											</div>
										</td>
										<td class="user">
											<div class="table_title">
												<h6 class="titles"><?php echo $row['name']; ?></h6>
											</div>
										</td>
										<td class="status">
											<div class="table_category">
												<p><?php echo $row['description']; ?></p>
											</div>
										</td>

										<td class="action">
											<div class="table_action">
                                            <!-- <form action="dashboard.php" method="POST" autocomplete=""> -->
												<ul>
                                                    <li><a data-toggle="modal" data-target="#id<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="category_list.php?delete_category=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
                                            <!-- </form> -->
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
                                                <div class="sidebar_post_form">
                                                    <div class="post_title">
                                                        <h5 class="title">Category</h5>
                                                    </div>
                                                    <form action="category_list.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                                        <div class="single_form">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <input type="text" name="name" placeholder="Category Name" value="<?php echo $row['name']; ?>">
                                                        </div>
                                                        <div class="single_form">
                                                            <input type="text" name="description" placeholder="Category Description" required value="<?php echo $row['description']; ?>">
                                                        </div>
                                                        <div class="single_form">
                                                            <button class="main-btn" type="submit" name="update_category" value="Post Ad">Update</button>
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

                            <!-- Modal -->
                            <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <div class="sidebar_post_form">
                                            <div class="post_title">
                                                <h5 class="title">Category</h5>
                                            </div>
                                            <form action="category_list.php" method="POST" autocomplete="" enctype="multipart/form-data">
                                                <div class="single_form">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="text" name="name" placeholder="Category Name" value="<?php echo $row['name']; ?>">
                                                </div>
                                                <div class="single_form">
                                                    <input type="text" name="description" placeholder="Category Description" required value="<?php echo $row['description']; ?>">
                                                </div>
                                                <div class="single_form">
                                                    <button class="main-btn" type="submit" name="add_category" value="Add Category">Add Category</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    </div>
                                    </div>
                                </div>
                            </div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>