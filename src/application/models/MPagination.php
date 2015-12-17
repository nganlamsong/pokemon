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
            return $query->result_array();
        }
        return false;
    }
}