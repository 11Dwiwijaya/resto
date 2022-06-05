<?php
Class modelLaporan extends CI_Model{


    function getLaporanHarian($tgl_awal, $tgl_akhir){
        $this->db->SELECT('SUM(T.jumlah_pesanan),TM.harga, TM.nama_masakan, T.tanggal_transaksi, T.id_menu, COUNT(T.id_masakan), COUNT(T.tanggal_transaksi)');
        $this->db->FROM('transaksi T');
        $this->db->JOIN('masakan TM', 'TM.id_masakan = T.id_masakan');
        // $this->db->WHERE('T.tanggal_transaksi BETWEEN ''');
        // $this->db->GROUP_BY('');
        // $this->db->HAVING('');
        // $this->db->ORDER_BY('');
        // $this->db->GET('');
    }


}
?>