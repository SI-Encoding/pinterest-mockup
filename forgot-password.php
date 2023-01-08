<?php require_once "private/controller.php"; ?>
<?php include "header.php"; ?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Forgot Password</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sign_in_area pt-120 pb-120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-9">
                    <!--- php start: error --->
                    <?php if(count($errors) > 0){ ?>
                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $error){ echo $error; } ?>
                        </div>
                    <?php } ?>
                    <!--- php end: error --->
                    <div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">Forgot Password?</h5> </div>
						<form action="forgot-password.php" method="POST" autocomplete="">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>"> 
                                    <i class="fas fa-envelope"></i> </div>
								<div class="single_form">
									<button class="main-btn" type="submit" name="check-email" value="Continue">Continue</button>
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