<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('voucher_model', 'merchant_model', 'mall_model'));
    }

    public function test() {
        $data = $this->mall_model->get_list_mall();

        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function test_view() {
        $data = array(
            'appToken' => '$2y$10$.pslhtQN40mZurSqDm/Cku2Zq/4AqSZ8y3zwkeLRouM1LdmlLytJy',
            'monsterPid' => '10'
        );
        $data_json = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/segameapi/ro/monster/fetch_monster_detail");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
        ));

        $output = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($output, true);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo $data['monster'][0]['ro_monster_pid'];
        $this->load->view('test_view', $data);
    }

}
?>