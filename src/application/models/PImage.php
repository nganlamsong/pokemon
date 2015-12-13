<?php
class PImage extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    function record_count() {
        return $this->db->count_all('images');
    }

    public function get_all_images(){
        $query = $this->db->get('images');
        return $query->result_array();
    }

    public function get_images($count = 25) {
        $query = $this->db->get('images', $count, 0);
        return $query->result_array();
    }
    
    public function get_images_paging($start, $limit = 25) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('images');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    
    public function get_image_count(){
        $this->db->from('images');
        return $this->db->count_all_results();
    }
    
    public function get_mega_image_count(){
        $this->db->where('MEGA', '0');
        $this->db->from('images');
        return $this->db->count_all_results();
    }
    
    public function get_images_pkm($id = NULL) {
        $query = $this->db->get_where('images', array('pokemon_id' => $id));
        return $query->result_array();
    }
    
    public function add_image($input) {
        
        $data = array(
            'URL' => $input->post('url'),
            'NAME' => $input->post('name'),
            'ORIGIN' => $input->post('origin'),
        );
        
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }
    
     public function delete_image($id) {
        $result = array(
            'result' => $this->db->delete('images', array('id' => $id))
        );
        return json_encode($result);
    }
    
    
}