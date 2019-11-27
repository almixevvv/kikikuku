<div class="cart-container">

	<div class="row d-none d-md-block d-lg-block d-xl-block">

		<!-- CART BREADCRUMB -->
		<div class="col-12 col-md-12 col-lg-12 col-xl-12">
			<div class="mb-0 mb-md-3 mb-lg-3 mb-xl-3 pt-0 pt-md-2 pt-lg-2 pt-xl-2 pl-0 pl-md-1 pl-lg-4 pl-xl-4" style="text-align: left;">
				<span style="color: #333;">
					<a href="<?php echo base_url(); ?>" style="color: black;">
						<span class="fa fa-home"></span> Home
					</a>
				</span>
				<span style="color: #333;"> -
					Shopping Cart
				</span>
			</div>
		</div>
		<!-- END OF CART BREADCRUMB -->

	</div>

	<!-- CART TOTAL ITEMS -->
	<div class="row pl-3 pl-md-0 pl-lg-0 pl-xl-0 pr-3 pr-md-0 pr-lg-0 pr-xl-0">
		<div class="col-12 col-12 pl-0 pl-md-4 pl-lg-4 pl-xl-4" id="cart-label-separator">
			<label class="cart-header-label pl-0 pl-md-0 pl-lg-4 pl-xl-4"><?php echo $row = count($this->cart->contents()); ?> Item(s) in the Cart</label>
		</div>
	</div>
	<!-- END OF CART TOTAL ITEMS -->

	<?php if($row > 0) { ?> 
		
		<!-- IF THERE'S AN ITEM -->
		<?php echo form_open('Cart/cartToSession'); ?>
		<div class="custom-cart-container">
		
		<div class="row d-none d-md-block d-lg-block d-xl-block">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="row" id="cart-header-border">
					<div class="col-5 col-md-5">
						<div class="d-flex justify-content-center">Product Detail</div>
					</div>
					<div class="col-2 col-md-3">
						<div class="d-flex justify-content-center">Estimated Price</div>
					</div>
					<div class="col-1 col-md-1">
						<div class="d-flex justify-content-center">Qty</div>
					</div>
					<div class="col-2 col-md-3">
						<div class="d-flex justify-content-center">Total</div>
					</div>
				</div>
			</div>
		</div>
		
		</div>

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
					$tmpPrice = $this->incube->setPrice($obj['detail']['productForApp']['sellPrice']);
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

		<?php echo form_close(); ?>

	<? } else { ?>
	<div class="col-12 col-md-12 col-lg-12 col-xl-12">
		<div class="no-item-list">
			NO ITEM IN CART
		</div>
	</div>
	<?php } ?>



	<!-- RECOMENDATION PRODUCT PART -->
  <div class="row mt-3 mt-md-4 mt-lg-4 mt-xl-4">

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
			$finalPrice = $this->incube->setPrice($data['sellPrice']);
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
						<span class="product-price">IDR <?php echo number_format($finalPrice, 2, '.', ','); ?></span>
					<?php endif; ?>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
		</div>
	<!-- END OF RECOMENDED PRODUCT SECTION -->

</div>


<script type="text/javascript">

	$(document).ready(function() {

		const swalWithBootstrapButtons = Swal.mixin({
  		customClass: {
    		confirmButton: 'btn btn-success',
    		cancelButton: 'btn btn-danger'
  		},
  		buttonsStyling: false,
		});

	  $('.delete-item').on('click', function() {
	    var id=$(this).attr("data-id");
	    swal.fire({
	      title:"Remove Product",
	     	text:"Are you sure you want to remove this product from your cart?",
	     	type: "warning",
	     	showCancelButton: true,
				cancelButtonColor: '#d33',
	     	confirmButtonText: "Confirm",
				confirmButtonColor: '#3085d6'
	    }).then((result) => {
					if (result.value) {
    				swalWithBootstrapButtons.fire(
      				'Deleted!',
      				'Selected product has been removed.',
      				'success'
    				);
						$.ajax({
				        type: "GET",
				        url:"<?php echo base_url('Cart/removeCartItem'); ?>",
				        data: {rowid:id},
				        success: function(data) {
									console.log(data);
									var divID = '#rowcart_' + id;
									console.log(divID);
									$("#rowcart_"+id).animate({
    								left: '+=100em',
    								opacity: '0.5'
									}, 1000, function() {
    								$("#rowcart_"+id).remove();
										location.reload();
  								});
				        }
				    });
  			}
			});
	  });

	});

</script>