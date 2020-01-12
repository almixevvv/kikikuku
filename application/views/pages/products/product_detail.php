<div class="detail-container">

  <div class="row">

    <!-- PRODUCT LEFT PART -->
    <div class="col-1 col-md-1 col-lg-1 col-xl-1 order-0 order-md-1 order-lg-1 order-xl-1 d-none d-md-block d-lg-block d-xl-block">
    <?php echo form_open('Cart/addtoCart'); ?>
      <?php foreach($dataproduct['item']['PICTURE_LIST'] as $key => $value) { ?>
          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $value; ?>" class="row-images" alt="<?php echo $key; ?>" src="<?php echo $value; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
            </center>
          </div>
      <?php } ?>

    </div>
    <!-- END OF PRODUCT LEFT PART -->

    <!-- IMAGE NAVIGATOR MOBILE -->
    <div class="col-12 d-md-none d-lg-none-xl-none order-2">
      <div class="d-flex flex-row">
      <?php foreach($dataproduct['item']['PICTURE_LIST'] as $key => $value) { ?>
          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $value; ?>" class="row-images" alt="<?php echo $key; ?>" src="<?php echo $value; ?>"/>
            </center>
          </div>
      <?php } ?>

      </div>
    </div>
    <!-- END OF MOBILE IMAGE NAVIGATOR -->

    <!-- PRODUCT CENTER PART -->
    <div class="col-12 col-md-5 col-lg-5 col-xl-5 order-1 order-md-2 order-lg-2 order-xl-3">
      <div class="detail-border">
        <div class="d-flex justify-content-center">
          <?php foreach($dataproduct['item']['PICTURE_LIST'] as $key => $value) { ?>
            <?php if($imageCounter == 1) { ?>
            <img class="detail-main-images" alt="<?php echo $key; ?>" src="<?php echo $value; ?>"/>  
            <!-- HIDDEN INPUT FOR SAVING IMAGE -->
            <input type="hidden" name="hidden-images" value="<?php echo $value; ?>">
            <?php } ?> 
          <?php $imageCounter++; } ?>

        </div>
      </div>
    </div>

    <!-- END OF PRODUCT CENTER PART -->

    <!-- PRODUCT RIGHT PART -->
    <div class="col-12 col-md-5 col-lg-5 col-xl-5 order-3 order-md-3 order-lg-3 order-xl-3">
      <div class="row detail-border ml-0 mr-0">
        <div class="detail-inner-container">
          <!-- Product Title Part -->
          <span class="detail-title">
            <label class="detail-txt-color text-left text-capitalize"><?php echo $dataproduct['item']['TITLE']; ?></label>
          </span>

          <!-- Product EXW Price -->
          <div class="exw-container">
            <label class="detail-label">EXW Price:</label>
              
              <?php foreach($dataproduct['item']['PRICE'] as $key) { ?>

                <?php if($key['FLAG'] != 'No EXW Price') { ?>
                <div class="row">
                  <div class="col-6 col-md-12 col-lg-6 col-xl-6" style="padding-right: 0!important;">
                    <label class="detail-txt-color detail-exw-size font-weight-bold">
                      <?php echo $key['STARTING_QUANTITY'].' '.$dataproduct['matrics']; ?> ~ <?php echo $key['ENDING_QUANTITY'].' '.$dataproduct['matrics']; ?>
                    </label>
                  </div>
                  <div class="col-6 col-md-12 col-lg-6 col-xl-6">
                    <label class="detail-txt-color detail-exw-size font-weight-bold">
                      <span class="detail-exw-color">IDR <?php echo number_format($key['PRICE'], 2, ',', '.'); ?></span>/<?php echo $dataproduct['matrics']; ?>
                    </label>
                  </div>
                </div> 
                <?php } ?>
              <?php } ?>
          </div>
            
          <input type="hidden" name="minimumQty" id="minimumQty" value="<?php echo $dataproduct['minimumOrder']; ?>" >

          <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-12 col-xl-7">
              <label class="detail-label">Estimated Price :</label>
              <?php if($dataproduct['startingPrice'] == 0) { ?>
                <span class="detail-exw-color detail-label">Price Negotiable</span>
              <?php } else { ?>
                <span class="detail-exw-color detail-label font-weight-bold">
                  IDR <?php echo number_format($dataproduct['startingPrice'], 2, '.', ',');?>
                </span>
              <?php } ?>
            </div>

            <div class="col-12 col-md-6 col-lg-12 col-xl-5">
              <label class="detail-label">Est. Weight :</label>
              <span class="detail-exw-color font-weight-bold" id="detail-weight">
              <?php if(is_numeric($dataproduct['estimated_weight'])) { ?>
                <?php echo substr($dataproduct['estimated_weight'], 0, 4); ?> gr
              <?php } else { ?>
                <?php echo substr('-', 0, 4); ?>
              <?php } ?>
              </span>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
              <label class="detail-label">Description :</label>
            </div>
            <div class="col-12 col-md-9 col-lg-9 col-xl-9">
              <span class="detail-txt-color">
                <?php if(strlen($dataproduct['item']['DETAILS']) == 0) { ?>
                  <label>No Product Description</label>
                <?php } else { ?>
                  <label>
                    <?php echo $dataproduct['item']['DETAILS'];?>
                  </label>
                <?php } ?>
              </span>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <label class="detail-label">Quantity</label>
            </div>
          </div>

          <div class="row">

            <div class="col-7 col-md-10 col-lg-7 col-xl-7">
              <div class="input-group mb-3" id="btn-detail-quantity">
                <div class="input-group-prepend">
                  <button class="btn btn-danger" id="xminusone" type="button"><i class="fa fa-minus"></i></button>
                </div>
                <input type="number" name="quantity" id="quantity" class="form-control text-center" aria-describedby="basic-addon1" value="<?php echo $dataproduct['minimumOrder']; ?>" style="text-align:right;">
                <div class="input-group-append">
                  <button class="btn btn-success" id="xplusone" type="button"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-12">
              <div class="form-group">
                <label class="detail-label" for="customer-notes">Inquiry</label>
                <textarea type="text" name="customer-notes" class="form-control detail-text-box"/></textarea>
              </div>
            </div>

          </div>

          <div class="row" style="margin-top: 1.5em;">

            <div class="col-7 col-md-10 col-lg-7 col-xl-8">
              <button type="submit" class="btn btn-kku" id="btn-addcart">
                Add To Cart&nbsp;<i class="fa fa-shopping-cart"></i>
              </button>
            </div>

          </div>

        <?php
            $productID = array(
              'type'  => 'hidden',
              'name'  => 'product-id',
              'id'    => 'hiddenID',
              'value' => $dataproduct['productID']
            );

            $productName = array(
              'type'  => 'hidden',
              'name'  => 'product-name',
              'id'    => 'hiddenName',
              'value' => $dataproduct['item']['TITLE']
            );

            $productPrice = array(
              'type'  => 'hidden',
              'name'  => 'product-price',
              'id'    => 'hiddenPrice',
              'value' => $dataproduct['startingPrice']
            );

            echo form_input($productName);
            echo form_input($productID);
            echo form_input($productPrice);

          ?>

          <?php echo form_close(); ?>

        </div>
      </div>
    </div>
    <!-- END OF PRODUCT RIGHT PART -->
  </div>

  <!-- RECOMENDATION PRODUCT PART -->
  <div class="row mt-4">

    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
      <span class="detail-txt-color">
        <label>You Might Also Like:</label>
      </span>
    </div>

  </div>

  <div class="row mt-2">

    <?php foreach($recomended['item'] as $data): ?>
    <div class="custom-product-list" >
      <div class="card product-list" id="prod_<?php echo $data['ID']; ?>">
        <a href="<?php echo base_url(); ?>product_detail?id=<?php echo $data['ID']; ?>" style="text-decoration: none;">
          <div class="d-flex justify-content-center">
            <img alt="'<?php echo $data['TITLE']; ?>" class="product-image" src="<?php echo $data['PICTURE']; ?>" />
          </div>
          <p class="product-title mt-2"><?php echo ucwords(mb_strimwidth($data['TITLE'], 0, 35, "...")); ?></p>
          <label class="product-label">Estimated Price</label></br>
          <?php if(is_numeric($data['PRICE'])) { ?>
            <span class="product-price">IDR <?php echo number_format($data['PRICE'], 2, '.', ','); ?></span>
          <?php } else { ?> 
            <span class="product-price">Price Negotiable</span>
          <?php } ?>
        </a>
      </div>
    </div>
    <?php endforeach; ?>

  </div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/zoom-master/jquery.zoom.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/incube-assets/product-detail.js'); ?>"></script>
<script type="text/javascript">
  
  $('#quantity').on('change', function() {

    var id = $('#hiddenID').val();
    var curQty = $('#quantity').val();
    var curPrice = $('#hiddenPrice').val();

    $.ajax({
      url:"<?php echo base_url('ContentLoad/loadDetails'); ?>",
      method:"GET",
      data:{ id:id, qty:curQty, price:curPrice },
      cache: false,
      success:function(data) {
        
        // if(data == '') {
        //   $('#loader-icon').html('<h3>No More Result Found</h3>');
        //   action = 'active';
        // } else {
        //   $('#product-main-list').append(data);
        //   action = 'inactive';
        // }
        // 
      }
    });

  });

  $(document).keypress(
    function(event){
      if (event.which == '13') {
        event.preventDefault();
      }
  });
</script>
