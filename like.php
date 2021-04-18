<?php require_once "controller.php"; ?>

<?php
// Like Button
if (isset($_POST['likeNewCount'])) {
    $id = $_POST['likeNewCount'];
    $listingId = $_POST['listingId'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{
        //$sql = "DELETE FROM ad_listings WHERE id ='$id'";
        $sql = "INSERT INTO `favourite_ad`(`listing_id`, `user_id`) VALUES ($listingId,$id)";
        $run_sql = mysqli_query($con, $sql);

?>

<script>

    $(document).ready(function() {
        var unlikeCount = <?php echo $id; ?>;
        var unid = <?php echo $listingId; ?>;
        $("unlike<?php echo $listingId; ?>").click(function() {
            unlikeCount = unlikeCount;
            $("#like<?php echo $listingId; ?>").load("like.php", {
                unlikeNewCount: unlikeCount,
                unlistingId: unid
            });
        });
    });

</script>

<div id="like<?php echo $listingId; ?>">
<unlike<?php echo $listingId; ?>>
    <a style="color:red;" class="like"><i class="fas fa-heart"></i></a>
</unlike<?php echo $listingId; ?>>
</div>

<?php

    } else {
        $_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
    }

}

// Unlike Button
if (isset($_POST['unlikeNewCount'])) {
    $id = $_POST['unlikeNewCount'];
    $listingId = $_POST['unlistingId'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{
        $sql = "DELETE FROM `favourite_ad` WHERE listing_id = '$listingId' AND user_id = '$id'";
        //$sql = "INSERT INTO `favourite_ad`(`listing_id`, `user_id`) VALUES ($listingId,$id)";
        $run_sql = mysqli_query($con, $sql);

?>
<script>
$(document).ready(function() {
    var likeCount = <?php echo $id; ?>;
    var id = <?php echo $listingId; ?>;
    $("like<?php echo $listingId; ?>").click(function() {
        likeCount = likeCount;
        $("#like<?php echo $listingId; ?>").load("like.php", {
            likeNewCount: likeCount,
            listingId: id
        });
    });
});
</script>
<!--====================================-->
<like<?php echo $listingId; ?>>
    <a class="like"><i class="fas fa-heart"></i></a>
</like<?php echo $listingId; ?>>
<!--====================================-->
<?php

    } else {
        $_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
    }

}

?>
