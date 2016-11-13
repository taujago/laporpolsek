<?php
class User_model extends Model {

    function User_model()
    {
	parent::Model();
        $this->load->database();
    }

    function tambahuser($dataarray)
    {
        for($i=0;$i<count($dataarray);$i++){
            $data = array(
                'nama'=>$dataarray[$i]['nama'],
                'alamat'=>$dataarray[$i]['alamat']
            );
            $this->db->insert('user', $data);
        }
    }

    function getuser()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

}
?>