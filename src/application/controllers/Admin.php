<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('OFFLINE', false);
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokemon');
        $this->load->model('pimage');
        $this->load->helper('url');
    }
        
    public function index() {
        $data['list'] = $this->pokemon->get_list();
        $data['images_list'] = $this->pimage->get_all_images();
        $data['images_count'] = $this->pimage->get_image_count();
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

        $data['images'] = $this->pimage->get_images_pkm($pokemon_id);
        $data['pokemon_id'] = $pokemon_id;
        $this->load->view('admin/image', $data);
    }
    
    public function add_img() {
        $pokemon_id = $_REQUEST['pokemon-id'];
        $url = $_REQUEST['url'];
        $origin = $_REQUEST['origin'];
        $this->load->model('pimage');
        echo $this->pimage->add_image($pokemon_id, $url, $origin);
    }
    
    public function delete_img() {
        $id = $_REQUEST['id'];
        $this->load->model('pimage');
        echo $this->pimage->delete_image($id);
    }

    public function start_progress() {
        $id = $_REQUEST['id'];
        $inprogress = $this->pokemon->get_progress_pkm();
        $data=array();
        if ($inprogress) {
            $data["is_started"] = "1";
            $data["refOject"] = $inprogress;
        } else {
            //start progress the pokemon
            $data["is_started"] = "0";
            $data["refOject"] = $inprogress;
            $data["start_result"] = $this->pokemon->start_progress($id);
        }
        echo json_encode($data);
    }

    public function force_start_progress() {
        $id = $_REQUEST['id'];

        //start progress the pokemon
        $data["start_result"] = $this->pokemon->start_progress($id);

        echo json_encode($data);
    }
}