<?php
class M_profile extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	function insert_rules($data){
		$this->db->insert('g_rules', $data);
	}

	function getOrderHistory($email) {

		$this->db->select('*');
		$this->db->from('v_g_orders');
		$this->db->where('MEMBER_EMAIL', $email);

		$query = $this->db->get();

		return $query;
	}

	function getAllOrderMasterData($email) {

		$this->db->select('*');
		$this->db->from('v_g_order_master');
		$this->db->where('MEMBER_EMAIL', $email);
		$this->db->order_by('ORDER_DATE', 'DESC');

		$query = $this->db->get();

		return $query;

	}

	function getOrderMasterData($email, $status) {

		$this->db->select('*');
		$this->db->from('v_g_order_master');
		$this->db->where('MEMBER_EMAIL', $email);
		$this->db->where('STATUS_ORDER', $status);
		$this->db->order_by('ORDER_DATE', 'DESC');

		$query = $this->db->get();

		return $query;

	}

	function getOrderMessages($orderID) {

		$this->db->select('*');
		$this->db->from('g_message');
		$this->db->where('ORDER_ID', $orderID);

		$query = $this->db->get();

		return $query;
	}

	function sendMessages($data) {

		$this->db->insert('g_message', $data);

	}

	function insertImageData($data) {

		$this->db->insert('g_confirm_payment', $data);

	}

	function updatePaymentStatus($orderID) {

		$data = array(
			'STATUS' => 'CONFIRMED'
		);

		$this->db->where('ORDER_NO', $orderID);
		$this->db->update('g_order_master', $data);

	}

	function finishOrder($orderID) {

		$data = array(
			'STATUS' => 'DONE'
		);

		$this->db->where('ORDER_NO', $orderID);
		$this->db->update('g_order_master', $data);

	}

	function getOrderHistoryFromQuery($email, $query) {

		$this->db->select('*');
		$this->db->from('v_g_orders');
		$this->db->where('MEMBER_EMAIL', $email);
		$this->db->where('ORDER_STATUS', $query);

		$query = $this->db->get();

		return $query;

	}

	function getOrderMasterDataFromQuery($email, $query) {

		$this->db->select('*');
		$this->db->from('v_g_order_master');
		$this->db->where('MEMBER_EMAIL', $email);
		$this->db->where('STATUS_ORDER', $query);
		$this->db->order_by('ORDER_DATE', 'DESC');

		$query = $this->db->get();

		return $query;

	}

}
