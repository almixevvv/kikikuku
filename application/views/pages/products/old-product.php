<div class="detail-container">

  <?php
    //SETUP THE NEW URL FOR PRODUCT IMAGE IF THE LINK IS BROKEN
    if(substr($dataproduct['detail']['productForApp']['picture'], 1, 1) != 'i' && substr($dataproduct['detail']['productForApp']['picture'], 4, 1) != '/') {
      $newPath = 'http://img1.yiwugou.com/i000';
    } else {
      $newPath = 'http://img1.yiwugou.com/';
    }
  ?>

  <!-- Product Left Part -->
  <div class="row">
    <!-- FLEXBOX CONTAINER -->
    <div class="d-flex">
    <?php //IF THERE'S MORE THAN ONE PICTURE, DISPLAY ALL THE PICTURE ?>
    <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>

      <div class="col-1">
      <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>

        <!-- CHECK IF EACH PICTURE EXIST -->
        <?php if($images['picture'] != null): ?>
        <div class="row detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture1'] != null): ?>
        <div class="row detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture1']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture1']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture2'] != null): ?>
        <div class="row detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture2']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture2']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture3'] != null): ?>
        <div class="row detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture3']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture3']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture4'] != null): ?>
        <div class="row detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture4']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture4']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

      <?php endforeach; ?>
    </div>

    <?php //IF THERE'S NO PICTURE, THEN DISPLAY ONLY ONE
      else:
    ?>
    <div class="col-1">

      <!-- CHECK IF EACH PICTURE EXIST -->
      <?php if($dataproduct['detail']['productForApp']['picture'] != ""): ?>
      <div class="row detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>"/>
        </center>
      </div>
      <?php endif; ?>

      <?php if($dataproduct['detail']['productForApp']['picture1'] != ""): ?>
      <div class="row detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>"/>
        </center>
      </div>
      <?php endif; ?>

      <?php if($dataproduct['detail']['productForApp']['picture2'] != ""): ?>
      <div class="row detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>"/>
        </center>
      </div>
      <?php endif; ?>

      <?php if($dataproduct['detail']['productForApp']['picture3'] != ""): ?>
      <div class="row detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>"/>
        </center>
      </div>
      <?php endif; ?>

      </div>

    <!-- END OF FLEXBOX CONTAINER -->
    </div>
    <?php endif; ?>
    <!-- End of Left Part -->

    <!-- FLEX CONTAINER -->
    <div class="d-flex">
    <!-- PICTURE CENTER -->
    <div class="col-5">
      <div class="detail-border">
      <? //IF PRODUCT LIST IMAGE IS NOT EMPTY, USE THAT AS SOURCE ?>
      <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
        <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>
          <?php if($images['picture'] != null): ?>
          <img class="detail-main-images" alt="Product Images" src="<?php echo $newPath.$images['picture'];?>"/>

          <?php elseif($images['picture1'] != null): ?>
          <img class="detail-main-images" alt="Product Images 1" src="<?php echo $newPath.$images['picture1'];?>"/>

          <?php elseif($images['picture2'] != null): ?>
          <img class="detail-main-images" alt="Product Images 2" src="<?php echo $newPath.$images['picture2'];?>"/>

          <?php elseif($images['picture3'] != null): ?>
          <img class="detail-main-images" alt="Product Images 3" src="<?php echo $newPath.$images['picture3'];?>"/>

          <?php elseif($images['picture4'] != null): ?>
          <img class="detail-main-images" alt="Product Images 4" src="<?php echo $newPath.$images['picture4'];?>"/>
          <?php endif; ?>

        <?php endforeach; ?>
      <?php else: ?>
        <?php //IF PRODUCT LIST IS EMPTY, THEN USE ANOTHER SOURCE FOR IMAGE ?>
        <?php if($dataproduct['detail']['productForApp']['picture'] != ""): ?>
        <img class="detail-main-images" alt="Product Images" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture1'] != ""): ?>
        <img class="detail-main-images" alt="Product Images 1" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture2'] != ""): ?>
        <img class="detail-main-images" alt="Product Images 2" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture3'] != ""): ?>
        <img class="detail-main-images" alt="Product Images 3" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture4'] != ""): ?>
        <img class="detail-main-images" alt="Product Images 4" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4'];?>"/>
        <?php endif; ?>

      <?php endif; ?>
      </div>
    </div>

    <!-- END OF FLEX CONTAINER -->
    </div>
    <!-- END OF PICTURE CENTER -->

    <!-- PRODUCT RIGHT PART -->
    <div class="col-6">
      <div class="row detail-border">
        <div class="detail-inner-container">
          <!-- Product Title Part -->
          <span class="detail-title">
            <label class="detail-txt-color text-left text-capitalize"><?php echo $dataproduct['detail']['productForApp']['title']; ?></label>
          </span>

          <!-- Product EXW Price -->
          <div class="exw-container">
            <label>EXW Price:</label>
            <?php $counter = 0; ?>
            <?php foreach($dataproduct['detail']['sdiProductsPriceList'] as $quantity): ?>
            <div class="row">
              <div class="col-5">
                <?php if($quantity['endNumber'] == 0): ?>
                  <label class="detail-txt-color">Above <?php echo $quantity['startNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?></label>
                  <?php $finalNumber = $quantity['startNumber']; ?>
                  <?php else: ?>
                    <label class="detail-txt-color font-weight-bold"><?php echo $quantity['startNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?> ~ <?php echo $quantity['endNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?></label>
                <?php endif; ?>
              </div>
              <div class="col-5">
                <label class="detail-txt-color font-weight-bold">
                  <span class="detail-exw-color">IDR <?php echo number_format($quantity['conferPrice'] * CONVERT, 2);?></span>/<?php echo $dataproduct['detail']['productForApp']['matrisingular']; ?>
                </label>
              </div>
            </div>
            <?php
              //FOR PRICING PURPOSE ONLY
              if($counter == count($dataproduct['detail']['sdiProductsPriceList']) - 1) {
                $startingQuantity = $quantity['startNumber'];
                $startingPrice = $quantity['conferPrice'] * CONVERT;
              }
            ?>
            <?php $counter++; ?>
            <?php endforeach; ?>
          </div>

          <div class="row mt-4">
            <div class="col-6">
              <label>Estimated Price : </label>
              <?php //IF THE PRICE TOO LONG, SHOW PRICE NEGOTIABLE  ?>
              <?php if($dataproduct['detail']['productForApp']['sellPrice'] == 999999999999 || $dataproduct['detail']['productForApp']['sellPrice'] == 0 || $dataproduct['detail']['productForApp']['sellPrice'] == 99999999): ?>
              <span class="detail-exw-color">Price Negotiable</span>
                <?php else: ?>
                <span class="detail-exw-color font-weight-bold">IDR <?php echo number_format($dataproduct['detail']['productForApp']['sellPrice'] * CONVERT, 2);?></span>
              <?php endif; ?>
            </div>

            <div class="col-lg-6">
              <label>Est. Weight : </label>
              <span style="color: #f75c07;font-size: 17px;font-weight: bold;"><?php echo substr($dataproduct['detail']['productForApp']['weightetc'], 0, 4); ?></span> gr<br>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label>Description :</label>
            </div>
            <div class="col-9">
              <span class="detail-txt-color">
                <?php if($dataproduct['detail']['productForApp']['introduction'] != null): ?>
                <label>
                  <?php echo $dataproduct['detail']['productForApp']['introduction'];?>
                </label>
                <?php else: ?>
                <label>
                  <?php echo 'No Product Description';?>
                </label>
                <?php endif; ?>
              </span>
            </div>
          </div>

          <?php echo form_open('Cart/addtoCart'); ?>
          <div class="row mt-3">
            <div class="col-12">
              <label for="quantity">Quantity</label>
            </div>
          </div>

          <div class="row">

            <div class="col-4">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-danger" id="xminusone" type="button"><i class="fa fa-minus"></i></button>
                </div>
                <?php if($dataproduct['detail']['sdiProductsPriceList'] != null): ?>
                <input type="number" class="form-control text-center" aria-describedby="basic-addon1" value="<?php echo $startingQuantity; ?>" style="text-align:right;" >
                  <?php else: ?>
                  <input type="number" class="form-control text-center" aria-describedby="basic-addon1" style="text-align:right;">
                <?php endif; ?>
                <div class="input-group-append">
                  <button class="btn btn-success" id="xplusone" type="button"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-12">
              <div class="form-group">
                <label for="customer-notes">Inquiry</label>
                <textarea type="text" name="customer-notes" class="form-control detail-text-box"/></textarea>
              </div>
            </div>

          </div>

          <div class="row" style="margin-top: 1.5em;">

            <div class="col-lg-5">
              <button type="submit" class="btn btn-kku" id="btn-addcart">
                Add To Cart&nbsp;<i class="fa fa-shopping-cart"></i>
              </button>
            </div>

          </div>


          <?php echo form_close(); ?>

        </div>
      </div>
    </div>
    <!-- END OF PRODUCT RIGHT PART -->
  </div>

  <!-- RECOMENDATION PRODUCT PART -->
  <div class="row mt-4">

    <div class="col-6">
      <span class="detail-txt-color">
        <label>You Might Also Like:</label>
      </span>
    </div>

  </div>

  <div class="row mt-2">
    <?php foreach($recomended['prslist'] as $data): ?>

    <div class="custom-product-list" >
      <div class="card product-list" id="prod_<?php echo $data['id']; ?>">
        <a href="<?php echo base_url(); ?>product_detail?id=<?php echo $data['id']; ?>" style="text-decoration: none;">
          <div class="d-flex justify-content-center">
            <img alt="'<?php echo $data['title']; ?>" class="product-image" src="<?php echo $newPath.$data['picture2']; ?>" />
          </div>
          <p class="product-title mt-2"><?php echo ucwords(mb_strimwidth($data['title'], 0, 35, "...")); ?></p>
          <label class="product-label">Estimated Price</label></br>
          <?php if($data['sellPrice'] == 0): ?>
            <span class="product-price">Price Negotiable</span>
          <?php elseif($data['sellPrice'] > 9999999): ?>
            <span class="product-price">Price Negotiable</span>
          <?php else: ?>
            <span class="product-price">IDR <?php echo number_format($data['sellPrice'], 2, ',', '.'); ?></span>
          <?php endif; ?>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/zoom-master/jquery.zoom.min.js'); ?>"></script>
<script type="text/javascript">

  $(document).ready(function(){


    //ZOOM KE GAMBAR
    $('.detail-main-images')
      .wrap('<span style="display:inline-block"></span>')
      .css('display', 'block')
      .parent()
      .zoom();

    //GANTI IMAGE
    $('.row-images').each(function () {
      var $this = $(this);
      $this.on("click", function () {
        var image = $(".detail-main-images");
        //HARUS DIASIGN KE LOCAL VARIABLE BIAR BERUBAH
        var source = $(this).data('picture');
        image.fadeOut('fast', function () {
            image.attr('src', source);
            image.fadeIn('fast');
            $('.detail-main-images').trigger('zoom.destroy');
            $('.detail-main-images')
              .wrap('<span style="display:inline-block"></span>')
              .css('display', 'block')
              .parent()
              .zoom();
          });
      });
    });

  });

</script>
