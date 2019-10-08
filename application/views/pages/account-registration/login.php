<div class="login-container">
	
	<div class="row" id="login-inner-container">
		
		<div class="col-6">
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
							<label class="login-text-color" for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="form-group">
	    					<label class="login-text-color" for="exampleInputPassword1">Password</label>
	    					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  					</div>
					</div>
				</div>

				<div class="row mt-md-2 mt-lg-2 mt-xl-2">
					<div class="col-12 col-md-12 col-lg-5 col-xl-5">
						<div class="form-check">
    						<input type="checkbox" class="form-check-input" id="exampleCheck1">
    						<label class="form-check-label login-text-color" for="exampleCheck1">Check me out</label>
  						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-5 col-xl-5 mt-1 mt-md-1 mt-lg-0">
						<a href="#" class="login-text-color">
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

		<div class="col-6" style="border-left: solid 1.3px #bdbdbd;">
			
			<div class="row mt-md-5 mt-lg-5 mt-xl-5">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<a href="<?php echo base_url('register'); ?>" class="login-text-color">
							<i>Don't Have an Account? Sign Up Here</i>
						</a>
					</div>
				</div>
			</div>
			
			<!-- FACEBOOK LOGIN BUTTON -->
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<button id="facebook-button" type="button"><i class="fab fa-facebook-f"></i>Login with Facebook</button>	
					</div>
				</div>	
			</div>

			<!-- GMAIL LOGIN BUTTON -->
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<button id="gmail-button" type="button"><i class="fab fa-google"></i>Login with Gmail</button>
					</div>
				</div>	
			</div>


		</div>

	</div>


</div>