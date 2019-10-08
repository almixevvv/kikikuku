<?php
class M_reset extends CI_Model{

	function __construct() {
		parent::__construct();
	}

  function getResetStatus($email) {

		$this->db->select('*');
		$this->db->from('g_reset_password');
		$this->db->where('USER_EMAIL', $email);

		$query = $this->db->get();

		return $query;

	}

}
