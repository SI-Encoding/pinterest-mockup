<?php 

if (isset($_POST['update_ad'])) {

    $title = $_POST['title'];

    echo $title;

    $name = "filesar";

    $file = $_FILES[$title];
    print_r($file);
    $fileName = $_FILES[$title]['name'];
    $fileTmpName = $_FILES[$title]['tmp_name'];
    $fileSize = $_FILES[$title]['size'];
    $fileError = $_FILES[$title]['error'];
    $fileType = $_FILES[$title]['type'];

}
?>

<div class="col-lg">
    <div class="post_form">
        <div class="post_title">
            <h5 class="title">Ad Detail</h5>
        </div>
            <?php for ($i = 0; $i < 1; $i++){ ?>

        <form action="imagetest.php" method="POST" enctype="multipart/form-data">
            <div class="single_form">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" >
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
                <input type="number" name="price" placeholder="Ad Your Price" value="<?php echo $row['price']; ?>" >
            </div>
            <div class="single_form">
                <textarea name="adpost" placeholder="Ad Post" ><?php echo $row['content']; ?></textarea>
            </div>


            <div class="post_upload_file">
                <label for="upload">
                <span>Select image to upload</span>
                <input type="file" class="form-control-file" name="2" id="update_ad">
                </label>
            </div>





            <div class="post_upload_file">
                <label for="upload">
                <span>Select image to upload</span>
                <input type="file" class="form-control-file" name="3" id="update_ad">
                </label>
            </div>

            <div class="single_form">
                <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="single_form">
                <input type="email" name="email" placeholder="Email Address" value="<?php echo $email ?>">
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
            <?php } ?>

    </div>
</div>
