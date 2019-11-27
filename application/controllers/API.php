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
		// $this->output->enable_profiler(TRUE);

		//DEBUG LAST QUERY
		// echo $this->db->last_query()
		
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
			$checkPassword = $this->user->checkPassword($password);
			
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

					//Get user details
					$loginUser = $this->user->loginUser($email, $password);

					foreach($loginUser->result() as $data) {

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

		$hashTrans = sha1(date("Y/m/d"));

		$itemArray = array(
			'CART_ID' => $hashTrans,
			'PRODUCT_BUYER' => $this->input->post('product-buyer'),
			'PRODUCT_ID' => $this->input->post('product-id'),
			'PRODUCT_QUANTITY' => $this->input->post('quantity'),
			'PRODUCT_PRICE' => $this->input->post('product-price'),
			'PRODUCT_NAME' => $this->input->post('product-name'),
			'PRODUCT_NOTES' => $this->input->post('customer-notes')
		);

		if($this->input->post('product-name') != null && $this->input->post('quantity') != null && $this->input->post('product-id') != null) {
			$query = $this->carts->insertCartData($itemArray);
		} else {
			$query = false;
		}

		if($query) {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'cart inserted',
				'code' 		=> REST_Controller::HTTP_ACCEPTED
			], REST_Controller::HTTP_ACCEPTED);
		} else {
			$this->response([
				'status' 	=> 'error',
				'message' 	=> 'item not inserted',
				'code' 		=> REST_Controller::HTTP_BAD_REQUEST,
			], REST_Controller::HTTP_BAD_REQUEST);
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

			$cartID = $count[$i]['CART_ID'];

		}

		$json = json_encode($data);

		if(count($count) > 0) {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'cart item found',
				'code' 		=> REST_Controller::HTTP_ACCEPTED,
				'cart_id'	=> $cartID,
				'item'      => json_decode($json, true),
			], REST_Controller::HTTP_ACCEPTED);
		} else {
			$this->response([
				'status' 	=> 'ok',
				'message' 	=> 'no user history found',
				'code' 		=> REST_Controller::HTTP_OK,
				'cart_id'	=> $cartID,
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

		$parse = json_encode($json);

		// var_dump($parse);


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

	//Get category with child

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