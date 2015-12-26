<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('OFFLINE', true);
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pokemon');
        $this->load->model('pimage');
        $this->load->helper('url');
        $this->load->library('session');
    }
        
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $this->load_admin_page();
        } else {
            // Load form helper library
            $this->load->helper('form');
            $this->load->view('admin/login');
        }
    }
    
    // Check for user login process
    public function user_login_process() {
        // Load database
        $this->load->model('muser');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $result = $this->muser->login($data);
        if ($result == TRUE) {

            $username = $this->input->post('username');
            if ($result != false) {
                $session_data = array(
                    'username' => $username,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                $this->load_admin_page();
            }
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('admin/login', $data);
        }
    }
    
    // Logout from admin page
    public function logout() {
        $this->load->helper('form');
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('admin/login', $data);
    }
    
    private function load_admin_page() {
        $data['list'] = $this->pokemon->get_list();
        $data['images_list'] = $this->pimage->get_all_images();
        $data['images_count'] = $this->pimage->get_image_count();
        $data['in_progress'] = $this->pokemon->get_progress_pkm();
        $this->load->view('admin/common/header');
        $this->load->view('admin/home', $data);
        $this->load->view('admin/common/footer');
    }


    public function add_pokemon() {
        return $this->pokemon->add($this->input);
    }
    
    public function delete_pokemon() {
        $id = $_REQUEST['id'];
        return $this->pokemon->delete($id);
    }
    
    public function update_pokemon () {
        return $this->pokemon->update($this->input);
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
        $this->load->model('pimage');
        $this->load->model('mimgpkm');
        $img_id = $this->pimage->add_image($this->input);
        $pokemon_name = explode(',', $this->input->post('pokemon'));
        for($x = 0; $x < count($pokemon_name); $x++) {
            $id = $this->pokemon->getPokemonIdByName($pokemon_name[$x]);
            if ($id) {
                //this pokemon has already exist, we have its id
                $this->mimgpkm->add($id, $img_id);
            } else {
                //add dump pokemon
                $temp_id = $this->pokemon->addDump($pokemon_name[$x]);
                //take dump id and then add a new image_pokemon entity
                $this->mimgpkm->add($id, $img_id);
            }
        }
        echo 1;
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
    
    public function auto_complete() {
        $filter_name = $this->input->post('filter_name');
        echo $this->pokemon->auto_complete($filter_name);
    }
}