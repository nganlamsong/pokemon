<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('PER_PAGE', 25);

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokemon');
        $this->load->model('pimage');
        $this->load->helper('url');
    }

    private function initPaging() {
        $config = array();
        $config["base_url"] = base_url() . "index.php/home/page/";
        $config["total_rows"] = $this->mpagination->record_count();
        $config["per_page"] = PER_PAGE;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        return $config;
    }

    public function index() {
        $data["images"] = $this->pimage->get_images_paging(0, PER_PAGE);
        $data['title'] = 'title';
        $data['in_progress'] = $this->pokemon->get_progress_pkm();
        $delimiter = $this->pimage->record_count() / PER_PAGE;
        $round = round($delimiter);
        if ($round <= $delimiter) {
            $data['max_page'] = $round + 1;
        } else {
            $data['max_page'] = $round;
        }
        $this->load->view('common/header');
        $this->load->view('pages/home', $data);
        $this->load->view('common/footer');

    }

    public function page() {
        $page = $this->input->post('page');
        $start = ($page - 1)*PER_PAGE;
        $data["images"] = $this->pimage->get_images_paging (PER_PAGE, $start);
        $this->load->view('pages/griditem',$data);
    }
}