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
        
    public function add($param) {
        $info = array(
            'height' => $param["height"],
            'weight' => $param["weight"],
            'hp' => $param["hp"],
            'atk' => $param["atk"],
            'def' => $param["def"],
            'satk' => $param["satk"],
            'sdef' => $param["sdef"],
            'spd' => $param["spd"]
        );
        
        $data = array(
            'NUMBER' => $param["number"],
            'NAME' => $param["name"],
            'THUMBNAIL' => $param["thumbnail"],
            'GIF' => $param["gif"],
            'AVARTAR' => $param["avartar"],
            'INFO' => serialize($info),
            'STATUS' => $param["status"],
            
        );
        
        return $this->db->insert('pokemon', $data);
    }
        
    public function update($param) {
        $info = array(
            'height' => $param["height"],
            'weight' => $param["weight"],
            'hp' => $param["hp"],
            'atk' => $param["atk"],
            'def' => $param["def"],
            'satk' => $param["satk"],
            'sdef' => $param["sdef"],
            'spd' => $param["spd"]
        );
                
        $data = array(
            'NUMBER' => $param["number"],
            'NAME'  => $param["name"],
            'THUMBNAIL'  => $param["thumbnail"],
            'GIF'  => $param["gif"],
            'AVARTAR'  => $param["avartar"],
            'INFO'  => serialize($info),
            'ISTATUSNFO'  => $param["status"]
        );

        $this->db->where('id', $param['id']);
        
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
                    'name' => $row['NAME'],
                    'thumbnail' => $row['THUMBNAIL'],
                    'gif' => $row['GIF'],
                    'avartar' => $row['AVARTAR'],
                    'info' => unserialize($row['INFO']),
                    'status' => $row['STATUS']
                );
            }
        } else {
            $pList['status'] = 0;
        }
        return json_encode($pList);
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

        $this->db->where('id', $id);
        return $this->db->update('pokemon',  array('INPROGRESS' => '1'));
    }
}