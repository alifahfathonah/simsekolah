<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model 
{
    private $dbsim;

    public function __construct()
    {
        parent::__construct();
        $this->dbsim = $this->load->database('sim', TRUE);
    }
    public function match($email,$password)
    {
        return $this->dbsim->get_where('tbluser',['email'=>$email,'password'=>$password])->row();
    }
    public function getSiswaById($id)
    {
        return $this->dbsim->get_where('tblsiswa',['nisn'=>$id])->row();
    }
}