<?php if (!defined("BASEPATH")) exit("Hack Attempt");
class Product_detail extends CI_Controller
{

    public function view()
    {

        $this->load->helper('form');
        $this->load->library('incube');
        $this->load->model('M_product', 'product');

        // $this->output->enable_profiler(TRUE);
        $id = $this->input->get('id');

        $randomPage     = mt_rand(1, 500);

        $finalUrl       = 'http://kikikuku.com/API/product?key=c549303dcef12a687e9077a21e1a51fb67851efb&id=' . $id;
        $recURL         = file_get_contents("http://kikikuku.com/API/home?key=c549303dcef12a687e9077a21e1a51fb67851efb&pageSize=5&page=" . $randomPage);
        $recomended     = json_decode($recURL, TRUE);

        $json           = file_get_contents($finalUrl);
        $obj            = json_decode($json, true);

        $data['dataproduct']     = $obj;
        $data['priceList']       = array();
        $data['recomended']      = $recomended;
        $data['imageCounter']    = 1;
        $data['imageCounterMobile']    = 1;

        if ($obj['status'] == "error") {

            //THERE IS NO DATA FOR THIS
            $data['productName'] = 'Product not Available';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('pages/products/empty_product', $data);
            $this->load->view('templates/footer', $data);
        } else {

            //Product Name
            if (strlen($obj['item']['TITLE']) > 20) {
                $data['productName'] = ucwords(substr($obj['item']['TITLE'], 0, 20));
            } else {
                $data['productName'] = ucwords($obj['item']['TITLE']);
            }

            //THERE IS A DATA FOR THIS PRODUCT
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('pages/products/product_detail', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
