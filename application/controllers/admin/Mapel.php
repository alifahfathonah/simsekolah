<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller
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
		$return['semua'] = $this->Model_crud->show("tblmapel");

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_mapel',$return);
		$this->load->view('admin/view_footer');
	}

	public function form($id){
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['tahun'] = $this->Model_crud->selectWhere('tbltahun', 'status = 1')[0]['tahun'];
		if($id=="tambah"){
			$return['mapel'] = "";
		} else {
			$return['mapel'] = $this->Model_crud->selectWhere('tblmapel', "idmapel = $id")[0];
		}

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_mapel_form', $return);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';

		$this->form_validation->set_rules('kode', 'Kode Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('kel', 'Kelompok Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan Mata Pelajaran', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$valid = 0;
			$error .= validation_errors();
		}

		if($valid==1){
			$data['kodemapel'] = $_POST["kode"];
			$data['mapel'] = $_POST["mapel"];
			$data['kelompokmapel'] = $_POST["kel"];
			$data['urutan'] = $_POST["urutan"];
			$data['tahun'] = $_POST["tahun"];
			$data['ketmapel'] = $_POST["ket"];
			if($id=='tambah'){
				$data['idmapel'] = date('YmdHis');
				$this->Model_crud->add('tblmapel', $data);
			} else {
				$this->Model_crud->update('tblmapel', array('idmapel'=> $id), $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url().'admin/mapel');
	}

	public function hapus($id){
		$this->Model_crud->delete('tblmapel', array('idmapel'=> $id));
		redirect(base_url().'admin/mapel');
	}
}
