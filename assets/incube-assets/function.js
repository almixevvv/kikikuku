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

		if(!confirmPassword) {
			$('#uPass2').addClass("is-invalid");
		} else{
			console.log('isi');
		}
	}

	function getCountry() {

		$.ajax({
     		url: 'https://restcountries.eu/rest/v2/all?fields=name;callingCodes;flag',
     		type: 'GET',
     		success: function(data) {
         		var countryData = '';
         		$.each(data, function(index, value) {
           			//Get country data from API
           			$("#uCountry").append($('<option>', {
             			value:value.name,
             			text: value.name
           			}));
         		});
       		},
     		
     		error: function (xhr, ajaxOptions, thrownError) {
         		var errorMsg = 'Ajax request failed: ' + xhr.responseText;
         		console.log(errorMsg);
       		}
    	});
	}


