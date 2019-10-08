<div class="main-container">
  <div class="main-body" style="margin-top: 2.5em; margin-bottom: 5em; padding-left: 5em; padding-right: 5em;">

    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <center style="margin-bottom: 1.75em;">
            <h4>Payment Confirmation</h4>
          </center>
        </div>
      </div>

      <?php echo form_open_multipart('PaymentProcess/manualProcess'); ?>
      <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
          <div class="form-group">
            <label for="payment-name">Account Name</label>
              <input type="text" class="form-control" onblur="validateText()" id="payment-name" name="payment-name" >
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label for="payment-number">Account Number</label>
            <input type="text" class="form-control" onblur="validateNumber()" id="payment-number" name="account-number" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
          <div class="form-group">
            <label for="payment-bank">Bank Name</label>
            <select name="payment-bank" class="form-control">
              <option value="Mandiri">Mandiri</option>
              <option value="BCA">BCA</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="CIMB">CIMB Niaga</option>
              <option value="Others">Lainnya</option>
            </select>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label for="payment-number">Transfer Amount</label>
            <input type="number" class="form-control" id="payment-number" name="payment-number" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
          <div class="form-group">
            <label for="payment-date">Transfer Date</label>
            <input type="date" class="form-control" id="payment-date" name="payment-date" >
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-group">
            <label for="payment-receipt">Transfer Receipt</label>
            <input type="file" name="payment-receipt" id="payment-receipt" accept="image/*">
            <p class="help-block">Please make sure that the date and amount of the receipt is clear</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
          <div class="form-group" style="margin-top: 1em;">
            <button type="submit" class="btn btn-default" id="submit-payment">Confirm Payment</button>
          </div>
        </div>
      </div>

      <?php //HIDDEN INPUT FOR ORDER ID ?>
      <input type="hidden" name="payment-order-value" value="<?php echo $orderID; ?>">
      <input type="hidden" name="payment-transaction-id" value="<?php echo $transactionID; ?>">
      <?php echo form_close(); ?>

    </div>

  </div>
</div>

<script type="text/javascript">

  $(document).ready(function () {

    $('.error-message').fadeOut();

  });

  function validateNumber() {

    var numberValue = $('#payment-number').val();

    if($.isNumeric(numberValue)) {
      $('#payment-number-error').fadeOut();
      $('#submit-payment').removeAttr("disabled");
    } else {
      $('#payment-number-error').fadeIn();
      $("#submit-payment").attr("disabled", true);
    }

  }

  function validateText() {

    var letters = /^[A-Za-z]+$/;
    var numberValue = $('#payment-name').val();

    if(numberValue.match(letters)) {
      // $('#payment-name-error').fadeOut();
      // $('#submit-payment').removeAttr("disabled");
    } else {

      $('#payment-name-error').fadeIn();
      // $('#payment-name-error').fadeIn();
      // $("#submit-payment").attr("disabled", true);
    }

  }


</script>
