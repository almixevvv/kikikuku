<style type="text/css">

	.main-logo {

		background: url(<?php echo base_url('assets/images/logo.png'); ?>) no-repeat center;
		background-position: 1px 6px;
	    width: 10em;
	    padding-top: 5px;
	    padding-bottom: 5px;
	    height: 2em;
	    display: block;
	    box-sizing: content-box;
    	background-size: 7em;

	}

	.main-logo-mobile {

		background: url(http://localhost/kikikuku-update/assets/images/logo.png) no-repeat center;
	    background-position: 0px 8px;
	    max-width: 2.4em;
	    padding-top: 5px;
	    padding-bottom: 5px;
	    height: 2em;
	    display: block;
	    box-sizing: content-box;
	    background-size: 9em;
	    width: 3em;

	}

</style>

<!-- MOBILE NAVBAR -->
<header class="header-mobile" id="fixed-navbar">

	<div class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div class="col-12" style="padding-left: 0!important; padding-right: 0!important;">
			<div id="header-separator"></div>
		</div>
	</div>

	<div class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div class="col-12" id="navbar-upper">
			<div class="float-left">
				<span class="navbar-text">KIKIKUKU App Coming Soon</span>
			</div>
			<div class="float-right">
				<span class="navbar-text">
					<a href="#">About KIKIKUKU</a>
				</span>
				<span class="navbar-text" style="padding-left: 2em;">
					<a href="#">Help Centre</a>
				</span>
			</div>
		</div>
	</div>

	<div id="navbar-main" class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div class="col-1">
			<a href="<?php echo base_url(); ?>">
				<span class="main-logo-mobile"></span>
			</a>
		</div>
		<div class="col-8" style="padding-left: 1.5em!important; padding-right: 0!important;">
			<div class="input-group mb-3" style="padding-top: 8px;">
				<input type="text" class="form-control" placeholder="Products Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2" style="margin-left: -3px;">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button" id="button-search-custom">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="col-3" style="padding-right: 0!important; padding-left: 0.3em!important;">
			<span class="mobile-icon">
				<a href="<?php echo base_url(); ?>">
					<i class="fas fa-shopping-cart"></i>
				</a>
			</span>
			<span class="mobile-icon">
				<a href="<?php echo base_url('login'); ?>">
					<i class="fas fa-user"></i>
				</a>
			</span>
		</div>
	</div>

</header>

<!-- DESKTOP NAVBAR -->
<header class="header-desktop" id="fixed-navbar">

	<div class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div id="header-separator"></div>
	</div>

	<div class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div class="col-12 col-lg-12 col-md-12 col-xl-12" id="navbar-upper">
			<div class="float-left">
				<span class="navbar-text">KIKIKUKU App Coming Soon</span>
			</div>
			<div class="float-right">
				<span class="navbar-text">
					<a href="#">About KIKIKUKU</a>
				</span>
				<span class="navbar-text" style="padding-left: 2em;">
					<a href="#">Help Centre</a>
				</span>
			</div>
		</div>
	</div>

	<div class="navbar-container" id="navbar-main">

		<div class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">

			<div class="col-1 col-md-1 col-lg-2 col-xl-2" style="padding-left: 0!important; padding-right: 0!important;">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<span class="main-logo"></span>
				</a>
			</div>

			<div class="col-6 col-md-8 col-lg-7 col-xl-7" style="padding-right: 0!important;" id="search-box-container">

				<ul class="list-inline">

				   <li class="list-inline-item" id="search-text">
					   	<span class="navbar-text" style="padding-top: 17px;">
							Search
						</span>
				   </li>

				   <li class="list-inline-item" id="main-search-box" style="width: 90%;">

				   		<div class="input-group mb-3" style="padding-top: 8px;">
							<input type="text" class="form-control" placeholder="Products Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" id="button-search-custom">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>

				   </li>

				</ul>

			</div>

			<div class="col-5 col-md-3 col-lg-3 col-xl-3" style="padding-right: 0!important;">

				<ul class="list-inline" id="navitem-right" style="padding-top: 10px; padding-bottom: 10px; padding-left: 3em;">

					<li class="list-inline-item">
						<span id="navbar-shopping-cart">
							<i class="fas fa-shopping-cart" style="color: #C1C1C1; "></i>
						</span>
					</li>

					<li class="list-inline-item">
						<span>
							<a href="<?php echo base_url('login');?>" id="navbar-login-button">
								<span style="color: rgba(0,0,0,.7);">Login</span>
							</a>
						</span>
					</li>

					<li class="list-inline-item">
						<span>
							<a href="<?php echo base_url('register');?>" id="navbar-register-button">
								<span>Register</span>
							</a>
						</span>
					</li>

				</ul>

			</div>

		</div>

	</div>

</header>
