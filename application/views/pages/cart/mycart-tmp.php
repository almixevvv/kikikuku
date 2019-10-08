
<style type="text/css">
	#p-overflow {
		text-overflow :inherit;
		overflow: auto;
		max-height:140px;
		text-overflow: ellipsis;
		text-align: justify-all;
	}

	@media (max-width: 1024px) {
		#p-overflow {
			max-height: 90px;
		}
	}

	@media (max-width: 768px){
		#p-overflow {
			max-height: 80px;
		}
	}
	.no-item-list{
		font-size: 17px;
		color:#333;
		text-transform: uppercase;
		font-style: italic;
		height: 100px;
		text-align: center;
		padding-top: 50px;
		padding-bottom: 120px;
	}

	.swal2-popup {
    width: 35em!important;
    font-size: 1.7rem!important;
	}

	.exw-container {
		margin-top: 2em;
		padding-top: 1em;
		background-color: #f5f5f5;
		padding-bottom: 1em;
	}

</style>
<?php
	$convert = 20.5363;
?>
<div class="main-container ">
	<div class="container">
		<div class="row" style="padding-top: 20px;">
			<ul>
				<li style="display: inline-block;">
					<a href="<?php echo base_url();?>" title="Go to Home Page">Home</a>
					<span class="fa fa-angle-right"></span>
				</li>
				<li style="display: inline-block;">
					<strong>Shopping Cart</strong>
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0 10px;">
				<div class="main">
					<div class="col-main">
						<div class="padding-s">
							<div id="messages_product_view"></div>
							<div class="page-title">
								<h1><?php echo $row = count($this->cart->contents()); ?>  Item(s) in cart</h1>
							</div>
							<hr>
							<div class="googlemap-position"></div>
							<!-- BEGIN FORM CART -->
							<form action="<?php echo base_url('Cart/cartToSession');?>" method="POST">
							<div class="contact-block clearfix row" id="contactForm">

								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12 hidden-xs">
									<div class="col-lg-6 col-md-5 col-sm-4 col-xs-12">Product Detail</div>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Estimated Price</div>
									<div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">Qty</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="text-align: right;">Total</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;"><hr></div>
								</div>

								<?php
									if($row > 0){

									//INITIAL TOTAL VARIABLE
									$subqty = 0;
									$subtotal = 0;
									$i = 0;

									foreach ($this->cart->contents() as $items):

                    $finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$items['id'];

                    $json = file_get_contents($finalUrl);
            				$obj = json_decode($json, true);
                ?>


								<?php //HIDDEN INPUT FOR CHECKOUT PURPOSE ?>
								<input type="hidden" name="product-id-<?php echo $i; ?>" value="<?php echo $items['id']; ?>">
								<input type="hidden" name="product-qty-<?php echo $i; ?>" value="<?php echo $items['qty']; ?>">

								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12" style="padding:0px; margin-bottom: 1em;" id="rowcart_<?php echo $items['rowid']; ?>" >

									<div class="col-xs-3 hidden-lg hidden-md hidden-sm">Product Detail</div>

									<input type="text" style="display: none;" name="rowid[]" id="rowid_<?php echo $i ?>" value="<?php echo $items['rowid']; ?>"/>

									<div class="col-lg-6 col-md-5 col-sm-4 col-xs-9">

										<div class="col-lg-4 col-md-5 col-sm-6 col-xs-5" style="padding-left: 0px;">
											<a href="<?php echo base_url('product_detail?id='.$items['id'])?>" class="link-image">
                        <?php if($obj['detail']['productForApp']['picture'] == null): ?>
                        <img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture2'];?>" style="width: 100%;" itemprop="image"/>
                          <?php else: ?>
                            <img class="img-list-order" src="http://img1.yiwugou.com/<?php echo $obj['detail']['productForApp']['picture'];?>" style="width: 100%;" itemprop="image"/>
                        <?php endif; ?>
											</a>
										</div>

										<div class="col-lg-8 col-md-7 col-sm-6 col-xs-7" style="padding:0px;">
											<p style="text-transform: capitalize;"><strong>Product Name</strong> : <?php echo $obj['detail']['productForApp']['title']; ?></p>

											<?php //HIDDEN INPUT FOR DATABASE ?>
											<input type="hidden" name="product-name-<?php echo $i; ?>" value="<?php echo $obj['detail']['productForApp']['title']; ?>">

											<p><strong>Seller Info</strong>  : <?php echo $obj['shopinfo']['shop']['shopName']; ?></p>
											<div class="form-group" style="margin-bottom: 30px;">
												<label for="customer-notes">Inquiry</label><br>
													<textarea type="text" name="customer-notes-<?php echo $i; ?>" class="form-control" style="background-color: #eee; width: 80%; height:100px;"/><?php echo $items['notes'] ?></textarea>
											</div>
										</div>

									</div>

									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">



										<!-- ONLY SHOW IF THE PRICE IS NEGOTIABLE -->
										<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999): ?>
											<p><strong>Price Negotiable</strong></p>

										<?php elseif($obj['detail']['productForApp']['sellPrice'] == 0): ?>
											<p><strong>Price Negotiable</strong></p>

										<!-- IF THE SDI PRODUCT IS EMPTY, THEN PRINT THE CURRENT PRICE AND SAVE IT AS FINAL PRICE -->
										<?php elseif($obj['detail']['sdiProductsPriceList'] == null): ?>
											<?php $tmpPrice =  $obj['detail']['productForApp']['sellPrice'] * $convert; ?>
											<p><strong>IDR <?php echo number_format($tmpPrice, 2); ?></strong></p>
											<?php $finalPrice = $tmpPrice; ?>

										<!-- IF THE SDI PRODUCT IS NOT EMPTY, THEN PROCEED AS NORMAL -->
										<?php else: ?>

											<?php foreach($obj['detail']['sdiProductsPriceList'] as $quantity): ?>

												<!-- ONLY PRINT THE OUTPUT IF THE QUANTITY MATCH -->
												<?php if($quantity['endNumber'] == 0 || $quantity['endNumber'] == 1): ?>
													<?php $finalQty = $quantity['startNumber'] + 999999; ?>
														<?php else: ?>
															<?php $finalQty = $quantity['endNumber']; ?>
												<?php endif; ?>

												<?php if($items['qty'] >= $quantity['startNumber'] && $items['qty'] <= $finalQty): ?>
												<?php $finalPrice = $quantity['conferPrice'] * $convert; ?>
												<p><strong>IDR <?php echo number_format($finalPrice, 2); ?></strong></p>

												<div class="exw-container">
													<div class="row">
														<div class="col-lg-10">
															<label style="padding-left: 0.5em;">EXW Price:</label>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-10">
															<?php if($quantity['endNumber'] == 0): ?>
															<h5 style="padding-left: 1.5em;"><?php echo $quantity['startNumber'].' and Above'; ?></h5>
																	<?php else: ?>
																	<h5 style="padding-left: 1.5em;"><?php echo $quantity['startNumber'].' '.$obj['detail']['productForApp']['matrisingular']; ?> ~ <?php echo $quantity['endNumber'].' '.$obj['detail']['productForApp']['matrisingular']; ?></h5>
															<?php endif; ?>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-10">
															<h5 style="padding-left: 1.5em;"><span style="font-weight: bold; color: #f75c07;">IDR <?php echo number_format($finalPrice, 2);?></span>/<?php echo $obj['detail']['productForApp']['matrisingular']; ?></h5>
														</div>
													</div>
												</div>
												<?php endif; ?>
											<?php endforeach; ?>

										<?php endif; ?>
									</div>

                  <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
										<p><strong><?php echo $items['qty']; ?></strong></p>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="text-align: right;">
										<!-- ONLY SHOW IF THE PRICE IS NEGOTIABLE -->
										<?php if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0): ?>
										<p><strong>Price Negotiable</strong></p>
										<input type="text" style="display: none;" name="total-price-<?php echo $i; ?>" value="0">
											<?php else: ?>
											<p><strong>IDR <?php echo number_format($finalPrice * $items['qty'], 2); ?></strong></p>
											<input type="text" style="display: none;" name="total-price-<?php echo $i; ?>" value="<?php echo $finalPrice; ?>">
										<?php endif; ?>
                  </div>

									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-9" style="text-align: right;" >
										<p>
											<button type="button" class="btn btn-danger delete-item" title="Remove Item" data-id="<?php echo $items['rowid']; ?>">
												<i class="fa fa-trash"></i>
											</button>
										</p>
									</div>

									<div class="col-xs-12 hidden-lg hidden-md hidden-sm"><hr></div>

								</div>
								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12"><hr></div>
								<?php
									//COUNT THE TOTAL OF ITEMS
									$subqty += $items['qty'];

									if($obj['detail']['productForApp']['sellPrice'] == 999999999999 || $obj['detail']['productForApp']['sellPrice'] == 0) {
										$subtotal += 0;
									} else {
										$subtotal += ($finalPrice * $items['qty']);
									}
									$i++;
								?>
                <?php endforeach; ?>

								<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12" style="padding: 0px;">
									<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-lg-offset-9" style="padding: 0px;">
										<p>
											<strong style="margin-right: 4em;">ESTIMATED PRICE</strong>
											IDR <strong><?php echo number_format($subtotal, 2); ?></strong>
										</p>
									</div>
									<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-lg-offset-9" style="padding: 0px;">
										<p>
											<strong style="margin-right: 9.7em;">TOTAL ITEMS</strong>
											<strong><?php echo $subqty; ?></strong>
										</p>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;text-align: right;">
										<input type="text" style="display: none;" name="totalPrice" value="<?php echo $subtotal; ?>">
										<input type="text" style="display: none;" name="totalItems" value="<?php echo $subqty; ?>">
										<input type="text" style="display: none;" name="totalQty" value="<?php echo $i; ?>">
									</div>
								</div>

								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12"><hr></div>
								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">
										<p>
											<a href="<?php echo base_url();?>">
												<button type="button" class="btn btn-warning" title="Continue Shoping"><i class="fa fa-angle-left"></i>&nbsp;CONTINUE SHOPPING</button>
											</a>
										</p>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0px;text-align: right;">
										<p>
											<button type="submit" class="btn btn-success" id="btnCheckOut" title="Submit Inquiry" <?php if($this->cart->total_items() < 1){ echo "disabled";}?> >SUBMIT INQUIRY&nbsp;<i class="fa fa-angle-right"></i></button></p>
									</div>
								</div>
								<?php } else { ?>
								<div class="col-lg-12 col-md-11 col-sm-12 col-xs-12">
									<div class="no-item-list">
										NO ITEM IN CART
									</div>
								</div>
                               	<?php } ?>
							</div>
							</form>
							<!-- END FORM CART -->
							<div class="content-column-center"></div>
							<div class="wrapper-content"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- RECOMENDED PRODUCT SECTION -->
		<div class="row" style="padding-top: 1em;">
			<div class="col-lg-6">
				<h4>You Might Also Like:</h4>
			</div>
		</div>
		<div class="row">
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
</div>
<p id="back-top">
	<a href="#top"><span></span></a>
</p>

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
