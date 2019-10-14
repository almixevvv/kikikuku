/*
  INCUBE JAVASCRIPT


  1. Registration Validation

*/


/* 
	1. Registration Validation Section
*/

	function resetValidation() {
		$(".needs-validation").removeClass("was-validated");
		console.log('validation reset');
	}

	function checkPassword() {

		var upperCase= new RegExp('[A-Z]');
		var lowerCase= new RegExp('[a-z]');
		var numbers = new RegExp('[0-9]');

		var input = $('#uPass').val();

		if(input.match(upperCase) && input.match(lowerCase) && input.match(numbers)) {
			$("#uPass").removeClass("is-invalid").addClass("is-valid");
		} else {
			$('#uPass').addClass("is-invalid");
		}

	}

	function matchPassword() {

		var password = $('#uPass').val();
		var confirmPassword = $('#uPass2').val();

		if(password.match(confirmPassword)) {
			$("#uPass2").removeClass("is-invalid").addClass("is-valid");
		} else {
			$('#uPass2').addClass("is-invalid");
		}

	}

	function checkExistingEmail() {

		var email = $('#uEmail').val();

		$.ajax({
			url: "<?php echo base_url('Register/checkExistingEmail'); ?>",
			type: "GET",
			data: { email:email }, 
			success: function(result){
		    	if(result === 'existing') {
		    		$('#uEmail').addClass("is-invalid");
		    	} else {
		    		$("#uEmail").removeClass("is-invalid").addClass("is-valid");
		    	}
		  	}
		 });

	}
