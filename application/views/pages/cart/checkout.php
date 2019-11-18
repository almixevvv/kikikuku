<div class="checkout-container">
  
  <div class="row d-none d-md-block d-lg-block d-xl-block">

    <!-- CART BREADCRUMB -->
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
      <div class="mb-0 mb-md-3 mb-lg-3 mb-xl-3 pt-0 pt-md-2 pt-lg-2 pt-xl-2" style="text-align: left;">
        
        <span style="color: #333;">
          <a href="<?php echo base_url(); ?>" style="color: black;">
            <span class="fa fa-home"></span> Home
          </a>
        </span>

        <span style="color: #333;"> -
          <a href="<?php echo base_url('mycart'); ?>" style="color: black;">
            Shopping Cart
          </a>
        </span>

        <span style="color: black;"> -
          Checkout
        </span>

      </div>
    </div>
    <!-- END OF CART BREADCRUMB -->

  </div>

  <div class="row">
      <div class="col-12 col-md-5 col-lg-5 col-xl-5">
        <h3>Shipping Details</h3>
      </div>
  </div>

  <form action="<?php echo base_url('Checkout/checkoutProcess'); ?>" method="POST" class="needs-validation" novalidate>

  <!-- LOAD USER DATA -->
  <?php foreach($userData->result() as $data): ?>
  <div id="checkout-inner-container">
    
    <div class="row">
      <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        <div class="form-group">
            <label for="txt-name">Name</label>
            <input type="text" name="txt-name" value="<?php echo $data->FIRST_NAME.' '.$data->LAST_NAME; ?>" class="form-control" required />
          </div>
      </div>
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="txt-email">Email</label>
            <input type="text" name="txt-email" value="<?php echo $data->EMAIL; ?>" class="form-control" required />
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="txt-phone">Phone Number</label>
            <input type="number" name="txt-phone" value="<?php echo $data->PHONE; ?>" class="form-control" required />
          </div>
        </div>
    </div>

    <div class="row">
       <div class="col-12 col-md-6 col-lg-6 col-xl-6">
          <div class="form-group">
            <label for="txt-address-1">Address</label>
            <input type="text" name="txt-address-1" value="<?php echo $data->ADDRESS; ?>" class="form-control" required />
          </div>
        </div>
        <div class="col-12 col-md-6 co-lg-6 co-xl-6">
          <div class="form-group">
            <label for="txt-address-2">Address 2</label>
            <input type="text" name="txt-address-2" value="<?php echo $data->ADDRESS_2; ?>" class="form-control" required />
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-md-4 col-lg-4 col-xl-4">
            <label for="txt-country">Country</label>
            <select name="txt-country" id="txt-country" class="form-control">
              <option value="Indonesia" selected="selected">Indonesia</option>
            </select>
        </div>
        <div class="col-6 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="txt-state">State/Province</label>
            <input type="text" name="txt-state" value="<?php echo $data->PROVINCE; ?>"  id="txt-state" class="form-control" required />
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="txt-zip">ZIP Code</label>
            <input type="text" name="txt-zip" value="<?php echo $data->ZIP; ?>" id="txt-zip" class="form-control" required />
          </div>
        </div>
      </div>

      <div class="row">
        
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
          <label>
            <input name="save-info" type="checkbox"> Save This Information for Next Time
          </label>
        </div>

      </div>

      <div class="row">

        <div class="col-12 col-md-5 col-lg-5 col-xl-5">
          <label>
            <input name="clear-data" type="checkbox" id="clear-data"> My Shipping Address is Different From My Billing Address
          </label>
        </div>

      </div>

      <div class="row">
        
        <div class="col-6 col-md-3 col-lg-3 col-xl-3">
          <button class="form-control btn-kku" type="submit" id="btn-req">Submit</button>
        </div>

      </div>

  </div>
  <?php endforeach; ?>

  </form>

</div>

<script type="text/javascript">

  //Serialize Data Function
  function objectifyForm(formArray) {

  var returnArray = {};
  for (var i = 0; i < formArray.length; i++){
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
    return returnArray;
  }

  var email = '<?php echo $this->session->userdata('EMAIL'); ?>';
 
  $('#clear-data').on('change', function () {

    ckb = $("#clear-data").is(':checked');

    if(ckb) {
      $('input[name=txt-name]').val('');
      $('input[name=txt-email]').val('');
      $('input[name=txt-phone]').val('');
      $('input[name=txt-address-1]').val('');
      $('input[name=txt-address-2]').val('');
      $('input[name=txt-state]').val('');
      $('input[name=txt-zip]').val('');
    } else {
      
      $.ajax({ 
        url: '<?php echo base_url('Checkout/getMemberData'); ?>',
        type: 'POST',
        data: { email : email },
        success: function(data) {
          $.each(data, function(index, value) {
            console.log(value);
            $('input[name=txt-name]').val(value.FIRST_NAME + ' ' + value.LAST_NAME);
            $('input[name=txt-email]').val(value.EMAIL);
            $('input[name=txt-phone]').val(value.PHONE);
            $('input[name=txt-address-1]').val(value.ADDRESS);
            $('input[name=txt-address-2]').val(value.ADDRESS_2);
            $('input[name=txt-state]').val(value.PROVINCE);
            $('input[name=txt-zip]').val(value.ZIP);
          });
        }
      });
      // alert('dari isi jadi kosong');
    }

  });

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
    }
  });

  formOveride();
</script>
