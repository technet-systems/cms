<?php

class Data_m extends CI_Model {
    // Wyciągnięcie danych z BD
    public function get_data($table, $where = FALSE, $single = FALSE, $limit = FALSE, $offset = FALSE) {
        
        if($where == TRUE) {
            $this->db->where($where);
            
        }
        
        $query = $this->db->get($table);
        
        if($single == TRUE) {
            
            // Zwrócenie pojedyńczego wiersza
            return $query->row();
            
        }
        
    if($limit == TRUE && $offset == TRUE) {
        $this->db->limit($limit, $offset);
        
    }
                
        return $query->result();
        
    }
    
    // Zmiana rekordów w BD
    public function update_data($table, $set, $where) {
        $this->db->where($where);
        $this->db->update($table, $set);
        
    }
    
    public function delete_data($table, $where) {
        
        
    }
    
    public function insert_data($table, $set) {
        $this->db->insert($table, $set);
        
    }
    
    public function get_rows($table, $where = FALSE) {
        if($where == TRUE) {
            $this->db->where($where);
            
        }
        
        $query = $this->db->get($table);
        
        return $query->num_rows();
        
    }
    
    public function count_items($table, $where = FALSE) {
        if($where == TRUE) {
            $this->db->where($where);
            
        }
        
        return $this->db->count_all_results($table);
        
    }
    
    public function get_items($table, $where = FALSE, $limit, $offset) {
        if($where == TRUE) {
            $this->db->where($where);
            
        }
        
        $data = array();
        
        $this->db->limit($limit, $offset);
        $query = $this->db->get($table);
        if($query->num_rows() > 0) {
            foreach($query->result_array() as $row) {
                $data[] = $row;
                
            }
            
        }
        
        $query->free_result();
        return $data;
        
    }
    
}