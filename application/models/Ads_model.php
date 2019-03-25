<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads_model extends CI_model {

    public function get_voucher_ads() {
        $this->db->from('voucher');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>