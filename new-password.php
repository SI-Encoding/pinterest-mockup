<?php require_once "private/controller.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<?php include "header.php"; ?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">New Password</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>New Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sign_in_area pt-120 pb-120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-9">

                    <?php if(isset($_SESSION['info'])){ ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                    <?php } ?>
                    <?php if(count($errors) > 0){ ?>
                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>
                    <?php } ?>

                    <div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">New Password</h5> </div>
						<form action="new-password.php" method="POST" autocomplete="off">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="password" name="password" placeholder="Create new password" required> 
                                    <i class="fas fa-key"></i> </div>
								<div class="single_form">
									<input type="password" name="cpassword" placeholder="Confirm your password" required> 
                                    <i class="fas fa-key"></i> </div>
								<div class="single_form">
									<button class="main-btn" type="submit" name="change-password" value="Change">Change</button>
								</div>
							</div>
						</form>
					</div>
                    <br/>
                    <div class="link login-link text-center">Not yet a member? <a href="register.php">Signup now</a></div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>