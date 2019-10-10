<div class="main-container ">
  <div class="container">
    <div class="row" style="padding-top: 1em;">
      <div class="col-md-5">
        <ul>
  				<li style="display: inline-block;">
  					<a href="<?php echo base_url();?>" title="Go to Home Page">Home</a>
  					<span class="fa fa-angle-right"></span>
  				</li>
  				<li style="display: inline-block;">
            <a href="<?php echo base_url('mycart');?>" title="Go to Home Page">Shopping Cart</a>
            <span class="fa fa-angle-right"></span>
  				</li>
          <li style="display: inline-block;">
  					<strong>Checkout</strong>
  				</li>
  			</ul>
      </div>
    </div>
    <div class="row" style="padding-bottom: 1.3em;">
      <div class="col-md-5">
        <h3>Shipping Details</h3>
      </div>
    </div>
    <?php
      $formAttributes = array(
        'class' => 'form-group',
        'data-toggle' => 'validator',
        'role' => 'form'
      );

      echo form_open('Checkout/checkoutProcess', $formAttributes);
      foreach($userData->result() as $data):
    ?>
    <!-- SENDER DETAILS -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="txt-name" style="font-size: 16px">Name</label>
          <input type="text" name="txt-name" value="<?php echo $data->FIRST_NAME.' '.$data->LAST_NAME; ?>" class="form-control" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="txt-email" style="font-size: 16px">Email</label>
          <input type="text" name="txt-email" value="<?php echo $data->EMAIL; ?>" class="form-control" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="txt-phone" style="font-size: 16px">Phone Number</label>
          <input type="text" name="txt-phone" value="<?php echo $data->PHONE; ?>" class="form-control" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
    </div>
    <!-- SHIPPING DETAILS -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="txt-address-1" style="font-size: 16px">Address</label>
          <input type="text" name="txt-address-1" value="<?php echo $data->ADDRESS; ?>" class="form-control" placeholder="Enter your username" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="txt-address-2" style="font-size: 16px">Address 2</label>
          <input type="text" name="txt-address-2" value="<?php echo $data->ADDRESS_2; ?>" class="form-control" placeholder="Enter your username" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
    </div>
    <!-- END OF SHIPPING DETAILS -->
    <!-- COUNTRY SELECTION -->
    <div class="row">
      <div class="col-md-4">
          <label for="txt-country" style="font-size: 16px">Country</label>
          <select name="txt-country" id="txt-country" class="form-control">
            <option value="Indonesia" selected="selected">Indonesia</option>
          </select>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="txt-state" style="font-size: 16px">State/Province</label>
          <input type="text" name="txt-state" value="<?php echo $data->PROVINCE; ?>"  id="txt-state" class="form-control" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="txt-zip" style="font-size: 16px">ZIP Code</label>
          <input type="text" name="txt-zip" value="<?php echo $data->ZIP; ?>" id="txt-zip" class="form-control" style="font-weight: normal;margin-left: 2px;border-radius: 0px; margin-bottom: 2em;" required />
        </div>
      </div>
    </div>
    <!-- END OF COUNTRY SELECTION -->
    <!-- SUBMIT BUTTON -->
    <div class="checkbox">
      <label style="padding: 0!important;">
        <input type="checkbox"> Save This Information for Next Time
      </label>
    </div>
    <div class="checkbox">
      <label style="padding: 0!important;">
        <input name="clear-data" onchange="clearData()" type="checkbox"> My Shipping Address is Different From My Billing Address
      </label>
    </div>
    <div class="row">
      <div class="col-md-3">
         <button class="form-control" type="submit" id="btn-req" style="color:#FFF;background:#15385b;width:105px;border-radius: 0px;padding: 2px; margin-bottom: 3em; margin-top: 1em;" >Submit</button>
      </div>
    </div>
    <!-- SUBMIT BUTTON -->
    <?php
      endforeach;
      echo form_close();
    ?>
  </div>
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
