<?php require_once "private/controller.php"; ?>
<?php include "header.php"; ?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Sign Up</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Sign Up</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sign_in_area pt-120 pb-120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-9">
                    <!-- php start -->
                    <?php if(count($errors) == 1){ ?>

                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>

                    <?php } elseif(count($errors) > 1){ ?>

                        <div class="alert alert-danger">
                            <?php foreach($errors as $showerror){ ?>
                                <li><?php echo $showerror; ?></li>
                            <?php } ?>
                        </div>

                    <?php } ?>
                    <!-- php end -->
					<div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">Sign Up Now</h5> </div>
						<form action="register.php" method="POST" autocomplete="">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="text" name="username" placeholder="Username" required value="<?php echo $name ?>"> <i class="fas fa-user"></i> </div>
								<div class="single_form">
									<input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>"> <i class="fas fa-envelope"></i> </div>
								<div class="single_form">
									<input type="password" name="password" placeholder="Password" required> <i class="fas fa-key"></i> </div>
								<div class="single_form">
									<input type="password" name="cpassword" placeholder="Confirm password" required> <i class="fas fa-key"></i> </div>
								<div class="single_form">
									<div class="sign_checkbox">
										<input type="checkbox" id="checkbox" required>
										<label for="checkbox"></label> <span>By registering, you accept our Terms & Conditions</span> </div>
								</div>
								<div class="single_form">
									<button class="main-btn" type="submit" name="signup" value="Signup">Sign Up</button>
								</div>
							</div>
						</form>
					</div>
                    <br/>
                    <div class="link login-link text-center">Already a member? <a href="login.php">Login here</a></div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>