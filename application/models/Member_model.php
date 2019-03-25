<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_model {

    public function get_user_membership($userPid) {
        $this->db->select('
            a.membership_number,
            a.company_pid,
            b.company_member_card
        ');
        
        $this->db->from('membership a');
        $this->db->join('data_company b', 'a.company_pid = b.company_pid', 'left');
        $this->db->where('a.user_pid', $userPid);
        $this->db->where('a.del', '0');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>