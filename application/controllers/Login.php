<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function sidebar()
    {
        $this->load->view('templates/sidebar');	
    } 
    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cari user
        $user = $this->modelUser->selectuser($username);

        //jika user ada
        if(md5($password) == $user['password'])
        {
            $data = array(
                'username' => $user['username'],
                'id_user' => $user['id_user'],
                'nama_user' => $user['nama_user'],
                'id_level' => $user['id_level']
                
            );
            $this->session->set_userdata($data);
            redirect('Home');
            
            



        
        }else{
            $this->session->set_flashdata('message',
                '<div class = "alert alert-dismissible
                alert-danger" role="alert">
                <span aria-hidden="true">
                </span></button>User tidak ditemukan</div>
                ');
            redirect('login');
    }
    
}
public function logout(){
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('password');
    $this->session->unset_userdata('nama_user');
    redirect('login');
}

}
?>
