<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
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
		$siswa['semua'] = $this->Model_crud->show("detail_siswa");
		// $data['category'] = $this->Model_category->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_siswa',$siswa);
		$this->load->view('admin/view_footer');
	}

	public function tambah()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['kelas'] = $this->Model_crud->selectWhere("tblkelas", "tingkat > 0 ORDER BY tingkat ASC");
		$return['siswa'] = "";
		$return['tambah'] = true;
		$return['agama'] = AGAMA;

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_siswa_detail',$return);
		$this->load->view('admin/view_footer');
	}

	public function detail($nisn){
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['siswa'] = $this->Model_crud->selectWhere("tblsiswa", "NISN = $nisn")[0];
		$return['kelas'] = $this->Model_crud->selectWhere("detail_siswa", "NISN = $nisn")[0];
		$return['tambah'] = false;
		$return['agama'] = AGAMA;
		$return['hunian'] = HUNIAN;
		$return['pendidikan'] = PENDIDIKAN;
		$return['transportasi'] = TRANSPORTASI;
		$return['pekerjaan'] = PEKERJAAN;

		$this->load->view('admin/view_header', $data);
		$this->load->view('admin/view_siswa_detail', $return);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';
		$url = '';
		if($id=="tambah"){
			$url = "admin/siswa/$id)";
		} else {
			$url = "admin/siswa/detail/$id";
		}

		if(isset($_POST['form_a'])){
			$this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('nipd', 'NIPD', 'trim|required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempatl', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggall', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NISN'] = $_POST['nisn'];
				$data['idkelas'] = $_POST['kelas'];
				$data['Nama'] = $_POST['nama'];
				$data['NIPD'] = $_POST['nipd'];
				$data['JK'] = $_POST['jk'];
				$data['TempatLahir'] = $_POST['tempatl'];
				$data['TanggalLahir'] = $_POST['tanggall'];
				$data['Agama'] = $_POST['agama'];
				if($id=="tambah"){
					$this->Model_crud->add('tblsiswa', $data);
				} else {
					$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				}
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_b'])){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nokk', 'No. KK', 'trim|required');
			$this->form_validation->set_rules('noakta', 'No. Akta', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('rt', 'RT', 'trim|required');
			$this->form_validation->set_rules('rw', 'RW', 'trim|required');
			$this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
			$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required');
			$this->form_validation->set_rules('lintang', 'Lintang', 'trim|required');
			$this->form_validation->set_rules('bujur', 'Bujur', 'trim|required');
			$this->form_validation->set_rules('jarak', 'Jarak Rumah', 'trim|required');
			$this->form_validation->set_rules('jenistinggal', 'Jenis Tinggal', 'trim|required');
			$this->form_validation->set_rules('alatransportasi', 'Alat Transportasi', 'trim|required');
			$this->form_validation->set_rules('hp', 'No. Handphone', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|email|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NIK'] = $_POST['nik'];
				$data['NoKK'] = $_POST['nokk'];
				$data['NoRegistrasiAktaLahir'] = $_POST['noakta'];
				$data['Alamat'] = $_POST['alamat'];
				$data['RT'] = $_POST['rt'];
				$data['RW'] = $_POST['rw'];
				$data['Dusun'] = $_POST['dusun'];
				$data['Kelurahan'] = $_POST['kelurahan'];
				$data['Kecamatan'] = $_POST['kecamatan'];
				$data['KodePos'] = $_POST['kodepos'];
				$data['Lintang'] = $_POST['lintang'];
				$data['Bujur'] = $_POST['bujur'];
				$data['JarakRumah'] = $_POST['jarak'];
				$data['JenisTinggal'] = $_POST['jenistinggal'];
				$data['AlatTransportasi'] = $_POST['alatransportasi'];
				$data['Telepon'] = $_POST['telp'];
				$data['HP'] = $_POST['hp'];
				$data['Email'] = $_POST['email'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_c'])){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
			$this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['AyahNIK'] = $_POST['nik'];
				$data['AyahNama'] = $_POST['nama'];
				$data['AyahTahunLahir'] = $_POST['tahun'];
				$data['AyahPenghasilan'] = $_POST['penghasilan'];
				$data['AyahJenjangPendidikan'] = $_POST['pendidikan'];
				$data['AyahJenjangPendidikan'] = $_POST['pekerjaan'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_d'])){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
			$this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['IbuNIK'] = $_POST['nik'];
				$data['IbuNama'] = $_POST['nama'];
				$data['IbuTahunLahir'] = $_POST['tahun'];
				$data['IbuPenghasilan'] = $_POST['penghasilan'];
				$data['IbuJenjangPendidikan'] = $_POST['pendidikan'];
				$data['IbuJenjangPendidikan'] = $_POST['pekerjaan'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_e'])){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
			$this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['WaliNIK'] = $_POST['nik'];
				$data['WaliNama'] = $_POST['nama'];
				$data['WaliTahunLahir'] = $_POST['tahun'];
				$data['WaliPenghasilan'] = $_POST['penghasilan'];
				$data['WaliJenjangPendidikan'] = $_POST['pendidikan'];
				$data['WaliJenjangPendidikan'] = $_POST['pekerjaan'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_f'])){
			$this->form_validation->set_rules('kebutuhan', 'Kebutuhan Khusus', 'trim|required');
			$this->form_validation->set_rules('berat', 'Berat Badan', 'trim|required');
			$this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'trim|required');
			$this->form_validation->set_rules('lingkar', 'Lingkar Kepala', 'trim|required');
			$this->form_validation->set_rules('jmlsaudara', 'Jumlah Saudara', 'trim|required');
			$this->form_validation->set_rules('anakke', 'Anak Ke', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['KebutuhanKhusus'] = $_POST['kebutuhan'];
				$data['BeratBadan'] = $_POST['berat'];
				$data['TinggiBadan'] = $_POST['tinggi'];
				$data['LingkarKepala'] = $_POST['lingkar'];
				$data['JmlSaudara'] = $_POST['jmlsaudara'];
				$data['Anakkeberapa'] = $_POST['anakke'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_g'])){
			$this->form_validation->set_rules('nokps', 'No KPS', 'trim|required');
			$this->form_validation->set_rules('nokks', 'No KKS', 'trim|required');
			$this->form_validation->set_rules('nokip', 'No KIP', 'trim|required');
			$this->form_validation->set_rules('namakip', 'Nama di KIP', 'trim|required');
			$this->form_validation->set_rules('alasanlayak', 'Alasan Layak PIP', 'trim|required');
			$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
			$this->form_validation->set_rules('norek', 'No Rekening', 'trim|required');
			$this->form_validation->set_rules('atasnama', 'Atas Nama Rekening', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['PenerimaKPS'] = $_POST['kps'];
				$data['NoKPS'] = $_POST['nokps'];
				$data['NomorKKS'] = $_POST['nokks'];
				$data['PenerimaKIP'] = $_POST['penerimakip'];
				$data['NomorKIP'] = $_POST['nokip'];
				$data['NamadiKIP'] = $_POST['namakip'];
				$data['LayakPIP'] = $_POST['layakkip'];
				$data['AlasanLayakPIP'] = $_POST['alasanlayak'];
				$data['Bank'] = $_POST['bank'];
				$data['NomorRekeningBank'] = $_POST['norek'];
				$data['RekeningAtasNama'] = $_POST['atasnama'];

				$this->Model_crud->update('tblsiswa', array('NISN'=> $id), $data);
				redirect(base_url().'admin/siswa');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}


	}

	public function hapus($id){
		$this->Model_crud->delete('tblsiswa', array('NISN'=> $id));
		redirect(base_url().'admin/siswa');
	}

}
