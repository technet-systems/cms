<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Content_news extends CI_Controller {
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
            $table_c1 = 'c1_content';
            $where_c1 = array(
                'c1_c2_id' => 3
                
            );
            
            $data['start'] = $this->data_m->get_data($table_c1, $where_c1);
            
            // Wyciągnięcie zapisanych meta tagów z BD
            $table_c2 = 'c2_page';
            $where_c2 = array(
                'c2_id' => 3
                                
            );
            
            $data['meta_start'] = $this->data_m->get_data($table_c2, $where_c2);
            
            // Załadowanie helpera textowego
            $this->load->helper('text');
            
            // Elementy paginacji (biblioteka URI już załadowana w konstruktorze
            // Źródło: http://stackoverflow.com/questions/12164114/codeigniter-bootstrap-pagination
            $this->load->library('pagination');
            
            $config['base_url'] = base_url().'admin/content_news';
            $config['total_rows'] = $this->data_m->get_rows($table_c1, $where_c1);
            $config['per_page'] = 2;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';            
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['num_links'] = round( $config["total_rows"] / $config["per_page"] );
            $config['start'] = $this->data_m->get_data($table_c1, $where_c1);
            $this->pagination->initialize($config);
            $config['pages'] = $this->pagination->create_links();
            
            // ...i przekazanie wyników do odpowiednich widoków
            $this->load->view('admin/header_v', $data);
            $this->load->view('admin/content_menu_v');
            $this->load->view('admin/content_news_v', $config);
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
        
        $set = array(
            'c1_title' => $this->input->post('title'),
            'c1_subtitle' => $this->input->post('subtitle'),
            'c1_text' => $this->input->post('text')
            
        );
        
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
    
    public function update_status() {
        // Wydobycie 'id' z adresu podanego przy 'action' w formularzu
        $id = $this->uri->segment(4);
        
        // Ustawienie zmiennych dla dokonania zmiany rekordu
        $table = 'c1_content';
        $where = array(
            'c1_id' => $id
            
        );
        
        $set = array(
            'c1_status' => $this->input->post('status')
            
        );
        
        // Wywołanie metody zmiany rekordu w BD
        $this->data_m->update_data($table, $set, $where);
        
        // Wywołanie strony wyjściowej z informacją o zmianie
        $data = array(
            'message_change_status' => 'Status podstrony zmieniony ;)'

        );

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
            'c1_subtitle' => $this->input->post('subtitle'),
            'c1_text' => $this->input->post('text'),
            'c1_c2_id' => $id
            
        );
        
         // Dodanie rekordu z uwzględnieniem ww. ustawień
        $this->data_m->insert_data($table, $set);
        
        $data['message_add_article'] = 'Utworzono nowy artykuł.';
        
        $this->index($data);
        
    }
    
}