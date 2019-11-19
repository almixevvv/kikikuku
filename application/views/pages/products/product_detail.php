<div class="detail-container">

  <div class="row">
    
    <?php
      //Default Image Path
      $newPath = 'http://img1.yiwugou.com/'; 
      
      //Set the minimum quantity
      if($dataproduct['detail']['sdiProductsPriceList'] != null) {
        $minimumQty = $dataproduct['detail']['sdiProductsPriceList'][0]['startNumber'];
      } else {
        $minimumQty = 1;
      }
    ?>

    <!-- PRODUCT LEFT PART -->
    <div class="col-1 col-md-1 col-lg-1 col-xl-1 order-0 order-md-1 order-lg-1 order-xl-1 d-none d-md-block d-lg-block d-xl-block">
    
    <!-- IF THE PRODUCTLIST IS NOT EMPTY, THEN USE THE BELOW IMAGE -->
    <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
    

      <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $sdiProducts): ?>

        <?php if(strlen($sdiProducts['picture']) > 6): ?>
        
        <!-- IMAGE FORMATING -->
        <?php $newPath = $this->incube->replaceLink($sdiProducts['picture']); ?>
        <div class="detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$sdiProducts['picture']; ?>" class="row-images" alt="Product Image" src="<?php echo $newPath.$sdiProducts['picture']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
          </center>
        </div>
        <?php endif; ?>

        <?php if(strlen($sdiProducts['picture1']) > 6): ?>

        <!-- IMAGE FORMATING -->
        <?php $newPath = $this->incube->replaceLink($sdiProducts['picture1']); ?>

        <div class="detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$sdiProducts['picture1']; ?>" class="row-images" alt="Product Image 1" src="<?php echo $newPath.$sdiProducts['picture1']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
          </center>
        </div>
        <?php endif; ?>

        <?php if(strlen($sdiProducts['picture2']) > 6): ?>

        <!-- IMAGE FORMATING -->
        <?php $newPath = $this->incube->replaceLink($sdiProducts['picture2']); ?>

        <div class="detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$sdiProducts['picture2']; ?>" class="row-images" alt="Product Image 2" src="<?php echo $newPath.$sdiProducts['picture2']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
          </center>
        </div>
        <?php endif; ?>

        <?php if(strlen($sdiProducts['picture3']) > 6): ?>
        
        <!-- IMAGE FORMATING -->
        <?php $newPath = $this->incube->replaceLink($sdiProducts['picture3']); ?>

        <div class="detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$sdiProducts['picture3']; ?>" class="row-images" alt="Product Image 3" src="<?php echo $newPath.$sdiProducts['picture3']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
          </center>
        </div>
        <?php endif; ?>

        <?php if(strlen($sdiProducts['picture4']) > 6): ?>

        <!-- IMAGE FORMATING -->
        <?php $newPath = $this->incube->replaceLink($sdiProducts['picture4']); ?>

        <div class="detail-border">
          <center>
            <img data-picture="<?php echo $newPath.$sdiProducts['picture4']; ?>" class="row-images" alt="Product Image 4" src="<?php echo $newPath.$sdiProducts['picture']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
          </center>
        </div>
        <?php endif; ?>


      <?php endforeach; ?>
    

    <!-- IF THE PRODUCTLIST IS EMPTY, THEN USE THE UPPER IMAGE -->
    <?php else: ?>

      <?php if(strlen($dataproduct['detail']['productForApp']['picture']) > 6): ?>
      
      <!-- IMAGE FORMATING -->
      <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture']); ?>

      <div class="detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>" class="row-images" alt="Product Image" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' " />
        </center>
      </div>
      <?php endif; ?>

      <?php if(strlen($dataproduct['detail']['productForApp']['picture1']) > 6): ?>

      <!-- IMAGE FORMATING -->
      <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture1']); ?>

      <div class="detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>" class="row-images" alt="Product Image 2" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' "/>
        </center>
      </div>
      <?php endif; ?>

      <?php if(strlen($dataproduct['detail']['productForApp']['picture2']) > 6): ?>

      <!-- IMAGE FORMATING -->
      <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture2']); ?>

      <div class="detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>" class="row-images" alt="Product Image 3" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' "/>
        </center>
      </div>
      <?php endif; ?>

      <?php if(strlen($dataproduct['detail']['productForApp']['picture3']) > 6): ?>

      <!-- IMAGE FORMATING -->
      <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture3']); ?>

      <div class="detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>" class="row-images" alt="Product Image 4" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' "/>
        </center>
      </div>
      <?php endif; ?>

      <?php if(strlen($dataproduct['detail']['productForApp']['picture4']) > 6): ?>

      <!-- IMAGE FORMATING -->
      <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture4']); ?>

      <div class="detail-border">
        <center>
          <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4']; ?>" class="row-images" alt="Product Image 5" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/no-image-icon.png'); ?>' "/>
        </center>
      </div>
      <?php endif; ?>

    <?php endif; ?>

    </div>
    <!-- END OF PRODUCT LEFT PART -->

    <!-- IMAGE NAVIGATOR MOBILE -->
    <div class="col-12 d-md-none d-lg-none-xl-none order-2">
      <div class="d-flex flex-row">

        <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
        <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>

          <!-- CHECK IF THE PICTURE EXIST -->
          <?php if(strlen($images['picture']) > 6): ?>

          <!-- IMAGE FORMATING -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['picture']); ?>

          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $newPath.$images['picture']; ?>" class="row-images" alt="Product Image" src="<?php echo $newPath.$images['picture']; ?>"/>
            </center>
          </div>
          <?php endif; ?>

          <?php if(strlen($images['picture1']) > 6): ?>

          <!-- IMAGE FORMATING -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['picture1']); ?>

          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $newPath.$images['picture1']; ?>" class="row-images" alt="Product Image 1" src="<?php echo $newPath.$images['picture1']; ?>"/>
            </center>
          </div>
          <?php endif; ?>

          <?php if(strlen(['picture2']) > 6): ?>

          <!-- IMAGE FORMATING -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['picture2']); ?>

          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $newPath.$images['picture2']; ?>" class="row-images" alt="Product Image 2" src="<?php echo $newPath.$images['picture2']; ?>"/>
            </center>
          </div>
          <?php endif; ?>

          <?php if(strlen($images['picture3']) > 6): ?>

          <!-- IMAGE FORMATING -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['picture3']); ?>

          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $newPath.$images['picture3']; ?>" class="row-images" alt="Product Image 3" src="<?php echo $newPath.$images['picture3']; ?>"/>
            </center>
          </div>
          <?php endif; ?>

          <?php if(strlen($images['picture4']) > 6): ?>

          <!-- IMAGE FORMATING -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['picture4']); ?>

          <div class="detail-border">
            <center>
              <img data-picture="<?php echo $newPath.$images['picture4']; ?>" class="row-images" alt="Product Image 4" src="<?php echo $newPath.$images['picture4']; ?>"/>
            </center>
          </div>
          <?php endif; ?>

          <?php endforeach; ?>
          <?php else: ?>

            <?php if(strlen($dataproduct['detail']['productForApp']['picture']) > 6): ?>

            <!-- IMAGE FORMATING -->
            <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture']); ?>

            <div class="detail-border">
              <center>
                <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture']; ?>"/>
              </center>
            </div>
            <?php endif; ?>

            <?php if(strlen($dataproduct['detail']['productForApp']['picture1']) > 6): ?>

            <!-- IMAGE FORMATING -->
            <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture1']); ?>

            <div class="detail-border">
              <center>
                <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1']; ?>"/>
              </center>
            </div>
            <?php endif; ?>

            <?php if(strlen($dataproduct['detail']['productForApp']['picture2']) > 6): ?>

            <!-- IMAGE FORMATING -->
            <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture2']); ?>

            <div class="detail-border">
              <center>
                <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2']; ?>"/>
              </center>
            </div>
            <?php endif; ?>

            <?php if(strlen($dataproduct['detail']['productForApp']['picture3']) > 6): ?>

            <!-- IMAGE FORMATING -->
            <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture3']); ?>

            <div class="detail-border">
              <center>
                <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3']; ?>"/>
              </center>
            </div>
            <?php endif; ?>

            <?php if(strlen($dataproduct['detail']['productForApp']['picture4']) > 6): ?>

            <!-- IMAGE FORMATING -->
            <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture4']); ?>

            <div class="detail-border">
              <center>
                <img data-picture="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4']; ?>" class="row-images" alt="product-img" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4']; ?>"/>
              </center>
            </div>
            <?php endif; ?>

          <?php endif;?>

      </div>
    </div>
    <!-- END OF MOBILE IMAGE NAVIGATOR -->

    <!-- PRODUCT CENTER PART -->
    <div class="col-12 col-md-5 col-lg-5 col-xl-5 order-1 order-md-2 order-lg-2 order-xl-3">
      <div class="detail-border">
        <div class="d-flex justify-content-center">
          <? //IF PRODUCT LIST IMAGE IS NOT EMPTY, USE THAT AS SOURCE ?>
          <?php if($dataproduct['detail']['sdiProductsPicList'] != null): ?>
            <?php foreach($dataproduct['detail']['sdiProductsPicList'] as $images): ?>

              <?php if($images['picture'] != null): ?>

              <!-- IMAGE FORMATING -->
              <?php $newPath = $this->incube->replaceLink($images['picture']); ?>

              <img class="detail-main-images" alt="Product Images" src="<?php echo $newPath.$images['picture'];?>"/>

              <?php elseif($images['picture1'] != null): ?>
              
              <!-- IMAGE FORMATING -->
              <?php $newPath = $this->incube->replaceLink($images['picture1']); ?>

              <img class="detail-main-images" alt="Product Images 1" src="<?php echo $newPath.$images['picture1'];?>"/>

              <?php elseif($images['picture2'] != null): ?>
              
              <!-- IMAGE FORMATING -->
              <?php $newPath = $this->incube->replaceLink($images['picture2']); ?>

              <img class="detail-main-images" alt="Product Images 2" src="<?php echo $newPath.$images['picture2'];?>"/>

              <?php elseif($images['picture3'] != null): ?>
              
              <!-- IMAGE FORMATING -->
              <?php $newPath = $this->incube->replaceLink($images['picture3']); ?>

              <img class="detail-main-images" alt="Product Images 3" src="<?php echo $newPath.$images['picture3'];?>"/>

              <?php elseif($images['picture4'] != null): ?>
              
              <!-- IMAGE FORMATING -->
              <?php $newPath = $this->incube->replaceLink($images['picture4']); ?>

              <img class="detail-main-images" alt="Product Images 4" src="<?php echo $newPath.$images['picture4'];?>"/>

              <?php endif; ?>

            <?php endforeach; ?>
          <?php else: ?>
          <?php //IF PRODUCT LIST IS EMPTY, THEN USE ANOTHER SOURCE FOR IMAGE ?>
          <?php if($dataproduct['detail']['productForApp']['picture'] != ""): ?>
          
          <!-- FIX IMAGE FORMAT -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture']); ?>

          <img class="detail-main-images" alt="Product Images" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture'];?>"/>

          <?php elseif($dataproduct['detail']['productForApp']['picture1'] != ""): ?>
          
          <!-- FIX IMAGE FORMAT -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture1']); ?>

          <img class="detail-main-images" alt="Product Images 1" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture1'];?>"/>

          <?php elseif($dataproduct['detail']['productForApp']['picture2'] != ""): ?>
          
          <!-- FIX IMAGE FORMAT -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture2']); ?>

          <img class="detail-main-images" alt="Product Images 2" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture2'];?>"/>

          <?php elseif($dataproduct['detail']['productForApp']['picture3'] != ""): ?>
          
          <!-- FIX IMAGE FORMAT -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture3']); ?>

          <img class="detail-main-images" alt="Product Images 3" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture3'];?>"/>

          <?php elseif($dataproduct['detail']['productForApp']['picture4'] != ""): ?>
          
          <!-- FIX IMAGE FORMAT -->
          <?php $newPath = $this->incube->replaceLink($dataproduct['detail']['productForApp']['picture4']); ?>

          <img class="detail-main-images" alt="Product Images 4" src="<?php echo $newPath.$dataproduct['detail']['productForApp']['picture4'];?>"/>
          <?php endif; ?>
        
        <?php endif; ?>
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
            <label class="detail-txt-color text-left text-capitalize"><?php echo $dataproduct['detail']['productForApp']['title']; ?></label>
          </span>

          <!-- Product EXW Price -->
          <div class="exw-container">
            <label class="detail-label">EXW Price:</label>

            <?php if($dataproduct['detail']['sdiProductsPriceList'] != null): ?>
              <?php foreach($dataproduct['detail']['sdiProductsPriceList'] as $quantity): ?>

              <?php 
                //FORMAT THE PRICE 
                $finalPrice = $this->incube->setPrice($quantity['conferPrice']);
              ?>
              
              <div class="row">
                <div class="col-6 col-md-12 col-lg-6 col-xl-6" style="padding-right: 0!important;">
                  
                  <?php 
                    //CONVERT THE QUANTITY IF IT'S CHINESE SYMBOL
                    $matric = $this->incube->changeItemMatric($dataproduct['detail']['productForApp']['matrisingular']);
                  ?>

                  <?php 
                    //Get the minimal quantity available
                    if($minimumQty > $quantity['startNumber']) {
                      $minimumQty = $quantity['startNumber'];
                    }
                  ?>

                  <?php if($quantity['endNumber'] == 0): ?>
                    <label class="detail-txt-color detail-exw-size font-weight-bold">
                      Above <?php echo $quantity['startNumber'].' '.$matric; ?>
                    </label>
                  <?php $finalNumber = $quantity['startNumber']; ?>
                  <?php else: ?>
                    <label class="detail-txt-color detail-exw-size font-weight-bold">
                      <?php echo $quantity['startNumber'].' '.$matric; ?> ~ <?php echo $quantity['endNumber'].' '.$matric; ?>
                    </label>
                  <?php endif; ?>

                </div>
                <div class="col-6 col-md-12 col-lg-6 col-xl-6">
                  <label class="detail-txt-color detail-exw-size font-weight-bold">
                  <span class="detail-exw-color">IDR <?php echo number_format($finalPrice, 2, ',', '.'); ?></span>/<?php echo $matric; ?>
                  </label>
                </div>
              </div>

              <?php
                //FOR PRICING PURPOSE ONLY
                if($quantity['endNumber'] == 0) {
                  $startingQuantity = $quantity['startNumber'];
                  $startingPrice = $finalPrice;
                } else if($quantity['endNumber'] == 1) {
                  $startingQuantity = $quantity['startNumber'];
                  $startingPrice = $finalPrice;
                } else if($quantity['startNumber'] < $quantity['endNumber']) {
                  $startingQuantity = $quantity['startNumber'];
                  $startingPrice = $finalPrice;
                }
              ?>
              <?php endforeach; ?>

            <?php else:    
              //FORMAT THE PRICE 
              $startingPrice = $this->incube->setPrice($dataproduct['detail']['productForApp']['sellPrice']);
            ?>
            <?php endif; ?> 
          </div>
            
          <?php //HIDDEN INPUT FOR MINIMAL QUANTITY ?>
          <input type="hidden" name="minimumQty" id="minimumQty" value="<?php echo $minimumQty; ?>" >

          <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-12 col-xl-7">
              <label class="detail-label">Estimated Price :</label>
              <?php //IF THE PRICE TOO LONG, SHOW PRICE NEGOTIABLE ?>
              <?php if($this->incube->priceEmpty($dataproduct['detail']['productForApp']['sellPrice'])): ?>
                <span class="detail-exw-color detail-label">Price Negotiable</span>
              <?php else: ?>
                <span class="detail-exw-color detail-label font-weight-bold">
                  IDR <?php echo number_format($startingPrice, 2, '.', ',');?>
                </span>
              <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 col-lg-12 col-xl-5">
              <label class="detail-label">Est. Weight :</label>
              <span class="detail-exw-color font-weight-bold" id="detail-weight">
                <?php if(strlen($dataproduct['detail']['productForApp']['weightetc']) > 1): ?>
                  <?php echo substr($dataproduct['detail']['productForApp']['weightetc'], 0, 4); ?> gr
                <?php else: ?>
                  <?php echo substr('-', 0, 4); ?>
                <?php endif; ?>
              </span>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
              <label class="detail-label">Description :</label>
            </div>
            <div class="col-12 col-md-9 col-lg-9 col-xl-9">
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
              <label class="detail-label">Quantity</label>
            </div>
          </div>

          <div class="row">

            <div class="col-7 col-md-10 col-lg-7 col-xl-7">
              <div class="input-group mb-3" id="btn-detail-quantity">
                <div class="input-group-prepend">
                  <button class="btn btn-danger" id="xminusone" type="button"><i class="fa fa-minus"></i></button>
                </div>
                <?php if($dataproduct['detail']['sdiProductsPriceList'] != null): ?>
                <input type="number" name="quantity" id="quantity" class="form-control text-center" aria-describedby="basic-addon1" value="<?php echo $startingQuantity; ?>" style="text-align:right;">
                  <?php else: ?>
                  <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1" aria-describedby="basic-addon1" style="text-align:right;" pattern="[0-9]*">
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
          //HIDDEN INPUT
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';

          for ($i = 0; $i < 8; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }

            $productID = array(
              'type'  => 'hidden',
              'name'  => 'product-id',
              'id'    => 'hiddenID',
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
              'value' => $startingPrice
            );

            echo form_input($productID);
            echo form_input($productName);
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

    <?php foreach($recomended['prslist'] as $data): ?>

    <?php 
      //FORMAT THE PRICE 
      $price = $this->incube->setPrice($data['sellPrice']);
      $newPath = $this->incube->replaceLink($data['picture2']);
    ?>

    <div class="custom-product-list" >
      <div class="card product-list" id="prod_<?php echo $data['id']; ?>">
        <a href="<?php echo base_url(); ?>product_detail?id=<?php echo $data['id']; ?>" style="text-decoration: none;">
          <div class="d-flex justify-content-center">
            <img alt="'<?php echo $data['title']; ?>" class="product-image" src="<?php echo $newPath.$data['picture2']; ?>" />
          </div>
          <p class="product-title mt-2"><?php echo ucwords(mb_strimwidth($data['title'], 0, 35, "...")); ?></p>
          <label class="product-label">Estimated Price</label></br>
          <?php if($this->incube->priceEmpty($data['sellPrice'])): ?>
            <span class="product-price">Price Negotiable</span>
          <?php else: ?>
            <span class="product-price">IDR <?php echo number_format($price, 2, '.', ','); ?></span>
          <?php endif; ?>
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
