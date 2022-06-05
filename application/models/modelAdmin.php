<?php
Class modelAdmin extends CI_Model{


    function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('user');
        $result = $this->db->get()->result_array();
        return $result;
    }
    function getpegawaibyid($id){
        $this->db->where('id_user',$id);
        $this->db->from('user');
        $query = $this->db->get()->row_array();
        return $query;
    }
    function getlevel(){
        $this->db->get('level')->result_array();
    }
    function tambahdata($data){
        $this->db->insert('user',$data);

    }
    function hapusdata($id){
        $this->db->where('id_user',$id);

        $this->db->delete('user');
    }
    function editdata($data){
        // $this->db->where('id_masakan',$data['id_masakan']);
        // $this->db->update('masakan',$data);
        $this->db->where("user.id_user", $data['id_user']);
        $this->db->update("user", $data);
        //var_dump($this->db->last_query());
    }

}