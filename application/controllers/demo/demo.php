<?php
class Demo extends CI_Controller {
 
    function __construct() {
        parent::__construct();
    }
 
    function index() {
        // return to previous page
        redirect(base_url());
    }
 
    function ci_pagination() {
        $this->load->library('pagination');
        $this->load->library('table');
        $this->load->model('demo/Demo_page');
 
        $result_per_page = 2;  // the number of result per page
 
        $config['base_url'] = base_url() . '/demo/demo/ci_pagination/';
        $config['total_rows'] = $this->Demo_page->count_items();
        $config['per_page'] = $result_per_page;
        $this->pagination->initialize($config);
 
        $datatable = $this->Demo_page->get_items($result_per_page, $this->uri->segment(4));
 
        $this->load->view('demo/ci_pagination', array(
            'datatable' => $datatable,
            'result_per_page' => $result_per_page
        ));
    }
}