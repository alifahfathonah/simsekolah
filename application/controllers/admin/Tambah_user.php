<?php
    class Tambah_user extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->db->db_select('sim');
            $this->load->helper('date');
        }
        public function index()
        {
            $this->load->view('admin_perpustakaan/view_tambah');
            $microtime = floatval(substr((string)microtime(), 1, 8));
            $rounded = round($microtime, 3);
            echo date("Y-m-d H:i:s") . (strlen(substr((string)$rounded, 1, strlen($rounded))) == 3 ? substr((string)$rounded, 1, strlen($rounded))."0" : substr((string)$rounded, 1, strlen($rounded)));
        }
        public function create_user()
        {
            $id="";
            $microtime = floatval(substr((string)microtime(), 1, 8));
            $rounded = round($microtime, 3);
            $id = date("YmdHis") . str_replace('.','',substr((string)$rounded, 1, strlen($rounded)));
            
            if ($_POST) {
                $data=array(
                    'iduser' => $id,
                    'idgrup' => $_POST['idgrup'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'statususer' => $_POST['statususer']
                );
                $this->db->insert('tbluser',$data);
                redirect('admin_perpustakaan/tambah_user');
            }
        }
    }