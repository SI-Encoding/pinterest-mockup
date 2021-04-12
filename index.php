<?php require_once "controller.php"; ?>
<?php include "header.php"?>


<?php
//$sql = "SELECT * FROM ad_listings WHERE user_id = '$user_id'";
$sql = "SELECT * FROM ad_listings";
$run_Sql = mysqli_query($con, $sql);
//$row = mysqli_fetch_assoc($run_Sql);
// $fetch_info = mysqli_fetch_assoc($run_Sql);
// $title = $fetch_info['title'];
// $content = $fetch_info['content'];
// $price = $fetch_info['price'];
//$active_on = $fetch_info['active_on'];
//$category_id = $fetch_info['category_id'];
?>
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
                            ?>
                            <? if ($row['active_on'] == 1) { ?>
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

                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-1.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            </div> -->

                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-2.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-3.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-4.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-5.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-6.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-7.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_ads_card mt-30">
                                    <div class="ads_card_image">
                                        <img src="assets/images/ads-8.png" alt="ads">
                                        <p class="sticker">Featured</p>
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
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ADS PART ENDS ======-->
<?php include "footer.php"?>