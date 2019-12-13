<style type="text/css">
  
  #no-product-image {
    width: 30%;
    margin-top: -1em;
  }

</style>

<div class="detail-container">

  <div class="login-container" >

    <div id="login-inner-container" style="border: solid #34ca9d 1px;">

      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-center">
            <img id="no-product-image" src="<?php echo base_url('assets/images/x-mark.png'); ?>" alt="No Image Available">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-center">
            <h4>Sorry! This product is currently not available</h4>
          </div>
        </div>
      </div>

    </div>

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
    $price = $this->incube->setPrice($convertRate, $marginParameter, $data['sellPrice']);
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
