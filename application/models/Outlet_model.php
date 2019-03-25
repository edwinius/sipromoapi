<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_model extends CI_model {

    public function get_mall_outlet($mallPid) {
        $this->db->select('
            b.company_pid,
            b.company_name,
            b.company_logo
        ');
        
        $this->db->from('data_outlet a');
        $this->db->join('data_company b', 'a.company_pid = b.company_pid', 'left');
        $this->db->where('a.mall_pid', $mallPid);
        $this->db->where('a.del', '0');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>