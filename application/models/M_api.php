<?php class M_api extends CI_Model{
	
	function __construct() {
		parent::__construct();
	}

	function insertMember($data){
		$this->db->insert('g_member', $data);
	}

	function getKey($key) {

		$this->db->select('*');
		$this->db->from('s_api');
		$this->db->where('API_KEY', $key);

		$query = $this->db->get();

		return $query;

	}

}