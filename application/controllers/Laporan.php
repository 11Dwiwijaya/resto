<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelLaporan');
        if ($this->session->userdata['id_level'] != 2) {
            redirect('login/logout');
        }

    }
    public function index()
    {
        $data['bulan'] = [
            '01'        => "January",
            '02'        => "February",
            '03'        => "March",
            '04'        => "April",
            '05'        => "May",
            '06'        => "June",
            '07'        => "July",
            '08'        => "August",
            '09'        => "September",
            '10'        => "October",
            '11'        => "November",
            '12'        => "December",
        ];
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/laporan',$data);
        $this->load->view('templates/footer');
    }
    public function getLaporanHarian()
    {
        $this->session->unset_userdata('laporan');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $laporan_harian = $this->modelLaporan->getLaporanHarian($tgl_awal, $tgl_akhir);
            redirect('laporan');
        
    }

        
}
?>