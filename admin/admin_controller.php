<?php
session_start();
require "config.php";
$email = "";
$name = "";
$errors = array();
$success  = array();



// Delete Category Button
if (isset($_GET['delete_category'])) {
    $id = $_GET['delete_category'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{
        $sql = "DELETE FROM category WHERE id ='$id'";
        $run_sql = mysqli_query($con, $sql);

        $_SESSION['message'] = "Category has been deleted!";
        $_SESSION['msg_type'] = "danger";

    } else {
        $_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
    }

}

// Delete User Button
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{
        $sql = "DELETE FROM users WHERE id ='$id'";
        $run_sql = mysqli_query($con, $sql);

        $_SESSION['message'] = "User has been deleted!";
        $_SESSION['msg_type'] = "danger";

    } else {
        $_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
    }

}

// Delete Ad Listing Button
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{
        $sql = "DELETE FROM ad_listings WHERE id ='$id'";
        $run_sql = mysqli_query($con, $sql);

        $_SESSION['message'] = "Listing has been deleted!";
        $_SESSION['msg_type'] = "danger";

    } else {
        $_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
    }

}

// Update Cat Button
if (isset($_POST['update_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
	$description = $_POST['description'];

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false) {

		$insert_data = "UPDATE `category` SET `name`= '$name',`description`= '$description' WHERE id = '$id'";
		$data_check = mysqli_query($con, $insert_data);
        
        $_SESSION['message'] = "Listing has been updated!";
        $_SESSION['msg_type'] = "success";

	} 
	else
    {
        $_SESSION['message'] = "Error";
		$_SESSION['msg_type'] = "danger";
    }
}

// Add New Cat Button
if (isset($_POST['add_category'])) {

    $name = $_POST['name'];
	$description = $_POST['description'];

	$email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false) {

		$insert_data = "INSERT INTO `category` (name, description)
						values('$name', '$description')";
		$data_check = mysqli_query($con, $insert_data);

        $_SESSION['message'] = "Category has been added!";
        $_SESSION['msg_type'] = "success";
	}
	else 
	{
		$_SESSION['message'] = "Error, please try again!";
        $_SESSION['msg_type'] = "danger";
	}

}


// Edit Ad Listing Button
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
	$price = $_POST['price'];
    $adpost = $_POST['adpost'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
    $country = $_POST['country'];
    $state =  $_POST['state'];
    $city = $_POST['city'];

}


// Edit Ad Post button
if (isset($_POST['update_ad'])) {

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $postid = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
    $adpost = mysqli_real_escape_string($con, $_POST['adpost']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{   
        // $sql = "SELECT * FROM users WHERE email = '$email'";
        // $run_Sql = mysqli_query($con, $sql);
        // $fetch_info = mysqli_fetch_assoc($run_Sql);
        // $user_id = $fetch_info['id'];

        $category_id = "1";

		$insert_data = "UPDATE `ad_listings` SET `category_id`= '$category_id',`title`= '$title',`content`= '$adpost',`price`= '$price',`country`= '$country',`state`= '$state',`city`= '$city' WHERE id = '$postid'";
		$data_check = mysqli_query($con, $insert_data);
    
        $_SESSION['message'] = "Listing has been updated!";
        $_SESSION['msg_type'] = "success";

        if ($_FILES['file']['tmp_name'] !='') {
			// image upload
			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));
			$allowed = array('jpg', 'jpeg', 'png');
			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$sql = "SELECT id FROM ad_listings WHERE title = '$title' AND content = '$adpost' AND price = '$price'";
						$run_Sql = mysqli_query($con, $sql);
						$fetch_info = mysqli_fetch_assoc($run_Sql);
						$listing_id = $fetch_info['id'];

						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						$insert_data = "INSERT INTO ad_images (listing_id, image)
										values('$listing_id', '$fileNameNew')";
						$data_check = mysqli_query($con, $insert_data);

						$success['db-error'] = "Ad Successfully Posted!";
		
					} else {
						echo "File is too big!";
					}
				} else {
					echo "There was an error uploading!";
				}
			} else {
				echo "You can not upload this file type!";
			}
			// image upload end
		}
	}
    else
    {
        echo "Error";
    }
}



// Delete Ad Post button
// if (isset($_POST['delete'])) {
//     $delete = mysqli_real_escape_string($con, $_POST['delete']);

//     $email = $_SESSION['email'];
//     $password = $_SESSION['password'];
//     if ($email != false && $password != false) {
//         $insert_data = "DELETE FROM `ad_listings` WHERE id = '1'";
//         $data_check = mysqli_query($con, $insert_data);
//     }
// }



