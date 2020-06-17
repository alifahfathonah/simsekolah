<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
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
		$kelas['semua'] = $this->Model_crud->selectWhere("tblkelas", "tingkat > 0 ORDER BY tingkat ASC");		
		// $data['category'] = $this->Model_category->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_kelas',$kelas);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';

		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$valid = 0;
			$error .= validation_errors();
		}

		if($valid==1){
			$data['kelas'] = $_POST["kelas"];
			$data['tingkat'] = $_POST["tingkat"];
			$data['ketkelas'] = $_POST["ket"];
			if($id=='tambah'){
				$data['idkelas'] = date('YmdHis');
				$this->Model_crud->add('tblkelas', $data);
			} else {
				$this->Model_crud->update('tblkelas', array('idkelas'=> $id), $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url().'admin/kelas');
	}

	public function hapus($id){
		$this->Model_crud->delete('tblkelas', array('idkelas'=> $id));
		redirect(base_url().'admin/kelas');
	}
}
