<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('api_model', 'voucher_model', 'ads_model', 'merchant_model', 'mall_model', 'outlet_model', 'member_model'));
    }

    public function fetch_data() {
        $verify = $this->api_model->verify_data();
        
        if($verify['status'] == '200') {
            $data = '';
            $body = $verify['body'];
            $table = $verify['table'];
            
            switch($table) {
                case 'voucher_home':
                    $data['ads'] = $this->ads_model->get_voucher_ads();
                    $data['voucher'] = $this->voucher_model->get_vouchers();
                    break;
                case 'admin_list_voucher':
                    $data = $this->merchant_model->get_list_voucher();
                    break;
                case 'data_mall':
                    $data = $this->mall_model->get_list_mall();
                    break;
                case 'mall_outlet':
                    $data = $this->outlet_model->get_mall_outlet($body['mallPid']);
                    break;
                case 'user_member':
                    $data = $this->member_model->get_user_membership($body['userPid']);
                    break;
            }

            $result['status'] = $verify['status'];
            $result['data'] = $data;

            $jsoncallback = json_encode($result);
        } else {
            $jsoncallback = json_encode($verify);
        }

        echo $jsoncallback;
    }
}

?>