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
        $this->load->library("pagination");
        $this->load->model("mpagination");
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
        //pagination
        $config = $this->initPaging();
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["images"] = $this->mpagination->fetch_images ($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


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
        $config = $this->initPaging();
        $this->pagination->initialize($config);
        $page = $this->input->post('page');
        if ($this->input->post('getpaging')) {
            $data["links"] = $this->pagination->create_links();
            $this->load->view('pages/pagination',$data);
        } else {
            $start = ($page - 1)*PER_PAGE;
            $data["images"] = $this->mpagination->fetch_images (PER_PAGE, $start);
            $this->load->view('pages/griditem',$data);
        }
    }
}