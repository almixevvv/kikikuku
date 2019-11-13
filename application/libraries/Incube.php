<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Incube {

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

        	//FORMAT THE PRICE 
	      	$initialPrice =  $data['sellPrice']/100;
	                
	      	//Times the price to the convert rate
	      	$convertPrice = $initialPrice * CONVERT;

	      	//Get margin parameter
	      	$marginPrice = $convertPrice * $marginParameter;
	                
	      	//Set the final price
	      	$finalPrice = $convertPrice + $marginPrice;

	      	//Round the Price
	      	$price = ceil($finalPrice);

	      	return $price;

        }

}