<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_Ajar extends CI_Controller
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
		$tahun['semua'] = $this->Model_crud->orderBy("tbltahun", "tahun DESC");
		// $data['category'] = $this->Model_category->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_tahun_ajar',$tahun);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';

		$this->form_validation->set_rules('tahun_awal', 'Tahun Awal', 'trim|required');
		$this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'trim|required');

		$tahun_awal = $_POST["tahun_awal"];
		$tahun_akhir = $_POST["tahun_akhir"];

		if($this->form_validation->run() == FALSE) {
			$valid = 0;
			$error .= validation_errors();
		}

		if($tahun_awal>=$tahun_akhir){
			$valid = 0;
			$error .= '<li>Tahun Awal harus lebih kecil</li>';
		}

		if(abs($tahun_awal-$tahun_akhir)!=1){
			$valid = 0;
			$error .= '<li>Selisih tahun minimal 1</li>';
		}

		if($valid==1){
			$data['tahun'] = $tahun_awal."-".$tahun_akhir;
			if($id=='tambah'){
				$data['idtahun'] = date('YmdHis');
				$update['status'] = 0;
				$this->Model_crud->update('tbltahun', array('status'=> 1), $update);
				$data['status'] = 1;
				$this->Model_crud->add('tbltahun', $data);
			} else {
				$this->Model_crud->update('tbltahun', array('idtahun'=> $id), $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url().'admin/tahun_ajar');
	}

	public function aktif($id){
		$update['status'] = 0;
		$this->Model_crud->update('tbltahun', array('status'=> 1), $update);
		$data['status'] = 1;
		$this->Model_crud->update('tbltahun', array('idtahun'=> $id), $data);
		redirect(base_url().'admin/tahun_ajar');
	}

	public function hapus($id){
		$this->Model_crud->delete('tbltahun', array('idtahun'=> $id));
		redirect(base_url().'admin/tahun_ajar');
	}
}
