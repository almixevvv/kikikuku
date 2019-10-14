<div class="login-container">

	<?php echo form_open('Login/login_user'); ?>

	<div class="row" id="login-inner-container">

		<div class="col-12 col-md-6 col-lg-6 col-xl-6">
			<div class="row">
				<div class="col-12">
					<span class="float-left text-uppercase font-weight-bold pb-md-2 pb-lg-2 pb-xl-2 login-text-color">
						Login Into Your Account
					</span>
				</div>
			</div>

			<form>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label class="login-text-color login-font-size" for="exampleInputEmail1">Email address</label>
							<input name="txt-email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="form-group">
	    					<label class="login-text-color login-font-size" for="exampleInputPassword1">Password</label>
	    					<input name="txt-password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  					</div>
					</div>
				</div>

				<div class="row mt-md-2 mt-lg-2 mt-xl-2">
					<div class="col-12 col-md-12 col-lg-5 col-xl-5">
						<div class="form-check">
    						<input type="checkbox" class="form-check-input" id="exampleCheck1">
    						<label class="form-check-label login-text-color login-font-size" for="exampleCheck1">Remember Me</label>
  						</div>
					</div>

					<div class="col-12 col-md-12 col-lg-5 col-xl-5 mt-1 mt-md-1 mt-lg-0">
						<a href="#" class="login-text-color login-font-size">
							<i>Forgot Password</i>
						</a>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-kku">Login</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3 mt-md-0 mt-lg-0 mt-xl-0" id="login-separator">

			<div class="row mt-md-5 mt-lg-5 mt-xl-5">
				<div class="col-12 pt-3 pt-md-0 pt-lg-0 pt-xl-0">
					<div class="d-flex justify-content-center">
						<a href="<?php echo base_url('register'); ?>" class="login-text-color">
							<i>Don't Have an Account? <u>Sign Up Here</u></i>
						</a>
					</div>
				</div>
			</div>

			<!-- FACEBOOK LOGIN BUTTON -->
			<!-- <div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<button id="facebook-button" type="button"><i class="fab fa-facebook-f"></i>Login with Facebook</button>
					</div>
				</div>
			</div> -->

			<!-- GMAIL LOGIN BUTTON -->
			<!-- <div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<button id="gmail-button" type="button"><i class="fab fa-google"></i>Login with Gmail</button>
					</div>
				</div>
			</div> -->


		</div>

	</div>

	<?php echo form_close(); ?>


</div>
