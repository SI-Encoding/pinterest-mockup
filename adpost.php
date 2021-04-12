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
        $user_id = $fetch_info['id'];
		$status = $fetch_info['status'];
		$code = $fetch_info['code'];
        $profile_image = $fetch_info['profile_image'];
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

<?php
if (isset($_GET['view'])) {
    $id = $_GET['view'];

    $sql = "SELECT * FROM ad_listings WHERE id = '$id'";
    $run_Sql = mysqli_query($con, $sql);
    $fetch_info = mysqli_fetch_assoc($run_Sql);

    $sql_image = "SELECT * FROM ad_images WHERE listing_id = '$id'";
    $run_Sql_image = mysqli_query($con, $sql_image);
    $fetch_image = mysqli_fetch_assoc($run_Sql_image);

    $sql_comment = "SELECT * FROM `interact` WHERE listing_id = '$id'";
    $run_Sql_comment = mysqli_query($con, $sql_comment);
    
    $sql_rating = "SELECT AVG(i.rating) AS rating FROM interact AS i WHERE listing_id = '$id'";
    $run_Sql_rating = mysqli_query($con, $sql_rating);
    $fetch_rating = mysqli_fetch_assoc($run_Sql_rating);
} else {

    $sql = "SELECT * FROM ad_listings";
    $run_Sql = mysqli_query($con, $sql);
    $fetch_info = mysqli_fetch_assoc($run_Sql);
}
?>

    <section class="product_details_page pt-70 pb-120">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="product_details mt-50">
                        <div class="product_image">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="details-1" role="tabpanel" aria-labelledby="details-1-tab">
                                    <img src="uploads/<?php if ($fetch_image['image'] == '') { echo "no-image.png";} else { echo $fetch_image['image']; } ?>" alt="product details">
                                    <ul class="sticker">
                                    <?php if ($fetch_info['featured_on'] == 1) { ?>
                                        <li>Featured</li>
                                        <li>New</li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product_details_meta d-sm-flex justify-content-between align-items-end">
                            <div class="product_price">
                                <span class="price"><?php echo $fetch_info['price']; ?></span>
                            </div>
                            <div class="product_date">
                                <ul class="meta">
                                    <li><i class="fa fa-clock-o"></i><a href="#">25 January, 2023 10.00 AM <?php echo $fetch_info['created_at']; ?></a></li>
                                    <li><i class="fa fa-eye"></i><a href="#">1573 VIEWS</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="product_details_features">
                            <div class="product_details_title">
                                <h5 class="title">Features :</h5>
                            </div>
                            <div class="details_features_wrapper d-flex flex-wrap">
                                <div class="single_features d-flex">
                                    <h6 class="features_title">Brand :</h6>
                                    <p>Samsung</p>
                                </div>
                                <div class="single_features d-flex">
                                    <h6 class="features_title">Condition :</h6>
                                    <p>New</p>
                                </div>
                                <div class="single_features d-flex">
                                    <h6 class="features_title">Authenticity :</h6>
                                    <p>Original</p>
                                </div>
                                <div class="single_features d-flex">
                                    <h6 class="features_title">Features :</h6>
                                    <p class="media-body">Camera, Touch Screen, 3G, 4G, Bluetooth, Dual Sim, Dual Lens Camera, Expandable Memory, Fingerprint Sensor</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="product_details_description">
                            <div class="product_details_title">
                                <h5 class="title">Description :</h5>
                            </div>
                            <p><?php echo $fetch_info['content']; ?></p>
                        </div>
                    </div>
                    <div class="product_rating mt-30">
                        <div class="product_rating_top_bar">
                            <div class="product_details_title">
                            <?php 
                            $sql_comment_count = "  SELECT I.listing_id, COUNT(DISTINCT I.comments) AS comments
                                                    FROM ad_listings as A, interact AS I
                                                    WHERE I.comments != ''
                                                    GROUP BY I.listing_id ";
                            $run_Sql_comment_count = mysqli_query($con, $sql_comment_count);
                            $fetch_comment_count = mysqli_fetch_assoc($run_Sql_comment_count);

                            ?>
                                <h5 class="title">Comments (<?php echo $fetch_comment_count['comments']; ?>) :</h5>
                            </div>
                            <div class="product_rating_star">
                            <?php if ($fetch_rating['rating'] < 2) { ?>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            <?php } elseif ($fetch_rating['rating'] < 3) { ?>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            <?php } elseif ($fetch_rating['rating'] < 4) { ?>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            <?php } elseif ($fetch_rating['rating'] < 5) { ?>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            <?php } else { ?>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            <?php } ?>
                            </div>
                        </div>
                        <?php while ($fetch_comment = mysqli_fetch_assoc($run_Sql_comment)){ ?>
                        <div class="single_rating_author mt-50">
                            <div class="rating_author d-flex align-items-center">
                                <div class="author_image">
                                    <img src="assets/images/author-1.jpg" alt="author">
                                </div>
                                <div class="author_content media-body">
                                    <h5 class="author_name"><?php echo $fetch_comment['name']; ?></h5>
                                    <span class="date">25 January, 2023</span>
                                    <?php if ($fetch_comment['rating'] == 5) { ?>
                                        <ul class="rating_star">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    <?php } else { ?>
                                        <ul class="rating_star">
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="rating_description">
                                <p><?php echo $fetch_comment['comments']; ?></p>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <br/>
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> text-center">
                            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                        </div>
                    <?php endif ?>
                    <div class="product_rating_form mt-20">
                        <div class="product_details_title">
                            <h5 class="title">Leave Your Review :</h5>
                        </div>
                        <div class="product_rating_form_wrapper d-flex flex-wrap">
                            <div class="product_details_rating_wrapper">
                                <div class="product_details_rating mt-20">
                                    <p><i class="fa fa-star-o"></i> Your Rating</p>
                                    <ul class="rating_radio">
                                        <li>
                                            <input type="radio" checked="" name="radio" id="radio1">
                                            <label for="radio1"></label>
                                            <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="radio" id="radio2">
                                            <label for="radio2"></label>
                                            <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <!-- <i class="fas fa-star"></i> -->
                                    </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="radio" id="radio3">
                                            <label for="radio3"></label>
                                            <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <!-- <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i> -->
                                    </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="radio" id="radio4">
                                            <label for="radio4"></label>
                                            <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <!-- <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i> -->
                                    </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="radio" id="radio5">
                                            <label for="radio5"></label>
                                            <span>
                                    <i class="fa fa-star"></i>
                                    <!-- <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i> -->
                                    </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_details_form">
                                <form action="adpost.php?view=4" method="POST" autocomplete="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single_form">
                                                <input name="name" type="text" placeholder="Enter your name . . .">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single_form">
                                                <input name="email" type="text" placeholder="Enter your mail address . . .">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single_form">
                                                <textarea name="comment" placeholder="Type your review . . ."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single_form">
                                                <button type="submit" name="user_comment" class="main-btn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="related_product mt-45">
                        <div class="section_title">
                            <h3 class="title">Related Ads</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-1.png" alt="ads">
                                    </div>
                                    <div class="ads_card_content">
                                        <div class="meta d-flex justify-content-between">
                                            <p>Ram & Laptop</p>
                                            <a class="like" href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                        <p><i class="far fa-map"></i>New York, USA</p>
                                        <div class="ads_price_date d-flex justify-content-between">
                                            <span class="price">$299.00</span>
                                            <span class="date">25 Jan, 2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-2.png" alt="ads">
                                        <p class="sticker sticker_color-1">New</p>
                                    </div>
                                    <div class="ads_card_content">
                                        <div class="meta d-flex justify-content-between">
                                            <p>Ram & Laptop</p>
                                            <a class="like" href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                        <p><i class="far fa-map"></i>New York, USA</p>
                                        <div class="ads_price_date d-flex justify-content-between">
                                            <span class="price">$299.00</span>
                                            <span class="date">25 Jan, 2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-3.png" alt="ads">
                                    </div>
                                    <div class="ads_card_content">
                                        <div class="meta d-flex justify-content-between">
                                            <p>Ram & Laptop</p>
                                            <a class="like" href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                        <p><i class="far fa-map"></i>New York, USA</p>
                                        <div class="ads_price_date d-flex justify-content-between">
                                            <span class="price">$299.00</span>
                                            <span class="date">25 Jan, 2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related_product_btn">
                            <a class="main-btn" href="#">View all Ads</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="product_details_sidebar pt-20">
                        <div class="product_sidebar_owner mt-30">
                            <div class="product_details_title">
                                <h5 class="title">Ad Owner :</h5>
                            </div>
                            <div class="product_owner_wrapper mt-20">
                                <div class="owner_author d-flex align-items-center">
                                    <?php 
                                        $user_listing_id = $fetch_info['user_id'];
                                        $sql_user = "SELECT * FROM `users` WHERE `id` = '$user_listing_id'";
                                        $run_Sql_user = mysqli_query($con, $sql_user);
                                        $fetch_user = mysqli_fetch_assoc($run_Sql_user);
                                    ?>
                                    <div class="author_image">
                                        <img src="profile_images/<?php echo $fetch_user['profile_image']; ?>" alt="author">
                                    </div>
                                    <div class="author_content media-body">
                                        <h5 class="author_name"><?php echo $fetch_user['full_name']; ?></h5>
                                    </div>
                                </div>
                                <div class="owner_address d-flex">
                                    <div class="address_icon">
                                        <i class="far fa-map-marker-alt"></i>
                                    </div>
                                    <div class="address_content media-body">
                                        <p><i class="far fa-map"></i> <?php echo $fetch_info['city'].', '.$fetch_info['country']; ?></p>
                                    </div>
                                </div>
                                <?php if ($fetch_info['phone'] !="") { ?>
                                <div class="owner_call">
                                    <a class="main-btn" href="#"><i class="fas fa-phone"></i><?php echo $fetch_info['phone'];?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="product_sidebar_contact mt-30">
                            <div class="product_details_title">
                                <h5 class="title">Contact Seller :</h5>
                            </div>
                            <div class="sidebar_contact_form">
                                <form action="#">
                                    <div class="single_form">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="single_form">
                                        <input type="email" placeholder="Mail address">
                                    </div>
                                    <div class="single_form">
                                        <textarea placeholder="Type message"></textarea>
                                    </div>
                                    <div class="single_form">
                                        <button class="main-btn"><i class="fas fa-paper-plane"></i>Send to Seller</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product_sidebar_action mt-30">
                            <div class="product_details_title">
                                <h5 class="title">Ad Action :</h5>
                            </div>
                            <div class="sidebar_action_items d-flex justify-content-between align-items-center">
                                <div class="single_action">
                                    <a href="#">
                                        <i class="fas fa-share-alt"></i>
                                        <span>Share</span>
                                    </a>
                                </div>
                                <div class="single_action">
                                    <a href="#">
                                        <i class="fas fa-bookmark"></i>
                                        <span>Save</span>
                                    </a>
                                </div>
                                <div class="single_action">
                                    <a href="#">
                                        <i class="fas fa-heart"></i>
                                        <span>Share</span>
                                    </a>
                                </div>
                                <div class="single_action">
                                    <a href="#">
                                        <i class="fas fa-flag"></i>
                                        <span>Share</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="product_sidebar_map mt-30">
                            <div class="product_details_title">
                                <h5 class="title">Location Map :</h5>
                            </div>
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </div> -->
                        <!-- <div class="product_sidebar_tips mt-30">
                            <div class="product_details_title">
                                <h5 class="title">Location Map :</h5>
                            </div>
                            <div class="sidebar_tips">
                                <ul class="tips_list">
                                    <li><span></span> Began because on to lay about manage been.</li>
                                    <li><span></span> Is all increasing up in it he as would was epic and perception.</li>
                                    <li><span></span> Console great gradually pattern.</li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include "footer.php"; ?>