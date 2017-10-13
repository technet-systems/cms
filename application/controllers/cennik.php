<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Cennik extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('data_m');
		$this->load->helper('text');
        
    }

    public function index($data = FALSE) {
        // Wyciągnięcie danych kontaktowych z BD
        $table = 'c1_content';
        $where = array(
            'c1_id' => 7
            
        );
        
        $data['contact'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie meta danych
        $table = 'c2_page';
        $where = array(
            'c2_id' => 5

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_c2_id' => 5
            
        );
        
        $data['content'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęcia w tle
        $table = 'c11_gallery';
        $where = array(
            'c11_c1_id' => 2
            
        );
        
        $data['bg'] = $this->data_m->get_data($table, $where);
            
        $this->load->view('site/header_v', $data);
        $this->load->view('site/menu_v');
        $this->load->view('site/links_v');
        $this->load->view('site/footer_v');
        
    }
    
    public function wysylka_formularza() {
        $this->load->library('form_validation');
        
        // Ustanawiamy reguły walidacji
        $this->form_validation->set_rules('fname', 'imię', 'required|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'telefon', 'numeric|trim');
        $this->form_validation->set_rules('message', 'wiadomość', 'required|trim');
        
        // Ustalamy PL nazewnictwo błędów
        $config = array(
            'required' => 'Pole %s jest wymagane',
            'valid_email' => 'Niepoprawny e-mail',
            'numeric' => 'Niepoprawny numer telefonu'
            
        );
        
        $this->form_validation->set_message($config);
        
        // Uruchomienie walidacji
        if($this->form_validation->run() == TRUE) {
            // Zapisanie danych z formularza w BD
            $table = 'b1_email';
            $set = array(
                'b1_fname' => $this->input->post('fname'),
                'b1_email' => $this->input->post('email'),
                'b1_phone' => $this->input->post('phone'),
                'b1_message' => $this->input->post('message')
                
            );
            
            $this->data_m->insert_data($table, $set);
            
            // Wysyłka maila
            $this->load->library('email');
            
            $this->email->from('test@lukaszlukasik.pl', 'Formularz kontaktowy');
            $this->email->to('d.wojcicki@interia.pl');
            //$this->email->cc('another@another-example.com'); // Kopia wiadomości
            //$this->email->bcc('them@their-example.com'); // Kopia ukryta

            $this->email->subject('Wiadomość od: '.$this->input->post('fname'));
            $this->email->message('Wiadomość od: '.$this->input->post('fname').' E-mail: '.$this->input->post('email').' Telefon:'.$this->input->post('phone').' Wiadomość: '.$this->input->post('message'));

            $this->email->send();
            
            // Wywołanie strony wyjściowej z informacją o zmianie
            $data = array(
                'message_send' => 'Formularz wysłany, dziękuję ;)'

            );

            $this->index($data);
            
        } else {
            $this->index();
            
        }
        
    }
    
}