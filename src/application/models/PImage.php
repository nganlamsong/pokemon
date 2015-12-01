<?php
class PImage extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function get_images($count = 20, $id = NULL) {
        $query = $this->db->get('images', $count, 0);
        return $query->result_array();
    }
    
    public function get_images_pkm($id = NULL) {
        $query = $this->db->get_where('images', array('pokemon_id' => $id));
        return $query->result_array();
    }
    
    public function add_image($p_id, $url) {
        $data = array(
            'POKEMON_ID' => $p_id,
            'URL' => $url
        );
        
        $result = array(
            'data' => $data,
            'result' => $this->db->insert('images', $data)
        );
        
        return json_encode($result);
    }
    
     public function delete_image($id) {
        $result = array(
            'result' => $this->db->delete('images', array('id' => $id))
        );
        return json_encode($result);
    }
}