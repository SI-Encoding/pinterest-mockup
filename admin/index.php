<?php include "header.php"; ?>

    <section>
        <div class="page_banner bg_cover" style="background-image: url(assets/images/page-banner.jpg)">
            <div class="container">
                <div class="page_banner_content">
                    <h3 class="title">Login</h3>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sign_in_area pt-120 pb-120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-9">
                    <?php if(count($errors) > 0){ ?>

                        <div class="alert alert-danger text-center">
                            <?php foreach($errors as $showerror){ echo $showerror; } ?>
                        </div>

                    <?php } ?>
					<div class="sign_in_form">
						<div class="sign_title">
							<h5 class="title">Login Now</h5> </div>
						<form action="index.php" method="POST" autocomplete="">
							<div class="sign_form_wrapper">
								<div class="single_form">
									<input type="email" name="email" placeholder="Email Address" required value="admin@test.com"> <i class="fas fa-user"></i> </div>
								<div class="single_form">
									<input type="password" name="password" placeholder="Password" required value="11"> <i class="fas fa-key"></i> </div>
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