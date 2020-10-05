<!-- Desktop Script -->
<script type="text/javascript">
	//INITIAL VARIABLE
	var limit = 1;
	var start = 1;
	var loadCounter = 1;
	var action = 'inactive';

	$(document).ready(function() {

		function load_data(limit, start) {

			var getUrlParameter = function getUrlParameter(sParam) {
				var sPageURL = window.location.search.substring(1);
				var sURLVariables = sPageURL.split('&');
				var sParameterName;
				var i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');
					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
					}
				}
			};

			var tech = getUrlParameter('id');

			$.get(baseUrl + 'General/ContentLoad/autoloadHome', {
				limit: limit,
				start: start,
				id: tech,
				counter: loadCounter
			}, function(resp) {
				if (resp == '') {
					$('#loader-icon').html('<h3>No More Result Found</h3>');
					action = 'active';
				} else {

					$.each(resp.message, function(index, value) {

						let $btnLoadMore = $('<button>').addClass('load-more-content').text('Load More').attr('onclick', 'manualLoad()');

						if (value.button) {
							$('#product-main-list').append($btnLoadMore);
						} else {

							let $cardProductDiv = $('<div>').addClass('custom-product-list');
							let $cardProductList = $('<div>').addClass('card product-list').attr('id', value.id);
							let $cardURL = $('<a>').attr('href', baseUrl + 'product_detail?id=' + value.id).css('text-decoration', 'none');
							let $cardImageHolder = $('<div>').addClass('d-flex justify-content-center');
							let $cardImage = $('<img>').attr({
								alt: value.title,
								src: value.picture
							}).addClass('product-image');
							let $productTitle = $('<p>').addClass('product-title mt-2').text(value.short_title);
							let $productLabel = $('<label>').addClass('product-label').text('Estimated Price');
							let $productPrice = $('<span>').addClass('product-price').text((value.price === 'Price Negotiable' ? 'Price Negotiable' : 'IDR ' + value.price));
							let $cardBreak = $('<br>');

							$($cardImage).on('error', function() {
								$(this).attr('src', baseUrl + '/assets/images/no-image-icon.png');
							});

							$cardImage.appendTo($cardImageHolder);
							$cardImageHolder.appendTo($cardURL);
							$productTitle.appendTo($cardURL);
							$productLabel.appendTo($cardURL);
							$cardBreak.appendTo($cardURL);
							$productPrice.appendTo($cardURL);
							$cardURL.appendTo($cardProductList);
							$cardProductList.appendTo($cardProductDiv);

							$('#product-main-list').append($cardProductDiv);
						}

					});
					action = 'inactive';
				}
			});
		}

		if (action == 'inactive') {
			action = 'active';
			load_data(limit, start);
		}

		$(window).scroll(function() {

			//ONLY RUN IF THE COUNTER IS LESS THAN 4
			if (loadCounter < 4) {
				if ($(window).scrollTop() + $(window).height() > $("#product-main-list").height() && action == 'inactive') {
					action = 'active';
					start = start + limit;
					loadCounter++;
					setTimeout(function() {
						load_data(limit, start);
					}, 1000);
				}
			} else if (loadCounter == 4) {
				//REMOVE THE PREVIOUS PLACEHOLDER
				$('#loader-icon').remove();
			}
		});

	});

	//LOAD THE DATA MANUALLY
	function manualLoad() {

		//REMOVE THE CLICKED BUTTON FIRST
		$('.load-more-content').remove();
		$('#loader-icon').append(`
			<div class="col-12 col-md-12 col-lg-12 col-xl-12">
					<div class="d-flex justify-content-center">
						<div class="lds-roller pt-4 pb-5">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
				</div>`);

		//GET THE URL IF ID IS SELECTED
		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1);
			var sURLVariables = sPageURL.split('&');
			var sParameterName;
			var i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');
				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
		};

		var tech = getUrlParameter('id');

		$.get(baseUrl + 'General/ContentLoad/autoloadHome', {
			limit: limit,
			start: start,
			id: tech,
			counter: loadCounter
		}, function(resp) {
			if (resp == '') {
				$('#loader-icon').html('<h3>No More Result Found</h3>');
				action = 'active';
			} else {

				$.each(resp.message, function(index, value) {

					let $btnLoadMore = $('<button>').addClass('load-more-content').text('Load More').attr('onclick', 'manualLoad()');

					if (value.button) {
						$('#product-main-list').append($btnLoadMore);
					} else {

						let $cardProductDiv = $('<div>').addClass('custom-product-list');
						let $cardProductList = $('<div>').addClass('card product-list').attr('id', value.id);
						let $cardURL = $('<a>').attr('href', baseUrl + 'product_detail?id=' + value.id).css('text-decoration', 'none');
						let $cardImageHolder = $('<div>').addClass('d-flex justify-content-center');
						let $cardImage = $('<img>').attr({
							alt: value.title,
							src: value.picture
						}).addClass('product-image');
						let $productTitle = $('<p>').addClass('product-title mt-2').text(value.short_title);
						let $productLabel = $('<label>').addClass('product-label').text('Estimated Price');
						let $productPrice = $('<span>').addClass('product-price').text((value.price === 'Price Negotiable' ? 'Price Negotiable' : 'IDR ' + value.price));
						let $cardBreak = $('<br>');

						$($cardImage).on('error', function() {
							$(this).attr('src', baseUrl + '/assets/images/no-image-icon.png');
						});

						$cardImage.appendTo($cardImageHolder);
						$cardImageHolder.appendTo($cardURL);
						$productTitle.appendTo($cardURL);
						$productLabel.appendTo($cardURL);
						$cardBreak.appendTo($cardURL);
						$productPrice.appendTo($cardURL);
						$cardURL.appendTo($cardProductList);
						$cardProductList.appendTo($cardProductDiv);

						$('#product-main-list').append($cardProductDiv);
					}

				});
				action = 'inactive';
			}
		});

	}
</script>