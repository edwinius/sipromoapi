<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('voucher_model', 'api_model'));
    }

    public function fetch_vouchers() {
        $verify = $this->api_model->verify_data();

        if($verify['status'] == '200') {
            $data = $verify['data'];
        }

        $jsoncallback = json_encode($callback);
		echo $jsoncallback;
    }

}
?>