<div class="trans-container">

  <div class="trans-inner-container">

    <?php

    //Counter Variable to diferentiate each form id
    $counter = 1;

    ?>

    <!-- FILTER BUTTON -->
    <div class="row" id="trans-filter-separator-desktop">

      <div class="trans-filter-container-left">
        <span>Search by Status:</span>
      </div>

      <div class="trans-filter-container-right" id="trans-scrollbar">

        <?php if ($this->input->get('transaction') == 'created') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Inquiry Created</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=created'); ?>">
              <span class="text-uppercase main-color">Inquiry Created</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($this->input->get('transaction') == 'updated') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Inquiry Updated</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=updated'); ?>">
              <span class="text-uppercase main-color">Inquiry Updated</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($this->input->get('transaction') == 'confirmed') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Confirm Payment</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=confirmed'); ?>">
              <span class="text-uppercase main-color">Confirm Payment</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($this->input->get('transaction') == 'paid') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Inquiry Paid</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=paid'); ?>">
              <span class="text-uppercase main-color">Inquiry Paid</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($this->input->get('transaction') == 'canceled') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Inquiry Canceled</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=canceled'); ?>">
              <span class="text-uppercase main-color">Inquiry Canceled</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($this->input->get('transaction') == 'done') : ?>
          <div class="trans-filter-button-active">
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <span class="text-uppercase trans-filter-active">Inquiry Done</span>
            </a>
          </div>
        <?php else : ?>
          <div class="trans-filter-button">
            <a href="<?php echo base_url('profile/transaction?transaction=done'); ?>">
              <span class="text-uppercase main-color">Inquiry Done</span>
            </a>
          </div>
        <?php endif; ?>

      </div>

    </div>
    <!-- END OF FILTER BUTTON -->

    <!-- FILTER BUTTON MOBILE -->
    <div class="row" id="trans-filter-separator-mobile">

      <div class="row">
        <div class="col-12 pl-1 pr-1">
          <span>Search by Status:</span>
        </div>
      </div>

      <div class="row" style="width: 99%;">
        <div class="col-12 pl-1 pr-1 pt-2" id="trans-scrollbar">

          <?php if ($this->input->get('transaction') == 'created') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Inquiry Created</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=created'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Inquiry Created</span>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($this->input->get('transaction') == 'updated') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Inquiry Updated</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=updated'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Inquiry Updated</span>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($this->input->get('transaction') == 'confirmed') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Confirm Payment</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=confirmed'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Confirm Payment</span>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($this->input->get('transaction') == 'paid') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Inquiry Paid</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=paid'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Inquiry Paid</span>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($this->input->get('transaction') == 'canceled') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Inquiry Canceled</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=canceled'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Inquiry Canceled</span>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($this->input->get('transaction') == 'done') : ?>
            <a href="<?php echo base_url('profile/transaction'); ?>">
              <div class="trans-filter-button-active">
                <span class="text-uppercase trans-filter-active">Inquiry Done</span>
              </div>
            </a>
          <?php else : ?>
            <a href="<?php echo base_url('profile/transaction?transaction=done'); ?>">
              <div class="trans-filter-button">
                <span class="text-uppercase main-color">Inquiry Done</span>
              </div>
            </a>
          <?php endif; ?>

        </div>

      </div>

    </div>

    <!-- END OF FILTER BUTTON MOBILE -->
    <?php if ($masterData->num_rows() == 0) : ?>
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-center">
            <span>
              <h3 class="pt-2 pt-md-4 pt-lg-4 pt-xl-4 pb-2 pb-md-4 pb-lg-4 pb-xl-4 text-uppercase " style="color: rgba(49,53,59,.44);">No Order History</h3>
            </span>
          </div>
        </div>
      </div>
    <?php else : ?>
      <?php foreach ($masterData->result() as $master) : ?>
        <!-- MAIN TRANSACTION -->
        <div class="trans-main-container">

          <div class="row container-border-main">
            <div class="col-12">

              <!-- TRANS DATE -->
              <div class="row container-border-date">
                <div class="col-12 col-md-5 col-lg-5 col-xl-5 pb-1 pb-md-1 pb-lg-1 pb-xl-1">
                  <span><?php echo $master->ORDER_DATE; ?></span>
                </div>
              </div>
              <!-- END OF TRANS DATE -->

              <!-- MAIN TRANS PART -->
              <div class="row container-border-order-number">

                <div class="col-12 col-md-4 col-lg-4 col-xl-4 mt-2 mt-md-2 mt-lg-2 mt-xl-2 container-border-order">
                  <div class="row">
                    <div class="col-12">
                      <span>ORDER NUMBER</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <span class="main-color font-weight-bold"><?php echo $master->ORDER_NO; ?></span>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4 col-xl-4 mt-2 mt-md-2 mt-lg-2 mt-xl-2 container-border-order">
                  <div class="row">
                    <div class="col-12">
                      <span>ORDER STATUS</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <span class="main-color font-weight-bold"><?php echo $master->STATUS_ORDER; ?></span>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4 col-xl-4 mt-2 mt-md-2 mt-lg-2 mt-xl-2 container-border-order-last">
                  <div class="row">
                    <div class="col-12">
                      <span>TRANSACTION TOTAL</span>
                    </div>
                    <div class="col-12">
                      <span class="main-color font-weight-bold">IDR <?php echo number_format($master->AMOUNT + $master->TOTAL_POSTAGE, 2, '.', ','); ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <span>SHIPPING COST</span>
                    </div>
                    <div class="col-12">
                      <span class="main-color font-weight-bold">IDR <?php echo number_format($master->TOTAL_POSTAGE, 2, '.', ','); ?></span>
                    </div>
                  </div>
                </div>

              </div>

              <?php
              $this->db->select('*');
              $this->db->from('v_g_orders');
              $this->db->where('ORDER_NO', $master->ORDER_NO);

              $userHistory = $this->db->get();

              foreach ($userHistory->result() as $history) :

                //CALL THE API FOR PRODUCT TITLE AND IMAGE
                $finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId=' . $history->PRODUCT_ID;

                $json = file_get_contents($finalUrl);
                $obj = json_decode($json, true);
              ?>
                <div class="row container-border-order-number pt-0 pt-md-2 pt-lg-2 pt-xl-2">

                  <div class="col-12 col-md-8 col-lg-8 col-xl-8 container-border-order">

                    <div class="row">

                      <div class="col-4 col-md-3 col-lg-3 col-xl-2 mt-2 mt-md-2 mt-lg-2 mt-xl-2">
                        <a href="<?php echo base_url() . 'product_detail?id=' . $history->PRODUCT_ID; ?>">

                          <?php if ($obj['detail']['productForApp']['picture'] == null) : ?>
                            <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2']; ?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" class="transaction-image">
                          <?php else : ?>
                            <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture']; ?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" class="transaction-image">
                          <?php endif; ?>

                        </a>
                      </div>

                      <div class="col-8 col-md-9 col-lg-9 col-xl-9 mt-2 mt-md-2 mt-lg-2 mt-xl-2">
                        <div class="row">
                          <div class="col-12">
                            <a href="<?php echo base_url() . 'product_detail?id=' . $history->PRODUCT_ID; ?>">
                              <span class="text-capitalize" style="color: #212529;">
                                <?php echo ucwords(mb_strimwidth($obj['detail']['productForApp']['title'], 0, 100, "...")); ?>
                              </span>
                            </a>
                          </div>
                        </div>

                        <div class="row pt-2">
                          <div class="col-6">
                            <span class="main-color font-weight-bold">
                              IDR <?php echo number_format($history->PRODUCT_FINAL_PRICE, 2, '.', ','); ?>
                            </span>
                          </div>

                          <div class="col-6">
                            <span class="main-color">
                              <?php if ($obj['detail']['productForApp']['matrisingular'] == '个') : ?>
                                <?php echo number_format($history->PRODUCT_QUANTITY) . ' pc'; ?>
                              <?php else : ?>
                                <?php echo number_format($history->PRODUCT_QUANTITY) . ' pc'; ?>
                              <?php endif; ?>
                            </span>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="col-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-md-2 mt-lg-2 mt-xl-2">

                    <div class="row">

                      <div class="col-12">

                        <div class="row">
                          <div class="col-12">
                            <span>TOTAL PRICE</span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <span class="main-color font-weight-bold">
                              IDR <?php echo number_format($history->PRODUCT_FINAL_PRICE * $history->PRODUCT_QUANTITY, 2, '.', '.'); ?>
                            </span>
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="row mt-3">

                      <div class="col-12">

                        <div class="row">
                          <div class="col-12">
                            <span>INQUIRY</span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <?php if ($history->PRODUCT_NOTES == null) : ?>
                              <span class="main-color font-weight-bold"> - </span>
                            <?php else : ?>
                              <span class="main-color font-weight-bold"><?php echo $history->PRODUCT_NOTES; ?></span>
                            <?php endif; ?>
                          </div>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>
              <?php endforeach; ?>

              <div class="row mt-1 mt-md-1 mt-lg-1 mt-xl-1">

                <div class="trans-container-footer-left">
                  <a href="#" data-transaction="<?php echo $master->ORDER_NO; ?>" data-sender="<?php echo $this->session->userdata('USERID'); ?>" data-toggle="modal" data-target="#messageModal" style="color: black;">
                    <span><i class="fas fa-comments pr-2"></i> Send Message</span>
                  </a>
                </div>

                <div class="trans-container-footer-right">
                  <span><i class="fas fa-clipboard-list pr-2"></i> Order Detail</span>
                </div>

                <?php
                //DONT'S SHOW THE PAYMENT BUTTON IF THE STATUS IS NEW ORDER AND UPDATED
                if ($master->STATUS_ORDER == 'UPDATED') :

                  $attributes = array('id' => 'myform' . $counter);
                  echo form_open('order/payment', $attributes);

                  //GENERATE RANDOM NUMBER TO HELP CONFIRM THE TRANSFER
                  $transID = rand(100, 1000);
                ?>
                  <form class="form-inline" action="<?php echo base_url('order/payment'); ?>" method="POST" id="myform<?php echo $counter; ?>">

                    <input type="hidden" name="orderID" value="<?php echo $master->ORDER_NO; ?>">
                    <input type="hidden" name="orderTotal" value="<?php echo $master->AMOUNT + $master->TOTAL_POSTAGE + $transID; ?>">
                    <input type="hidden" name="transactionID" value="<?php echo $transID; ?>">

                    <div class="trans-container-footer-payment">
                      <a href="javascript:{}" onclick="document.getElementById('myform<?php echo $counter; ?>').submit();" style="color: black;">
                        <span><i class="fas fa-money-check-alt"></i> Order Payment</span>
                      </a>
                    </div>

                  <?php endif; ?>

                  <!-- SHOW IF THE STATUS IS CONFIRMED -->
                  <?php if ($master->STATUS_ORDER == 'PAID') : ?>
                    <div class="trans-container-footer-receive">
                      <a href="#" class="receive-button" data-id="<?php echo $master->ORDER_NO; ?>" style="color: black;">
                        <span><i class="far fa-check-square pr-2"></i> Receive Order</span>
                      </a>
                    </div>
                  <?php endif; ?>

                  </form>

              </div>
              <!-- END OF MAIN TRANS PART -->

            </div>
          </div>
        </div>
        <!-- END OF MAIN TRANSACTION -->
        <?php $counter++; ?>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>

