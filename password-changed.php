<?php require_once "controller.php"; ?>
<?php
if($_SESSION['info'] == false){
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

					<div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">Login Now</h5> </div>
						<form action="login.php" method="POST" autocomplete="">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>"> <i class="fas fa-user"></i> </div>
								<div class="single_form">
									<input type="password" name="password" placeholder="Password" required> <i class="fas fa-key"></i> </div>
								<div class="single_form d-sm-flex justify-content-between">
									<div class="sign_checkbox">
										<input type="checkbox" id="checkbox">
										<label for="checkbox"></label> <span>Keep me logged in</span> 
                                    </div>
									<div class="sign_forgot"> <a href="forgot-password.php">Forgot Password?</a> 
                                    </div>
								</div>
								<div class="single_form">
									<button class="main-btn" type="submit" name="login" value="Login">Login</button>
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