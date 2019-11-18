<div class="row">
  <div class="col-6 col-md-12 col-lg-6 col-xl-6" style="padding-right: 0!important;">
    <?php 
      //CONVERT THE QUANTITY IF IT'S CHINESE SYMBOL
      if($dataproduct['detail']['productForApp']['matrisingular'] == '个') {
        $matric = 'Pcs';
      } else if($dataproduct['detail']['productForApp']['matrisingular'] == '套') {
        $matric = 'Set';
      } else {
        $matric = 'Pcs';
      }
?>
  
  <?php if($quantity['endNumber'] == 0): ?>
    <label class="detail-txt-color detail-exw-size font-weight-bold">Above <?php echo $quantity['startNumber'].' '.$matric; ?></label>
    <?php $finalNumber = $quantity['startNumber']; ?>
  <?php else: ?>
    <label class="detail-txt-color detail-exw-size font-weight-bold"><?php echo $quantity['startNumber'].' '.$matric; ?> ~ <?php echo $quantity['endNumber'].' '.$matric; ?></label>
  <?php endif; ?>
  </div>
  <div class="col-6 col-md-12 col-lg-6 col-xl-6">
    <label class="detail-txt-color detail-exw-size font-weight-bold">
      <span class="detail-exw-color">IDR <?php echo number_format($finalPrice, 2, ',', '.'); ?></span>/<?php echo $matric; ?>
    </label>
  </div>
</div>