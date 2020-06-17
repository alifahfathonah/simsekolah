<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perpus extends CI_Model 
{
    private $dbsim;

    public function __construct()
    {
        parent::__construct();
        $this->dbsim = $this->load->database('sim', TRUE);
    }
    public function get_buku()
    {
        $this->dbsim->from('tblbuku');
        return $this->dbsim->get();
    }
    public function get_buku_left($idbuku)
    {
        $this->dbsim->select('jumlahbuku');
        return $this->dbsim->get_where('tblbuku',['idbuku'=>$idbuku])->row();
    }
}