<?php Class M_cart extends CI_Model {

    function generateID() {
        $ads_id= $this->getiklanid();
        if ($ads_id=='0'){
            $last_ads_id=1;
        }else{
            $last_ads_id=intval(substr($ads_id, -6))+1;
        }
        $new_ads_id = "KKU".date("ym").str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        return $new_ads_id;
    }

    function getiklanid() {
        $this->db->from('g_order_master');
        $this->db->order_by("ORDER_NO","DESC");
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0){
            $ads_id= $query->first_row()->ORDER_NO;
            return $ads_id;
        }else{
            $ads_id='0';
            return $ads_id;
        }
    }

    function insertMasterData($data) {

      return $this->db->insert('g_order_master', $data);

    }

    function insertOrderDetail($data) {

      return $this->db->insert('g_order_detail', $data);

    }

    function insertPO($data){
        $this->db->set('ORDER_DATE', 'NOW()', FALSE);
        $this->db->set('UPDATED', 'NOW()', FALSE);
        $insert = $this->db->insert('g_order_master', $data);
        return $insert;
    }

    function insertDetailPO($data){
        $insert = $this->db->insert('g_order_detail', $data);
        return $insert;
    }

    function getUserDetails($email) {
      $this->db->select('*');
      $this->db->from('g_member');
      $this->db->where('EMAIL', $email);

      $query = $this->db->get();

      return $query;
    }
}
?>
