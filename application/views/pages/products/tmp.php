<!-- GET CONTENT FROM API -->
<?php foreach ($this->cart->contents() as $items) {

//Counter Variable
$i = 1; 

$finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$items['id'];

$json 	= file_get_contents($finalUrl);
$obj 	= json_decode($json, true);
?>
<div class="row d-none d-md-block d-lg-block d-xl-block" id="rowcart_<?php echo $items['rowid']; ?>">

<div class="col-12 mt-4 mt-md-4 mt-lg-4 mt-xl-4 mb-4 mb-md-4 mb-lg-4 mb-xl-4">
<div class="row pb-4 cart-product-separator">

<!-- PRODUCT DETAIL PART -->
<div class="col-5 col-md-5">
	<div class="row">		
	<div class="col-4">
		<a href="<?php echo base_url('product_detail?id='.$items['id'])?>">					
		
		<?php if($obj['detail']['productForApp']['picture'] != null): ?>
			<?php $newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture']); ?>
			<img class="img-list-order" src="<?php echo $newPath.$obj['detail']['productForApp']['picture'];?>" />			
			
			<?php elseif($obj['detail']['productForApp']['picture1'] != null): ?>
			<?php $newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture1']); ?>
			<img class="img-list-order" src="<?php echo $newPath.$obj['detail']['productForApp']['picture1'];?>" />
				
			<?php elseif($obj['detail']['productForApp']['picture2'] != null): ?>
			<?php $newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture2']); ?>
			<img class="img-list-order" src="<?php echo $newPath.$obj['detail']['productForApp']['picture2'];?>" />
					
			<?php elseif($obj['detail']['productForApp']['picture3'] != null): ?>
			<?php $newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture3']); ?>
			<img class="img-list-order" src="<?php echo $newPath.$obj['detail']['productForApp']['picture3'];?>" />
					
			<?php else: ?>
			<?php $newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture4']); ?>
			<img class="img-list-order" src="<?php echo $newPath.$obj['detail']['productForApp']['picture4'];?>" />
		<?php endif; ?>
		</a>
	</div>

	<div class="col-8 pl-0">
		<div class="d-flex flex-column">
			<div class="mb-1 text-capitalize">
				<span class="font-weight-bold">Product Name:</span>
				<?php echo $obj['detail']['productForApp']['title']; ?>
			</div>
			<div class="text-capitalize">
				<span class="font-weight-bold">Inquiry:</span>
				<textarea class="form-control mt-2" name="customer-notes-<?php echo $i; ?>" style="background-color: #eee; width: 80%; height:100px;"><?php echo $items['notes'] ?></textarea>
			</div>
		</div>
	</div>
	</div>
</div>
<!-- END OF PRODUCT DETAIL PART -->

<!-- ESTIMATED PRICE SECTION -->
<div class="col-2 col-md-3">
<div class="row">
	
	<div class="col-12">
	
	<!-- IF THE PRICE IS NEGOTIABLE -->
	<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])) { ?>
	<div class="d-flex justify-content-center">
		<span class="font-weight-bold">Price Negotiable</span>	
	</div>
	
	<!-- CHECK IF THE SDIPRICELIST IS EMPTY -->
	<?php } 
		else if($obj['detail']['sdiProductsPriceList'] == null) { 
		//FORMAT THE PRICE
		$tmpPrice = $this->incube->setPrice($convertRate, $marginParameter, $obj['detail']['productForApp']['sellPrice']);
	?>
	<div class="d-flex justify-content-center">
		<p><strong>IDR <?php echo number_format($tmpPrice, 2); ?></strong></p>
	</div>
	<!-- IF THE PRICELIST IS NOT EMPTY, CHECK FOR CORRECT VALUE -->
	<?php } else {
	
	//Item Quantity
	$totalItems = $items['qty'];

	//Format the price and get the correct value
	$currentPrice = $this->incube->getCorrectPrice($totalItems, $obj['detail']['sdiProductsPriceList']); ?>
	
	<?php } ?>
	<div class="d-flex justify-content-center">
		<p><strong>IDR <?php echo number_format($currentPrice['price'], 2, '.', ',');?></strong></p></div>
	</div>
	
</div>
</div>
<!-- END OF ESTIMATED PRICE SECTION -->

</div>
</div>

</div>
<?php $i++; } ?>