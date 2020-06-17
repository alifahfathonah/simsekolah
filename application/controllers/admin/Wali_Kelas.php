<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_Kelas extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('Model_crud');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['semua'] = $this->Model_crud->show("detail_wali_kelas");
		$return['kelas'] = $this->Model_crud->selectWhere("tblkelas", "tingkat > 0 ORDER BY tingkat ASC");
		$return['guru'] = $this->Model_crud->show("tblguru");
		$return['tahun'] = $this->Model_crud->selectWhere('tbltahun', 'status = 1')[0]['tahun'];

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_wali_kelas',$return);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';

		if($valid==1){
			$data['idkelas'] = $_POST["kelas"];
			$data['nik'] = $_POST["guru"];
			$data['ketwalikelas'] = $_POST["ket"];
			$data['tahun'] = $_POST["tahun"];
			if($id=='tambah'){
				$data['idwalikelas'] = date('YmdHis');
				$this->Model_crud->add('tblwalikelas', $data);
			} else {
				$this->Model_crud->update('tblwalikelas', array('idwalikelas'=> $id), $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url().'admin/wali_kelas');
	}

	public function hapus($id){
		$this->Model_crud->delete('tblwalikelas', array('idwalikelas'=> $id));
		redirect(base_url().'admin/wali_kelas');
	}
}
