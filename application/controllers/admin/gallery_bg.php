<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Gallery_bg extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Załadowanie ogólnego modelu pracy z BD...
        $this->load->model('data_m');
        
        // Załadowanie bliblioteki zwracającej informacje z ciągu URI
        $this->load->library('uri');
        
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
            
            // Wyciągnięcie zapisanych content'ów w BD
            $table = 'c1_content';
            $where = array(
                'c1_id' => 1,
                'c1_c2_id' => 6,
                'c1_status' => 1
                
            );
            
            $data['start'] = $this->data_m->get_data($table, $where);
            
            // Wyciągnięcie tipsów & tricków z BD
            $table = 'd1_tips';
            $where = array(
                'd1_c2_id' => 6
                
            );
            
            $data['tips'] = $this->data_m->get_data($table, $where);
            
            $table = 'c11_gallery';
            $where = array(
                'c11_c1_id' => 2
                
            );
            
            $data['pics'] = $this->data_m->get_data($table, $where);
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/gallery_menu_v');
            $this->load->view('admin/gallery_bg_v');
            $this->load->view('admin/footer_v');
        
        } else {
            // Wywołanie strony logowania z informacją o wylogowaniu
            $data = array(
                'message_access_deny' => 'Proszę się zalogować!'

            );

            $this->load->view('admin/account_v', $data);
            
        }

    }
    
    public function update_article() {
        // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
        $id = $this->uri->segment(4);
        
        // Ustawienie zmiennych dla dokonania zmiany rekordu
        $table = 'c1_content';
        $where = array(
            'c1_id' => $id
            
        );
        
        if($id == 15) {
            $set = array(
                'c1_header' => $this->input->post('header')

            );
        
        } else {
            $set = array(
                'c1_title' => $this->input->post('title')

            );
            
        }
        
        // Wywołanie metody zmiany rekordu w BD
        $this->data_m->update_data($table, $set, $where);
        
        // Wywołanie strony wyjściowej z informacją o zmianie
        $data = array(
            'message_change_article' => 'Artykuł zmieniony ;)'

        );

        $this->index($data);
        
    }
    
    public function update_pic() {
        // Konfiguracja dozwolonych typów plików do 'upload'u'
        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name' => TRUE
            
        );
        
        // Tworzenie obiektu klasy UPLOAD z parametrami jakie ma spełaniać wgrywany plik
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $error = array(
                'error' => $this->upload->display_errors()
                
            );
            
            $this->index($error);
            
        } else {
            // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
            $id = $this->uri->segment(4);
            
            // Uzyskanie nazwy pliku http://stackoverflow.com/questions/16345761/codeigniter-get-the-uploaded-file-name
            $upload_data = $this->upload->data(); // Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            
            // Ustawienie zmiennych dla dokonania zmiany rekordu
            $table = 'c1_content';
            $where = array(
                'c1_id' => $id

            );
            
            $set = array(
                'c1_pic' => $file_name

            );
            
            // Wywołanie metody zmiany rekordu w BD
            $this->data_m->update_data($table, $set, $where);
            
            // Wywołanie strony wyjściowej z informacją o zmianie
            $data = array(
                'message_change_pic' => 'Zdjęcie zmienione ;)'

            );

            $this->index($data);
            
        }
        
    }
    
    public function update_properties() {
        // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
        $id = $this->uri->segment(4);
        
        // Ustawienie zmiennych dla dokonania zmiany rekordu
        $table = 'c2_page';
        $where = array(
            'c2_id' => $id
            
        );
        
        $set = array(
            'c2_meta_title' => $this->input->post('meta_title'),
            'c2_meta_copyright' => $this->input->post('meta_copyright'),
            'c2_meta_description' => $this->input->post('meta_description'),
            'c2_meta_keywords' => $this->input->post('meta_keywords'),
            'c2_meta_robots' => $this->input->post('meta_robots')
            
        );
        
        // Wywołanie metody zmiany rekordu w BD
        $this->data_m->update_data($table, $set, $where);
        
        // Wywołanie strony wyjściowej z informacją o zmianie
        $data = array(
            'message_change_properties' => 'Właściwości strony zmienione ;)'

        );

        $this->index($data);
        
    }
    
    public function fake_delete_gallery() {
        // Ściągnięcie 4 elementu adresu URI
        $id = $this->uri->segment(4);
        
        // Ustawienie tabeli
        $table = 'c1_content';
        
        // Ustawienie co ma być zmienione
        $set = array(
            'c1_status' => 0
            
        );
        
        // Ustawienie kryterium do zapytania        
        $where = array(
            'c1_id' => $id
                
        );
            
        // Zmiana rekordu z uwzględnieniem ww. ustawień
        $this->data_m->update_data($table, $set, $where);
        
        $data['message_delete_gallery'] = 'Wybrana galeria została z powodzeniem usunięta.';
        
        $this->index($data);
        
    }
    
    public function add_article() {
        // Ściągnięcie 4 elementu adresu URI
        $id = $this->uri->segment(4);
        
        // Ustawienie tabeli
        $table = 'c1_content';
        
        // Ustawienie co ma być dodane
        $set = array(
            'c1_title' => $this->input->post('title'),
            'c1_text' => $this->input->post('text'),
            'c1_c2_id' => $id
            
        );
        
         // Dodanie rekordu z uwzględnieniem ww. ustawień
        $this->data_m->insert_data($table, $set);
        
        $data['message_add_gallery'] = 'Utworzono nową galerię.';
        
        $this->index($data);
        
    }
    
    public function show_gallery() {
        // Sprawdzenie czy jest otwarta sesja dla użytkownika
        if ($this->session->userdata('is_logged_in') == TRUE) {
            // Wyciągnięcie imienia i nazwiska użytkownika
            $table = 'a1_user';
            $where = array(
                'a1_email' => $this->session->userdata('email')
                
            );
            
            // Zapisanie wyników w tablicy $data['result']...
            $data['result'] = $this->data_m->get_data($table, $where);
            
            // Ściągnięcie 4 elementu adresu URI
            $id = $this->uri->segment(4);
            
            // Wyciągnięcie zapisanych content'ów w BD
            $table = 'c1_content';
            $where = array(
                'c1_id' => $id,
                'c1_c2_id' => 6,
                'c1_status' => 1
                
            );
            
            $data['start'] = $this->data_m->get_data($table, $where);
            
            $table = 'c11_gallery';
            $where = array(
                'c11_status' => 1,
                'c11_c1_id' => $id
                
            );
            
            $data['pics'] = $this->data_m->get_data($table, $where);
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/gallery_menu_v');
            $this->load->view('admin/gallery_pic_edit_v');
            $this->load->view('admin/footer_v');
        
        } else {
            // Wywołanie strony logowania z informacją o wylogowaniu
            $data = array(
                'message_access_deny' => 'Proszę się zalogować!'

            );

            $this->load->view('admin/account_v', $data);
            
        }

    }
    
    public function update_slide_title() {
        // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
        $id = $this->uri->segment(4);
        
        // Ustawienie zmiennych dla dokonania zmiany rekordu
        $table = 'c11_gallery';
        $where = array(
            'c11_id' => $id
            
        );

        $set = array(
            'c11_title' => $this->input->post('title')

        );
        
        // Wywołanie metody zmiany rekordu w BD
        $this->data_m->update_data($table, $set, $where);
        
        // Wywołanie strony wyjściowej z informacją o zmianie
        $data = array(
            'message_change_article' => 'Tytuł zdjęcia zmieniony ;)'

        );

        $this->index($data);
        
    }
    
    public function update_slide() {
        // Konfiguracja dozwolonych typów plików do 'upload'u'
        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name' => TRUE
            
        );
        
        // Tworzenie obiektu klasy UPLOAD z parametrami jakie ma spełaniać wgrywany plik
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $error = array(
                'error' => $this->upload->display_errors()
                
            );
            
            $this->index($error);
            
        } else {
            // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
            $id = $this->uri->segment(4);
            
            // Uzyskanie nazwy pliku http://stackoverflow.com/questions/16345761/codeigniter-get-the-uploaded-file-name
            $upload_data = $this->upload->data(); // Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            
            // Ustawienie zmiennych dla dokonania zmiany rekordu
            $table = 'c11_gallery';
            $where = array(
                'c11_id' => $id

            );
            
            $set = array(
                'c11_pic' => $file_name

            );
            
            // Wywołanie metody zmiany rekordu w BD
            $this->data_m->update_data($table, $set, $where);
            
            // Wywołanie strony wyjściowej z informacją o zmianie
            $data = array(
                'message_change_pic' => 'Zdjęcie w tle zmienione ;)'

            );

            $this->index($data);
            
        }
        
    }
    
    public function fake_delete_slide() {
        // Ściągnięcie 4 elementu adresu URI
        $id = $this->uri->segment(4);
        
        // Ustawienie tabeli
        $table = 'c11_gallery';
        
        // Ustawienie co ma być zmienione
        $set = array(
            'c11_status' => 0
            
        );
        
        // Ustawienie kryterium do zapytania        
        $where = array(
            'c11_id' => $id
                
        );
            
        // Zmiana rekordu z uwzględnieniem ww. ustawień
        $this->data_m->update_data($table, $set, $where);
        
        $data['message_delete_gallery'] = 'Wybrana galeria została z powodzeniem usunięta.';
        
        $this->index($data);
        
    }
    
    public function add_slide() {
        // Ściągnięcie 4 elementu adresu URI
        $id = $this->uri->segment(4);
        
        // Ustawienie tabeli
        $table = 'c11_gallery';
        
        // Ustawienie co ma być dodane
        $set = array(
            'c11_title' => $this->input->post('title'),
            'c11_alt' => $this->input->post('title'),
            'c11_c1_id' => $id
            
        );
        
         // Dodanie rekordu z uwzględnieniem ww. ustawień
        $this->data_m->insert_data($table, $set);
        
        $data['message_add_gallery'] = 'Utworzono nową galerię.';
        
        redirect('/admin/gallery_slider', 'refresh');
        
    }
    
}