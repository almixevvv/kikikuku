
	<?php echo form_open('Cart/cartToSession'); ?>
	<!-- CART MAIN CONTAINER -->
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

		<?php

			if($row > 0):

			//INITIAL TOTAL VARIABLE
			$subqty = 0;
			$subtotal = 0;
			$i = 0;

			foreach ($this->cart->contents() as $items):

				$finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$items['id'];

				$json = file_get_contents($finalUrl);
				$obj = json_decode($json, true);
		?>

	<!-- START THE MAIN LOOP -->
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
				<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])): ?>
				<div class="d-flex justify-content-center">
					<span class="font-weight-bold">Price Negotiable</span>	
				</div>
				<?php $currentPrice['price'] = 0; ?>

				<!-- CHECK IF THE SDIPRICELIST IS EMPTY -->
				<?php elseif($obj['detail']['sdiProductsPriceList'] == null):
					//FORMAT THE PRICE
					$tmpPrice = $this->incube->setPrice($obj['detail']['productForApp']['sellPrice']);
				?>
				<div class="d-flex justify-content-center">
					<p><strong>IDR <?php echo number_format($tmpPrice, 2); ?></strong></p>
				</div>

				<!-- IF THE PRICELIST IS NOT EMPTY, CHECK FOR CORRECT VALUE -->
				<?php else: ?>
				
				<?php
					//Item Quantity
					$totalItems = $items['qty'];

					//Format the price and get the correct value
					$currentPrice = $this->incube->getCorrectPrice($totalItems, $obj['detail']['sdiProductsPriceList']);
				?>

				<div class="d-flex justify-content-center">
					<p>
						<strong>IDR <?php echo number_format($currentPrice['price'], 2, '.', ',');?></strong>
					</p>
				</div>

				<div class="exw-container d-md-none d-lg-block d-xl-block" id="cart-exw-container">
					<div class="cart-exw">
						<label>EXW Price:</label>
					</div>

					<?php 
                    	//CONVERT THE QUANTITY IF IT'S CHINESE SYMBOL
						$matric = $this->incube->changeItemMatric($obj['detail']['productForApp']['matrisingular']);
                  	?>

					<div class="cart-exw pt-2">
					<?php if($currentPrice['end'] == 0): ?>
						<span class="pl-1"><?php echo $currentPrice['start'].' and Above'; ?></span>
					<?php else: ?>
					<span class="pl-1">
						<?php echo $currentPrice['start'].' '.ucwords($matric); ?> ~ <?php echo $currentPrice['end'].' '.ucwords($matric); ?>
					</span>
					<?php endif; ?>
					</div>

					<div class="cart-exw pt-2">
						<span class="pl-1" style="font-weight: bold; color: #24ca9d;">IDR <?php echo number_format($currentPrice['price'], 2, '.', ',');?></span>/<?php echo ucwords($matric); ?>
					</div>

				</div>

				<?php endif; ?>

				</div>
			</div>
		</div>
		<!-- END OF ESTIMATED PRICE SECTION -->

		<!-- QUANTITY SECTION -->
		<div class="col-1 col-md-1">
			<div class="d-flex justify-content-center">
				<span class="font-weight-bold"><?php echo $items['qty']; ?></span>
			</div>
		</div>
		<!-- END OF QUANTITY SECTION -->

		<!-- PRODUCT PRICE SECTION -->
		<div class="col-2 col-md-3 col-lg-2 pr-0 pl-0">
		<?php 
			//SET THE FINAL PRICE VALUE
			if(!$this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])) {
				$price = ceil($currentPrice['price'] * $items['qty']);
			} else {
				$price = 0;
			}

			//echo 'INI HARGA YANG SESUAI '.$currentPrice['price'].' INI HARGA DARI VARIABEL PRICE '.$price;
		?>
		
		<!-- SHOW ON ALL DEVICE -->
		<div class="d-md-none d-lg-block d-xl-block">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="d-flex justify-content-center">
					<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])): ?>
						<!-- ONLY SHOW IF THE PRICE IS NEGOTIABLE -->
						<span class="font-weight-bold">Price Negotiable</span>
					<?php else: ?>
						<span class="font-weight-bold">IDR <?php echo number_format($price, 2, ',', '.'); ?></span>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- SHOW ONLY ON TABLET -->
		<div class="d-md-block d-lg-none d-xl-none">		
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
					<!-- ONLY SHOW IF THE PRICE IS NEGOTIABLE -->
					<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])): ?>
						<span class="font-weight-bold">Price Negotiable</span>
					<?php else: ?>
						<span class="font-weight-bold">IDR <?php echo number_format($price * $items['qty'], 2, ',', '.'); ?></span>
					<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 pt-md-2">
					<div class="d-flex justify-content-center">
						<button type="button" class="btn btn-danger delete-item" title="Remove Item" data-id="<?php echo $items['rowid']; ?>">
							<i class="fa fa-trash"></i>
						</button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- END OF PRODUCT PRICE SECTION -->

	<!-- DELETE CART OPTIONS -->
	<div class="col-lg-1 col-xl-1 d-md-none d-lg-block d-xl-block">
		<button type="button" class="btn btn-danger delete-item" title="Remove Item" data-id="<?php echo $items['rowid']; ?>">
			<i class="fa fa-trash"></i>
		</button>
	</div>
	<!-- END DELETE CART OPTIONS -->

	</div>

	</div>
	</div>
	<!-- END THE MAIN LOOP -->

	<!-- MOBILE SHOPPING CART -->
	<div class="row d-block d-md-none d-lg-none d-xl-none mt-1 mb-3 pl-2 pr-2">
		<div class="col-12 cart-product-separator pb-4">

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

				<div class="col-8">
					<div class="row">
						<div class="col-12">
							<span class="font-weight-bold">Product Title</span>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span><?php echo $obj['detail']['productForApp']['title']; ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					
					<div class="row">
						<div class="col-12">
							<span class="font-weight-bold">Product Price</span>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12">
							<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])): ?>
								<span>Price Negotiable</span>
							<?php else: ?>
								<span>IDR <?php echo number_format($price * $items['qty'], 2, ',', '.'); ?></span>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-3">

					<div class="row">
						<div class="col-12">
							<span class="font-weight-bold">Quantity</span>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<span><?php echo $items['qty']; ?></span>
						</div>
					</div>

				</div>

				<div class="col-2 offset-1 pr-0">
					<button type="button" class="btn btn-danger delete-item mt-3 mt-md-0 mt-lg-0 mt-xl-0" title="Remove Item" data-id="<?php echo $items['rowid']; ?>">
						<i class="fas fa-trash-alt"></i>
					</button>
				</div>

			</div>

			<!-- INQUIRY SECTION -->
			<div class="row mt-2">
				<div class="col-12">
					<div class="form-group">
						<label class="font-weight-bold" for="text-input-<?php echo $i; ?>">Inquiry</label>
						<textarea class="form-control" id="text-input-<?php echo $i; ?>" type="text" name="customer-notes-<?php echo $i; ?>" style="background-color: #eee; width: 100%; height: auto;"/><?php echo $items['notes'] ?></textarea>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- END OF MOBILE SHOPPING CART -->

	<!-- PRICING HIDDEN INPUT -->
	<?php if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])): ?>
		<input type="hidden" name="total-price-<?php echo $i; ?>" value="0">
	<?php else: ?>
		<input type="hidden" name="total-price-<?php echo $i; ?>" value="<?php echo $price; ?>">
	<?php endif; ?>

	<!-- PRODUCT NAME HIDDEN INPUT -->
	<input type="hidden" name="product-name-<?php echo $i; ?>" value="<?php echo $obj['detail']['productForApp']['title']; ?>">

	<!-- END OF HIDDEN INPUT PART -->

	<?php 
		$i++;
		endforeach;
	?>

	<div class="row">
		<div class="col-5 col-md-3 col-lg-3 col-xl-2 offset-2 offset-md-6 offset-lg-7 offset-xl-8">
			<span class="font-weight-bold text-uppercase">estimated price</span>
		</div>
		<div class="col-5 col-md-3 col-lg-2 col-xl-2 text-right">
			<span class="pr-1 pr-md-0 pr-lg-0 pr-xl-0 font-weight-bold">IDR <?php echo number_format($subtotal, 2, ",", "."); ?></span>
		</div>
	</div>

	<div class="row cart-product-separator pb-3">
		<div class="col-5 col-md-3 col-lg-2 col-xl-2 offset-2 offset-md-6 offset-lg-7 offset-xl-8">
			<span class="font-weight-bold text-uppercase">total items</span>
		</div>
		<div class="col-3 col-md-2 col-lg-2 col-xl-2 offset-2 offset-md-1 offset-xl-0 text-right">
			<span class="pr-1 pr-md-0 pr-lg-0 pr-xl-0 font-weight-bold"><?php echo $subqty; ?></span>
		</div>
	</div>

	<div class="row mt-3">
		
		<div class="col-6 col-md-6 col-lg-6 col-xl-6">
			<div class="d-flex justify-content-start">
				<a href="<?php echo base_url(); ?>">
					<button type="button" class="btn btn-warning text-cart-button" title="Continue Shoping" style="color: white;"><i class="fa fa-angle-left"></i>&nbsp;CONTINUE SHOPPING</button>
				</a>
			</div>
		</div>

		<div class="col-6 col-md-6 col-lg-6 col-xl-6">
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-success text-cart-button" id="btnCheckOut" title="Submit Inquiry">SUBMIT INQUIRY&nbsp;<i class="fa fa-angle-right"></i></button></p>
			</div>
		</div>

	</div>

	<!-- IF THE CART'S EMPTY, DISPLAY NOTHING -->
	<?php else: ?>
	<div class="col-12 col-md-12 col-lg-12 col-xl-12">
		<div class="no-item-list">
			NO ITEM IN CART
		</div>
	</div>
	<?php endif; ?>

	</div>
	<!-- END OF CART MAIN CONTAINER -->
	<?php echo form_close(); ?>