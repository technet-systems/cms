<?php

class account_m extends CI_Model {
    // Sprawdzenie danych do logowania
    public function access() {
        // Ładowanie helpera haszowania i posolenia hasła
        $this->load->helper('hash_salt');
        
        // Haszowanie i posolenie hasła
        $password = hash_salt($this->input->post('password'));
        
        // Ustawienie kryteriów wyszukiwań w zapytaniu SQL
        $this->db->where('a1_email', $this->input->post('email'));
        $this->db->where('a1_password', $password);
        
        // Właściwe zapytanie
        $query = $this->db->get('a1_user');
        
        // Sprawdzenie czy otrzymaliśmy dokładnie 1 rekord
        if ($query->num_rows() == 1) {
            return TRUE;
            
        } else {
            return FALSE;
            
        }        
        
    }
    
}