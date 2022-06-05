<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelMenu');
        if ($this->session->userdata['id_level'] != 2) {
            redirect('login/logout');
        }

    }
    public function index()
    {
        $data['menu'] = $this->modelMenu->get_menu();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/menu',$data);
        $this->load->view('templates/footer');
        

    

    }
    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/tambah');
        $this->load->view('templates/footer');
    }
    public function tambahmenu(){
        $data = array(
            'nama_masakan' => $this->input->post('nm_menu'),
            'harga' => $this->input->post('hg_menu'),
            'status_masakan' => 1,
            'jenis_masakan'=> $this->input->post('jenis_menu')
            
        );
        $this->modelMenu->tambahdata($data);
        redirect('menu');
    }
    public function hapus($id){
        $this->modelMenu->hapusdata($id);
        redirect('Menu');
        

    }
    public function edit($id){
        $data['menu'] = $this->modelMenu->getmenubyid($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager/edit',$data);
        $this->load->view('templates/footer');
    }
    public function editdata(){
        $data = array(
            'id_masakan' => $this->input->post('id_masakan'),
            'nama_masakan' => $this->input->post('nama_masakan'),
            'harga' => $this->input->post('harga'),
            'status_masakan' => $this->input->post('status_masakan'),
            'jenis_masakan'=> $this->input->post('jenis_menu')
            
        );
        $this->modelMenu->editdata($data);
        redirect('menu');
        //redirect('menu');
        
    }
    
    


}
?>