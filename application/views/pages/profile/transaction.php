<?php

  //COUNTER PARAMETER
  $counter = 1;
  $characterLimit = 255;

?>


<div class="main-container">
  <div class="main-body" style="margin-top: 2.5em; margin-bottom: 5em; padding-left: 5em; padding-right: 5em;">

    <!-- Breadcrumb Menu -->
    <div class="row">
      <div class="col-lg-12" style="margin-bottom: 1em;">
        <ul>
  				<li style="display: inline-block;">
  					<a href="<?php echo base_url();?>" title="Go to Home Page">Home</a>
  					<span class="fa fa-angle-right"></span>
  				</li>
  				<li style="display: inline-block;">
  					<a href="#">Profile</a>
            <span class="fa fa-angle-right"></span>
  				</li>
          <li style="display: inline-block;">
  					<strong>Transaction History</strong>
  				</li>
  			</ul>
      </div>
    </div>

    <div class="row" id="container-transaction">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <!-- Filter Transaction Part -->
            <div class="row" style="margin-top: 1.5em;">
              <div class="col-lg-2">
                <h5>Search by Status</h5>
              </div>
              <div class="col-lg-10" style="margin-left: -5em;">
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'created'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;" href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_created" onclick="loadCreated()">Inquiry Created</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('profile/history?query=created&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_created" onclick="loadCreated()">Inquiry Created</a>
                  <?php endif; ?>
                </span>
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'updated'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;" href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_update" onclick="loadUpdated()">Inquiry Updated</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('Profile/history?query=updated&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_update" onclick="loadUpdated()">Inquiry Updated</a>
                  <?php endif; ?>
                </span>
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'confirmed'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;" href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_confirm" onclick="loadConfirm()">Confirm Payment</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('Profile/history?query=confirmed&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_confirm" onclick="loadConfirm()">Confirm Payment</a>
                  <?php endif; ?>
                </span>
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'paid'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;"  href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_paid" onclick="loadPaid()">Inquiry Paid</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('Profile/history?query=paid&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_paid" onclick="loadPaid()">Inquiry Paid</a>
                  <?php endif; ?>
                </span>
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'canceled'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;"  href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_canceled" onclick="loadCanceled()">Inquiry Canceled</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('Profile/history?query=canceled&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_canceled" onclick="loadCanceled()">Inquiry Canceled</a>
                  <?php endif; ?>
                </span>
                <span class="button-inquiry">
                  <?php
                    //GET THE PARAMETER
                    if($this->input->get('query') == 'done'):
                  ?>
                    <a style="background-color: #34CA9C; color: white;"  href="<?php echo base_url('profile/transaction'); ?>" class="btn btn-transaction" id="transaction_done" onclick="loadDone()">Inquiry Done</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('Profile/history?query=done&id='.$userEmail); ?>" class="btn btn-transaction" id="transaction_done" onclick="loadDone()">Inquiry Done</a>
                  <?php endif; ?>
                </span>
              </div>
            </div>
            <!-- Filter Transaction Part -->

            <!-- Separator Part -->
            <div class="row">
              <div class="col-lg-12">
                <hr>
              </div>
            </div>
            <!-- Separator Part -->

            <!-- MAIN PART -->
            <!-- Main Transaction Part -->
            <?php foreach($masterData->result() as $master): ?>

            <div class="row">
              <div class="col-lg-12 transaction-padding">
                <table class="table custom-border">
                  <thead>
                    <tr>
                      <th colspan="4" style="padding-left: 0.9em!important;">
                        <strong><?php echo $master->ORDER_DATE; ?></strong>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- History Upper Part -->
                    <tr>
                      <th>
                        <div class="row">
                          <div class="col-md-4" style="border-right: 1.5px solid #e9ecef;">
                            <h5 style="padding-left: 0.9em!important;">ORDER NUMBER</h5>
                            <h5 style="font-weight: 700; padding-left: 0.9em!important; color: #f75c06;"><?php echo $master->ORDER_NO; ?></h5>
                          </div>
                          <div class="col-md-4" style="border-right: 1.5px solid #e9ecef;">
                            <h5>ORDER STATUS</h5>
                            <h5 style="font-weight: 700; color: #f75c06;"><?php echo $master->STATUS_ORDER; ?></h5>
                          </div>
                          <div class="col-md-4">
                            <span>
                              <h5>TRANSACTION TOTAL
                                <span style="color: #f75c07; font-weight: 800;">IDR <?php echo number_format($master->AMOUNT + $master->TOTAL_POSTAGE, 2); ?></span>
                              </h5>
                            </span>
                            <span>
                              <h5>SHIPPING COST
                                <span style="color: #f75c07; font-weight: 800;">IDR <?php echo number_format($master->TOTAL_POSTAGE, 2); ?></span>
                              </h5>
                            </span>
                          </div>
                        </div>
                      </th>
                    </tr>

                    <!-- FOREACH LOOP FOR PRODUCT DETAILS -->
                    <?php
                      $this->db->select('*');
                      $this->db->from('v_g_orders');
                      $this->db->where('ORDER_NO', $master->ORDER_NO);

                      $userHistory = $this->db->get();
                    ?>
                    <?php foreach($userHistory->result() as $history): ?>

                    <?php

                      //CALL THE API FOR PRODUCT TITLE AND IMAGE
                      $finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$history->PRODUCT_ID;

                      $json = file_get_contents($finalUrl);
                      $obj = json_decode($json, true);

                    ?>
                    <tr>
                      <th style="height: 11em;">
                        <div class="row" style="height: inherit; ">
                          <div class="col-md-8" style="border-right: 1.5px solid #e9ecef; height: inherit; ">
                            <div class="row">
                              <!-- Product Image -->
                              <?php if($obj['detail']['productForApp']['picture'] == null): ?>
                              <div class="col-md-3">
                                <a href="<?php echo base_url().'product_detail?id='.$history->PRODUCT_ID; ?>">
                                  <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2'];?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" style="width:150px; height:150px; object-fit: cover;  margin-left: 0.5em;border-radius: 10px;">
                                </a>
                              </div>
                                <?php else: ?>
                                  <div class="col-md-3">
                                    <a href="<?php echo base_url().'product_detail?id='.$history->PRODUCT_ID; ?>">
                                      <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture'];?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" style="width:150px; height:150px; object-fit: cover;  margin-left: 0.5em;border-radius: 10px;">
                                    </a>
                                  </div>
                              <?php endif; ?>
                              <!-- Product Image -->

                              <!-- Product Details -->
                              <div class="col-md-8">
                                <div class="row" style="margin-top: 0.5em; margin-bottom: 0.5em; font-size: 15px;">
                                  <div class="col-md-12">
                                    <a href="<?php echo base_url().'product_detail?id='.$history->PRODUCT_ID; ?>">
                                      <strong style="color: #337ab7;">
                                        <?php echo $obj['detail']['productForApp']['title']; ?>
                                      </strong>
                                    </a>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4" style="color: #f75c07;">
                                    <strong>
                                      IDR <?php echo number_format($history->PRODUCT_FINAL_PRICE, 2);?>
                                    </strong>
                                  </div>
                                  <div class="col-md-4">
                                    <strong>
                                      <?php echo $history->PRODUCT_QUANTITY.' '.$obj['detail']['productForApp']['matrisingular']; ?>
                                    </strong>
                                  </div>
                                </div>
                              </div>
                              <!-- Product Details -->
                            </div>
                          </div>

                          <!-- Product Price Part -->
                          <div class="col-md-4">
                            <h5>TOTAL PRICE</h5>
                            <h5 style="color: #f75c07; font-weight: 800;">IDR <?php echo number_format($history->PRODUCT_FINAL_PRICE * $history->PRODUCT_QUANTITY, 2);?></h5>
                            <h5 style="margin-top: 2em;">INQUIRY</h5>
                            <?php if($history->PRODUCT_NOTES != null): ?>
                            <h5 style="color: #f75c07; font-weight: 800;"><?php echo $history->PRODUCT_NOTES; ?></h5>
                              <?php else: ?>
                              <h5 style="color: #f75c07; font-weight: 800;"><?php echo '-'; ?></h5>
                            <?php endif; ?>
                          </div>
                          <!-- Product Price Part -->

                        </div>
                      </th>
                    </tr>
                    <?php endforeach; ?>
                    <!-- FOREACH LOOP FOR PRODUCT DETAILS -->

                    <!-- Table Bottom Part -->
                    <tr style="height: 3em;">
                      <th style="padding-top: 0.8em;">
                        <?php //DONT'S SHOW THE PAYMENT BUTTON IF THE STATUS IS NEW ORDER AND UPDATED ?>
                        <?php if($master->STATUS_ORDER == 'UPDATED'): ?>
                        <?php $attributes = array('id' => 'myform'.$counter); ?>
                        <?php echo form_open('order/payment', $attributes); ?>
                        <?php
                          //GENERATE RANDOM NUMBER TO HELP CONFIRM THE TRANSFER
                          $transID = rand(100,1000);
                        ?>
                        <input type="hidden" name="orderID" value="<?php echo $master->ORDER_NO; ?>">
                        <input type="hidden" name="orderTotal" value="<?php echo $master->AMOUNT + $master->TOTAL_POSTAGE + $transID; ?>">
                        <input type="hidden" name="transactionID" value="<?php echo $transID; ?>">
                        <a href="#" onclick="document.getElementById('myform<?php echo $counter; ?>').submit();" class="transaction-button">
                          <span style="padding-right: 2em; padding-left: 2em;">
                            <i class="fa fa-money"></i>
                            Order Payment
                          </span>
                        </a>
                        <a href="#" class="transaction-button btn-message send-modal" data-transaction="<?php echo $master->ORDER_NO; ?>" data-sender="<?php echo $this->session->userdata('USERID');?>" onclick="loadContent('<?php echo $master->ORDER_NO; ?>')">
                          <span style="padding-left: 2em; border-left: 1px solid grey;">
                            <i class="fa fa-comments"></i>
                            Message
                          </span>
                        </a>
                      <?php echo form_close(); ?>

                      <?php //IF THE STATUS IS CONFIRMED, SHOW BUTTON TO RECEIVE THE GOODS ?>
                      <?php elseif($master->STATUS_ORDER == 'PAID'): ?>
                      <a href="#" class="receive-button transaction-button" data-id="<?php echo $master->ORDER_NO; ?>">
                        <span style="padding-right: 2em; padding-left: 2em;">
                          <i class="fa fa-check-square-o"></i>
                          Receive Order
                        </span>
                      </a>
                      <a href="#" class="transaction-button btn-message send-modal" data-transaction="<?php echo $master->ORDER_NO; ?>" data-sender="<?php echo $this->session->userdata('USERID');?>" onclick="loadContent('<?php echo $master->ORDER_NO; ?>')">
                        <span style="padding-left: 2em; border-left: 1px solid grey;">
                          <i class="fa fa-comments"></i>
                          Message
                        </span>
                      </a>

                      <?php //IF STATUS IS OTHER, THEN ONLY SHOW THE MESSAGE BUTTON ?>
                      <?php else: ?>
                        <a href="#" class="transaction-button btn-message send-modal" data-transaction="<?php echo $master->ORDER_NO; ?>" data-sender="<?php echo $this->session->userdata('USERID');?>" onclick="loadContent('<?php echo $master->ORDER_NO; ?>')">
                          <span style="padding-left: 2em;">
                            <i class="fa fa-comments"></i>
                            Message
                          </span>
                        </a>
                      <?php endif; ?>
                      </th>
                    </tr>
                    <!-- Table Bottom Part -->

                  </tbody>
                </table>

              </div>
            </div>
            <!-- Main Transaction Part -->
            <?php $counter++; ?>
            <?php endforeach; ?>
            <!-- END OF MAIN PART -->
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<!-- Modal Part -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" id="submitMessages" style="background-color: #f17f05!important;" >Send Message</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Part -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/transaction.js'); ?>"></script>

<script type="text/javascript">

  /* SWEET ALERT */
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false,
  });

  /* SHOW ALERT IF THE RECEIVE IS CLICKED */
  $('.receive-button').on('click', function() {
    var id = $(this).attr("data-id");
    swal.fire({
      title:"Accept Order",
      text:"Are you sure you want to finish this order?",
      type: "warning",
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: "Confirm",
      confirmButtonColor: '#3085d6'
    }).then((result) => {
        if (result.value) {
          console.log('clicked');
          console.log(id);
          $.ajax({
              url: "<?php echo base_url('Profile/finishOrder'); ?>",
              type: "POST",
              data: { id:id } ,
              success: function (response) {
                console.log(response);
                location.reload(true);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
              }
            });
      }
    });
  });

  var senderID;

  function loadContent(id) {

    senderID = $(".send-modal").data("sender");

    $('.modal-body').load('<?php echo base_url('Profile/getMessages?id='); ?>' + id, function() {
			$('#myModal').modal({
				show : true
			});
		});

  }

  $("#submitMessages").on('click', function() {

    var message = $("#sender-messages").val();
    var transactionID = $("#hidden-id").val();

    /* PRINT THE TIME FOR CHAT */
    var currentdate = new Date();
    var curDate = currentdate.getDate();
    var curMonth = currentdate.getMonth();
    var curYear = currentdate.getFullYear();
    var curHour = currentdate.getHours();
    var curSec = currentdate.getSeconds();
    var curMin = currentdate.getMinutes();

    $.ajax({
        url: "<?php echo base_url('Profile/customerSendMessages'); ?>",
        type: "POST",
        data: { email:senderID, id:transactionID, message:message } ,
        success: function (response) {
          console.log(response);
          location.reload(true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
  });

</script>
