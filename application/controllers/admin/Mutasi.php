<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller
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

		$mutasi['tindakan'] = TINDAKAN;
		$mutasi['tahun'] = $this->Model_crud->selectWhere('tbltahun', 'status = 1')[0]['tahun'];
		$mutasi['kelas'] = $this->Model_crud->selectWhere("tblkelas", "tingkat > 0 ORDER BY tingkat ASC");
		$disable['FlagMutasi'] = 0;
		$this->Model_crud->update('tblsiswa', array('FlagMutasi'=>1), $disable);

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_mutasi', $mutasi);
		$this->load->view('admin/view_footer');
	}

	public function tampilsiswa(){
		$id = $_POST['id'];
		// $data['token'] = $this->security->get_csrf_hash();
		$disable['FlagMutasi'] = 0;
		$data = $this->Model_crud->selectWhere("detail_siswa", "idkelas = $id AND FlagMutasi=0 ORDER BY Nama ASC");
		echo json_encode($data);
	}

	public function selectedsiswa(){
		$id = $_POST['id'];
		// $data['token'] = $this->security->get_csrf_hash();
		$data = $this->Model_crud->selectWhere("detail_siswa", "idkelas = $id AND FlagMutasi=1 ORDER BY Nama ASC");
		echo json_encode($data);
	}

	public function updateFlag(){
		$nisn = $_POST['nisn'];
		$data['FlagMutasi'] = $_POST['flag'];

		$this->Model_crud->update('tblsiswa', array('NISN'=>$nisn), $data);
	}

	public function updateFlagAll(){
		$id = $_POST['id'];
		$data['FlagMutasi'] = $_POST['flag'];

		$this->Model_crud->update('tblsiswa', array('idkelas'=>$id), $data);
	}

	public function selesai(){
		$valid = 1;

		$error = '';
		$success = '';

		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('tglmutasi', 'Tanggal Mutasi', 'required');

		if($this->form_validation->run() == FALSE) {
			$valid = 0;
			$error .= validation_errors();
		}

		if($valid==1){
			$nisn = $this->Model_crud->selectWhere("detail_siswa", "FlagMutasi=1");
			$i = 0;
			foreach ($nisn as $n) {
				$i++;
				$data['idmutasi'] = date('YmdHis').$i;
				$data['idtahun'] = $this->Model_crud->selectWhere('tbltahun', 'status = 1')[0]['idtahun'];
				$data['nisn'] = $n['NISN'];
				$data['idkelas'] = $_POST['idkelas'];
				$data['tglmutasi'] = $_POST['tglmutasi'];
				$data['statusmutasi'] = $_POST['status'];
				$data['keteranganmutasi'] = $_POST['ket'];
				if ($data['statusmutasi']=="0" || $data['statusmutasi']=="3") {
					$update['idkelas'] = $_POST['idkelas'];
					$this->Model_crud->update('tblsiswa', array('NISN'=>$n['NISN']),$update);
				}
				$this->Model_crud->add('idmutasi', $data);
			}
		} else {
			$this->session->set_flashdata('error',$error);
		}
		redirect(base_url('admin/mutasi'));
	}
}
