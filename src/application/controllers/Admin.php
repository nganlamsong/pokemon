<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('OFFLINE', true);
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokemon');
        $this->load->helper('url');
    }
        
    public function index() {
        $data['list'] = $this->pokemon->get_list();
        $this->load->view('admin/common/header');
        $this->load->view('admin/home', $data);
        $this->load->view('admin/common/footer');
    }
    
    public function add_pokemon() {
        return $this->pokemon->add($_REQUEST);
    }
    
    public function delete_pokemon() {
        $id = $_REQUEST['id'];
        return $this->pokemon->delete($id);
    }
    
    public function update_pokemon () {
        return $this->pokemon->update($_REQUEST);
    }
    
    public function get_pokemon() {
        $id = $_REQUEST['id'];
        echo $this->pokemon->get($id);
    }
    
    public function get_images(){
        $pokemon_id = $_REQUEST['id'];
        $this->load->model('pimage');
        $data['images'] = $this->pimage->get_images_pkm($pokemon_id);
        $data['pokemon_id'] = $pokemon_id;
        $this->load->view('admin/image', $data);
    }
    
    public function add_img() {
        $pokemon_id = $_REQUEST['pokemon-id'];
        $url = $_REQUEST['url'];
        $this->load->model('pimage');
        echo $this->pimage->add_image($pokemon_id, $url);
    }
    
    public function delete_img() {
        $id = $_REQUEST['id'];
        $this->load->model('pimage');
        echo $this->pimage->delete_image($id);
    }
}