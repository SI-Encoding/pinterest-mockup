<?php require_once "controller.php"; ?>

<?php
$sql = "SELECT * FROM `ad_listings`";
$run_Sql = mysqli_query($con, $sql);

$email = $_SESSION['email'];
$password = $_SESSION['password'];

if ($email != false && $password != false)
{
	$sql_user = "SELECT * FROM users WHERE email = '$email'";
	$run_Sql_user = mysqli_query($con, $sql_user);
    $fetch_info_user = mysqli_fetch_assoc($run_Sql_user);

    $user_id = $fetch_info_user['id'];

    $sql2 = "SELECT * FROM users WHERE email = '$email'";
	$run_Sql2 = mysqli_query($con, $sql2);
	if ($run_Sql2)
	{
		$fetch_info = mysqli_fetch_assoc($run_Sql2);
        $user_id = $fetch_info['id'];
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

?>

<?php include "header.php"?>
<?php //while ($row = mysqli_fetch_assoc($run_Sql)): ?>

    <!--====== ADS PART START ======-->
    <section class="ads_area pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ads_tabs d-sm-flex align-items-end justify-content-between pb-30">
                        <div class="section_title mt-45">
                            <h3 class="title">Popular <br> and Featured Ads</h3>
                        </div>
                        <div class="tabs_menu mt-50">
                            <ul class="nav" id="myTab" role="tablist">
                                <li>
                                    <a class="active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Popular Ads</a>
                                </li>
                                <li>
                                    <a id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="fasse">Featured Ads</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ads_tabs">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                    <?php
                        // $sql_favourite = "SELECT * FROM `favourite_ad`";
                        // $run_sql_favourite = mysqli_query($con, $sql_favourite);
                        // $fetch_favourite = mysqli_fetch_assoc($run_sql_favourite);

                        // echo $fetch_favourite['listing_id'];
                        // echo $fetch_favourite['user_id'];
                    ?>


                        <div class="row">
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

                                $sql_favourite = "SELECT * FROM `favourite_ad` WHERE listing_id ='$listing_id' AND user_id = '$user_id'";
                                $run_sql_favourite = mysqli_query($con, $sql_favourite);
                                $fetch_favourite = mysqli_fetch_assoc($run_sql_favourite);
                            ?>
                            <script>
                                $(document).ready(function() {
                                    var likeCount = <?php echo $user_id; ?>;
                                    var id = <?php echo $row['id']; ?>;
                                    $("like<?php echo $row['id']; ?>").click(function() {
                                        likeCount = likeCount;
                                        $("#like<?php echo $row['id']; ?>").load("like.php", {
                                            likeNewCount: likeCount,
                                            listingId: id
                                        });
                                    });
                                });

                                $(document).ready(function() {
                                    var unlikeCount = <?php echo $user_id; ?>;
                                    var unid = <?php echo $row['id']; ?>;
                                    $("unlike<?php echo $row['id']; ?>").click(function() {
                                        unlikeCount = unlikeCount;
                                        $("#like<?php echo $row['id']; ?>").load("like.php", {
                                            unlikeNewCount: unlikeCount,
                                            unlistingId: unid
                                        });
                                    });
                                });

                            </script>
                            <?php if ($row['active_on'] == 1) { ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <a href="adpost.php?view=<?php echo $row['id']; ?>">
                                                <img src="uploads/<?php if ($fetch_image['image'] == '') { echo "no-image.png";} else { echo $fetch_image['image']; } ?>" alt="ads">
                                            </a>
                                            <?php if ($row['featured_on'] == 1) { ?>
                                            <p class="sticker">Featured</p>
                                            <?php } ?>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p><?php echo $fetch_info['name']; ?></p>

                                                <?php if($fetch_favourite['listing_id'] == $row['id'] And $fetch_favourite['user_id'] == $user_id) { ?>
                                                
                                                <div id="like<?php echo $row['id']; ?>">
                                                <unlike<?php echo $row['id']; ?>>
                                                    <a style="color:red;" class="like"><i class="fas fa-heart"></i></a>
                                                </unlike<?php echo $row['id']; ?>>
                                                </div>

                                                <?php } else { ?>

                                                <div id="like<?php echo $row['id']; ?>">
                                                <like<?php echo $row['id']; ?>>
                                                    <a class="like"><i class="fas fa-heart"></i></a>
                                                </like<?php echo $row['id']; ?>>
                                                </div>
                                                <?php } ?>
                                            
                                            </div>
                                            <h4 class="title"><a href="adpost.php?view=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                            <p><i class="far fa-map"></i><?php echo $row['city'],", ",$row['country']; ?></p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$<?php echo $row['price']; ?></span>
                                                <!--<span class="date"><//?php echo $row['created_at']; ?></span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php endwhile ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="row">
                            <?php 
                            $sql = "SELECT * FROM ad_listings WHERE `featured_on` = 1";
                            $run_Sql = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($run_Sql)): ?>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="uploads/<?php if ($fetch_image['image'] == '') { echo "no-image.png";} else { echo $fetch_image['image']; } ?>" alt="ads">
                                        <?php if ($row['featured_on'] == 1) { ?>
                                        <p class="sticker">Featured</p>
                                        <?php } ?>
                                    </div>
                                    <div class="ads_card_content">
                                        <div class="meta d-flex justify-content-between">
                                            <p><?php echo $fetch_info['name']; ?></p>
                                            <a class="like" href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                        <h4 class="title"><a href="adpost.php?view=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                        <p><i class="far fa-map"></i><?php echo $row['city'],", ",$row['country']; ?></p>
                                        <div class="ads_price_date d-flex justify-content-between">
                                            <span class="price">$<?php echo $row['price']; ?></span>
                                            <span class="date">25 Jan, 2023 <?php echo $row['created_at']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ADS PART ENDS ======-->
<?php include "footer.php"?>