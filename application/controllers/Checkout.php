<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Checkout extends CI_Controller {

    public function __construct() {
        
        parent::__construct();

        $this->load->model('M_product', 'product');
        $this->load->model('M_profile', 'profiles');
        $this->load->model('M_cart', 'carts');
        
        // $this->output->enable_profiler(TRUE);
    }

    public function index() {

        $data['userData'] = $this->carts->getUserDetails($this->session->userdata('EMAIL'));

        $data['sectionName'] = 'Checkout';

        $member_id = $this->session->userdata('USERID');

        if($member_id == null) {
            redirect(base_url());
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('pages/cart/checkout', $data);
        $this->load->view('templates/footer');

      }

      public function checkoutProcess() {

    	$member_id      = $this->session->userdata('USERID');
    	$genID          = $this->carts->generateID();
    	$totalPrice     = $this->session->userdata('totalPrice');

    	if($member_id == null) {
    		$this->session->set_flashdata('cart', 'no_user');
            redirect(base_url('login?refer=mycart'));
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

        //Replace the item name
        

    	$details = array(
    		'FLAG'            => $flag,
    		'ORDER_NO'        => $genID,
            'PROD_ID'         => $items['id'],
    		'QUANTITY'        => $items['qty'],
    		'WEIGHT'          => '0',
    		'PRICE'           => $itemPrice,
    		'FINAL_PRICE'     => $itemPrice,
            'POSTAGE'         => 0.00,
    		'NOTES'           => $items['notes']
    	);

    		$counter++;
    		$this->carts->insertOrderDetail($details);
    	}

    	//Count all the items on the Cart
    	$row = count($this->cart->contents());

    	//Check if all data is succesfully inserted, or there's an error
    	if($row == $counter) {
    		
            /* DELETE ALL SESSION ITEM */
            $this->cart->destroy();

            for($item = 0; $item < $counter; $item++) {
                $this->session->unset_userdata('item-price-'.$item);
                $this->session->unset_userdata('item-notes-'.$item);
            }

            $this->session->unset_userdata('totalQuantity');
            $this->session->unset_userdata('totalPrice');

            $this->session->set_flashdata('inquiry', 'created');
            redirect(base_url());
    	} else {
            $this->session->set_flashdata('inquiry', 'failed');
            redirect(base_url());
    	}

    }

    public function getMemberData() {

        $email = $this->input->post('email');

        $userData = $this->profiles->getMemberDetails($email);

        header("Content-Type: application/json");
        echo json_encode($userData->result());

    }


  }
