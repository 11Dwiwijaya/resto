<?php 
class Transaksi extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('modelUser');
        $this->load->model('modelTransaksi');
        $this->load->helper('sistem_helper');
        // if ($this->session->userdata['id_level'] != 2) {
        //     redirect('login/logout');
        // }
    }
    function transaksi(){
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/transaksi',$data);
        $this->load->view('templates/footer');
    }
    function detailtransaksi($id_transaksi){
        $data['detail'] = $this->modelTransaksi->getdatabyid($id_transaksi);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/detailtransaksi',$data);
        $this->load->view('templates/footer');
    }
}
?>