//Post Ad button
if (isset($_POST['postad']))
{
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $title = mysqli_real_escape_string($con, $_POST['title']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
    $adpost = mysqli_real_escape_string($con, $_POST['adpost']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false)
	{   
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $user_id = $fetch_info['id'];

        $category_id = "1";
		$insert_data = "INSERT INTO ad_listings (category_id, user_id, title, content, price, country, state, city)
                        values('$category_id', '$user_id', '$title', '$adpost', '$price', '$country', '$state', '$city')";
		$data_check = mysqli_query($con, $insert_data);
        
        $success['db-error'] = "Ad Successfully Posted!";

        if ($_FILES['file']['tmp_name'] !='') {

            $message['works'] = "It worked!";
            // image upload
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $sql = "SELECT id FROM ad_listings WHERE title = '$title' AND content = '$adpost' AND price = '$price'";
                        $run_Sql = mysqli_query($con, $sql);
                        $fetch_info = mysqli_fetch_assoc($run_Sql);
                        $listing_id = $fetch_info['id'];

                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $insert_data = "INSERT INTO ad_images (listing_id, image)
                                        values('$listing_id', '$fileNameNew')";
                        $data_check = mysqli_query($con, $insert_data);

                        $success['db-error'] = "Ad Successfully Posted!";
        
                    } else {
                        echo "File is too big!";
                    }
                } else {
                    echo "There was an error uploading!";
                }
            } else {
                echo "You can not upload this file type!";
            }
            // image upload end
        }
	}
    else
    {
        echo "Error";
    }
}

//if user signup button
if (isset($_POST['signup']))
{
	$name = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	if ($password !== $cpassword)
	{
		$errors['password'] = "Confirm password not matched!";
	}
	$email_check = "SELECT * FROM users WHERE email = '$email'";
	$res = mysqli_query($con, $email_check);
	if (mysqli_num_rows($res) > 0)
	{
		$errors['email'] = "Email that you have entered is already exist!";
	}
	if (count($errors) === 0)
	{
		$encpass = password_hash($password, PASSWORD_BCRYPT);
		$code = rand(999999, 111111);
		$status = "notverified";
		$insert_data = "INSERT INTO users (username, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
		$data_check = mysqli_query($con, $insert_data);
		if ($data_check)
		{
			$subject = "Email Verification Code";
			$message = "Your verification code is $code";
			$sender = "From: jasur88@gmail.com";
			if (mail($email, $subject, $message, $sender))
			{
				$info = "We've sent a verification code to your email - $email";
				$_SESSION['info'] = $info;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header('location: user-otp.php');
				exit();
			}
			else
			{
				$errors['otp-error'] = "Failed while sending code!";
			}
		}
		else
		{
			$errors['db-error'] = "Failed while inserting data into database!";
		}
	}

}

//if user click verification code submit button
if (isset($_POST['check']))
{
	$_SESSION['info'] = "";
	$otp_code = mysqli_real_escape_string($con, $_POST['otp']);
	$check_code = "SELECT * FROM users WHERE code = $otp_code";
	$code_res = mysqli_query($con, $check_code);
	if (mysqli_num_rows($code_res) > 0)
	{
		$fetch_data = mysqli_fetch_assoc($code_res);
		$fetch_code = $fetch_data['code'];
		$email = $fetch_data['email'];
		$code = 0;
		$status = 'verified';
		$update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
		$update_res = mysqli_query($con, $update_otp);
		if ($update_res)
		{
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			header('location: dashboard.php');
			exit();
		}
		else
		{
			$errors['otp-error'] = "Failed while updating code!";
		}
	}
	else
	{
		$errors['otp-error'] = "You've entered incorrect code!";
	}
}

//if user click login button
if (isset($_POST['login']))
{
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$check_email = "SELECT * FROM admins WHERE email = '$email'";
	$res = mysqli_query($con, $check_email);
	if (mysqli_num_rows($res) > 0)
	{
		$fetch = mysqli_fetch_assoc($res);
		$fetch_pass = $fetch['password'];
		if (password_verify($password, $fetch_pass))
		{
			$_SESSION['email'] = $email;
			$status = $fetch['role_id'];
			if ($status == 0)
			{
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header('location: dashboard.php');
			}
			else
			{
				$info = "It's look like you haven't still verify your email - $email";
				$_SESSION['info'] = $info;
				header('location: user-otp.php');
			}
		}
		else
		{
			$errors['email'] = "Incorrect email or password!";
		}
	}
	else
	{
		$errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
	}
}

