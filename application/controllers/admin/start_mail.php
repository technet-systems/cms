<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Start_mail extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Załadowanie ogólnego modelu pracy z BD...
        $this->load->model('data_m');
        
    }
    
    public function index($data = FALSE) {
        // Sprawdzenie czy jest otwarta sesja dla użytkownika
        if ($this->session->userdata('is_logged_in') == TRUE) {
            // Wyciągnięcie imienia i nazwiska użytkownika
            $table = 'a1_user';
            $where = array(
                'a1_email' => $this->session->userdata('email')
                
            );
            
            // Zapisanie wyników w tablicy $data['result']...
            $data['result'] = $this->data_m->get_data($table, $where);
            
            // Wyciągnięcie zapisanych maili w BD
            $table = 'b1_email';
            $where = array(
                'b1_status' => 1
                
            );
            
            $data['mails'] = $this->data_m->get_data($table, $where);
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/start_menu_v');
            $this->load->view('admin/start_mail_v', $data);
            $this->load->view('admin/footer_v');
        
        } else {
            // Wywołanie strony logowania z informacją o wylogowaniu
            $data = array(
                'message_access_deny' => 'Proszę się zalogować!'

            );

            $this->load->view('admin/account_v', $data);
            
        }
        
    }

    public function fake_delete_mail() {
        // Ściągnięcie 4 elementu adresu URI
        $id = $this->uri->segment(4);
        
        // Ustawienie tabeli
        $table = 'b1_email';
        
        // Ustawienie co ma być zmienione
        $set = array(
            'b1_status' => 0
            
        );
        
        // Ustawienie kryterium do zapytania        
        $where = array(
            'b1_id' => $id
                
        );
            
        // Zmiana rekordu z uwzględnieniem ww. ustawień
        $this->data_m->update_data($table, $set, $where);
        
        $data['message_delete_mail'] = 'Wybrany mail został z powodzeniem usunięty.';
        
        $this->index($data);
        
    }
    
}