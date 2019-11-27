<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Incube {

	public function __construct() {

    	$this->CI =& get_instance();
		$this->CI->load->model('M_product', 'product');

	}

	public function replaceLink($url) {

		if( (substr($url, 0, 1) == '/' && (substr($url, 6, 1) == '/')) || 
			(substr($url, 0, 1) == 'i' && (substr($url, 4, 1) == '/')) || 
			(substr($url, 0, 1) == 'i' && (substr($url, 6, 1) == '0')) || 
			(substr($url, 0, 1) == '/' && (substr($url, 5, 1) == '/'))
		) {
			$newPath = 'http://img1.yiwugou.com/';
		} else if( (substr($url, 0, 1) == '/' && (substr($url, 6, 1) != '/')) ||
				   (substr($url, 1, 1) != 'i' && (substr($url, 6, 1) != '/'))
		) {
			$newPath = 'http://img1.yiwugou.com/i000';
		} else if(substr($url, 0, 4) == 'http') {
				$newPath = '';
		}
			return $newPath;
    }

	public function setPrice($sellPrice) {

		$marginParameter 	= $this->CI->product->getMarginPrice();
		$convertRate		= $this->CI->product->getConvertRate();

		//FORMAT THE PRICE 
		$initialPrice =  $sellPrice/100;
	                
		//Times the price to the convert rate
		$convertPrice = $initialPrice * $convertRate;

		//Get margin parameter
		$marginPrice = $convertPrice * $marginParameter;
	                
		//Set the final price
		$finalPrice = $convertPrice + $marginPrice;

		//Round the Price
		$price = ceil($finalPrice);

		return $price;
	
	}

	public function getCorrectPrice($items, $productList) {

		//Item Quantity
		$totalItems = $items;
		
		//Loop through each pricelist for correct value
		foreach($productList as $quantity) {

			if($quantity['endNumber'] == 0 || $quantity['endNumber'] == 1 || ($quantity['startNumber'] > $quantity['endNumber']) ) {
				$finalQty = $quantity['startNumber'] + 999999;
			} else {
				$finalQty = $quantity['endNumber'];
			}

			if($totalItems >= $quantity['startNumber'] && $totalItems <= $finalQty) {
				
				$data['price'] 		= $this->setPrice($quantity['sellPrice']);
				$data['start']		= $quantity['startNumber'];
				$data['end']		= $quantity['endNumber'];
				
				return $data;
			}

		}

	}

	public function changeItemMatric($matrics) {

		//CONVERT THE QUANTITY IF IT'S CHINESE SYMBOL
		if($matrics == '个') {
			$matric = 'Pcs';
		} else if($matrics == '套') {
			$matric = 'Set';
		} else {
			$matric = $matrics;
		}

		return $matric;

	}

	public function priceNotEmpty($paramOne) {

		if(strlen($paramOne) <= 7 || $paramOne != 0) {
			return true;
		} else {
			return false;
		}
	}

	public function priceEmpty($paramOne) {

		if(strlen($paramOne) >= 7 || strlen($paramOne) == 0 || $paramOne == 0) {
			return true;
		} else {
			return false;
		}

	}
  
	public function logoutAccount() {

        $this->session->unset_userdata('FIRST_NAME');
		$this->session->unset_userdata('LAST_NAME');
		$this->session->unset_userdata('PHONE');
		$this->session->unset_userdata('EMAIL');
		$this->session->unset_userdata('ADDRESS');
		$this->session->unset_userdata('COUNTRY');
		$this->session->unset_userdata('PROVINCE');
		$this->session->unset_userdata('USERID');
		$this->session->unset_userdata('ZIP');
		$this->session->unset_userdata('LOGGED_IN');

		return true;

	}

}