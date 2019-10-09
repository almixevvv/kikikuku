<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {

	public function __construct() {
						parent::__construct();

						$this->load->library('cart');
						$this->load->library('session');
						$this->load->helper('form');
						$this->load->model('M_product', 'product');
						// $this->output->enable_profiler(TRUE);
	}

	public function mycart(){

		$randomPage = mt_rand(1, 500);

		$url  = file_get_contents("http://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&s=1001105&pageSize=4&cpage=".$randomPage);
		$obj 	= json_decode($url, TRUE);

		$data['recomended'] = $obj;

		//FOR DEBUGGING PURPOSE ONLY
		// foreach($json['prslist'] as $list) {
		// 	echo 'Title '.$list['title']."</br>";
		// 	echo 'Name '.$list['shopName']."</br>";
		// 	echo 'Picture '.$list['picture2'];
		// }
		//
		// die();;

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('pages/cart/mycart', $data);
    $this->load->view('templates/footer');

	}

	public function addtocart(){

		if($this->input->post('customer-notes') == null) {
			$productNotes = '';
		} else {
			$productNotes = $this->input->post('customer-notes');
		}

		//input item to session
		$itemArray = array(
			'id' => $this->input->post('product-id'),
			'qty' => $this->input->post('quantity'),
			'price' => $this->input->post('product-price'),
			'name' => $this->input->post('product-name'),
			'notes' => $productNotes
		);

		if($this->cart->insert($itemArray)) {
			redirect('mycart');
		} else {
			redirect('mycart');
		}
	}

	public function cartToSession() {

		//CHECK IF THERE'S A LOGIN SESSION OR NOT

		$member_id = $this->session->userdata('USERID');

		if($member_id == null) {
			redirect(base_url('login?error=4'));
		}

		//SET FINAL QUANTITY AND TOTAL PRICE
		$newdata = array(
        'totalQuantity'  => $this->input->post('totalItems'),
        'totalPrice'     => $this->input->post('totalPrice')
		);

		$this->session->set_userdata($newdata);

		//SET EACH ITEM PRICE FOR COMPARISON
		$counter = $this->input->post('totalQty');
		for($i = 0; $i < $counter; $i++) {
			$this->session->set_userdata('item-price-'.$i, $this->input->post('total-price-'.$i));
			$this->session->set_userdata('item-name-'.$i, $this->input->post('product-name-'.$i));
		}

		$productNotes = $this->input->post('customer-notes');

		redirect('cart/checkout');

	}

	public function removeCartItem() {

		$getRowID = $this->input->get('rowid');

		$data = array(
            'rowid' => $getRowID,
            'qty' => 0,
    );

		if($this->cart->update($data)) {
			echo 'sukses';
		} else {
			echo 'salah';
		}

	}

	public function sendOrderDetails() {


		$this->load->view('email-template/order-created');

	}

}
