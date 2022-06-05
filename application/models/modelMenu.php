<?php
Class modelMenu extends CI_Model{


    function get_menu()
    {
        $this->db->select('*');
        $this->db->from('masakan');
        $result = $this->db->get()->result_array();
        return $result;
    }
    function getmenubyid($id){
        $this->db->where('id_masakan',$id);
        $this->db->from('masakan');
        $query = $this->db->get()->row_array();
        return $query;
    }
    function tambahdata($data){
        $this->db->insert('masakan',$data);

    }
    function hapusdata($id){
        $this->db->where('id_masakan',$id);

        $this->db->delete('masakan');
    }
    function editdata($data){
        // $this->db->where('id_masakan',$data['id_masakan']);
        // $this->db->update('masakan',$data);
        $this->db->where("masakan.id_masakan", $data['id_masakan']);
        $this->db->update("masakan", $data);
        var_dump($this->db->last_query());
        
    }


}