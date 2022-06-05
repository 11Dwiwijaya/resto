<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('modelUser');
        $this->load->model('modelKasir');
        $this->load->helper('sistem_helper');
        if ($this->session->userdata['id_level'] != 3) {
            redirect('login/logout');
        }
    }

    public function index()
    {
    $data = [
        'menu' => $this->db->get('masakan')->result_array(),
    ];
    //membuat kode transaksi
    $date = date('dmY');
    $string = 'C';
    $char = $string . $date;
    $lastNumber = $this->modelKasir->createLastNo($char);
    if(empty($lastNumber)){
        $lastNumber = 001;

    }else{
        $lastNumber = (int) $lastNumber['last_number']+1;

    }
    $fixnumber = sprintf('%03s',$lastNumber);
    $data['fixcode'] = $char . $fixnumber;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/addpesanan',$data);
        $this->load->view('templates/footer');
    }



    function searchmenu(){
        $jenis_menu = $this->input->post('jenis_menu');
        $item       = $this->modelKasir->getmenubyjenis($jenis_menu);
        //var_dump($item);
        $data = "<option hidden value='0'> Pilih menu  </option>";
        //var_dump($data);
            foreach ($item as $i){
                $data .= "<option  value='$i[id_masakan]'>$i[nama_masakan]</option>\n";
            }
        
        echo $data;
    }
    public function searchharga(){
        $id_menu = $this->input->post('id_menu');
        $item    = $this->modelKasir->gethargamenu($id_menu);
        
        echo $item['harga'];
    }
    function simpanDataPesanan(){
        $this->session->set_userdata('customer', $this->input->post('customer'));
        $this->session->set_userdata('kodemeja', $this->input->post('kodemeja'));
        $data_pesanan = array (
            'date'       => date('YmdHis'),
            'customer'   => $this->input->post('customer'),
            'menu_name'  => $this->input->post('menu_name'),
            'harga_menu' => $this->input->post('harga_menu'),
            'jml'        => $this->input->post('jml')
            
        );
        $dataArrayHeader       = $this->session->userdata('addArrayTransaksiPesanan');
        $dataArrayHeader[$data_pesanan['date']] = $data_pesanan;
        $this->session->set_userdata('addArrayTransaksiPesanan',$dataArrayHeader);
        var_dump($dataArrayHeader) or die;
        

    }
    function unset(){
        $this->session->unset_userdata('addArrayTransaksiPesanan');
        $this->session->unset_userdata('customer');
        $this->session->unset_userdata('kodemeja');
        $this->session->unset_userdata('harga');
        redirect('kasir');
    }
    public function prosesSimpanPesanan()
    {
        $data_transaksi = [
            'id_user'           => $this->session->userdata('id_user'),
            'kode_transaksi'    => $this->input->post('kode_transaksi'),
            'customer'          => $this->input->post('customer'),
            'id_meja'           => $this->input->post('kodemeja'),
            'tanggal_transaksi' => $this->input->post('tgl')
        ];
        //var_dump($data_transaksi);die;
            $bayar = $this->input->post('bayar');
            $kembali =$this->input->post('kembali');
            $id_transaksi  = $this->modelKasir->insertDataTransaksi($data_transaksi);
            $ItemTransaksi = $this->session->userdata('addArrayTransaksiPesanan');
            foreach ($ItemTransaksi as  $it) {
                $dataItemTransaksi = array(
                    'id_transaksi'      => $id_transaksi,
                    'id_masakan'        => $it['menu_name'],
                    'jumlah_harga'      => $it['harga_menu'],
                    'jumlah_pesanan'    => $it['jml'],
                    'tanggal_transaksi' => date('Y-m-d')
                );
                
                $this->modelKasir->insertDataItemTransaksi($dataItemTransaksi);
                // set activty log
            };
            $this->session->unset_userdata('addArrayTransaksiPesanan');
            $this->session->unset_userdata('customer');
            $this->session->unset_userdata('kodemeja');
            redirect('kasir');
        
    }
    function hapusDataPemesanan($date){
        $newArray = array();
        $seg3 = $this->uri->segment(3);
        $sessionName = "addArrayTransaksiPesanan";
        $dataArrayHeader    = $this->session->userdata($sessionName);
        foreach ($dataArrayHeader as $key => $val) {
            if ($key != $seg3) {
                $newArray[$key] = $val;
            }
        }
        $this->session->set_userdata('addArrayTransaksiPesanan', $newArray);
        
        redirect('kasir');
    }
    function transaksi(){
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/transaksi',$data);
        $this->load->view('templates/footer');
    }
    function detailtransaksi($id_transaksi){
        $data['detail'] = $this->modelKasir->getdatabyid($id_transaksi);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/detailtransaksi',$data);
        $this->load->view('templates/footer');
    }



}
?>