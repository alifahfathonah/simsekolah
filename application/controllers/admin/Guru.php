<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
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
		$guru['semua'] = $this->Model_crud->show("tblguru");
		// $data['category'] = $this->Model_category->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_guru',$guru);
		$this->load->view('admin/view_footer');
	}

	public function tambah()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['kelas'] = $this->Model_crud->show("tblkelas");
		$return['tambah'] = true;
		$return['guru'] = "";
		$return['agama'] = AGAMA;
		$return['pekerjaan'] = PEKERJAAN;

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_guru_detail',$return);
		$this->load->view('admin/view_footer');
	}

	public function detail($nik){
		$data['setting'] = $this->Model_common->get_setting_data();
		$return['guru'] = $this->Model_crud->selectWhere("tblguru", "NIK = $nik")[0];
		$return['kelas'] = $this->Model_crud->show("tblkelas");
		$return['tambah'] = false;
		$return['agama'] = AGAMA;
		$return['pekerjaan'] = PEKERJAAN;

		$this->load->view('admin/view_header', $data);
		$this->load->view('admin/view_guru_detail', $return);
		$this->load->view('admin/view_footer');
	}

	public function proses($id){
		$valid = 1;

		$error = '';
		$success = '';
		$url = '';
		if($id=="tambah"){
			$url = "admin/guru/$id)";
		} else {
			$url = "admin/guru/detail/$id";
		}

		if(isset($_POST['form_a'])){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempatl', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggall', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('kodeguru', 'Kode Guru', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NIK'] = $_POST['nik'];
				$data['NIP'] = $_POST['nip'];
				$data['Nama'] = $_POST['nama'];
				$data['JK'] = $_POST['jk'];
				$data['TempatLahir'] = $_POST['tempatl'];
				$data['TanggalLahir'] = $_POST['tanggall'];
				$data['Agama'] = $_POST['agama'];
				$data['KodeGuru'] = $_POST['kodeguru'];
				if($id=="tambah"){
					$this->Model_crud->add('tblguru', $data);
				} else {
					$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				}
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_b'])){
			$this->form_validation->set_rules('nuptk', 'NUPTK', 'trim|required');
			$this->form_validation->set_rules('statuskep', 'Status Kepegawaian', 'trim|required');
			$this->form_validation->set_rules('jenisptk', 'Jenis PTK', 'trim|required');
			$this->form_validation->set_rules('tugastambahan', 'Tugas Tambahan', 'trim|required');
			$this->form_validation->set_rules('skcpns', 'SK CPNS', 'trim|required');
			$this->form_validation->set_rules('tglcpns', 'Tanggal CPNS', 'trim|required');
			$this->form_validation->set_rules('skpengangkatan', 'SK Pengangkatan', 'trim|required');
			$this->form_validation->set_rules('tmtpengangkatan', 'TMT Pengangkatan', 'trim|required');
			$this->form_validation->set_rules('lembagapengangkatan', 'Lembaga Pengangkatan', 'trim|required');
			$this->form_validation->set_rules('pangkatgol', 'Pangkat Golongan', 'trim|required');
			$this->form_validation->set_rules('tmtpns', 'TMTP NS', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NUPTK'] = $_POST['nuptk'];
				$data['StatusKepegawaian'] = $_POST['statuskep'];
				$data['JenisPTK'] = $_POST['jenisptk'];
				$data['TugasTambahan'] = $_POST['tugastambahan'];
				$data['SKCPNS'] = $_POST['skcpns'];
				$data['TanggalCPNS'] = $_POST['tglcpns'];
				$data['SKPengangkatan'] = $_POST['skpengangkatan'];
				$data['TMTPengangkatan'] = $_POST['tmtpengangkatan'];
				$data['LembagaPengangkatan'] = $_POST['lembagapengangkatan'];
				$data['PangkatGolongan'] = $_POST['pangkatgol'];
				$data['TMTPNS'] = $_POST['tmtpns'];

				$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_c'])){
			$this->form_validation->set_rules('alamatjalan', 'Alamat Jalan', 'trim|required');
			$this->form_validation->set_rules('rt', 'RT', 'trim|required');
			$this->form_validation->set_rules('rw', 'RW', 'trim|required');
			$this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
			$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required');
			$this->form_validation->set_rules('telp', 'No. Telp', 'trim|required');
			$this->form_validation->set_rules('hp', 'No. HP', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['AlamatJalan'] = $_POST['alamatjalan'];
				$data['RT'] = $_POST['rt'];
				$data['RW'] = $_POST['rw'];
				$data['NamaDusun'] = $_POST['dusun'];
				$data['DesaKelurahan'] = $_POST['kelurahan'];
				$data['Kecamatan'] = $_POST['kecamatan'];
				$data['KodePos'] = $_POST['kodepos'];
				$data['Telepon'] = $_POST['telp'];
				$data['HP'] = $_POST['hp'];
				$data['Email'] = $_POST['email'];

				$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_d'])){
			$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
			$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
			$this->form_validation->set_rules('norek', 'No. Rekening', 'trim|required');
			$this->form_validation->set_rules('atasnama', 'Atas Nama', 'trim|required');
			$this->form_validation->set_rules('sumbergaji', 'Sumber Gaji', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NPWP'] = $_POST['npwp'];
				$data['NamaWajibPajak'] = $_POST['nama'];
				$data['Kewarganegaraan'] = $_POST['kewarganegaraan'];
				$data['Bank'] = $_POST['bank'];
				$data['NomorRekeningBank'] = $_POST['norek'];
				$data['RekeningAtasNama'] = $_POST['atasnama'];
				$data['SumberGaji'] = $_POST['sumbergaji'];

				$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_e'])){
			$this->form_validation->set_rules('namaibu', 'Nama Ibu', 'trim|required');
			$this->form_validation->set_rules('namapasangan', 'Nama Suami/Istri', 'trim|required');
			$this->form_validation->set_rules('nippasangan', 'NIP Suami/Istri', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if($valid==1){
				$data['NamaIbuKandung'] = $_POST['namaibu'];
				$data['StatusPerkawinan'] = $_POST['status'];
				$data['NamaSuamiIstri'] = $_POST['namapasangan'];
				$data['NIPSuamiIstri'] = $_POST['nippasangan'];
				$data['PekerjaanSuamiIstri'] = $_POST['pekerjaan'];

				$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}

		if(isset($_POST['form_f'])){
			if($valid==1){
				$data['SudahLisensiKepalaSekolah'] = $_POST['lisensikepsek'];
				$data['PernahDiklatKepengawasan'] = $_POST['pernahdiklat'];
				$data['KeahlianBraille'] = $_POST['braille'];
				$data['KeahlianBahasaIsyarat'] = $_POST['isyarat'];

				$this->Model_crud->update('tblguru', array('NIK'=> $id), $data);
				redirect(base_url().'admin/guru');
			} else {
				$this->session->set_flashdata('error',$error);
				redirect(base_url($url));
			}
		}
	}

	public function hapus($id){
		$this->Model_crud->delete('tblguru', array('NIK'=> $id));
		redirect(base_url().'admin/guru');
	}

}
