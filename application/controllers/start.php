<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Start extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('data_m');
		$this->load->helper('text');
        
    }

    public function index() {
		// URL: https://ellislab.com/codeigniter/user-guide/general/caching.html
//		$this->output->cache(2);
        // Wyciągnięcie danych kontaktowych z BD
        $table = 'c1_content';
        $where = array(
            'c1_id' => 7
            
        );
        
        $data['contact'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie meta danych
        $table = 'c2_page';
        $where = array(
            'c2_id' => 1

        );
            
        $data['meta_tags'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie treści strony
        $table = 'c1_content';
        $where = array(
            'c1_status' => 1,
            'c1_c2_id' => 1
            
        );
        
        $data['content'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie aktualnego tekstu promocyjnego
        $table = 'e1_promo';
        $where = 'e1_fdate <= NOW() AND e1_ldate >= NOW()';
        
        $data['promo'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie fotek do slidera
        $table = 'c11_gallery';
        $where = array(
            'c11_c1_id' => 1
            
        );
        
        $data['slider'] = $this->data_m->get_data($table, $where);
        
        // Wyciągnięcie zdjęcia w tle
        $table = 'c11_gallery';
        $where = array(
            'c11_c1_id' => 2
            
        );
        
        $data['bg'] = $this->data_m->get_data($table, $where);
            
        $this->load->view('site/header_v', $data);
        $this->load->view('site/menu_v');
        $this->load->view('site/start_v');
        $this->load->view('site/footer_v');
        
    }
    
}