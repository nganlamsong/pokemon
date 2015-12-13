<?php
class Pokemon extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_list() {
        $this->db->order_by('number ASC');
        $result = $this->db->get('pokemon');
        $result_array = $result->result_array();
        $pList = array();
        if ($result) {
            foreach ($result_array as $row) {
                $pList[] = array(
                    'id' => $row['ID'],
                    'number' => $row['NUMBER'],
                    'name' => $row['NAME'],
                    'thumbnail' => $row['THUMBNAIL'],
                    'gif' => $row['GIF'],
                    'avartar' => $row['AVARTAR'],
                    'info' => unserialize($row['INFO']),
                    'status' => $row['STATUS']
                );
            }
        }
        return $pList;
    }
        
    private function getDataFromInput($param) {
        $info = array(
            'hp' => $param->post("hp"),
            'atk' => $param->post("atk"),
            'def' => $param->post("def"),
            'satk' => $param->post("satk"),
            'sdef' => $param->post("sdef"),
            'spd' => $param->post("spd")
        );
        
        $data = array(
            'NUMBER' => $param->post("number"),
            'NAME' => $param->post("name"),
            'INFO_URL' => $param->post("info_url"),
            'THUMBNAIL' => $param->post("thumbnail"),
            'GIF' => $param->post("gif"),
            'AVARTAR' => $param->post("avartar"),
            'INFO' => serialize($info),
            'STATUS' => $param->post("status"),
            'MEGA' => ($param -> post("mega"))? 1:0,
            'LEGEND' => ($param -> post("legend"))? 1:0,
        );
        
        return $data;
    }
    
    public function add($param) {
        $data = $this->getDataFromInput($param);
        return $this->db->insert('pokemon', $data);
    }
    
    public function addDump($name) {
        $data = array(
            'NAME' => $name
        );
        $this->db->insert('pokemon', $data);
        return $this->db->insert_id();
    }
        
    public function update($param) {
        $data = $this->getDataFromInput($param);
        $this->db->where('id', $param->post('id'));
        
        return $this->db->update('pokemon', $data);
    }
        
    public function get($id) {
        $result = $this->db->get_where('pokemon', array('id' => $id));
        $result_array = $result->result_array();
        $pList = array();
        if ($result) {
            $pList['status'] = 1;
            foreach ($result_array as $row) {
                $pList['data'] = array(
                    'id' => $row['ID'],
                    'number' => $row['NUMBER'],
                    'infoUrl' => $row['INFO_URL'],
                    'name' => $row['NAME'],
                    'thumbnail' => $row['THUMBNAIL'],
                    'gif' => $row['GIF'],
                    'avartar' => $row['AVARTAR'],
                    'info' => unserialize($row['INFO']),
                    'status' => $row['STATUS'],
                    'mega' => $row['MEGA'],
                    'legend' => $row['LEGEND'],
                );
            }
        } else {
            $pList['status'] = 0;
        }
        return json_encode($pList);
    }
    
    public function getPokemonIdByName($name) {
        $result = $this->db->get_where('pokemon', array('name' => $name));
        $result_array = $result->result_array();
        return ($result_array)?($result_array[0]["ID"]):false;
    }
        
    public function delete($id) {
        return json_encode($this->db->delete('pokemon', array('id' => $id)));
    }

    public function get_progress_pkm() {
        $result = $this->db->get_where('pokemon', array('INPROGRESS' => '1'));
        return $result->result_array();
    }

    public function start_progress($id) {

        $this->db->where('inprogress', '1');
        $this->db->update('pokemon', array('INPROGRESS' => '0'));

        date_default_timezone_set('Asia/Saigon');
        $date_array = getdate();

        $this->db->where('id', $id);
        return $this->db->update('pokemon',  array('INPROGRESS' => '1', 'DATE_START' => json_encode($date_array)));
    }
}