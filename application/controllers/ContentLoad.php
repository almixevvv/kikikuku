<?php if(!defined("BASEPATH")) exit("Hack Attempt");

	class ContentLoad extends CI_Controller {

		public function __construct() {
			parent::__construct();
			
			date_default_timezone_set('Asia/Jakarta');

			$this->load->model('M_product', 'product');
			$this->load->library('incube');
		}

		public function autoloadHome() {

			$output = '';
			
			$industryID = $this->input->post('id');
			$currentCounter = $this->input->post('counter');

			$randomPage = mt_rand(1, 500);

			//HOW TO GET JSON DATA
			if($industryID == null) {
				$json = file_get_contents("https://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&pageSize=12&cpage=".$randomPage."");
			} else {
				$json = file_get_contents("http://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&s=".$industryID."&pageSize=12&cpage=".$this->input->post('start')."");
			}

			$obj = json_decode($json, true);

			//COUNTER TO DISPLAY MANUAL LOAD
			$currentCounter 	= $this->input->post('counter');
			$marginParameter 	= $this->product->getMarginPrice();
			$convertRate		= $this->product->getConvertRate();

			foreach($obj['prslist'] as $list) {

				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($list['picture2']);

				//FORMAT THE PRICE
				$price = $this->incube->setPrice($convertRate, $marginParameter, $list['sellPrice']);

				//FILL THE TEMPLATE WITH OUTPUT DATA
				if($list['sellPrice'] == 0) {
						$output .= '
						<div class="custom-product-list" >
							<div class="card product-list" id="prod_'.$list['id'].'">
								<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
									<div class="d-flex justify-content-center">
										<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
										onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
									</div>
									<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
									<label class="product-label">Estimated Price</label></br>
									<span class="product-price">Price Negotiable</span>
								</a>
							</div>
						</div>';
				} else if($list['sellPrice'] > 9999999) {
						$output .= '
						<div class="custom-product-list" >
							<div class="card product-list" id="prod_'.$list['id'].'">
								<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
									<div class="d-flex justify-content-center">
										<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
										onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
									</div>
									<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
									<label class="product-label">Estimated Price</label></br>
									<span class="product-price">Price Negotiable</span>
								</a>
							</div>
						</div>';
				} else {
					$output .= '
					<div class="custom-product-list" >
						<div class="card product-list" id="prod_'.$list['id'].'">
							<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
								<div class="d-flex justify-content-center">
									<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
									onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
								</div>
								<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
								<label class="product-label">Estimated Price</label></br>
								<span class="product-price">IDR '.number_format($price, 2, '.', ',').'</span>	
							</a>
						</div>
					</div>';
				}
			}

			if($currentCounter >= 4) {
				$output .= '<button onclick="manualLoad()" class="load-more-content" type="button" >Load More</button>';
			}

			//ECHO THE FINAL GROUP OF OUTPUT
			echo $output;

		}

		public function loadDetails() {

			$id 		= $this->input->get('id');
			$curQty 	= $this->input->get('qty');
			$curPrice	= $this->input->get('price');
			
			$finalUrl 	= 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$id;

			$json 		= file_get_contents($finalUrl);
        	$obj        = json_decode($json, true);

        	//Match the Price
        	if($obj['detail']['sdiProductsPriceList'] != null) {
        		echo 'saatnya berhitung';

        		foreach($obj['detail']['sdiProductsPriceList'] as $price) {
        			
				}
				
        	} else {
        		echo $curPrice;
        	}

		}

		public function autoloadSearch() {

			$output = '';

			$searchQuery 		= $this->input->post('query');
			$currentCounter 	= $this->input->post('counter');
			$page 				= $this->input->post('start');
			$marginParameter 	= $this->product->getMarginPrice();
			$convertRate 		= $this->product->getConvertRate();

			$json = file_get_contents("https://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&q=".$searchQuery."&pageSize=12&cpage=".$page);

			$obj = json_decode($json, true);

			foreach($obj['prslist'] as $list) {

				//FORMAT THE PRICE
				$price = $this->incube->setPrice($convertRate, $marginParameter, $list['sellPrice']);

                //Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($list['picture2']);

				//FILL THE TEMPLATE WITH OUTPUT DATA
				if($list['sellPrice'] == 0) {
					$output .= '
						<div class="custom-product-list" >
							<div class="card product-list" id="prod_'.$list['id'].'">
								<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
									<div class="d-flex justify-content-center">
										<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
										onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
									</div>
									<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
									<label class="product-label">Estimated Price</label></br>
									<span class="product-price">Price Negotiable</span>
								</a>
							</div>
						</div>';
				} else if(strlen($list['sellPrice']) > 7) {
					$output .= '
						<div class="custom-product-list" >
							<div class="card product-list" id="prod_'.$list['id'].'">
								<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
									<div class="d-flex justify-content-center">
										<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
										onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
									</div>
									<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
									<label class="product-label">Estimated Price</label></br>
									<span class="product-price">Price Negotiable</span>
								</a>
							</div>
						</div>';
				} else {
					$output .= '
					<div class="custom-product-list" >
						<div class="card product-list" id="prod_'.$list['id'].'">
							<a href="'.base_url('product_detail?id='.$list['id']).'" style="text-decoration: none;">
								<div class="d-flex justify-content-center">
									<img alt="'.$list['title'].'" class="product-image" src="'.$newPath.$list['picture2'].'" 
									onerror="this.onerror=null;this.src='.'\''.base_url('assets/images/no-image-icon.png').' \''.'" />
								</div>
								<p class="product-title mt-2">'.ucwords(mb_strimwidth($list['title'], 0, 35, "...")).'</p>
								<label class="product-label">Estimated Price</label></br>
								<span class="product-price">IDR '.number_format($price, 2, '.', ',').'</span>	
							</a>
						</div>
					</div>';
				}

			}

			if($currentCounter >= 4) {
				$output .= '<button onclick="manualLoad()" class="load-more-content" type="button" >Load More</button>';
			}

			echo $output;


		}


	}
