<?php
class MPagination extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function record_count() {
        return $this->db->count_all('images');
    }

    public function fetch_images ($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('images');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $pList = array();
            foreach ($result as $image) {
                $this->db->select('*');
                $this->db->from('pokemon');
                $this->db->join('image_pokemon', 'pokemon.id = image_pokemon.pid');
                $this->db->where('image_pokemon.iid', $image["ID"]);
                $pokemon = $this->db->get()->result_array();
                $pList[] = array(
                    'image' => $image,
                    'pokemon' => $pokemon,
                );
            }
            return $pList;
        }
        return false;
    }
}