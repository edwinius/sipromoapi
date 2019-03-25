<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant_model extends CI_model {

    public function get_list_voucher() {
        // Select array1
        $this->db->select('a.company_pid, a.company_name');
        $this->db->from('data_company a');
        $this->db->order_by('a.company_pid', 'ASC');
        $query1 = $this->db->get();
        $array1 = $query->result_array();

        $cpid = array();
        foreach($array1 as $a) {
            array_push($cpid, $a['company_pid']);
        }

        // Select array2
        $this->db->select('');
        $this->db->from('data_voucher a');
        $this->db->where_in('a.company_pid', $cpid);
        $query2 = $this->db->get();
        $array2 = $query2->result_array();

        // Combine array
        $array = combine_array($array1, $array2);

        return $array1;
    }

}
?>