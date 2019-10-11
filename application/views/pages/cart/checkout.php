<div class="checkout-container">
  
  



</div>

<script type="text/javascript">

  function clearData() {
    if($('input[name="clear-data"]:checked')) {
      $('input[name=txt-name]').val('');
      $('input[name=txt-email]').val('');
      $('input[name=txt-phone]').val('');
      $('input[name=txt-address-1]').val('');
      $('input[name=txt-address-2]').val('');
      $('input[name=txt-state]').val('');
      $('input[name=txt-zip]').val('');
    }
  }

  $(document).ready(function(){

    $.ajax({
     url: 'https://restcountries.eu/rest/v2/all?fields=name;callingCodes;flag',
     type: 'GET',
     success: function(data) {
         var countryData = '';
         $.each(data, function(index, value) {
           //Get country data from API
           $("#txt-country").append($('<option>', {
             value:value.name,
             text: value.name
           }));
           //Get country phone number from API
           $("#country-code").append($('<option>', {
             value:value.callingCodes,
             text: value.name + " +" + value.callingCodes
           }));
         });
       },
     error: function (xhr, ajaxOptions, thrownError) {
         var errorMsg = 'Ajax request failed: ' + xhr.responseText;
         console.log(errorMsg);
         //$('#content').html(errorMsg);
       }
    });

  });

</script>
