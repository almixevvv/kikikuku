<?php Class M_cms extends CI_Model {

//------------------------------------------------------------------------------------------------------------------- LOGIN CMS
  function cms_login($email, $password) {

    	$this->db->select('*');
    	$this->db->from('s_user');
    	$this->db->where('ID', $email);
    	$this->db->where('PASS', $password);

    	$query = $this->db->get();

    	return $query;

  }

  function checkUsername($email) {

    $this->db->select('*');
    $this->db->from('s_user');
    $this->db->where('ID', $email);

    $query = $this->db->get();

    return $query;

  }

    function generateID(){
        $ads_id= $this->getiklanid();
        if ($ads_id=='0'){
            $last_ads_id=1;
        }else{
            $last_ads_id=intval(substr($ads_id, -6))+1;
        }
        $new_ads_id = "DSH".date("ym").str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        return $new_ads_id;
    }
//------------------------------------------------------------------------------------------------------------------- LOGIN CMS

//-------------------------------------------------------------------------------------------------------------------  BANNER
        function select_banner(){
            $this->db->select('*');
            $this->db->from('g_banner');

            $query = $this->db->get();

            return $query;
        }
        function select_banner_detail($id){
            $this->db->where('REC_ID',$id);
            $this->db->where('TYPE',$type);
            $this->db->where('LINK_TYPE',$link_type);
            $this->db->where('LINKTO',$linkto);
            $this->db->where('BANNER_IMAGE',$banner_img);
            $this->db->where('ORDER_NO',$order_no);
            $this->db->where('FLAG',$flag);
            $this->db->where('DESCRIPTION',$description);
            $this->db->where('CREATED',$created);
            $this->db->where('UPDATED',$updated);
            $this->db->where('USER_ID',$user_id);
            return $this->db->get('g_banner');

        }
        function update_banner($banner){


            $data = array(
                    'CONTENT' => $banner,
                    'UPDATED'  => date('Y-m-d h:i:s')

            );

            $this->db->replace('g_about', $data);
            $data=array('TYPE'=>$type);
            $data=array('LINK_TYPE'=>$link_type);
            $data=array('LINKTO'=>$linkto);
            $data=array('BANNER_IMAGE'=>$banner_img);
            $data=array('ORDER_NO'=>$order_no);
            $data=array('FLAG'=>$flag);
            $data=array('DESCRIPTION'=>$description);
            $data=array('CREATED'=>$created);
            $data=array('UPDATED'=>$updated);
            $data=array('USER_ID'=>$user_id);

            $this->db->where('REC_ID',$id);
        }
//-------------------------------------------------------------------------------------------------------------------  BANNER

//-------------------------------------------------------------------------------------------------------------------  ABOUT
        function select_about(){
            $this->db->select('*');
            $this->db->from('g_about');
            $this->db->where('REC_ID','1');

            $query = $this->db->get();

            return $query;
        }
        function select_about_detail($id){
            $this->db->where('REC_ID',$id);
            return $this->db->get('g_about');

        }
        function update_about($about) {
            return $this->db->query("update g_about set
                                    CONTENT='".$about."',
                                    UPDATED='".date('Y-m-d h:i:s')."'
                                    where REC_ID=1");

         }
//-------------------------------------------------------------------------------------------------------------------  ABOUT

//-------------------------------------------------------------------------------------------------------------------  TERMS
        function select_terms(){
            $this->db->select('*');
            $this->db->from('g_terms');

            $query = $this->db->get();

            return $query;
        }
         function select_terms_detail($id){
            $this->db->where('REC_ID',$id);
            return $this->db->get('g_terms');

        }
        function update_terms($terms){
             $data = array(
                    'CONTENT' => $terms,
                    'UPDATED'  => date('Y-m-d h:i:s')

            );

            $this->db->replace('g_terms', $data);
         }
//-------------------------------------------------------------------------------------------------------------------  TERMS

//-------------------------------------------------------------------------------------------------------------------  FAQ
        function select_faq(){
            $this->db->select('*');
            $this->db->from('g_faq');

            $query = $this->db->get();

            return $query;
        }
         function select_faq_detail($id){
            $this->db->where('REC_ID',$id);
            return $this->db->get('g_faq');

        }
        function update_faq($faq){
            $data = array(
                    'CONTENT' => $faq,
                    'UPDATED'  => date('Y-m-d h:i:s')

            );

            $this->db->replace('g_faq', $data);
         }
//-------------------------------------------------------------------------------------------------------------------  FAQ

//-------------------------------------------------------------------------------------------------------------------  PRIVACY
        function select_privacy(){
            $this->db->select('*');
            $this->db->from('g_privacy');
            $this->db->where('REC_ID','1');

            $query = $this->db->get();

            return $query;
        }
        function select_privacy_detail($id){
            $this->db->where('REC_ID',$id);
            return $this->db->get('g_privacy');

        }
        function update_privacy($privacy){
           // $data = array(
           //          'CONTENT' => $privacy,
           //          'UPDATED'  => date('Y-m-d h:i:s')

           //  );

            // $this->db->replace('g_privacy', $data);

           return $this->db->query("update g_privacy set
                                    CONTENT='".$privacy."',
                                    UPDATED='".date('Y-m-d h:i:s')."'
                                    where REC_ID=1");
         }
//-------------------------------------------------------------------------------------------------------------------  PRIVACY

//-------------------------------------------------------------------------------------------------------------------  MEMBER
        function select_member(){
            $this->db->select('*');
            $this->db->from('g_member');

            $query = $this->db->get();

            return $query;
        }

        function singleMember($id) {

          $this->db->select('*');
          $this->db->from('g_member');
          $this->db->where('ID', $id);

          $query = $this->db->get();

          return $query;
        }

        function updateMember($id, $email, $phone, $add1, $add2, $country, $province){

            $data = array(

                'EMAIL'  => $email,
                'PHONE' => $phone,
                'ADDRESS' => $add1,
                'ADDRESS_2'  => $add2,
                'COUNTRY' => $country,
                'PROVINCE' => $province
            );

            $this->db->where('ID', $id);
            $this->db->update('g_member', $data);
        }

        function updatePass($id, $pass){

            $hashPassword = sha1('abc123');


            $data = array(

                'PASSWORD' => $hashPassword
            );

            $this->db->where('ID', $id);
            $this->db->update('g_member', $data);
        }

        function delete_member($id, $email){
             
            $this->db->where('ID', $id);
            $this->db->delete($email);
        
        }
//-------------------------------------------------------------------------------------------------------------------  MEMBER

//-------------------------------------------------------------------------------------------------------------------  CONTACT
        function select_contact(){
            $this->db->select('*');
            $this->db->from('g_contactus');

            $query = $this->db->get();

            return $query;
        }
        function select_contact_detail($id){
            $this->db->where('REC_ID',$id);
            return $this->db->get('g_contactus');

        }
        function update_contact($contact){
           $data = array(
                    'TITLE' => $contact,
                    'UPDATED'  => date('Y-m-d h:i:s')

            );

            $this->db->replace('g_contactus', $data);
        }
//-------------------------------------------------------------------------------------------------------------------  CONTACT

//-------------------------------------------------------------------------------------------------------------------  ORDER
        function select_order(){
            $this->db->select('*');
            $this->db->from('v_g_order_master');
            $this->db->order_by('ORDER_DATE', 'DESC');

            $query = $this->db->get();

            return $query;
        }

        function singleOrder($orderNo) {

          $this->db->select('*');
          $this->db->from('v_g_order_master');
          $this->db->where('ORDER_NO', $orderNo);

          $query = $this->db->get();

          return $query;
        }

        function showProducts($orderNo) {

          $this->db->select('*');
          $this->db->from('g_order_detail');
          $this->db->where('ORDER_NO', $orderNo);

          $query = $this->db->get();

          return $query->result();

        }

        function updateOrderStatus($orderNo,$status,$importCost,$updated){

            $data = array(

                'STATUS'  => $status,
                'TOTAL_POSTAGE' => $importCost,
                'UPDATED' => $updated
            );

            $this->db->where('ORDER_NO', $orderNo);
            $this->db->update('g_order_master', $data);
        }

        function updateFinalPrice($prodID,$amount,$quantity){

            $data = array(

                'FINAL_PRICE'  => $amount,
                'QUANTITY' => $quantity
            );

            $this->db->where('PROD_ID', $prodID);
            $this->db->update('g_order_detail', $data);
        }

        function singlePayment($id) {

          $this->db->select('*');
          $this->db->from('g_confirm_payment');
          $this->db->where('ORDER_ID', $id);

          $query = $this->db->get();

          return $query;
        }

        function confirmStatus($id) {
            $data = array(

                'STATUS'  => 'PAID'
            );

            $this->db->where('ORDER_NO', $id);
            $this->db->update('g_order_master', $data);   
        }

       function getOrderMasterDataFromQuery($query) {

        $this->db->select('*');
        $this->db->from('v_g_order_master');
        $this->db->where('STATUS_ORDER', $query);
        $this->db->order_by('ORDER_DATE', 'DESC');

        $query = $this->db->get();

        return $query;
        }

        function updateFlagInvoce ($orderNo){
            $data = array(

                'FLAG'  => 1,
            );

            $this->db->where('ORDER_NO', $orderNo);
            $this->db->update('g_order_master', $data);
        }

        function delete_order_master($orderNo, $id){
             
            $this->db->where('ORDER_NO', $orderNo);
            $this->db->delete($id);
        
        }

        function delete_order_detail($orderNo, $id){
             
            $this->db->where('ORDER_NO', $orderNo);
            $this->db->delete($id);
        
        }

    
//-------------------------------------------------------------------------------------------------------------------  ORDER

//-------------------------------------------------------------------------------------------------------------------  MESSAGE
        function getOrderMessages($orderID) {

            $this->db->select('*');
            $this->db->from('g_message');
            $this->db->where('ORDER_ID', $orderID);

            $query = $this->db->get();

            return $query;
        }
//-------------------------------------------------------------------------------------------------------------------  MESSAGE

//-------------------------------------------------------------------------------------------------------------------  MARGIN
        function select_margin(){
            $this->db->select('*');
            $this->db->from('g_convert');

            $query = $this->db->get();

            return $query;
        }

        function singleMargin($id) {

          $this->db->select('*');
          $this->db->from('g_convert');
          $this->db->where('REC_ID', $id);

          $query = $this->db->get();

          return $query;
        }

        function updateMargin($recID, $id, $value, $updated, $description){

            $data = array(

                'ID'  => $id,
                'VALUE' => $value,
                'UPDATED_TIME' => $updated,
                'DESCRIPTION' => $description
            );

            $this->db->where('REC_ID', $recID);
            $this->db->update('g_convert', $data);
        }

        function insert_margin($data){
             $insert = $this->db->insert('g_convert', $data);
             
            return $insert;

        }

        function delete_margin($recID, $id){
             
            $this->db->where('REC_ID', $recID);
            $this->db->delete($id);
        
        }

        function updateStatus() {

            $data = array(
                'STATUS' => 'HISTORY'
            );

            $this->db->where('STATUS', 'CURRENT');
            $this->db->update('g_convert', $data);


        }
//-------------------------------------------------------------------------------------------------------------------  MARGIN
}
