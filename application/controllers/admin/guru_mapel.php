<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_Mapel extends CI_Controller
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
		$return['semua'] = $this->Model_crud->show("detail_guru_mapel");

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_guru_mapel',$return);
		$this->load->view('admin/view_footer');
	}

	public function form($id){
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['mata'] = $this->Model_crud->show("tblmapel");
		$return['guru'] = $this->Model_crud->show("tblguru");
		$return['tahun'] = $this->Model_crud->selectWhere('tbltahun', 'status = 1')[0]['tahun'];

		if($id=="tambah"){
			$return['mapel'] = "";
		} else {
			$return['mapel'] = $this->Model_crud->selectWhere('tblgurumapel', "idgurumapel = $id")[0];
		}

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_guru_mapel_form', $return);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';

		$this->form_validation->set_rules('tahun', 'Tahun Mapel', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$valid = 0;
			$error .= validation_errors();
		}

		if($valid==1){
			$data['idmapel'] = $_POST["idmapel"];
			$data['nik'] = $_POST["nik"];
			$data['tahunmapel'] = $_POST["tahun"];
			if($id=='tambah'){
				$data['idgurumapel'] = date('YmdHis');
				$this->Model_crud->add('tblgurumapel', $data);
			} else {
				$this->Model_crud->update('tblgurumapel', array('idgurumapel'=> $id), $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url().'admin/guru_mapel');
	}

	public function hapus($id){
		$this->Model_crud->delete('tblgurumapel', array('idgurumapel'=> $id), $id);
		redirect(base_url().'admin/guru_mapel');
	}
}
