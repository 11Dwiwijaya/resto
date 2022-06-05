<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');
        $this->load->model('modelAdmin');
        if ($this->session->userdata['id_level'] != 1) {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function log()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/log');
        $this->load->view('templates/footer');
    }

    public function daftarpegawai()
    {
        $data['pegawai'] = $this->modelAdmin->get_pegawai();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/daftar',$data);
        $this->load->view('templates/footer');

    }
    public function tambah(){
        $data['level'] = $this->modelAdmin->getlevel();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/tambah',$data);
    $this->load->view('templates/footer');
    }
    public function tambahdata(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass')),
            'nama_user' => $this->input->post('nm_user'),
            'id_level' => $this->input->post('level')
            );
        $this->modelAdmin->tambahdata($data);
        redirect('Admin/daftarpegawai');
    }
    public function hapus($id){
        $this->modelAdmin->hapusdata($id);
        redirect('Admin/daftarpegawai');
        

    }
    public function edit($id){
        $data['pegawai'] = $this->modelAdmin->getpegawaibyid($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/edit',$data);
        $this->load->view('templates/footer');
    }
    public function editdata(){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama_user' => $this->input->post('nm_pegawai'),
            'id_level' => $this->input->post('level')
            );
        $this->modelAdmin->editdata($data);
        redirect('admin/daftarpegawai');
        
    }

}
?>