//if user click continue button in forgot password form
if (isset($_POST['check-email']))
{
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$check_email = "SELECT * FROM users WHERE email='$email'";
	$run_sql = mysqli_query($con, $check_email);
	if (mysqli_num_rows($run_sql) > 0)
	{
		$code = rand(999999, 111111);
		$insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
		$run_query = mysqli_query($con, $insert_code);
		if ($run_query)
		{
			$subject = "Password Reset Code";
			$message = "Your password reset code is $code";
			$sender = "From: jasur88@gmail.com";
			if (mail($email, $subject, $message, $sender))
			{
				$info = "We've sent a passwrod reset otp to your email - $email";
				$_SESSION['info'] = $info;
				$_SESSION['email'] = $email;
				header('location: verify-code.php');
				exit();
			}
			else
			{
				$errors['otp-error'] = "Failed while sending code!";
			}
		}
		else
		{
			$errors['db-error'] = "Something went wrong!";
		}
	}
	else
	{
		$errors['email'] = "This email address does not exist!";
	}
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp']))
{
	$_SESSION['info'] = "";
	$otp_code = mysqli_real_escape_string($con, $_POST['otp']);
	$check_code = "SELECT * FROM users WHERE code = $otp_code";
	$code_res = mysqli_query($con, $check_code);
	if (mysqli_num_rows($code_res) > 0)
	{
		$fetch_data = mysqli_fetch_assoc($code_res);
		$email = $fetch_data['email'];
		$_SESSION['email'] = $email;
		$info = "Please create a new password that you don't use on any other site.";
		$_SESSION['info'] = $info;
		header('location: newpassword.php');
		exit();
	}
	else
	{
		$errors['otp-error'] = "You've entered incorrect code!";
	}
}

//if user click change password button
if (isset($_POST['change-password']))
{
	$_SESSION['info'] = "";
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	if ($password !== $cpassword)
	{
		$errors['password'] = "Confirm password not matched!";
	}
	else
	{
		$code = 0;
		$email = $_SESSION['email']; //getting this email using session
		$encpass = password_hash($password, PASSWORD_BCRYPT);
		$update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
		$run_query = mysqli_query($con, $update_pass);
		if ($run_query)
		{
			$info = "Your password changed. Now you can login with your new password.";
			$_SESSION['info'] = $info;
			header('Location: password-changed.php');
		}
		else
		{
			$errors['db-error'] = "Failed to change your password!";
		}
	}
}

//if login now button click
if (isset($_POST['login-now']))
{
	header('Location: login.php');
}

//User profile-settings update button
if (isset($_POST['update']))
{
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	if ($email != false && $password != false)
	{
        // profile image upload
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        // profile image upload

		$name = mysqli_real_escape_string($con, $_POST['username']);
		$fullname = mysqli_real_escape_string($con, $_POST['name']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

		if ($password !== $cpassword)
		{
			$errors['password'] = "Confirm password not matched!";
		}
		if (count($errors) === 0)
		{
			$encpass = password_hash($password, PASSWORD_BCRYPT);
			//$code = rand(999999, 111111);
			$session_email = $_SESSION['email'];
			//$status = "notverified";
			$insert_data = "UPDATE users SET username = '$name', full_name = '$fullname', phone = '$phone', password = '$encpass', email = '$email'
                                WHERE email = '$session_email'";
			$data_check = mysqli_query($con, $insert_data);

            // image upload
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        // $sql = "SELECT id FROM ad_listings WHERE title = '$title' AND content = '$adpost' AND price = '$price'";
                        // $run_Sql = mysqli_query($con, $sql);
                        // $fetch_info = mysqli_fetch_assoc($run_Sql);
                        // $listing_id = $fetch_info['id'];

                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'profile_images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $insert_data = "UPDATE users SET profile_image = '$fileNameNew'
                                        WHERE email = '$session_email'";
                        $data_check = mysqli_query($con, $insert_data);

                        $errors['db-error'] = "Ad Successfully Posted!";
        
                    } else {
                        $errors['db-error'] = "File is too big!";
                    }
                } else {
                    $errors['db-error'] = "There was an error uploading!";
                }
            } else {
                $errors['db-error'] = "You can not upload this file type!";
            }
            // image upload end


			// if ($data_check)
			// {
			// 	$subject = "Email Verification Code";
			// 	$message = "Your verification code is $code";
			// 	$sender = "From: jasur88@gmail.com";
			// 	if (mail($email, $subject, $message, $sender))
			// 	{
			// 		$info = "We've sent a verification code to your email - $email";
			// 		$_SESSION['info'] = $info;
			// 		$_SESSION['email'] = $email;
			// 		$_SESSION['password'] = $password;
			// 		header('location: profile-settings.php');
			// 		//exit();
					
			// 	}
			// 	else
			// 	{
			// 		$errors['otp-error'] = "Failed while sending code!";
			// 	}
			// }
			// else
			// {
			// 	$errors['db-error'] = "Failed while inserting data into database!";
			// }
		}
	}

}
?>
