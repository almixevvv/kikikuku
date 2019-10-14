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
					<a href="<?php echo base_url('about-us'); ?>">About KIKIKUKU</a>
				</span>
				<span class="navbar-text" style="padding-left: 2em;">
					<a href="<?php echo base_url('how-to'); ?>">Help Centre</a>
				</span>
			</div>
		</div>
	</div>

	<div id="navbar-main" class="row" style="width: 100%; margin-left: 0!important; margin-right: 0!important;">
		<div class="navbar-column-logo">
			<a href="<?php echo base_url(); ?>">
				<img src="<?php echo base_url('assets/images/logo2.png'); ?>" alt="Kikikuku Main Logo" id="main-logo">
			</a>
		</div>

		<div class="navbar-column-searchbox">
			
			<form action="<?php echo base_url('search'); ?>"  method="get">

				<div class="input-group mb-3" style="padding-top: 8px;">
					<input type="text" class="form-control" name="query" placeholder="Product Keywords" style="margin-left: -3px;">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit" id="button-search-custom">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>

			</form>

		</div>

		<div class="navbar-column-account">
			
			<span class="mobile-icon" id="account-left">
				<a href="<?php echo base_url('mycart'); ?>">
					<i class="fas fa-shopping-cart"></i>
				</a>
			</span>

			<span class="mobile-icon account-position-fix">
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
					<a href="<?php echo base_url('about-us'); ?>">About KIKIKUKU</a>
				</span>
				<span class="navbar-text" style="padding-left: 2em;">
					<a href="<?php echo base_url('how-to'); ?>">Help Centre</a>
				</span>
			</div>
		</div>
	</div>

	<div class="navbar-container" id="navbar-main">

		<div class="row" style="width: 100%; height: 100%; margin-left: 0!important; margin-right: 0!important;">

			<div class="navbar-column-logo">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Kikikuku Main Logo" id="main-logo">
				</a>
			</div>

			<div class="navbar-column-searchbox" id="search-box-container">

				<ul class="list-inline">
				   <li class="list-inline-item" id="search-text">
					   	<span class="navbar-text" style="padding-top: 17px;">
							Search
						</span>
				   </li>
				   <li class="list-inline-item" id="main-search-box">
					
					<form action="<?php echo base_url('search'); ?>"  method="get">
				   		<div class="input-group mb-3" style="padding-top: 8px;">
							<input type="text" class="form-control" name="query" placeholder="Products Keywords" aria-label="Search Query">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit" id="button-search-custom">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>

				   </li>
				</ul>

			</div>

			<div class="navbar-column-account">
				
				<span id="account-left">
					<a href="<?php echo base_url('mycart'); ?>">
						<i class="fas fa-shopping-cart" id="icon-shopping-cart"></i>
					</a>
				</span>

				<span class="account-position-fix">
					<a href="<?php echo base_url('login');?>" id="navbar-login-button">
						<span style="color: rgba(0,0,0,.7);">Login</span>
					</a>
				</span>

				<span class="account-position-fix">
					<a href="<?php echo base_url('register');?>" id="navbar-register-button">
						<span>Register</span>
					</a>
				</span>


			</div>

		</div>

	</div>

</header>
