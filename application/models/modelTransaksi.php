<?php 
class modelTransaksi extends CI_Model{
    function get_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $result = $this->db->get()->result_array();
        return $result;
    }
    function getdatabyid($id_transaksi){
        $this->db->select('masakan.nama_masakan, masakan.harga,detail_pesan.jumlah_pesanan');
        $this->db->from('detail_pesan');
        $this->db->join('transaksi','transaksi.id_transaksi=detail_pesan.id_transaksi');
        $this->db->join('masakan','masakan.id_masakan=detail_pesan.id_masakan');
        //$this->db->select('SUM(harga) * SUM(jumlah_pesanan) as total', FALSE);
        $this->db->where('transaksi.id_transaksi',$id_transaksi);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
?>