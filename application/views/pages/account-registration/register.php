<!-- CUSTOM DATE PICKER JAVASCRIPT -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="registration-container" >

	<form action="<?php echo base_url('Register/input'); ?>" class="needs-validation" novalidate>
	<div class="row" id="registration-inner-container">

		<div class="col-12">

			<div class="row pb-md-2 pb-lg-2 pb-xl-2 pt-md-1 pt-lg-1 pt-xl-1">
				<div class="col-12 pt-3 pb-3 pt-md-0 pt-lg-0 pt-xl-0 pb-md-0 pb-lg-0 pb-xl-0">
					<div class="d-flex justify-content-center">
						<span class="text-uppercase font-weight-bold login-text-color">Registration</span>
					</div>
				</div>
			</div>

		</div>

		<div class="col-12 col-md-6 col-lg-6 col-xl-6">

			<div class="row">
				<div class="col-12 col-md-12 col-lg-6 col-xl-6">
					<div class="form-group">
    					<label for="uFirstName">First Name</label>
    					<input type="text" class="form-control" id="uFirstName" placeholder="Enter Your First Name" required>
      					<div class="invalid-feedback">
        					First name is required
      					</div>
  					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-6 col-xl-6">
					<div class="form-group">
    					<label for="uLastName">Last Name</label>
    					<input type="text" class="form-control" id="uLastName" placeholder="Enter Your Last Name">
  					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="form-group">
    					<label for="uEmail">Email Address</label>
    					<input type="email" class="form-control" id="uEmail" aria-describedby="emailHelp" placeholder="something@mail.com" onblur="checkExistingEmail()" required>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="form-group">
    					<label for="uEmail">Phone Number</label>
    					<input type="number" class="form-control" id="uPhone" aria-describedby="numberHelp" placeholder="08XXXXXXXXX" required>
    					    <small id="numberHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
  					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
    					<label for="uEmail">Birthdate</label>
    					<input id="datepicker" class="form-control" required>
  					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-md-6 col-lg-6 col-xl-6">

			<div class="row">
				<div class="col-12">
					<div class="form-group">
    					<label for="uAddress1">Address</label>
    					<input type="text" class="form-control" id="uAddress1" aria-describedby="addressHelp" placeholder="Address" required>
						<small id="addressHelp" class="form-text text-muted">We'll never share your address with anyone else.</small>
  					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="form-group">
    					<label for="uAddress1">Address 2</label>
    					<input type="text" class="form-control" id="uAddress2" aria-describedby="addressHelp2" placeholder="Address 2">
  					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="form-group">
    					<label for="uPass">Password</label>
    					<input type="password" class="form-control" id="uPass" aria-describedby="passHelp" placeholder="Password" onblur="checkPassword()" required>
    					<small id="passHelp" class="form-text text-muted">Your password must include a capital letter and a number.</small>
  					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="form-group">
    					<label for="uPass2">Confirm Password</label>
    					<input type="password" class="form-control" id="uPass2" onfocus="resetValidation()" onblur="matchPassword()" aria-describedby="passHelp" required>
  					</div>
				</div>
			</div>

		</div>

		<div class="col-5 col-md-3 col-lg-2 col-xl-2 pb-4 pb-md-0 pb-lg-0 pb-xl-0">
			<button type="submit" class="btn btn-kku" style="width:100%;">Register</button>
		</div>

	</div>
	</form>

</div>

<script type="text/javascript">

	$('#datepicker').datepicker({
		uiLibrary: 'bootstrap4'
	});

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();

</script>
