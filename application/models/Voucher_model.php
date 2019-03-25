<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_model extends CI_model {

    public function get_vouchers() {
        $this->db->from('voucher');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>