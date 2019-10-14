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
								<?php if($obj['detail']['productForApp']['picture'] == null): ?>
								<img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2'];?>" />
									<?php else: ?>
										<img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture'];?>" />
								<?php endif; ?>
								</a>
							</div>

							<div class="col-8 pl-0">
								<div class="d-flex flex-column">
								  <div class="mb-1 text-capitalize">
										<span class="font-weight-bold">Product Name:</span>
										<?php echo $obj['detail']['productForApp']['title']; ?>
									</div>
									<div class="mb-1 text-capitalize">
										<span class="font-weight-bold">Seller Info:</span>
										<?php echo $obj['shopinfo']['shop']['shopName']; ?>
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
								<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999): ?>
								<div class="d-flex justify-content-center">
									<span class="font-weight-bold">Price Negotiable</span>	
								</div>
								
								<!-- IF THE PRICE IS NEGOTIABLE -->
								<?php elseif($obj['detail']['productForApp']['sellPrice'] == 0): ?>
								<div class="d-flex justify-content-center">
									<span class="font-weight-bold">Price Negotiable</span>
								</div>

								<!-- IF THE SDI PRODUCT IS EMPTY, THEN PRINT THE CURRENT PRICE AND SAVE IT AS FINAL PRICE -->
								<?php elseif($obj['detail']['sdiProductsPriceList'] == null): ?>
								<?php $tmpPrice =  $obj['detail']['productForApp']['sellPrice'] * CONVERT; ?>
								<div class="d-flex justify-content-center">
									<span class="font-weight-bold">
										IDR <?php echo number_format($tmpPrice, 2); ?>
									</span>
								</div>

								<!-- IF THE SDI PRODUCT IS NOT EMPTY, THEN SHOW THE PRICE RANGE -->
								<?php else: ?>

									<?php foreach($obj['detail']['sdiProductsPriceList'] as $quantity): ?>

										<!-- ONLY PRINT THE OUTPUT IF THE QUANTITY MATCH -->
										<?php if($quantity['endNumber'] == 0 || $quantity['endNumber'] == 1): ?>
										<?php $finalQty = $quantity['startNumber'] + 999999; ?>
											<?php else: ?>
											<?php $finalQty = $quantity['endNumber']; ?>
										<?php endif; ?>

										<?php if($items['qty'] >= $quantity['startNumber'] && $items['qty'] <= $finalQty): ?>
											<?php $finalPrice = $quantity['conferPrice'] * CONVERT; ?>
											<div class="d-flex justify-content-center">
												<p>
													<strong>IDR <?php echo number_format($finalPrice, 2); ?></strong>
												</p>
											</div>
											<div class="exw-container d-md-none d-lg-block d-xl-block" id="cart-exw-container">

												<div class="cart-exw">
													<label>EXW Price:</label>
												</div>

												<div class="cart-exw pt-2">
													<?php if($quantity['endNumber'] == 0): ?>
													<span class="pl-1"><?php echo $quantity['startNumber'].' and Above'; ?></span>
														<?php else: ?>
														<span class="pl-1"><?php echo $quantity['startNumber'].' '.$obj['detail']['productForApp']['matrisingular']; ?> ~ <?php echo $quantity['endNumber'].' '.$obj['detail']['productForApp']['matrisingular']; ?></span>
													<?php endif; ?>
												</div>

												<div class="cart-exw pt-2">
													<span class="pl-1" style="font-weight: bold; color: #f75c07;">IDR <?php echo number_format($finalPrice, 2);?></span>/<?php echo $obj['detail']['productForApp']['matrisingular']; ?>
												</div>

											</div>
										<?php endif; ?>

									<?php endforeach; ?>

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
							$price = ceil($finalPrice * $items['qty']);
						?>
						
						<!-- SHOW ON ALL DEVICE -->
						<div class="d-md-none d-lg-block d-xl-block">
							<div class="row">
								<div class="col-lg-12 col-xl-12">
									<div class="d-flex justify-content-center">
										<!-- ONLY SHOW IF THE PRICE IS NEGOTIABLE -->
										<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0): ?>
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
										<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0): ?>
										<span class="font-weight-bold">Price Negotiable</span>
										<?php else: ?>
										<span class="font-weight-bold">IDR <?php echo number_format($finalPrice * $items['qty'], 2); ?></span>
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

						<!-- <div class="d-flex justify-content-center">
							
						</div> -->
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
							<?php if($obj['detail']['productForApp']['picture'] == null): ?>
							<img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2'];?>" />
								<?php else: ?>
									<img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture'];?>" />
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
							<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0): ?>
							<span>Price Negotiable</span>
							<?php else: ?>
							<span>IDR <?php echo number_format($finalPrice * $items['qty'], 2); ?></span>
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

		<!-- LOOP HIDDEN INPUTS PART -->
		<!-- PRICING HIDDEN INPUT -->
		<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0): ?>
			<input type="hidden" name="total-price-<?php echo $i; ?>" value="0">
		<?php else: ?>
			<input type="hidden" name="total-price-<?php echo $i; ?>" value="<?php echo $finalPrice; ?>">
		<?php endif; ?>

		<!-- PRODUCT NAME HIDDEN INPUT -->
		<input type="hidden" name="product-name-<?php echo $i; ?>" value="<?php echo $obj['detail']['productForApp']['title']; ?>">

		<!-- END OF HIDDEN INPUT PART -->

		<?php
			//COUNT THE TOTAL OF ITEMS
			$subqty += $items['qty'];

			if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0) {
				$subtotal += 0;
			} else {
				$subtotal += ($finalPrice * $items['qty']);
			}
			$i++;

			endforeach;
		?>

		<!-- HIDDEN INPUT FIELS FOR FORM PURPOSE -->
		<input type="hidden" name="totalPrice" value="<?php echo $subtotal; ?>">
		<input type="hidden" name="totalItems" value="<?php echo $subqty; ?>">
		<input type="hidden" name="totalQty" value="<?php echo $i; ?>">

		<div class="row">
			<div class="col-5 col-md-3 col-lg-3 col-xl-2 offset-2 offset-md-6 offset-lg-7 offset-xl-8">
				<span class="font-weight-bold text-uppercase">estimated price</span>
			</div>
			<div class="col-5 col-md-3 col-lg-2 col-xl-2 text-right">
				<span class="pr-1 pr-md-0 pr-lg-0 pr-xl-0">IDR <?php echo number_format($subtotal, 2, ",", "."); ?></span>
			</div>
		</div>

		<div class="row cart-product-separator pb-3">
			<div class="col-5 col-md-3 col-lg-2 col-xl-2 offset-2 offset-md-6 offset-lg-7 offset-xl-8">
				<span class="font-weight-bold text-uppercase">total items</span>
			</div>
			<div class="col-3 col-md-2 col-lg-2 col-xl-2 offset-2 offset-md-1 offset-xl-0 text-right">
				<span class="pr-1 pr-md-0 pr-lg-0 pr-xl-0"><?php echo $subqty; ?></span>
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
		<div class="custom-product-list" >
			<div class="card product-list" id="prod_<?php echo $data['id']; ?>">
				<a href="<?php echo base_url(); ?>product_detail?id=<?php echo $data['id']; ?>" style="text-decoration: none;">
					<div class="d-flex justify-content-center">
						<img alt="'<?php echo $data['title']; ?>" class="product-image" src="http://img1.yiwugou.com/<?php echo $data['picture2']; ?>" />
					</div>
					<p class="product-title mt-2"><?php echo ucwords(mb_strimwidth($data['title'], 0, 35, "...")); ?></p>
					<label class="product-label">Estimated Price</label></br>
					<?php if($data['sellPrice'] == 0): ?>
						<span class="product-price">Price Negotiable</span>
					<?php elseif($data['sellPrice'] > 9999999): ?>
						<span class="product-price">Price Negotiable</span>
					<?php else: ?>
						<span class="product-price">IDR <?php echo number_format($data['sellPrice'] * CONVERT, 2, ',', '.'); ?></span>
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
