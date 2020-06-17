<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buku extends CI_Model 
{
    private $dbsim;
    public function __construct()
    {
        parent::__construct();
        $this->dbsim = $this->load->database('sim', TRUE);
    }
    public function getAllBuku()
    {
        return $this->dbsim->get('tblbuku');
    }
}