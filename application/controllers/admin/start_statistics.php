<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Start_statistics extends CI_Controller {
    public function index() {
        // Sprawdzenie czy jest otwarta sesja dla użytkownika
        if ($this->session->userdata('is_logged_in') == TRUE) {
            // Załadowanie ogólnego modelu pracy z BD...
            $this->load->model('data_m');
            
            // ...i wyciągnięcie imienia i nazwiska użytkownika
            $table = 'a1_user';
            $where = array(
                'a1_email' => $this->session->userdata('email')
                
            );
            
            // Zapisanie wyników w tablicy $data['result']...
            $data['result'] = $this->data_m->get_data($table, $where);
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/start_menu_v');
            $this->load->view('admin/start_statistics_v');
            $this->load->view('admin/footer_v');
        
        } else {
            // Wywołanie strony logowania z informacją o wylogowaniu
            $data = array(
                'message_access_deny' => 'Proszę się zalogować!'

            );

            $this->load->view('admin/account_v', $data);
            
        }
        
    }
    
}