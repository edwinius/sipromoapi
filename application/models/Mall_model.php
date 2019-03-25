<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mall_model extends CI_model {

    public function get_list_mall() {
        $this->db->from('data_mall');
        $this->db->where('del', '0');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>