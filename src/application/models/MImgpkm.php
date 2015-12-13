<?php
class MImgpkm extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function add($pkm_id, $img_id) {
        
        $data = array(
            'PID' => $pkm_id,
            'IID' => $img_id,
        );
        
        return $this->db->insert('image_pokemon', $data);
    }
}