</div>

<!-- MODAL PART -->
<div class="modal fade" id="messageModal" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">

      </div>

      <div class="modal-footer">
        <div class="d-flex justify-content-end">
          <div class="d-flex flex-row">
            <button type="button" class="btn btn-kku mt-0 mr-3" id="submitMessages" style="width: 100%;">Send Message</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END OF MODAL PART -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap-4/js/bootstrap.js'); ?>"></script>

<script type="text/javascript">
  $('.account-position-fix').on('click', function() {
    console.log('trans ke klik');
  });

  /* SET THE CURRENT ORDER STATUS TO FINISHED */
  $('.receive-button').on('click', function() {
    var id = $(this).attr("data-id");
    swal.fire({
      title: "Receive Order",
      text: "Are you sure you want to finish this order?",
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
          data: {
            id: id
          },
          success: function(response) {
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

  /* LOAD THE MODAL DYNAMICALY AND SCROLL TO THE LAST MESSAGE */
  $('#messageModal').on('show.bs.modal', function(e) {

    //Get the trigger data
    var button = $(e.relatedTarget);
    var recipient = button.data('transaction');

    //Create the URL for Controller
    var url = '<?php echo base_url('Profile/getMessages?id='); ?>' + recipient;

    $('.modal-body').load(url, function() {
      $(".message-holder").animate({
        scrollTop: $('.message-holder').prop("scrollHeight")
      }, 1000);
      $('#messageModal').modal({
        show: true
      });
    });

  });


  /* SEND THE MESSAGE */
  $('#submitMessages').on('click', function(e) {

    var message = $("#sender-messages").val();
    var transactionID = $("#hidden-id").val();
    var sender = 'CUSTOMER';

    $.ajax({
      url: "<?php echo base_url('Profile/customerSendMessages'); ?>",
      type: "GET",
      data: {
        sender: sender,
        id: transactionID,
        message: message
      },
      success: function(response) {

        //Create the URL for Controller
        var url = '<?php echo base_url('Profile/getMessages?id='); ?>' + transactionID;

        $('.modal-body').load(url, function() {
          $('#messageModal').modal({
            show: true
          });
          $(".message-holder").animate({
            scrollTop: $('.message-holder').prop("scrollHeight")
          }, 1000);
        });

      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });

  });
</script>