<?php
class modelKasir extends CI_Model
{


    function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('user');
        $result = $this->db->get()->result_array();
        return $result;
    }
    function getpegawaibyid($id)
    {
        $this->db->where('id_user', $id);
        $this->db->from('user');
        $query = $this->db->get()->row_array();
        return $query;
    }
    function getlevel()
    {
        $this->db->get('level')->result_array();
    }
    function tambahdata($data)
    {
        $this->db->insert('user', $data);
    }
    function hapusdata($id)
    {
        $this->db->where('id_user', $id);

        $this->db->delete('user');
    }
    function editdata($data)
    {
        // $this->db->where('id_masakan',$data['id_masakan']);
        // $this->db->update('masakan',$data);
        $this->db->where("user.id_user", $data['id_user']);
        $this->db->update("user", $data);
        var_dump($this->db->last_query());
    }
    public function getmasakan()
    {
    }

    public function getmenubyjenis($jenis_menu)
    {
        $this->db->select('id_masakan,nama_masakan');
        $this->db->from('masakan');
        $this->db->where('jenis_masakan', $jenis_menu);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function gethargamenu($id_menu)
    {
        $this->db->select('harga');
        $this->db->from('masakan');
        $this->db->where('id_masakan', $id_menu);
        $query = $this->db->get()->row_array();
        return $query;
    }
    function getmenuname($id_masakan){
        $this->db->select('nama_masakan');
        $this->db->from('masakan');
        $this->db->where('id_masakan',$id_masakan);
        $query = $this->db->get()->row_array();
        return $query['nama_masakan'];
    }

    public function insertdatatransaksi($data_transaksi){
        if($this->db->insert('transaksi',$data_transaksi)){
            return $this->db->insert_id();
            //! mengambil id saat di insert

        }else{
            return false;
        }
    }
    function insertdataitemtransaksi($dataitemtransaksi){
        if($this->db->insert('detail_pesan',$dataitemtransaksi)){
            return true;
        }else{
            return false;
        }
    }
    function createLastNo($char){
        $this->db->select('RIGHT(kode_transaksi,3) as last_number');
        $this->db->from('transaksi');
        $this->db->LIMIT(1);
        $this->db->where('LEFT(kode_transaksi,9)',$char);
        $this->db->order_by('transaksi.id_transaksi','desc');
        $result = $this->db->get()->row_array();
        return $result;
    }
    function getdatabyid($id_transaksi){
        $this->db->select('masakan.nama_masakan, detail_pesan.jumlah_harga,detail_pesan.jumlah_pesanan');
        $this->db->from('detail_pesan');
        $this->db->join('transaksi','transaksi.id_transaksi=detail_pesan.id_transaksi');
        $this->db->join('masakan','masakan.id_masakan=detail_pesan.id_masakan');
        // $this->db->select('SUM(jumlah_harga) as total', FALSE);
        $this->db->where('transaksi.id_transaksi',$id_transaksi);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
