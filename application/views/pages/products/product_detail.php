<?php
    $convert = 20.5363;
    $finalNumber = 0;
?>

<div class="container">

  <div class="row" style="padding-top: 4.5em;">

    <!-- SET THE PARAMETER FOR THE IMAGE -->
    <?php 

    if(substr($dataproduct['detail']['productForApp']['picture'], 1, 1) != 'i' && substr($dataproduct['detail']['productForApp']['picture'], 4, 1) != '/') {

      $newPath = 'http://img1.yiwugou.com/i000';

    } else {

      $newPath = 'http://img1.yiwugou.com';

    }

    ?>

    <!-- Product Left Part -->
    <?php //IF THERE'S MORE THAN ONE PICTURE, DISPLAY ALL THE PICTURE ?>
    <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
    <div class="col-lg-1">
      <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>

        <?php if($images['picture'] != null): ?>
        <div class="row row-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture1'] != null): ?>
        <div class="row row-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture1']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture1']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture2'] != null): ?>
        <div class="row row-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture2']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture2']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture3'] != null): ?>
        <div class="row row-border">
          <center>
            <img data-picture="<?php echo $newPath.$images['picture3']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$images['picture3']; ?>"/>
          </center>
        </div>
        <?php endif; ?>

        <?php if($images['picture4'] != null): ?>
        <div class="row row-border">
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
    <div class="col-lg-1">

        <?php if($dataproduct['detail']['productForApp']['picture'] != ""): ?>
          <div class="row row-border">
            <center>
              <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>"/>
            </center>
          </div>
        <?php endif; ?>

        <?php if($dataproduct['detail']['productForApp']['picture1'] != ""): ?>
          <div class="row row-border">
            <center>
              <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>"/>
            </center>
          </div>
        <?php endif; ?>

        <?php if($dataproduct['detail']['productForApp']['picture2'] != ""): ?>
          <div class="row row-border">
            <center>
              <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>"/>
            </center>
          </div>
        <?php endif; ?>

        <?php if($dataproduct['detail']['productForApp']['picture3'] != ""): ?>
          <div class="row row-border">
            <center>
              <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>"/>
            </center>
          </div>
        <?php endif; ?>

    </div>

    <?php endif; ?>
    <!-- End of Left Part -->

    <!-- Product Center Part -->
    <div class="col-lg-5">
      <div class="row-border">
      <? //IF PRODUCT LIST IMAGE IS NOT EMPTY, USE THAT AS SOURCE ?>
      <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
        <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>
          <?php if($images['picture'] != null): ?>
          <img class="main-images" alt="Product Images" src="<?php echo $newPath.$images['picture'];?>"/>

          <?php elseif($images['picture1'] != null): ?>
          <img class="main-images" alt="Product Images 1" src="<?php echo $newPath.$images['picture1'];?>"/>

          <?php elseif($images['picture2'] != null): ?>
          <img class="main-images" alt="Product Images 2" src="<?php echo $newPath.$images['picture2'];?>"/>

          <?php elseif($images['picture3'] != null): ?>
          <img class="main-images" alt="Product Images 3" src="<?php echo $newPath.$images['picture3'];?>"/>

          <?php elseif($images['picture4'] != null): ?>
          <img class="main-images" alt="Product Images 4" src="<?php echo $newPath.$images['picture4'];?>"/>
          <?php endif; ?>

        <?php endforeach; ?>
      <?php else: ?>
        <?php //IF PRODUCT LIST IS EMPTY, THEN USE ANOTHER SOURCE FOR IMAGE ?>
        <?php if($dataproduct['detail']['productForApp']['picture'] != ""): ?>
        <img class="main-images" alt="Product Images" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture1'] != ""): ?>
        <img class="main-images" alt="Product Images 1" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture2'] != ""): ?>
        <img class="main-images" alt="Product Images 2" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture3'] != ""): ?>
        <img class="main-images" alt="Product Images 3" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3'];?>"/>

        <?php elseif($dataproduct['detail']['productForApp']['picture4'] != ""): ?>
        <img class="main-images" alt="Product Images 4" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4'];?>"/>
        <?php endif; ?>

      <?php endif; ?>
      </div>
    </div>
    <!-- End of Center Part -->

    <!-- Product Right Part -->
    <div class="col-lg-6">
      <div class="row-border">
        <div class="inner-container">

          <!-- Product Title Part -->
          <span style="color: #f75c07;font-size: 1em;font-weight: bold; ">
            <h4 style="text-align: left; text-transform: capitalize; "><?php echo $dataproduct['detail']['productForApp']['title']; ?></h4>
          </span>

          <!-- Product EXW Price -->
          <div class="exw-container">
            <label style="padding-left: 1.5em;">EXW Price:</label>
            <?php $counter = 0; ?>
            <?php foreach($dataproduct['detail']['sdiProductsPriceList'] as $quantity): ?>
            <div class="row">
              <div class="col-lg-5">
                <?php if($quantity['endNumber'] == 0): ?>
                  <h5 style="padding-left: 3em;">Above <?php echo $quantity['startNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?></h5>
                  <?php $finalNumber = $quantity['startNumber']; ?>
                  <?php else: ?>
                    <h5 style="padding-left: 3em;"><?php echo $quantity['startNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?> ~ <?php echo $quantity['endNumber'].' '.$dataproduct['detail']['productForApp']['matrisingular']; ?></h5>
                <?php endif; ?>
              </div>
              <div class="col-lg-5">
                <h5>
                  <span style="font-weight: bold; color: #f75c07; padding-left: 0.5em;">IDR <?php echo number_format($quantity['conferPrice'] * $convert, 2);?></span>/<?php echo $dataproduct['detail']['productForApp']['matrisingular']; ?>
                </h5>
              </div>
            </div>
            <?php

              //FOR PRICING PURPOSE ONLY
              if($counter == count($dataproduct['detail']['sdiProductsPriceList']) - 1) {
                //echo 'last data is '.$quantity['startNumber'];
                $startingQuantity = $quantity['startNumber'];
                $startingPrice = $quantity['conferPrice'] * $convert;
              }
            ?>
            <?php $counter++; ?>
            <?php endforeach; ?>
          </div>

          <div class="row" style="margin-top: 2em;">
            <div class="col-lg-6">
              <label>Estimated Price : </label>
              <?php //IF THE PRICE TOO LONG, SHOW PRICE NEGOTIABLE  ?>
              <?php if($dataproduct['detail']['productForApp']['sellPrice'] == 999999999999 || $dataproduct['detail']['productForApp']['sellPrice'] == 0 || $dataproduct['detail']['productForApp']['sellPrice'] == 99999999): ?>
              <span style="color: #f75c07;font-size: 17px;font-weight: bold;">Price Negotiable</span>
                <?php else: ?>
                <span style="color: #f75c07;font-size: 17px;font-weight: bold;">IDR <?php echo number_format($dataproduct['detail']['productForApp']['sellPrice'] * $convert, 2);?></span>
              <?php endif; ?>
            </div>

            <div class="col-lg-6">
              <label>Est. Weight : </label>
              <span style="color: #f75c07;font-size: 17px;font-weight: bold;"><?php echo substr($dataproduct['detail']['productForApp']['weightetc'], 0, 4); ?></span> gr<br>
            </div>
          </div>

          <div class="row" style="margin-top: 2em;">
            <div class="col-lg-3">
              <label>Description :</label>
            </div>
            <div class="col-lg-9">
              <span style="color: #333; font-size: 15px;">
                <p style="text-align: left; margin-left: -2.5em;">
                  <?php echo $dataproduct['detail']['productForApp']['introduction'];?>
                </p>
              </span>
            </div>
          </div>

    <?php echo form_open('Cart/addtoCart'); ?>

          <div class="row" style="margin-top: 2em;">
              <div class="col-lg-12">
                <label for="quantity">Quantity</label>
              </div>

              <div class="col-lg-12">
                <button type="button" class="btn btn-danger" id="xminusone" style="display: inline-block;"><i class="fa fa-minus"></i></button>

                <?php if($dataproduct['detail']['sdiProductsPriceList'] != null): ?>
                <input name="quantity" id="quantity" title="Quantity" value="<?php echo $startingQuantity; ?>" class="form-control" type="number" style="text-align:center;width: 70px;display: inline-block;" />
                  <?php else: ?>
                  <input name="quantity" id="quantity" title="Quantity" value="1" class="form-control" type="number" style="text-align:center;width: 70px;display: inline-block;" />
                <?php endif; ?>



                <button type="button" class="btn btn-success" id="xplusone" style="display: inline-block;"><i class="fa fa-plus"></i></button>
              </div>
          </div>

        </div>
      </div>

      <div class="row" style="margin-top: 2em;">
        <div class="col-lg-5">
          <div class="form-group">
            <label for="customer-notes">Inquiry</label><br>
            <textarea type="text" name="customer-notes" class="form-control" style="background-color: #eee; width:500px; height:100px;"/></textarea>
          </div>
        </div>
      </div>

      <?php

      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';

      for ($i = 0; $i < 8; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

        $productID = array(
          'type'  => 'hidden',
          'name'  => 'product-id',
          'id'    => 'hiddenQuantity',
          'value' => $dataproduct['detail']['id']
        );

        $productName = array(
          'type'  => 'hidden',
          'name'  => 'product-name',
          'id'    => 'hiddenQuantity',
          'value' => $randomString
        );

        $productPrice = array(
          'type'  => 'hidden',
          'name'  => 'product-price',
          'id'    => 'hiddenPrice',
          'value' => $dataproduct['detail']['productForApp']['sellPrice']
        );

        echo form_input($productID);
        echo form_input($productName);
        echo form_input($productPrice);
      ?>
      <div class="row" style="margin-top: 1.5em;">
        <div class="col-lg-5">
          <button type="submit" class="btn btn-success" id="btn-addcart">
            Add To Cart&nbsp;<i class="fa fa-shopping-cart"></i>
          </button>
        </div>
      </div>

      <?php echo form_close(); ?>


    </div>
    <!-- End of Right Part -->
  </div>

  <!-- RECOMENDED PRODUCT SECTION -->
  <div class="row" style="margin-top: 2em;">
    <div class="col-lg-6">
      <h4>You Might Also Like:</h4>
    </div>
  </div>
  <div class="row" style="margin-bottom: 2.5em;">
  <?php foreach($recomended['prslist'] as $data): ?>
  <?php $convertRate = 20.5363;?>
  <div class="col-lg-3" style="margin-bottom: 1em; margin-top: 0.5em;">
    <div class="product-list" id="prod_<?php echo $data['id']; ?>" >
      <a href="<?php echo base_url(); ?>product_detail?id=<?php echo $data['id']; ?>" style="text-decoration: none;">
        <div>
      		<img alt="product-img" src="http://img1.yiwugou.com/<?php echo $data['picture2']; ?>" style="height: 9em;object-fit: cover;" />
      	</div>
      	<p class="mt-2"><?php echo $data['title']; ?></p>
      	<label>Estimated Price : </label>
      	<?php if($data['sellPrice'] == 0): ?>
      	<span style="color: #f75c07;font-size: 14px;font-weight: bold;"> Price Negotiable</span>
      	 <?php elseif($data['sellPrice'] > 9999999): ?>
      		   <span style="color: #f75c07;font-size: 14px;font-weight: bold;"> Price Negotiable</span>
      				 <?php else: ?>
      					 <span style="color: #f75c07;font-size: 14px;font-weight: bold;">IDR <?php echo number_format($data['sellPrice'] * $convertRate, 2); ?></span>
      	 <?php endif; ?>
      	</a>
      </div>
    </div>
    <?php endforeach; ?>
    </div>
    <!-- END RECOMENDED PRODUCT SECTION -->
  </div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/zoom-master/jquery.zoom.min.js'); ?>"></script>
<script type="text/javascript">

  $(document).ready(function(){


    //ZOOM KE GAMBAR
    $('.main-images')
      .wrap('<span style="display:inline-block"></span>')
      .css('display', 'block')
      .parent()
      .zoom();

    //GANTI IMAGE
    $('.row-images').each(function () {
      var $this = $(this);
      $this.on("click", function () {
        var image = $(".main-images");
        //HARUS DIASIGN KE LOCAL VARIABLE BIAR BERUBAH
        var source = $(this).data('picture');
        image.fadeOut('fast', function () {
            image.attr('src', source);
            image.fadeIn('fast');
            $('.main-images').trigger('zoom.destroy');
            $('.main-images')
              .wrap('<span style="display:inline-block"></span>')
              .css('display', 'block')
              .parent()
              .zoom();
          });
      });
    });

  });

    $("#xplusone").click(function(){
        var qty = parseInt($("#quantity").val());
        var newqty = qty +1;
        $("#quantity").val(newqty);
        $("#quantity").val(newqty);
    });

    $("#xminusone").click(function(){
        var qty = parseInt($("#quantity").val());
        var price = parseFloat($("#price").val());
        var newqty = qty -1;
        if (newqty < 1) {
            $("#quantity").val(1);
            $("#subtotal").html(new Intl.NumberFormat('de-DE').format((1*price)+0));
            return true;
        }else if (newqty >= 1) {
            $("#quantity").val(newqty);
            $("#subtotal").html(new Intl.NumberFormat('de-DE').format((newqty*price)+0));
            return true;
        }else{ return false; }
    });
</script>
