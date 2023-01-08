<?php include "header.php"; ?>

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
						<a class="nav-item nav-link active" href="dashboard.php">Ad Listings</a>
						<a class="nav-item nav-link" href="user_list.php">Users</a>
						<a class="nav-item nav-link" href="user_logs.php">User Logs</a>
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
							<h5 class="title">Ad Listings</h5> </div>
						<div class="row">
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-file-alt"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Total Created Ads</a></h6>
										<?php
											$user_sql = "SELECT COUNT(*) AS count FROM `ad_listings` WHERE 1";
											$user_run_Sql = mysqli_query($con, $user_sql);
											while($row = mysqli_fetch_assoc($user_run_Sql)) {
												$output = $row['count'];
											}
										?>
										<p><?php echo $output; ?> Ads</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-file-alt"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="#">Featured Ads</a></h6>
										<?php
											$user_sql = "SELECT COUNT(*) AS count FROM `ad_listings` WHERE `featured_on` = 1";
											$user_run_Sql = mysqli_query($con, $user_sql);
											while($row = mysqli_fetch_assoc($user_run_Sql)) {
												$output = $row['count'];
											}
										?>
										<p><?php echo $output; ?> Ads</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single_dashboard_box d-flex">
									<div class="box_icon"> <i class="fas fa-file"></i> </div>
									<div class="box_content media-body">
										<h6 class="title"><a href="pending_ads.php">Inactive Ads</a></h6>
										<?php
											$user_sql = "SELECT COUNT(*) AS count FROM `ad_listings` WHERE `active_on` = 0";
											$user_run_Sql = mysqli_query($con, $user_sql);
											while($row = mysqli_fetch_assoc($user_run_Sql)) {
												$output = $row['count'];
											}
										?>
										<p><?php echo $output; ?> Ads</p>
									</div>
								</div>
							</div>
						</div>
						<div class="ads_table table-responsive mt-30">
							<table class="table">
								<thead>
									<tr>
										<th class="photo">Photo</th>
										<th class="title">User</th>
										<th class="title">Title</th>
										<th class="category">Category</th>
										<th class="status">Ad Status</th>
										<th class="price">Price</th>
										<th class="action">Action</th>
									</tr>
								</thead>
								<tbody>

                                <?php
									//print_r($fileName);
                                    $sql = "SELECT * FROM ad_listings";
                                    $run_Sql = mysqli_query($con, $sql);
                                ?>
                                <?php while ($row = mysqli_fetch_assoc($run_Sql)): ?>
                                    <?php
                                        $category_id = $row['category_id'];
                                        $sql_category = "SELECT * FROM category WHERE id ='$category_id'";
                                        $run_sql_category = mysqli_query($con, $sql_category);
                                        $fetch_info = mysqli_fetch_assoc($run_sql_category);

										$listing_id = $row['id'];
										$sql_image = "SELECT * FROM ad_images WHERE listing_id ='$listing_id'";
										$run_sql_image = mysqli_query($con, $sql_image);
										$fetch_image = mysqli_fetch_assoc($run_sql_image);
                                    ?>
                                    <tr>
										<td class="photo">
											<div class="table_photo"> <img src="../uploads/<?php if ($fetch_image['image'] == '') { echo "no-image.png";} else { echo $fetch_image['image']; } ?>" alt="ads"> </div>
										</td>
										<td class="user">
											<div class="table_title">
												<h6 class="titles"><?php echo $row['user_id']; ?></h6>
											</div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles"><?php echo $row['title']; ?></h6>
												<p>Ad ID: <?php echo $row['id']; ?></p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p><?php echo $fetch_info['name']; ?></p>
											</div>
										</td>
										<td class="status">
                                            <?php if ($row['active_on'] == 0) { ?>
											<div class="table_status"> <span class="inactive">inactive</span> </div>
                                            <?php } else { ?>
                                            <div class="table_status"> <span class="active">active</span> </div>
                                            <?php } ?>
										</td>
										<td class="price">
											<div class="table_price"> <span>$<?php echo $row['price']; ?></span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="../adpost.php?view=<?php echo $row['id']; ?>" target="_blank"><i class="fas fa-eye"></i></a></li>
                                                   <li><a data-toggle="modal" data-target="#id<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="dashboard.php?ban=<?php echo $row['id']; ?>"><i class="fas fa-ban"></i></a></li>
													<li><a href="dashboard.php?delete=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
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

        <form action="dashboard.php" method="POST" enctype="multipart/form-data">

			<div class="single_form">

			<select name="featured_on">
				<option value="0">featured off</option>
				<option value="1">featured on: make the ad featured</option>
			</select>
			</div>

            <div class="single_form">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required>
                <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="single_form">

				<?php 
				$sql_category2 = "SELECT * FROM category";
				$run_sql_category2 = mysqli_query($con, $sql_category2);
				?>

                <select name="category_id">
				<?php while ($fetch_info2 = mysqli_fetch_assoc($run_sql_category2)): ?>
                    <option value="<?php echo $fetch_info2['id']; ?>"><?php echo $fetch_info2['name']; ?></option>
				<?php endwhile; ?> 
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
                <input type="file" class="form-control-file" name="<?php echo $row['id']; ?>" id="upload">
                </label>
            </div>

            <div class="single_form">
                <input type="text" name="phone" placeholder="Phone">
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