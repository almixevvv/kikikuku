
<div class="main-container">
  <div class="main-body" style="margin-top: 2.5em; margin-bottom: 5em; padding-left: 5em; padding-right: 5em;">

    <div class="row">
      <div class="col-lg-12">
        <center>
          <h3 style="margin-bottom: 1em;">Please Select Your Payment Method</h3>
        </center>
      </div>
    </div>

    <center>
      <div class="panel-group" id="accordion">
        <div class="faqHeader"></div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <label>
                  <input type="radio" name="radio-bca">
                  <span>Manual Transfer (BCA)</span>
                  <span>
                    <img src="<?php echo base_url('assets/img/bca-logo.png'); ?>" alt="BCA Logo" id="bca-logo">
                  </span>
                </label>
              </a>
            </h4>
          </div>

          <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
              <label>
                Total Payment
              </label>
              <h4>
                <strong>
                  <i style="font-style: italic; color: #249ca7; margin-left: 0.8em;">
                    IDR <?php echo number_format($orderTotal, 2); ?>
                  </i>
                </strong>
              </h4>
              <h4 style="margin-top: 1.2em;">
                <strong>
                  Payment Requirement
                </strong>
              </h4>
              <ol style="padding-left: 2.5em; list-style: circle;">
                <li>Payment can only be done by transfer to BCA Account</li>
                <li>Your total order amount is not included for automatic verification process</li>
                <li>Please transfer to the last 3 digits</li>
              </ol>
              <div class="form-group" style="margin-top: 1em;">
                <?php echo form_open('order/confirmation'); ?>
                  <input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
                  <input type="hidden" name="orderTotal" value="<?php echo $orderTotal; ?>">
                  <input type="hidden" name="transactionID" value="<?php echo $transactionID; ?>">
                  <button type="submit" class="btn btn-default">Continue Payment</button>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <label>
                  <input type="radio" name="radio-visa">
                  <span>Visa</span>
                  <span>
                    <img src="<?php echo base_url('assets/img/visa-logo.png'); ?>" alt="VISA Logo" id="visa-logo">
                  </span>
                </label>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <h4>
                <strong>
                  Payment Requirement
                </strong>
              </h4>
              <ol style="padding-left: 2.5em; list-style: circle;">
                <li>Payment can only be done by using VISA logo card</li>
                <li>There's additional service fee of Rp. 10.350</li>
                <li>If there's refund, the refund will be transfered to your credit card</li>
              </ol>
              <div class="form-group">
                <button type="submit" class="btn btn-default">Continue Payment</button>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <label>
                  <input type="radio" name="radio-master">
                  <span>Mastercard</span>
                  <span>
                    <img src="<?php echo base_url('assets/img/mastercard-logo.jpeg'); ?>" alt="Mastercard Logo" id="mastercard-logo">
                  </span>
                </label>
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
              <h4>
                <strong>
                  Payment Requirement
                </strong>
              </h4>
              <ol style="padding-left: 2.5em; list-style: circle;">
                <li>Payment can only be done by using Mastercard logo card</li>
                <li>There's additional service fee of Rp. 10.350</li>
                <li>If there's refund, the refund will be transfered to your credit card</li>
              </ol>
            </div>
          </div>
        </div>

      </div>

    </center>

  </div>
</div>
