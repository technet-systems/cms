<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Załadowanie ogólnego modelu pracy z BD...
        $this->load->model('data_m');
        
        // Załadowanie bliblioteki zwracającej informacje z ciągu URI
        $this->load->library('uri');
        
    }
    
    // Strona logowania
    public function index() {
        // Niszczenie aktualnej sesji
        $this->session->sess_destroy();
        
        // Wywołanie strony logowania
        $this->load->view('admin/account_v');
        
    }
    
    // Walidacja formularza logowania
    public function sign_in() {
        // Ładowanie biblioteki walidacji formularza (można ją automatycznie załaczyć w config/autoload.php)
        $this->load->library('form_validation');
        
        // Ustalamy zasady walidacji tworząc tablicę zasad...
        $config = array(
            array(
                'field' => 'email',
                'label' => 'e-mail',
                'rules' => 'required|trim|valid_email|xss_clean|callback_sign_check'
                
            ),
            
            array(
                'field' => 'password',
                'label' => 'hasło',
                'rules' => 'required|trim'
                
            )
            
        );
        
        // ...i przepuszczamy ją przez metodę 'set_rules'
        $this->form_validation->set_rules($config);
        
        // Ustalamy PL nazewnictwo błędów tworząc tablicę PL komunikatów...
        // (w dokumentacji jest info jak ustalić GLOBALNIE nazewnictwo błędów)
        $config = array(
            'required' => 'Pole <b>%s</b> jest wymagane.',
            'valid_email' => 'Niepoprawny adres e-mail.'
            
        );
        
        // ...i przepuszczamy ją przez metodę set_message
        $this->form_validation->set_message($config);
        
        // Uruchamiamy walidację
        if($this->form_validation->run() == TRUE) {
            // Ustanowienie sesji składającej się z maila i informacji czy użytkownik jest zalogowany
            $config = array(
                'email' => $this->input->post('email'),
                'is_logged_in' => TRUE
                
            );
            
            // Dodanie własnych danych do tablicy sesji
            $this->session->set_userdata($config);
            
            // Przekierowanie do serwisu
            redirect('admin/start_mail', 'location', 301);
            
        } else {
            $this->index();
            
        }
        
    }
    
    // Sprawdzenie loginu i hasła (dla reguły 'callback')
    public function sign_check() {
        // Ładowanie modelu obsługującego kontroler 'user'
        $this->load->model('admin/account_m');
        
        if($this->account_m->access()) {
            return TRUE;
            
        } else {
            $this->form_validation->set_message('sign_check', 'Nieprawidłowy login lub hasło!');
            return FALSE;
            
        }
        
    }

    public function sign_out() {
        $this->session->sess_destroy();
        
        // Wywołanie strony logowania z informacją o wylogowaniu
        $data = array(
            'message_sign_out' => 'Pomyślnie wylogowano!'
            
        );
        
        $this->load->view('admin/account_v', $data);
        
    }
    
    public function my_account($data = FALSE) {
        // Sprawdzenie czy jest otwarta sesja dla użytkownika
        if ($this->session->userdata('is_logged_in') == TRUE) {
            // Wyciągnięcie imienia i nazwiska użytkownika
            $table = 'a1_user';
            $where = array(
                'a1_email' => $this->session->userdata('email')
                
            );
            
            // Zapisanie wyników w tablicy $data['result']...
            $data['result'] = $this->data_m->get_data($table, $where);
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/account_menu_v');
            $this->load->view('admin/account_user_v');
            $this->load->view('admin/footer_v');
        
        } else {
            // Wywołanie strony logowania z informacją o wylogowaniu
            $data = array(
                'message_access_deny' => 'Proszę się zalogować!'

            );

            $this->load->view('admin/account_v', $data);
            
        }
        
    }
    
    public function update_user() {
        // Ładujemy bibliotekę walidacji formularza
        $this->load->library('form_validation');
        
        // Reguły walidacji
        //$this->form_validation->set_rules('account_new_login', 'Login', 'valid_email|is_unique[a1_user.a1_email]');
        $this->form_validation->set_rules('account_new_password', 'Hasło', 'required|matches[account_new_passconf]');
        $this->form_validation->set_rules('account_new_passconf', 'Powtórzenie hasła', 'required');
        
        // Ustalamy PL nazewnictwo błędów
        $config = array(
            //'valid_email' => 'Niepoprawny e-mail',
            'required' => 'Pole %s jest wymagane',
            'is_unique' => 'Adres <b>'.$this->input->post('account_new_login'). '</b> istnieje w bazie danych, podaj inny.',
            'matches' => 'Wpisz dwa identyczne hasła.'
            
        );
        
        $this->form_validation->set_message($config);
        
        if($this->form_validation->run() == TRUE) {
            $id = $this->uri->segment(4);
            
            // Ustawienie zmiennych dla dokonania zmiany rekordu
            $table = 'a1_user';
            $where = array(
                'a1_id' => $id
                
            );
            
            // Załadowanie helpera hashowania i solenia hasła ;)
            $this->load->helper('hash_salt');
            
            $set = array(
                'a1_password' => hash_salt($this->input->post('account_new_password'))
                
            );
            
            // Wywołanie metody zmiany rekordu w BD
            $this->data_m->update_data($table, $set, $where);

            // Wywołanie strony wyjściowej z informacją o zmianie
            $data = array(
                'message_change_password' => 'Hasło zmienione ;)'

            );

            $this->my_account($data);

        } else {
            $this->my_account();

        }
        
    }
    
}