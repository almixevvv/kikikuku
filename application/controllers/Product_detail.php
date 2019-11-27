<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Product_detail extends CI_Controller {

    public function view() {

       $this->load->helper('form');
       $this->load->library('incube');

        // $this->output->enable_profiler(TRUE);
        $this->load->model('M_product', 'product');

        $id = $this->input->get('id');
        
        $randomPage     = mt_rand(1, 500);

        $finalUrl       = 'http://en.yiwugo.com/ywg/productdetail.html?account=Wien.suh@gmail.com&productId='.$id;

        $recURL         = file_get_contents("http://en.yiwugo.com/ywg/productlist.html?account=Wien.suh@gmail.com&pageSize=5&cpage=".$randomPage);
    	$recomended 	= json_decode($recURL, TRUE);

        $json           = file_get_contents($finalUrl);
        $obj            = json_decode($json, true);

        $data['dataproduct'] = $obj;
        $data['recomended'] = $recomended;

        // FOR DEBUGGING PURPOSE ONLY
        // foreach($obj['prslist'] as $list) {
        // 	echo 'Title '.$list['title']."</br>";
        // 	echo 'Name '.$list['shopName']."</br>";
        // 	echo 'Picture '.$list['picture2'];
        // }
        // die();

        //GET THE MARGIN PARAMETER
        $data['marginParameter'] = $this->product->getMarginPrice();


        if(isset($obj['tip'])) { 
            
            //THERE IS NO DATA FOR THIS
            $data['productName'] = 'Product not Available';
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('pages/products/empty_product', $data);
            $this->load->view('templates/footer', $data);

        } else {

            //Product Name
            if(strlen($obj['detail']['productForApp']['title']) > 20) {
                $data['productName'] = ucwords(substr($obj['detail']['productForApp']['title'], 0, 20));
            } else {
                $data['productName'] = ucwords($obj['detail']['productForApp']['title']);
            }
            
            //THERE IS A DATA FOR THIS PRODUCT
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('pages/products/product_detail', $data);
            $this->load->view('templates/footer', $data);   
        }

    }

}
