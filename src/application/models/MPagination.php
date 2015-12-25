<?php
class MPagination extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function record_count($category) {
        $this->db->select('images.id');
        $this->db->from('images');
        $this->db->join('image_pokemon', 'images.id = image_pokemon.iid', 'left');
        $this->db->join('pokemon', 'image_pokemon.pid = pokemon.id', 'left');
        
        if ($category == 'legend') {
            $this->db->where('pokemon.legend', 1);
        } else if ($category == 'mega') {
            $this->db->where('pokemon.mega', 1);
        } else {
            $this->db->where(array('pokemon.legend' => 0, 'pokemon.mega' => 0));
        }
        
        return $this->db->count_all_results();
    }

    public function fetch_images ($limit, $start, $category) {
        $this->db->select('images.id, images.url, images.origin');
        $this->db->from('images');
        $this->db->join('image_pokemon', 'images.id = image_pokemon.iid', 'left');
        $this->db->join('pokemon', 'image_pokemon.pid = pokemon.id', 'left');
        
        if ($category == 'legend') {
            $this->db->where('pokemon.legend', 1);
        } else if ($category == 'mega') {
            $this->db->where('pokemon.mega', 1);
        } else {
            $this->db->where(array('pokemon.legend' => 0, 'pokemon.mega' => 0));
        }
        
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $pList = array();
            foreach ($result as $image) {
                $this->db->select('*');
                $this->db->from('pokemon');
                $this->db->join('image_pokemon', 'pokemon.id = image_pokemon.pid');
                $this->db->where('image_pokemon.iid', $image["id"]);
                
                if ($category == 'legend') {
                    $this->db->where('pokemon.legend', 1);
                } else if ($category == 'mega') {
                    $this->db->where('pokemon.mega', 1);
                } else {
                    $this->db->where(array('pokemon.legend' => 0, 'pokemon.mega' => 0));
                }
                
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