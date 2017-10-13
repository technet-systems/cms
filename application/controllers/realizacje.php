<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Realizacje extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('data_m');
        $this->load->library('uri');
		$this->load->helper('text');
        
    }

    public function index() {
        // Wyciągnięcie danych kontaktowych z BD
        $table = 'c1_content';
        $where = array(
            'c1_id' => 7
            
        );
        
        $data['contact'] = $this->data_m->get_data($table, $where);
        
        $this->load->helper('no_pl');
        
        // Wyciągnięcie meta danych
        $table = 'c2_page';
        $where = array(
            'c2_id' => 6

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_c2_id' => 6
            
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
        $this->load->view('site/gallery_v');
        $this->load->view('site/footer_v');
        
    }
    
    public function zdjecia() {
        $id = $this->uri->segment(4);
        
        // Wyciągnięcie danych kontaktowych z BD
        $table = 'c1_content';
        $where = array(
            'c1_id' => 7
            
        );
        
        $data['contact'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie meta danych
        $table = 'c2_page';
        $where = array(
            'c2_id' => 7

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęcia w tle
        $table = 'c11_gallery';
        $where = array(
            'c11_c1_id' => 2
            
        );
        
        $data['bg'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_id' => $id
            
        );
        
        $data['content'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęć z danej galerii
        $table = 'c11_gallery';
        $where = array(
            'c11_status' => 1,
            'c11_c1_id' => $id
            
        );
        
        $data['pics'] = $this->data_m->get_data($table, $where);
        
        $this->load->view('site/header_v', $data);
        $this->load->view('site/menu_v');
        $this->load->view('site/gallery_pics_v');
        $this->load->view('site/footer_v');
        
    }
    
    public function model($model, $id) {
        // Wyciągnięcie danych kontaktowych z BD
        $table = 'c1_content';
        $where = array(
            'c1_id' => 7
            
        );
        
        $data['contact'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie meta danych
        $table = 'c2_page';
        $where = array(
            'c2_id' => 7

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęcia w tle
        $table = 'c11_gallery';
        $where = array(
            'c11_c1_id' => 2
            
        );
        
        $data['bg'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_id' => $id
            
        );
        
        $data['content'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęć z danej galerii
        $table = 'c11_gallery';
        $where = array(
            'c11_status' => 1,
            'c11_model' => $model,
            'c11_c1_id' => $id
            
        );
        
        $data['pics'] = $this->data_m->get_data($table, $where);
        
        $this->load->view('site/header_v', $data);
        $this->load->view('site/menu_v');
        $this->load->view('site/gallery_pics_model_v');
        $this->load->view('site/footer_v');
    }
    
}