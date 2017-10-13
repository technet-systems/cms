<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Kontakt extends CI_Controller {
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
            'c2_id' => 4

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_c2_id' => 4
            
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
        $this->load->view('site/contact_v');
        $this->load->view('site/footer_v');
        
    }
    
    public function wysylka_formularza() {
        $this->load->library('form_validation');
        
        // Ustanawiamy reguły walidacji
        $this->form_validation->set_rules('fname', 'imię', 'required|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'telefon', 'trim');
        $this->form_validation->set_rules('model', 'model', 'trim');
        $this->form_validation->set_rules('message', 'wiadomość', 'required|trim');
        
        // Ustalamy PL nazewnictwo błędów
        $config = array(
            'required' => 'Pole %s jest wymagane',
            'valid_email' => 'Niepoprawny e-mail',
            'alpha_numeric' => 'Niepoprawny numer telefonu'
            
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
                'b1_message' => $this->input->post('message').', dane pojazdu: '.$this->input->post('model')
                
            );
            
            $this->data_m->insert_data($table, $set);
            
            // Wysyłka maila
            $this->load->library('email');
            
            $message = '
                Wiadomość od: '.$this->input->post('fname').'

                E-mail: '.$this->input->post('email').'

                Telefon: '.$this->input->post('phone').'
                    
                Dane pojazdu: '.$this->input->post('model').'

                Wiadomość: '.$this->input->post('message').'

            ';
            
            $this->email->from('biuro@dm-auto.pl', 'Formularz kontaktowy z przyciemnianie-szyb.dm-auto.pl');
            $this->email->reply_to($this->input->post('email'), $this->input->post('fname'));
            $this->email->to('biuro@dm-auto.pl');
            $this->email->cc($this->input->post('email')); // Kopia wiadomości dla Klienta
            $this->email->bcc('d.wojcicki@interia.pl'); // Kopia ukryta

            $this->email->subject('Wiadomość od: '.$this->input->post('fname').' ze strony przyciemnianie-szyb.dm-auto.pl');
            $this->email->message($message.' Uwaga! Okazanie smsa lub wydrukowanego maila uprawni do 5% zniżki na usługę przyciemaniania szyb! :)');

            $this->email->send();
            
            // Wywołanie strony wyjściowej z informacją o zmianie
            $data = array(
                'message_send' => 'Dziękujemy za maila! Skorzystaj z dodatkowej promocji - szczegóły w mailu na Twojej skrzynce! ;)'

            );

            $this->index($data);
            
        } else {
            $this->index();
            
        }
        
    }
    
}