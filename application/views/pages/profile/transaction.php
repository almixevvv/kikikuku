<style type="text/css">
  
  .trans-container {
    width: 100%;
    padding-left: 2em;
    padding-right: 2em;
    margin-top: 9em;
  }

  .trans-inner-container {
    border: solid #bdbdbd 1px;
    border-radius: 5px;
    padding: 1em;
  }

  .trans-filter-button {
    background: #24ca9d;
    border: none;
    border-radius: 3px;
  }

  .trans-main-container {
    padding: 1em;
  }

  .container-border-date {
    border-bottom: 1.5px solid #ced4d9;
  }

  .container-border-order-number {
    border-bottom: 1.5px solid #ced4d9; 
    margin-bottom: 0.6em;
    padding-bottom: 0.5em;
  }

  .container-border-order {
    border-right: 1.5px solid #ced4d9;
    margin-top: 0.6em;
  }

  .container-border-message {
    border-right: 1.5px solid #ced4d9;
  }

  .container-border-order-last {
    margin-top: 0.6em; 
  }

  .trans-main-color {
    color: #24ca9d;
  }

  .container-border-main {
    border: 1px solid #ced4d9;
    border-radius: 7px;
    padding: 0.7em;
  }

  .transaction-image {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #ced4d9;
    padding: 0.2em;
  }

  #trans-filter-separator {
    border-bottom: 1px solid #ced4d9;
    margin-left: 0.5em;
    margin-right: 0.5em;
    padding-bottom: 1em;
  }

</style>

<div class="trans-container">

  <div class="trans-inner-container">
    
    <!-- FILTER BUTTON -->
    <div class="row" id="trans-filter-separator">
      
      <div class="col-2">
        <span>Search by Status:</span>
      </div>

      <div class="col-10">
        
        <div class="row">
          
          <div class="col-2">
            <span class="trans-filter-button">Inquiry Created</span>
          </div>
          
          <div class="col-2">
            <span>Inquiry Updated</span>
          </div>
          
          <div class="col-2">
            <span>Confirm Payment</span>
          </div>
          
          <div class="col-2">
            <span>Inquiry Paid</span>
          </div>
          
          <div class="col-2">
            <span>Inquiry Canceled</span>
          </div>

          <div class="col-2">
            <span>Inquiry Done</span>
          </div>

        </div>

      </div>

    </div>
    <!-- END OF FILTER BUTTON -->

    <?php foreach($masterData->result() as $master): ?>
    <!-- MAIN TRANSACTION -->
    <div class="trans-main-container">
      
      <div class="row container-border-main"> 
        <div class="col-12">
          
          <!-- TRANS DATE -->
          <div class="row container-border-date">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
              <span><?php echo $master->ORDER_DATE; ?></span>
            </div>
          </div>
          <!-- END OF TRANS DATE -->

          <!-- MAIN TRANS PART -->
          <div class="row container-border-order-number">

            <div class="col-12 col-md-4 col-lg-4 col-xl-4 container-border-order">
              <div class="row">
                <div class="col-12">
                  <span>ORDER NUMBER</span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <span class="trans-main-color font-weight-bold"><?php echo $master->ORDER_NO; ?></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 col-xl-4 container-border-order">
              <div class="row">
                <div class="col-12">
                  <span>ORDER STATUS</span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <span class="trans-main-color font-weight-bold"><?php echo $master->STATUS_ORDER; ?></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 col-xl-4 container-border-order-last">
              <div class="row">
                <div class="col-12">
                  <span>TRANSACTION TOTAL</span>
                </div>
                <div class="col-12">
                  <span class="trans-main-color font-weight-bold">IDR <?php echo number_format($master->AMOUNT + $master->TOTAL_POSTAGE, 2, '.', ','); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <span>SHIPPING COST</span>
                </div>
                <div class="col-12">
                  <span class="trans-main-color font-weight-bold">IDR <?php echo number_format($master->TOTAL_POSTAGE, 2, '.',','); ?></span>
                </div>
              </div>
            </div>

          </div>

          <?php
            $this->db->select('*');
            $this->db->from('v_g_orders');
            $this->db->where('ORDER_NO', $master->ORDER_NO);

            $userHistory = $this->db->get();
          
            foreach($userHistory->result() as $history):

              //CALL THE API FOR PRODUCT TITLE AND IMAGE
              $finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$history->PRODUCT_ID;

              $json = file_get_contents($finalUrl);
              $obj = json_decode($json, true);
          ?>
          <div class="row container-border-order-number">

            <div class="col-12 col-md-8 col-lg-8 col-xl-8 container-border-order">
              
              <div class="row">
                
                <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                  <a href="<?php echo base_url().'product_detail?id='.$history->PRODUCT_ID; ?>">
                    
                    <?php if($obj['detail']['productForApp']['picture'] == null): ?>
                    <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2'];?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" class="transaction-image">
                    <?php else: ?>
                    <img src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture'];?>" alt="<?php echo $obj['detail']['productForApp']['title']; ?>" class="transaction-image">
                    <?php endif; ?>

                  </a>
                </div>

                <div class="col-8">
                  <div class="row">
                    <div class="col-12">
                      <span class="trans-main-color text-capitalize font-weight-bold">
                        <?php echo $obj['detail']['productForApp']['title']; ?>
                      </span>
                    </div>
                  </div>

                  <div class="row pt-2">
                      <div class="col-6">
                        <span class="trans-main-color font-weight-bold">
                          IDR <?php echo number_format($history->PRODUCT_FINAL_PRICE, 2, '.', ','); ?>
                        </span>  
                      </div>

                      <div class="col-6">
                        <span class="trans-main-color">
                          <?php echo $history->PRODUCT_QUANTITY.' '.$obj['detail']['productForApp']['matrisingular']; ?>
                        </span>
                      </div>
                    </div>
                </div>

              </div>
            </div>        

            <div class="col-4">
              
              <div class="row">
                
                <div class="col-12">
                  
                  <div class="row">
                    <div class="col-12">
                      <span>TOTAL PRICE</span>
                    </div>    
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <span class="trans-main-color font-weight-bold">
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
                      <?php if($history->PRODUCT_NOTES == null): ?>
                        <span class="trans-main-color font-weight-bold"> - </span>
                      <?php else: ?>
                        <span class="trans-main-color font-weight-bold"><?php echo $history->PRODUCT_NOTES; ?></span>
                      <?php endif; ?>
                    </div>
                  </div>

                </div>

              </div>
              
            </div>
          
          </div>
          <?php endforeach; ?>

          <div class="row">
            <div class="col-2 col-md-4 col-lg-3 col-xl-2 container-border-message">
              <span>MESSAGE BUTTON</span>
            </div> 
            <div class="col-2 col-md-4 col-lg-3 col-xl-2 container-border-detail">
              <span>ORDER DETAIL BUTTON</span>
            </div>
          </div>
          <!-- END OF MAIN TRANS PART -->

        </div>
      </div>
    </div>
    <!-- END OF MAIN TRANSACTION -->
    <?php endforeach; ?>

  </div>

</div>