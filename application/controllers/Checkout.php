<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Checkout extends CI_Controller {

      public function index() {

        // $this->output->enable_profiler(TRUE);

        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('M_cart', 'carts');

        $data['userData'] = $this->carts->getUserDetails($this->session->userdata('EMAIL'));

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/cart/checkout', $data);
        $this->load->view('templates/footer');

      }

      public function checkoutProcess() {

    		date_default_timezone_set('Asia/Jakarta');

    		// $this->output->enable_profiler(TRUE);
    		$this->load->library('cart');
    		$this->load->library('session');
    		$this->load->model('M_cart', 'carts');


    		$member_id      = $this->session->userdata('USERID');
    		$genID          = $this->carts->generateID();
    		$totalPrice     = $this->session->userdata('totalPrice');

    		if($member_id == null) {
    			redirect(base_url('login?error=4'));
    		}

    		$orderName      = $this->input->post('txt-name');
    		$orderEmail     = $this->input->post('txt-email');
    		$orderPhone     = $this->input->post('txt-phone');
    		$orderAddress1  = $this->input->post('txt-address-1');
    		$orderAddress2  = $this->input->post('txt-address-2');
    		$orderCountry   = $this->input->post('txt-country');
    		$orderZIP       = $this->input->post('txt-zip');
    		$orderState     = $this->input->post('txt-state');


    		$data = array(
    			'ORDER_NO'     => $genID,
    			'ORDER_DATE'   => date('Y-m-d h:i:s'),
    			'MEMBER_ID'    => $member_id,
    			'MEMBER_NAME'  => $orderName,
    			'MEMBER_PHONE' => $orderPhone,
    			'MEMBER_EMAIL' => $orderEmail,
    			'TOTAL_ORDER'  => $totalPrice,
    			'STATUS'       => 'NEW ORDER',
    			'ADDRESS_1'    => $orderAddress1,
    			'ADDRESS_2'    => $orderAddress2,
    			'COUNTRY'      => $orderCountry,
    			'ZIP'          => $orderZIP,
    			'STATE'        => $orderState
    		);

    		$this->carts->insertMasterData($data);

    		$counter = 0;
    		foreach($this->cart->contents() as $items) {
    				//CHECK IF PRODUCT FROM API OR NOT
    				if(substr($items['id'], 1, 1) != 'P') {
    						$flag = '1';
    				} else {
    						$flag = '2';
    				}

    			$itemPrice = $this->session->userdata('item-price-'.$counter);
          $itemName = $this->session->userdata('item-name-'.$counter);

    			$details = array(
    				'FLAG'            => $flag,
    				'ORDER_NO'        => $genID,
    				'QUANTITY'        => $items['qty'],
    				'PROD_ID'         => $items['id'],
                    'PROD_NAME'       => $itemName,
    				'WEIGHT'          => '0',
    				'PRICE'           => $itemPrice,
    				'FINAL_PRICE'     => $itemPrice,
    				'NOTES'           => $items['notes']
    			);

    			$counter++;
    			$this->carts->insertOrderDetail($details);
    		}

    		//Count all the items on the Cart
    		$row = count($this->cart->contents());

    		//Check if all data is succesfully inserted, or there's an error
    		if($row == $counter) {
    			$this->cart->destroy();
    			redirect(base_url('order/success'));
          // echo 'something is right';
    		} else {
          // echo 'something wrong';
          redirect(base_url('order/success'));
    		}

    	}

      public function checkoutSuccess() {

        $this->load->view('templates/header');
    	$this->load->view('templates/navbar');
    	$this->load->view('pages/cart/order-success');
        $this->load->view('templates/footer');

      }


  }
