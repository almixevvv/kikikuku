<?php if (!defined("BASEPATH")) exit("Hack Attempt");

class ContentLoad extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_product', 'product');
		$this->load->library('incube');
	}

	public function autoloadHome()
	{
		$industryID = $this->input->post('id');
		$currentCounter = $this->input->post('counter');
		$detailCounter = 0;

		//HOW TO GET JSON DATA
		try {
			if ($industryID == null) {
				$json = @file_get_contents(base_url("API/home?key=c549303dcef12a687e9077a21e1a51fb67851efb&pageSize=12&page=" . $this->input->get('start')));
			} else {
				$json = @file_get_contents(base_url("API/categoryProduct?key=c549303dcef12a687e9077a21e1a51fb67851efb&pageSize=12&category=" . $industryID . "&page=" . $this->input->get('start')));
			}

			$obj = json_decode($json, true);

			//COUNTER TO DISPLAY MANUAL LOAD
			$currentCounter 	= $this->input->get('counter');

			foreach ($obj['item'] as $list) {

				//FILL THE TEMPLATE WITH OUTPUT DATA
				if (is_numeric($list['PRICE'])) {

					$tmpArray[$detailCounter++] = array(
						'id'			=> $list['ID'],
						'title'			=> $list['TITLE'],
						'short_title'	=> ucwords(mb_strimwidth($list['TITLE'], 0, 35, "...")),
						'picture'		=> $list['PICTURE'],
						'price'			=> number_format($list['PRICE'], 2, '.', ','),
						'button'		=> false
					);
				} else {

					$tmpArray[$detailCounter++] = array(
						'id'			=> $list['ID'],
						'title'			=> $list['TITLE'],
						'short_title'	=> ucwords(mb_strimwidth($list['TITLE'], 0, 35, "...")),
						'picture'		=> $list['PICTURE'],
						'price'			=> $list['PRICE'],
						'button'		=> false
					);
				}

				$detailDecode = json_encode($tmpArray);
			}

			if ($currentCounter >= 4) {
				$tmpArray[$detailCounter++] = array(
					'id'			=> '-',
					'title'			=> '-',
					'short_title'	=> '-',
					'picture'		=> '-',
					'price'			=> '-',
					'button'		=> true
				);

				$detailDecode = json_encode($tmpArray);
			}
		} catch (Error $err) {
			// var_dump($err);
			$output = $err;
		}

		header('Content-Type: application/json');

		echo json_encode([
			'status'    => 200,
			'type'      => 'success',
			'code'      => 'data sent',
			'message'   => json_decode($detailDecode)
		]);
	}

	// public function loadDetails() {

	// 	$id 		= $this->input->get('id');
	// 	$curQty 	= $this->input->get('qty');
	// 	$curPrice	= $this->input->get('price');

	// 	$finalUrl 	= 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$id;

	// 	$json 		= file_get_contents($finalUrl);
	// 	$obj        = json_decode($json, true);

	// 	//Match the Price
	// 	if($obj['detail']['sdiProductsPriceList'] != null) {
	// 		echo 'saatnya berhitung';

	// 		foreach($obj['detail']['sdiProductsPriceList'] as $price) {

	// 		}

	// 	} else {
	// 		echo $curPrice;
	// 	}

	// }

	public function autoloadSearch()
	{

		$output = '';

		$searchQuery 		= $this->input->post('query');
		$currentCounter 	= $this->input->post('counter');
		$page 				= $this->input->post('start');

		$json = file_get_contents("http://kikikuku.com/API/search?key=c549303dcef12a687e9077a21e1a51fb67851efb&pageSize=12&query=" . $searchQuery . "&page=" . $page);
		$obj = json_decode($json, true);

		//COUNTER TO DISPLAY MANUAL LOAD
		$currentCounter 	= $this->input->post('counter');

		foreach ($obj['item'] as $list) {

			//FILL THE TEMPLATE WITH OUTPUT DATA
			if (is_numeric($list['PRICE'])) {
				$output .= '
						<div class="custom-product-list" >
							<div class="card product-list" id="prod_' . $list['ID'] . '">
								<a href="' . base_url('product_detail?id=' . $list['ID']) . '" style="text-decoration: none;">
									<div class="d-flex justify-content-center">
										<img alt="' . $list['TITLE'] . '" class="product-image" src="' . $list['PICTURE'] . '" 
										onerror="this.onerror=null;this.src=' . '\'' . base_url('assets/images/no-image-icon.png') . ' \'' . '" />
									</div>
									<p class="product-title mt-2">' . ucwords(mb_strimwidth($list['TITLE'], 0, 35, "...")) . '</p>
									<label class="product-label">Estimated Price</label></br>
									<span class="product-price">IDR ' . number_format($list['PRICE'], 2, '.', ',') . '</span>	
								</a>
							</div>
						</div>';
			} else {
				$output .= '
					<div class="custom-product-list" >
						<div class="card product-list" id="prod_' . $list['ID'] . '">
							<a href="' . base_url('product_detail?id=' . $list['ID']) . '" style="text-decoration: none;">
								<div class="d-flex justify-content-center">
									<img alt="' . $list['TITLE'] . '" class="product-image" src="' . $list['PICTURE'] . '" 
									onerror="this.onerror=null;this.src=' . '\'' . base_url('assets/images/no-image-icon.png') . ' \'' . '" />
								</div>
								<p class="product-title mt-2">' . ucwords(mb_strimwidth($list['TITLE'], 0, 35, "...")) . '</p>
								<label class="product-label">Estimated Price</label></br>
								<span class="product-price">' . $list['PRICE'] . '</span>	
							</a>
						</div>
					</div>';
			}
		}

		if ($currentCounter >= 4) {
			$output .= '<button onclick="manualLoad()" class="load-more-content" type="button" >Load More</button>';
		}

		//ECHO THE FINAL GROUP OF OUTPUT
		echo $output;
	}
}
