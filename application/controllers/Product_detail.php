<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Product_detail extends CI_Controller {

    public function view(){

       $this->load->helper('form');

       $page = 'product_detail';

        // $this->output->enable_profiler(TRUE);
        $this->load->model('M_product', 'product');

        $id = $this->input->get('id');
        $randomPage = mt_rand(1, 500);

        $finalUrl = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$id;

        $recURL  = file_get_contents("http://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&s=1001105&pageSize=4&cpage=".$randomPage);
    		$recomended 	= json_decode($recURL, TRUE);

        $json       = file_get_contents($finalUrl);
        $obj        = json_decode($json, true);

        $data['dataproduct'] = $obj;
        $data['recomended'] = $recomended;

        // FOR DEBUGGING PURPOSE ONLY
        // foreach($obj['prslist'] as $list) {
        // 	echo 'Title '.$list['title']."</br>";
        // 	echo 'Name '.$list['shopName']."</br>";
        // 	echo 'Picture '.$list['picture2'];
        // }
        //
        // die();

    		$id_user = $this->session->userdata("USERID");

        $this->load->view('templates/header');
    		$this->load->view('templates/navbar');
        $this->load->view('pages/products/'.$page, $data);
        $this->load->view('templates/footer.php', $data);
    }

}
