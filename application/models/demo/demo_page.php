<?php
class Demo_page extends CI_Model {
    function __construct() {
        parent::__construct();
        //$this->load->library('database');
    }
 
    function count_items(){
        return $this->db->count_all('demo_page');
    }
 
    function get_items($limit, $offset){
        $data = array();
        $this->db->where('id2', 0);
        $this->db->limit($limit, $offset);
        $Q = $this->db->get('demo_page');
        if($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }
}