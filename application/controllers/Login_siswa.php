<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_siswa extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_auth');
    // $this->load->library('form_validation');
    // $this->load->helper(['form','string']);
    $this->load->model('perpustakaan/Model_login');
  }
  public function index()
  {
    $this->load->view('perpustakaan/view_login_siswa');
    if ($this->session->userdata('logged_in')) {
      redirect('perpustakaan/dashboard');
    }
  }
  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // var_dump($this->Model_login->match($email,$password));
    $query = $this->Model_login->match($email,$password);
    if($query){
      $siswa = $this->Model_login->getSiswaById($query->iduser);
      $userdata = array(
        'nisn' => $query->iduser,
        'idgrup' => $query->idgrup,
        'nama' => $siswa->Nama,
        'email' => $query->email,
        'password' => $query->password,
        'statususer' => $query->statususer,
        'logged_in' => TRUE
      );

      $this->session->set_userdata( $userdata );
      redirect('perpustakaan/dashboard');
    }else{
      redirect('perpustakaan/login_siswa');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata(['iduser','idgrup','email','password','statususer','logged_in']);
    redirect('perpustakaan/login_siswa');
  }
}
