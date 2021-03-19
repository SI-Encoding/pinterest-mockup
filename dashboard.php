<?php require_once "controller.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: password_reset.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
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
									<li><a class="active" href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
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
				<div class="col-lg-9">
					<div class="dashboard_content mt-50">
						<div class="post_title">
							<h5 class="title">Dashboard</h5> </div>
						<div class="row">
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
						</div>
						<div class="ads_table table-responsive mt-30">
							<table class="table">
								<thead>
									<tr>
										<th class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</th>
										<th class="photo">Photo</th>
										<th class="title">Title</th>
										<th class="category">Category</th>
										<th class="status">Ad Status</th>
										<th class="price">Price</th>
										<th class="action">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox2">
												<label for="checkbox2"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-1.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="active">active</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox3">
												<label for="checkbox3"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-2.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="active">active</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox4">
												<label for="checkbox4"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-3.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="sold">Sold</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox5">
												<label for="checkbox5"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-4.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="expired">Expired</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox6">
												<label for="checkbox6"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-5.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="inactive">Inactive</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox7">
												<label for="checkbox7"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-6.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="expired">Expired</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td class="checkbox">
											<div class="table_checkbox">
												<input type="checkbox" id="checkbox7">
												<label for="checkbox7"></label>
											</div>
										</td>
										<td class="photo">
											<div class="table_photo"> <img src="assets/images/ads-7.png" alt="ads"> </div>
										</td>
										<td class="title">
											<div class="table_title">
												<h6 class="titles">8 GB DDR4 Ram, 4th Gen</h6>
												<p>Ad ID: ng3D5hAMHPajQrM</p>
											</div>
										</td>
										<td class="category">
											<div class="table_category">
												<p>Ram & Laptop</p>
											</div>
										</td>
										<td class="status">
											<div class="table_status"> <span class="deleted">Deleted</span> </div>
										</td>
										<td class="price">
											<div class="table_price"> <span>$299.00</span> </div>
										</td>
										<td class="action">
											<div class="table_action">
												<ul>
													<li><a href="#"><i class="fas fa-eye"></i></a></li>
													<li><a href="#"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    
<?php include "footer.php"; ?>