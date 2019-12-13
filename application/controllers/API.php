<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class API extends REST_Controller {

	public function __construct() {
		
		parent::__construct();

		$this->load->model('M_api', 'api');
		$this->load->model('M_user', 'user');
		$this->load->model('M_cart', 'carts');
		$this->load->model('M_category', 'category');
		$this->load->library('email');
		$this->load->library('incube');
		// $this->output->enable_profiler(TRUE);

		//DEBUG LAST QUERY
		echo $this->db->last_query();
		
	}

		//CUSTOM HOME PAGE
		public function home_get() {

			$randomPage = mt_rand(1, 500);
			$pageSize   = $this->input->get('pageSize');
			$counter    = 0;
		
			$json 	= file_get_contents("https://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&pageSize=".$pageSize."&cpage=".$randomPage);
			$obj 	= json_decode($json, true);
			
			$result = array();
	
			foreach($obj['prslist'] as $list) {
	
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($list['picture2']);
	
				$result[$counter]['ID'] 			= $list['id'];
				$result[$counter]['TITLE']			= $list['title'];
				$result[$counter]['PICTURE']		= $newPath.$list['picture2'];
				// $result[$counter]['ORIGINAL_PRICE']	= $list['sellPrice'];
				$result[$counter]['START_QUANTITY'] = $list['startNumber'];
	
				if($list['priceType'] == '0') {
					$result[$counter]['PRICE']			= 'Price Negotiable';
				} else {
					$price = $this->incube->setPrice($list['sellPrice']);
					// $result[$counter]['PRICE']			= number_format($price, 2, '.', ',');
					$result[$counter]['PRICE']			= $price;
				}
	
				$counter++;
	
			}
	
			$jsonResult = json_encode($result);
	
			$this->response([
				'status' 	=> 'ok',
				'pageSize' 	=> $pageSize,
				'code' 		=> REST_Controller::HTTP_ACCEPTED,
				'item'      => json_decode($jsonResult, true),
			], REST_Controller::HTTP_ACCEPTED);
		
		}

		//SEARCH CUSTOM PAGE
		public function search_get() {

			$randomPage 	= mt_rand(1, 500);
			$pageSize   	= $this->input->get('pageSize');
			$searchQuery 	= $this->input->get('query'); 
			$counter    	= 0;
		
			$json 	= file_get_contents("https://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&q=".$searchQuery."&pageSize=".$pageSize."&cpage=".$randomPage);
			$obj 	= json_decode($json, true);
			
			$result = array();
	
			if($obj['prslist'] == null) {
	
				$this->response([
					'status' 		=> 'ok',
					'pageSize' 		=> $pageSize,
					'searchQuery'	=> $searchQuery,
					'code' 			=> REST_Controller::HTTP_ACCEPTED,
					'item'      	=> 'No Product Found',
				], REST_Controller::HTTP_ACCEPTED);

			} else {

				foreach($obj['prslist'] as $list) {
	
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($list['picture2']);
		
					$result[$counter]['ID'] 			= $list['id'];
					$result[$counter]['TITLE']			= $list['title'];
					$result[$counter]['PICTURE']		= $newPath.$list['picture2'];
					// $result[$counter]['ORIGINAL_PRICE']	= $list['sellPrice'];
					$result[$counter]['START_QUANTITY'] = $list['startNumber'];
		
					if($list['priceType'] == '0') {
						$result[$counter]['PRICE']			= 'Price Negotiable';
					} else {
						$price = $this->incube->setPrice($list['sellPrice']);
						// $result[$counter]['PRICE']			= number_format($price, 2, '.', ',');
						$result[$counter]['PRICE']			= $price;
					}
		
					$counter++;
		
				}
		
				$jsonResult = json_encode($result);
		
				$this->response([
					'status' 		=> 'ok',
					'pageSize' 		=> $pageSize,
					'searchQuery'	=> $searchQuery,
					'code' 			=> REST_Controller::HTTP_ACCEPTED,
					'item'      	=> json_decode($jsonResult, true),
				], REST_Controller::HTTP_ACCEPTED);

			}

		}
	
		//Get Product From Category
		public function categoryProduct_get() {
	
			$randomPage = mt_rand(1, 500);
			$pageSize   = $this->input->get('pageSize');
			$categoryID = $this->input->get('category');
			$counter    = 0;
		
			$json 	= file_get_contents("http://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&s=".$categoryID."&pageSize=".$pageSize."&cpage=".$randomPage);
			$obj 	= json_decode($json, true);
			
			$result = array();
			
			if($obj['prslist'] == null) {
	
				$this->response([
					'status' 		=> 'ok',
					'pageSize' 		=> $pageSize,
					'categoryID'	=> $categoryID,
					'code' 			=> REST_Controller::HTTP_ACCEPTED,
					'item'      	=> 'No Product Found',
				], REST_Controller::HTTP_ACCEPTED);

			} else {

				foreach($obj['prslist'] as $list) {
	
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($list['picture2']);
		
					$result[$counter]['ID'] 			= $list['id'];
					$result[$counter]['TITLE']			= $list['title'];
					$result[$counter]['PICTURE']		= $newPath.$list['picture2'];
					// $result[$counter]['ORIGINAL_PRICE']	= $list['sellPrice'];
					$result[$counter]['START_QUANTITY'] = $list['startNumber'];
		
					if($list['priceType'] == '0') {
						$result[$counter]['PRICE']			= 'Price Negotiable';
					} else {
						$price = $this->incube->setPrice($list['sellPrice']);
						// $result[$counter]['PRICE']			= number_format($price, 2, '.', ',');
						$result[$counter]['PRICE']			= $price;
					}
		
					$counter++;
		
				}

				$jsonResult = json_encode($result);
	
				$this->response([
					'status' 		=> 'ok',
					'pageSize' 		=> $pageSize,
					'categoryID'	=> $categoryID,
					'code' 			=> REST_Controller::HTTP_ACCEPTED,
					'item'      	=> json_decode($jsonResult, true),
				], REST_Controller::HTTP_ACCEPTED);

			}
	
	}

	//Get Product Detail
	public function product_get() {

		$id			= $this->input->get('id');
		$counter 	= 0;
		$finalUrl   = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$id;

		$json 	= file_get_contents($finalUrl);
		$obj 	= json_decode($json, true);

		$productForApp['TITLE'] 	= ucwords($obj['detail']['productForApp']['title']);
		$productForApp['MATRIC']	= ucwords($this->incube->changeItemMatric($obj['detail']['productForApp']['matrisingular']));
		$productForApp['DETAILS']	= ucwords($obj['detail']['productForApp']['introduction']);

		//FIX FOR IMAGE
		if($obj['detail']['sdiProductsPicList'] == null) {
			
			if($obj['detail']['productForApp']['picture'] != null) {
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture']);
				$productForApp['PICTURE_LIST']['PICTURE1'] = $newPath.$obj['detail']['productForApp']['picture'];
			}

			if($obj['detail']['productForApp']['picture1'] != null) {	
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture1']);
				$productForApp['PICTURE_LIST']['PICTURE2'] = $newPath.$obj['detail']['productForApp']['picture1'];
			}

			if($obj['detail']['productForApp']['picture2'] != null) {
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture2']);
				$productForApp['PICTURE_LIST']['PICTURE3'] = $newPath.$obj['detail']['productForApp']['picture2'];
			}

			if($obj['detail']['productForApp']['picture3'] != null) {
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture3']);
				$productForApp['PICTURE_LIST']['PICTURE4'] = $newPath.$obj['detail']['productForApp']['picture3'];
			}

			if($obj['detail']['productForApp']['picture4'] != null) {
				//Use custom library for Image Formating
				$newPath = $this->incube->replaceLink($obj['detail']['productForApp']['picture4']);
				$productForApp['PICTURE_LIST']['PICTURE5'] = $newPath.$obj['detail']['productForApp']['picture4'];
			}

		} else {

			foreach($obj['detail']['sdiProductsPicList'] as $picture) {

				if($picture['picture'] != null) {
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($picture['picture']);
					$productForApp['PICTURE_LIST']['PICTURE1'] = $newPath.$picture['picture'];
	
				}
	
				if($picture['picture1'] != null) {
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($picture['picture1']);
					$productForApp['PICTURE_LIST']['PICTURE2'] = $newPath.$picture['picture1'];
					
				}
	
				if($picture['picture2'] != null) {
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($picture['picture2']);
					$productForApp['PICTURE_LIST']['PICTURE3'] = $newPath.$picture['picture2'];
					
				}
	
				if($picture['picture3'] != null) {
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($picture['picture3']);
					$productForApp['PICTURE_LIST']['PICTURE4'] = $newPath.$picture['picture3'];
					
				}
	
				if($picture['picture4'] != null) {
					//Use custom library for Image Formating
					$newPath = $this->incube->replaceLink($picture['picture4']);
					$productForApp['PICTURE_LIST']['PICTURE5'] = $newPath.$picture['picture4'];
					
				}

			}

		}

		//CREATE PRICE LIST
		if($obj['detail']['sdiProductsPriceList'] == null) {
			
			//Check if the price is appropriate
			if($this->incube->priceEmpty($obj['detail']['productForApp']['sellPrice'])) {
				$productForApp['PRICE']['STARTING_PRICE'] = 'Price Negotiable';
				$productForApp['PRICE']['STARTING_QUANTITY'] = '1';
			} else {
				$price = $this->incube->setPrice($obj['detail']['productForApp']['sellPrice']);
				// $productForApp['PRICE']['STARTING_PRICE'] = number_format($price, 2, '.', ',');
				$productForApp['PRICE']['STARTING_PRICE'] = $price;
				$productForApp['PRICE']['STARTING_QUANTITY'] = '1';
			}

		} else {

			//Loop through each prize
			foreach($obj['detail']['sdiProductsPriceList'] as $priceList) {

				$price = $this->incube->setPrice($priceList['sellPrice']);

				$productForApp['PRICE'][$counter]['PRICE'] 				= $price;
				$productForApp['PRICE'][$counter]['STARTING_QUANTITY'] 	= $priceList['startNumber'];

				if($priceList['endNumber'] == 0) {
					$productForApp['PRICE'][$counter]['ENDING_QUANTITY'] 	= 'Above '.$priceList['startNumber'];
				} else {
					$productForApp['PRICE'][$counter]['ENDING_QUANTITY'] 	= $priceList['endNumber'];
				}

				//$productForApp['PRICE'][$counter]['PRICE'] 					= number_format($price, 2, '.', ',');

				$counter++;

			}

		}

		
		$jsonResult = json_encode($productForApp);

		$this->response([
			'status' 		=> 'ok',
			'productID' 	=> $id,
			'code' 			=> REST_Controller::HTTP_ACCEPTED,
			'item'      	=> json_decode($jsonResult, true),
		], REST_Controller::HTTP_ACCEPTED);

	}

	public function index_get() {

		$this->response([
			'status' => 'error',
			'message' => 'api path error',
			'code' => REST_Controller::HTTP_NOT_FOUND
		], REST_Controller::HTTP_NOT_FOUND);

	}
  
  	//DEBUG GET ALL MEMBER
	public function register_get() {

		$data = $this->api->getMembers()->result();
		$count = $this->api->getMembers()->num_rows();

		$this->response([
			'status' => 'success',
			'total' => $count,
			'message' => $data
		], REST_Controller::HTTP_ACCEPTED);

	}

	//REGISTER USER
	public function register_post() {

		/* POST API PARAMETER */
		$fName 		= $this->input->post('firstName');
		$lName 		= $this->input->post('lastName');
		$phone 		= $this->input->post('phone');
		$email 		= $this->input->post('email');
		$country 	= $this->input->post('country');
		$address1 	= $this->input->post('address1');
		$address2 	= $this->input->post('address2');
		$password 	= $this->input->post('pass');
		$state 		= $this->input->post('province');
		$zip 		= $this->input->post('zip');
		$password   = $this->input->post('password');

		/* FORMAT BUAT TANGGAL HARUS STRING DD/MM/YYYY */
		$date 		= $this->input->post('birthdate');


		//CHECK IF THE EMAIL IS ALREADY REGISTERED OR NOT
		$checkEmail = $this->api->checkExistingEmail($email);

		if($checkEmail->num_rows() > 0) {
			
			$this->response([
				'status' 		=> 'error',
				'message' 		=> 'user already exists',
				'code' 			=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else {

			$hashPassword = sha1($password);
			$hashEmail = sha1($email);

			$formatDate = strtotime($date);

			$data = array(
				'FIRST_NAME' 	=> $fName,
				'LAST_NAME' 	=> $lName,
				'JOIN_DATE' 	=> date("Y/m/d h:i:s"),
				'BIRTH_DATE' 	=> date('Y-m-d',$formatDate),
				'PHONE' 		=> $phone,
				'ADDRESS' 		=> $address1,
				'ADDRESS_2' 	=> $address2,
				'COUNTRY' 		=> $country,
				'PROVINCE' 		=> $state,
				'ZIP' 			=> $zip,
				'EMAIL' 		=> $email,
				'PASSWORD' 		=> $hashPassword,
				'STATUS' 		=> 'PENDING',
				'HASH' 			=> $hashEmail
			);

			$query = $this->api->insertMember($data);

			if(!$query) {

				$data['email'] = $email;
				$data['hash'] = sha1($email);

				//Disable this for debug only
				//$this->load->view('email-template/verification-email', $data);
				$config['smtp_user']   = 'admin@kikikuku.com';
				$config['smtp_pass']   = 'nOX-D8NlrF#Z';
				$config['smtp_port']   = 25;
				$config['charset']     = 'utf-8';
				$config['wordwrap']    = TRUE;
				$config['mailtype']    = 'html';
				
				$this->email->initialize($config);

				$this->email->from('admin@kikikuku.com', 'Kikikuku Team');
				$this->email->to($email);
				$this->email->set_mailtype('html');

				$message = $this->load->view('email-template/verification-email', $data, true);

				$this->email->subject('Please confirm your email address');
				$this->email->message($message);

				$this->email->send();

				$this->response([
					'status' 	=> 'success',
					'message' 	=> 'registration successful',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);
			} else {
				$this->response([
					'status' 	=> 'error',
					'message' 	=> 'bad request',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		}

	}

	public function login_post() {

		//HASHING DI BACKEND
		$email = trim($this->input->post('email'));
		$password = $this->input->post('password');

		//CHECK IF EMAIL IS USED OR NOT
		$emailQuery = $this->api->checkExistingEmail($email);

		//Check if email exists
		if($emailQuery->num_rows() == 0) {

			$this->response([
				'status' 	=> 'error',
				'message' 	=> "this email doesn't exist",
				'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else {

			//Check if password is correct
			$checkPassword = $this->user->checkPassword($email, $password);
			
			if($checkPassword->num_rows() == 0) {
				//Wrong Password
				$this->response([
					'status' 	=> 'error',
					'message' 	=> "wrong password",
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
				], REST_Controller::HTTP_BAD_REQUEST);
			} else {

				$checkVerified = $this->user->checkVerified($email);

				if($checkVerified->num_rows() == 0) {

					$this->response([
						'status' 	=> 'error',
						'message' 	=> "this account is not verified",
						'code' 		=> REST_Controller::HTTP_BAD_REQUEST
					], REST_Controller::HTTP_BAD_REQUEST);

				} else {
					foreach($checkPassword->result() as $data) {

						$dataSess = array(
							'FIRST_NAME' => $data->FIRST_NAME,
							'LAST_NAME' => $data->LAST_NAME,
							'PHONE' => $data->PHONE,
							'EMAIL' => $data->EMAIL,
							'ADDRESS' => $data->ADDRESS,
							'COUNTRY' => $data->COUNTRY,
							'PROVINCE' => $data->PROVINCE,
							'USERID' => $data->ID,
							'ZIP' => $data->ZIP,
			 			  	'LOGGED_IN'=> TRUE
		 				);

					}

					$this->response([
						'status' 	=> 'ok',
						'message' 	=> "user found",
						'code' 		=> REST_Controller::HTTP_ACCEPTED,
						'user_data' => $dataSess
					], REST_Controller::HTTP_ACCEPTED);

				}

			}

		}

	}

	//Add item to cart
	public function cart_post() {

		$totalQty = 0;

		$hashID = sha1($this->input->post('product-buyer'));

		$itemArray = array(
			'CART_ID' 			=> $hashID,
			'PRODUCT_ID' 		=> $this->input->post('product-id'),
			'PRODUCT_QUANTITY' 	=> $this->input->post('quantity'),
			'PRODUCT_PRICE' 	=> $this->input->post('product-price'),
			'PRODUCT_NAME' 		=> $this->input->post('product-name'),
			'PRODUCT_NOTES' 	=> $this->input->post('customer-notes'),
			'PRODUCT_IMAGES' 	=> $this->input->post('product-images'),
			'PRODUCT_BUYER' 	=> $this->input->post('product-buyer')
		);

		$finalUrl   = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$this->input->post('product-id');
		$obj 		= json_decode($finalUrl, true);

		if($this->input->post('product-name') == null) { 
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'product name cannot be empty',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else if($this->input->post('quantity') == null) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'quantity cannot be empty',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else if($this->input->post('product-id') == null) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'product id cannot be empty',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else if($this->input->post('quantity') <= 0) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'quantity cannot be 0 or lower',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else if($this->input->post('product-price') == null) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'price cannot be empty',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else if($this->input->post('product-price') <= 0) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'price cannot be 0 or lower',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);
		} else if($this->input->post('product-buyer') == null) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'product buyer cannot be empty',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);
		} else if($obj == null) {
			$this->response([
					'status' 	=> 'error',
					'message' 	=> 'invalid product id',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else {

			//CHECK IF THE ITEM IS EXIST OR NOT
			$itemResult = $this->carts->getItemInfo($this->input->post('product-id'), $this->input->post('product-buyer'));

			if($itemResult->num_rows() > 0) {
			
				//DO SOMETHING ELSE
				$currentQty = $itemResult->result()[0]->PRODUCT_QUANTITY;
				$totalQty = $currentQty + $this->input->post('quantity');

				$dataArray = array(
					'PRODUCT_QUANTITY' => $totalQty
				);
				
				// UPDATE QUANTITY
				$this->carts->updateCartQuantity($dataArray, $this->input->post('product-buyer'), $this->input->post('product-id'));
				
				$this->response([
					'status' 	=> 'ok',
					'message' 	=> 'cart quantity updated',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);

			} else {
				$this->carts->insertCartData($itemArray);
				
				$this->response([
					'status' 	=> 'ok',
					'message' 	=> 'cart inserted',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);
			}

		}

	}

	//Delete the items
	public function cart_delete() {

		$hashTrans 		= sha1(date("Y/m/d"));
		$productID 		= $this->delete('product-id');
		$productBuyer 	= $this->delete('product-buyer');

		$queryDelete = $this->carts->deleteItem($hashTrans, $productID, $productBuyer);

		if($queryDelete) {

			//Query successfull
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'item deleted',
				'code' 		=> REST_Controller::HTTP_OK,
			], REST_Controller::HTTP_OK);
		} else {

			//Query failed
			$this->response([
				'status' 	=> 'error',
				'message' 	=> 'item cannot be deleted',
				'code' 		=> REST_Controller::HTTP_BAD_REQUEST,
			], REST_Controller::HTTP_BAD_REQUEST);
		}

	}

	//Update the cart content
	public function cart_put() {

		$productID 		= $this->put('product-id');
		$productBuyer 	= $this->put('product-buyer');
		$newQty			= $this->put('product-quantity');
		$newNotes		= $this->put('product-notes');

		$updateArray = array(
			'PRODUCT_QUANTITY'	=> $newQty,
			'PRODUCT_NOTES'		=> $newNotes
		);

		$updateQuery = $this->carts->updateCartContents($productID, $productBuyer, $updateArray);

		if($updateQuery) {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'item updated',
				'code' 		=> REST_Controller::HTTP_ACCEPTED,
			], REST_Controller::HTTP_ACCEPTED);
		} else {
			$this->response([
				'status' 	=> 'error',
				'message' 	=> 'item not updated',
				'code' 		=> REST_Controller::HTTP_BAD_REQUEST,
			], REST_Controller::HTTP_BAD_REQUEST);
		}

	}

	//Get the cart content based from email and trans date
	public function cart_get() {

		$data = array();

		$hashTrans = sha1(date("Y/m/d"));
		$email = $this->input->get('email');

		$result = $this->carts->getCartItems($hashTrans, $email);

		$count = $result->result_array();

		for($i = 0; $i < count($count); $i++) {

			$data[$i]['PRODUCT_ID'] 		= $count[$i]['PRODUCT_ID'];
			$data[$i]['PRODUCT_QUANTITY'] 	= $count[$i]['PRODUCT_QUANTITY'];
			$data[$i]['PRODUCT_PRICE'] 		= $count[$i]['PRODUCT_PRICE'];
			$data[$i]['PRODUCT_NAME'] 		= $count[$i]['PRODUCT_NAME'];
			$data[$i]['PRODUCT_NOTES'] 		= $count[$i]['PRODUCT_NOTES'];
			$data[$i]['PRODUCT_BUYER'] 		= $count[$i]['PRODUCT_BUYER'];

		}

		$json = json_encode($data);

		if(count($count) > 0) {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'cart item found',
				'code' 		=> REST_Controller::HTTP_ACCEPTED,
				'item'      => json_decode($json, true),
			], REST_Controller::HTTP_ACCEPTED);
		} else {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'no cart history found',
				'code' 		=> REST_Controller::HTTP_OK,
				'item'      => json_decode($json, true),
			], REST_Controller::HTTP_OK);
		}

	}

	//Get category
	public function category_get() {

		$childArray 	= array();
		$parentArray	= array();
		$parent 		= $this->category->getParentCategory();

		foreach($parent->result() as $parents) {

			$parentArray[] = array(
				'NAME' 			=> $parents->NAME,
				'LINK'			=> $parents->LINK,
				'ID'			=> $parents->ID,
				'PARENT'		=> $parents->PARENT,
				'PICTURE'		=> $parents->PICTURE
			);
		}

		for($i = 0; $i < count($parentArray); $i++) {

			$child 		= $this->category->getChildCategory($parentArray[$i]['ID']);

			foreach($child->result() as $child) {

				$childArray[] = array(
					'CHILD_NAME'	=> $child->NAME,
					'CHILD_LINK'	=> $child->LINK
				);
			}
			
			array_push($parentArray[$i], $childArray);
		}

		$json = json_encode($parentArray);

		$this->response([
			'status' 		=> 'ok',
			'message' 		=> 'category list',
			'code' 			=> REST_Controller::HTTP_OK,
			'category_list'	=> json_decode($json, true)
		], REST_Controller::HTTP_OK);
	}

	//Create Inquiry
	public function inquiry_post() {

		$json = file_get_contents('php://input');
		$parse = json_decode($json);

		$inquiryData = array();
		$itemData	 = array();
		$counter     = 1;
		$genID       = $this->carts->generateID();

		foreach($parse as $item) {
			
			foreach($item->inquiry as $details) {
				
				$inquiryData['ORDER_NO'] 		 = $genID;
				$inquiryData['ORDER_DATE'] 		 = date('Y-m-d h:i:s');
				$inquiryData['MEMBER_ID'] 		 = $details->member_id;
				$inquiryData['TOTAL_ORDER']  	 = $details->total_price;
				$inquiryData['MEMBER_NAME'] 	 = $details->member_name;
				$inquiryData['MEMBER_EMAIL'] 	 = $details->member_email;
				$inquiryData['MEMBER_PHONE'] 	 = $details->member_phone;
				$inquiryData['ADDRESS_1'] 		 = $details->member_address_1;
				$inquiryData['ADDRESS_2'] 	 	 = $details->member_address_2;
				$inquiryData['COUNTRY'] 	 	 = $details->member_country;
				$inquiryData['ZIP'] 		 	 = $details->member_zip;
				$inquiryData['STATE'] 	 		 = $details->member_state;
				$inquiryData['STATUS'] 	 		 = 'NEW ORDER';
				
				foreach($details->items as $item) {
					// echo $item->flag;
					$itemData['FLAG']			= $item->flag;
					$itemData['ORDER_NO']		= $genID;
					$itemData['PROD_ID']		= $item->prod_id;
					$itemData['QUANTITY']		= $item->quantity;
					$itemData['WEIGHT']			= $item->weight;
					$itemData['PRICE']			= $item->price;
					$itemData['FINAL_PRICE']	= $item->final_price;
					$itemData['POSTAGE']		= '0';
					$itemData['NOTES']			= $item->notes;

					$this->carts->insertOrderDetail($itemData);

					$counter++;
				}

			}
		}

		$json  = json_encode($inquiryData);
		$items = json_encode($itemData);

		$query1 = $this->carts->insertMasterData($inquiryData);

		if($query1) {

			$this->response([
				'status' 		=> 'ok',
				'message' 		=> "data inserted",
				'generated_id'	=> $genID,
				'code' 			=> REST_Controller::HTTP_ACCEPTED,
				// 'trans_details'	=> json_decode($json),
				// 'item_details'	=> json_decode($items),
			], REST_Controller::HTTP_ACCEPTED);

		} else {

			$this->response([
				'status' 		=> 'error',
				'message' 		=> "data not inserted",
				'code' 			=> REST_Controller::HTTP_BAD_REQUEST,
			], REST_Controller::HTTP_BAD_REQUEST);

		}
	}

	//Get Margin Parameter
	public function margin_get() {

		$margin 	= $this->api->getMarginParam();
		$convert 	= $this->api->getConvertRate();

		$this->response([
			'status' 		=> 'ok',
			'message' 		=> "current margin value",
			'code' 			=> REST_Controller::HTTP_ACCEPTED,
			'margin_param'	=> $margin,
			'convert_rate'  => $convert,
		], REST_Controller::HTTP_ACCEPTED);

	}

	//Get all user inquiry
	public function inquiry_get() {
		
	}

	//Verified Account
	public function verification_get() {

		$hash = $this->input->get('hash');
		$email = $this->input->get('email');

		$query = $this->api->verifyMember($hash);

		if($query->num_rows() > 0) {
			
			$update = $this->api->updateStatus($email);
			
			if($update) {
				//Account Verified
				$this->response([
					'status' 	=> 'success',
					'message' 	=> 'account verified',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);
			} else {
				//Verification Error
				$this->response([
					'status' 	=> 'error',
					'message' 	=> 'bad request',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			//Account already verified
			$this->response([
					'status' 	=> 'verified',
					'message' 	=> 'this account is already verified',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);
		}

	}

}