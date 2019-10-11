
<div class="pages-container">
  <div class="pages-inner-container">
      
      <div class="row">        
        <div class="col-6">
          <img id="how-to-logo" alt="Kikikuku Logo" src="<?php echo base_url('assets/images/logo.png'); ?>">
        </div>
        <div class="col-6">
          <div class="d-flex justify-content-center">
            <h4 class="text-uppercase" style="color: #34ca9d">How To Shop</h4>
          </div>
        </div>
      </div>

      <div class="row mt-md-4 mt-lg-4 mt-xl-4">
        <div class="col-12">
          <?php foreach($howto->result() as $data): ?>
            <?php echo $data->CONTENT; ?>
          <?php endforeach; ?>
        </div>
      </div>

  </div>
</div>