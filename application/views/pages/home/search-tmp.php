<header data-component-container="heroComponent" data-hero-layer-opacity="opacity10" data-hero-layer-color="BLACK"  class="hero hero-large hero-homepage hero-cta " data-module="heroLarge">
	<img alt="banner" src="<?php echo base_url('assets/img/banner-top2.jpg');?>" style="width: 100%;" />
</header>
<?php
		$convert = 2053.63;
?>
<div class="content gutter">
	<section class="product-push homepage" data-module="productpush, view360" style="padding: 0px;background: #fff;padding-top: 30px;">
		<div class="row" style="padding: 15px;margin-bottom: 100px;">
			<div id="list-product-1">
				<div class="col-lg-2 col-md-2 col-sm-3-col-xs-12" style="padding: 2.5px;position: relative;min-height: 800px;" >
					<div class="well no-padding" style="padding: 10px;">
				        <div>
				            <ul class="nav nav-list nav-menu-list-style">
				                <?php
							          	$sql_cats = "SELECT A.ID, A.NAME, (SELECT COUNT(ID) FROM `m_category` WHERE `m_category`.PARENT = A.ID) as TOTAL_SUB
							          							 FROM `m_category` as A WHERE A.`PARENT`='0' AND A.`LEVEL`='0' ORDER BY A.`ORDER_NO` ASC";
							          	$query_cats = $this->db->query($sql_cats);
							          	foreach ($query_cats->result() as $rsc):
						        		?>
				                <li style="text-align: left;">
													<label class="tree-toggle nav-header">
														<?php echo ucfirst(strtolower($rsc->NAME));?>
				                		<?php if($rsc->TOTAL_SUB > 0):?>
															<span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span>
														<?php endif; ?>
				                	</label>
				                  <?php if($rsc->TOTAL_SUB > 0): ?>
														<ul class="nav nav-list tree">
				                    	<?php
						                    $sql_subcats = "SELECT *
																								FROM `m_category`
																								WHERE `PARENT`='".$rsc->ID."' AND `LEVEL`='1'
																								ORDER BY `ORDER_NO` ASC";

						                  	$query_subcats = $this->db->query($sql_subcats);
						                  	foreach ($query_subcats->result() as $sub_rsc):
						                	?>
				                    	<li>
																<a href="<?php echo base_url('home?perpage='.$perpage.'&id='.ucfirst(strtolower($sub_rsc->ID)) );?>">&nbsp;<?php echo ucfirst(strtolower($sub_rsc->NAME));?></a>
															</li>
				            			<?php endforeach; ?>
				                    </ul>
				            		<?php endif; ?>
				                </li>
				            	<?php endforeach; ?>
				            </ul>
				        </div>
				    </div>
				</div>

				<div class="col-lg-10">
					<div id="load_data">
					</div>
					<div id="load_data_message"></div>
				</div>
			</div>
		</div>
	</section>
</div>


<script type="text/javascript">
	$(document).ready(function () {

	    size_li = $("#list-product-1 div#item-product-1").size();
	    x=12;
	    if(x >= size_li){ $('#btn-load-more-1').hide(); $('#div-loadmore-1').hide();}
	    $('#list-product-1 div#item-product-1:lt('+x+')').show();
	    $('#btn-load-more-1').click(function () {
		        x = (x+12 <= size_li) ? x+12 : size_li;
		        $('#list-product-1 div#item-product-1:lt('+x+')').show();
	        if(x <= size_li){
		    		$('#btn-load-more-1').hide();
		    		$('#div-loadmore-1').hide();
	        }
	    });
	    size_li2 = $("#list-product-2 div#item-product-2").size();
	    x2=4;
	    if(x2 >= size_li2){ $('#btn-load-more-2').hide(); $('#div-loadmore-2').hide();}
	    $('#list-product-2 div#item-product-2:lt('+x2+')').show();
	    $('#btn-load-more-2').click(function () {
		        x2 = (x2+4 <= size_li2) ? x2+4 : size_li2;
		        $('#list-product-2 div#item-product-2:lt('+x2+')').show();
	        if(x2 <= size_li2){
		    		$('#btn-load-more-2').hide();
		    		$('#div-loadmore-2').hide();
	        }
	    });


			var limit = 1;
	    var start = 1;
	    var action = 'inactive';

	    function lazzy_loader(limit) {

				var output = '';
	      for(var count=0; count<limit; count++) {
	        output += '<div class="post_data">';
	        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
	        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
	        output += '</div>';
	      }
				$('#load_data_messageMobile').html(output);
	    }

	    lazzy_loader(limit);

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

				var tech = getUrlParameter('query');

				$.ajax({
	        url:"<?php echo base_url('Home/searchAutoload'); ?>",
	        method:"POST",
					data:{limit:limit, start:start, query:tech},
	        cache: false,
	        success:function(data) {
	          if(data == '') {
	            $('#load_data_message').html('<h3>No More Result Found</h3>');
							console.log(data);
	            action = 'active';
	          }
	          else {
	            $('#load_data').append(data);
	            $('#load_data_message').html("");
							console.log(data);
	            action = 'inactive';
	          }
	        }
	      })
	    }

	    if(action == 'inactive') {
	      action = 'active';
	      load_data(limit, start);
	    }

	    $(window).scroll(function() {
	      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
	        lazzy_loader(limit);
	        action = 'active';
	        start = start + limit;
	        setTimeout(function(){
	          load_data(limit, start);
	        }, 1000);
	      }
	    });

			$('.tree-toggle').click(function () {
			$(this).parent().children('ul.tree').toggle(200);
		});

		$(function() {
			$('.tree-toggle').parent().children('ul.tree').toggle(200);
		});

	});
</script>

<!-- Desktop Script -->
<script type="text/javascript">

	//INITIAL VARIABLE
	var limit = 1;
	var start = 1;
	var loadCounter = 1;
	var action = 'inactive';

	$(document).ready(function () {

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

			var tech = getUrlParameter('search-query');

			$.ajax({
	        	url:"<?php echo base_url('ContentLoad/autoloadSearch'); ?>",
	        	method:"POST",
				data:{limit:limit, start:start, query:tech, counter: loadCounter},
	        	cache: false,
	        	success:function(data) {
					if(data == '') {
						$('#loader-icon').html('<h3>No More Result Found</h3>');
			            	action = 'active';
			          	} else {
			            	$('#product-main-list').append(data);
			            	action = 'inactive';
			          	}
	        	}
	      	})
	    }

	    if(action == 'inactive') {
	      action = 'active';
	      load_data(limit, start);
	    }

	    $(window).scroll(function() {

			//ONLY RUN IF THE COUNTER IS LESS THAN 4
			if(loadCounter < 4) {
				if($(window).scrollTop() + $(window).height() > $("#product-main-list").height() && action == 'inactive') {
					action = 'active';
					start = start + limit;
					loadCounter++;
			      	setTimeout(function() {
						load_data(limit, start);
			      	}, 1000);
				}
			} else if(loadCounter == 4) {
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

	var tech = getUrlParameter('search-query');

	$.ajax({
		url:"<?php echo base_url('ContentLoad/autoloadSearch'); ?>",
		method:"POST",
		data: { limit:limit, start:start, id:tech, counter: loadCounter },
		cache: false,
		success:function(data) {
			if(data == '') {
				$('#loader-icon').html('<h3>No More Result Found</h3>');
				action = 'active';
			} else {
				$('#product-main-list').append(data);
				action = 'inactive';
			}
		}
	});
	}
	
</script>

