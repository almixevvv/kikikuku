<style media="screen">

	#cart-content-separator {
		border-bottom: 1px solid black;
	}

</style>

<div class="cart-container">

	<div class="row">

		<div class="col-12 col-md-12 col-lg-12 col-xl-12">
			<div class="mb-3 pt-2" style="text-align: left;">
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

	</div>

	<div class="row">
		

	</div>

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
