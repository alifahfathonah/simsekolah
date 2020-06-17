<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Raport extends CI_Controller
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
		$siswa['semua'] = $this->Model_crud->show("view_mutasi");
		$siswa['pelajaran'] = $this->db->get('tblmapel')->result_array();
		$siswa['kelas'] = $this->Model_crud->selectWhere("tblkelas", "tingkat > 0 ORDER BY tingkat ASC");
		$siswa['tahun'] = $this->db->get('tbltahun')->result_array();

		// $data['category'] = $this->Model_category->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_raport',$siswa);
		$this->load->view('admin/view_footer');
	}


	// Belum ada filter kelas,semester,tahun,pelajaran
	public function generate($idpelajaran,$idkelas,$idtahun,$semester){
		// insert

		$siswa= $this->db->query("SELECT * FROM view_mutasi WHERE idkelas=$idkelas AND idtahun=$idtahun")->result_array();
		$KD = $this->db->query("SELECT * FROM tblkd WHERE idmapel= $idpelajaran")->result_array();
		$kelas = $this->db->query("SELECT * FROM detail_wali_kelas WHERE idkelas= $idkelas")->row_array();
		$i =1;

		foreach($siswa as $murid){


			$idmutasi = $murid['idmutasi'];
			$ujian= $this->db->query("SELECT * FROM tblnilairaport WHERE idmutasi=".$murid['idmutasi']." AND idmapel = $idpelajaran AND semesterraport=$semester")->row_array();
			if(count($KD)==0){
				return false;
			}else{
				foreach($KD as $bab){
					$nilai = $this->db->query("SELECT * FROM view_nilaikd WHERE idmutasi=".$murid['idmutasi']." AND idkd ='".$bab['idkd']."' AND semesterkd = $semester ORDER BY idkd")->row_array();

					$nilaiP = $nilai['nilaikdpengetahuan']=='' ? '0':$nilai['nilaikdpengetahuan'];
					$nilaiK = $nilai['nilaikdketerampilan']=='' ? '0':$nilai['nilaikdketerampilan'];
					$nilaiPengetahuan['nilai'][]=floatval($nilaiP);
					$nilaiKeterampilan['nilai'][]=floatval($nilaiK);
				}

				$np = array_sum($nilaiPengetahuan['nilai'])/count($nilaiPengetahuan['nilai']);
				$nk = array_sum($nilaiKeterampilan['nilai'])/count($nilaiKeterampilan['nilai']);
				$ratakd = number_format(array_sum(array($np,$nk))/2,2);
				$now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
				$tanggal = $now->format('YmdHis');
				$tanggal +=$i;
				if($ujian['uts']==''){
					$data=array(
						'semesterraport'=>$semester,
						'idmutasi'=>$idmutasi,
						'idmapel'=>$idpelajaran,
						'uts'=>'0',
						'uas'=>'0',
						'ratakd'=>$ratakd,
						'sakit'=>'0','ijin'=>'0','alpa'=>'0',
						'idraport'=>$tanggal,
						'walikelas'=>$kelas['Nama'],
						'nipwalikelas'=>$kelas['NIK']

					);

					$this->db->insert('tblnilairaport', $data);

				}else{
					$data=array(
						'ratakd'=>$ratakd,

					);

					$this->db->query("UPDATE tblnilairaport SET ratakd=$ratakd WHERE idmapel = $idpelajaran AND idmutasi=$idmutasi AND semesterraport=$semester");

				}



			}

			$i++;


		}

		//template
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getColumnDimension('A')->setVisible(false);


		$judul =array(
			"idraport","No","Nama","NISN","Rata KD","UTS","UAS","Raport","Predikat","Sakit","Ijin","Alpha",
			"Tanpa Keterangan","Catatan Wali Kelas",
		);


		//
		// buat Header

		//set autosize
		$d= 'A';
		for ($i=0; $i < count($judul); $i++) {
			$sheet->setCellValue($d.'4', $judul[$i]);
			$sheet->getColumnDimension($d)->setAutoSize(true);
			++$d.PHP_EOL;

		}


		$sheet->mergeCells("B1:E1");
		$sheet->mergeCells("B2:E2");

		$jud= $this->db->query('SELECT * FROM tblmapel WHERE idmapel='.$idpelajaran)->row_array();
		$sheet->setCellValue('B1','Mata Pelajaran : '.$jud['mapel']);


		$jud= $this->db->query('SELECT * FROM detail_wali_kelas WHERE idkelas='.$idkelas)->row_array();
		$sheet->setCellValue('B2','Wali Kelas : '.$jud['Nama']);
		$sheet->setCellValue('G2','Kelas : '.$jud['kelas']);

		$column = $this->db->list_fields('tblnilairaport');
		//
		$baris =5;
		$no=1;

		foreach($siswa as $murid){
			$idmutasi = $murid['idmutasi'];
			$sheet->setCellValue('B'.$baris,$no);
			$sheet->setCellValue('C'.$baris,$murid['Nama']);
			$sheet->setCellValue('D'.$baris,$murid['nisn']);
			$col='E';
			$raport= $this->db->query("SELECT * FROM tblnilairaport WHERE idmutasi=".$murid['idmutasi']." AND idmapel = $idpelajaran AND semesterraport=$semester")->row_array();
			$sheet->setCellValue('A'.$baris,$raport['idraport'].'_'.$idmutasi.'_'.$idpelajaran.'_'.$semester);
			for ($i=4; $i <= (count($column)-3); $i++) {
				$namaColumn = $column[$i];
				$isi = $raport[$namaColumn];
				$sheet->setCellValue($col.$baris, $isi);
				++$col.PHP_EOL;
			}

			$baris++;

			$no++;

		}

		$writer = new Xlsx($spreadsheet);

		$filename = 'templateNilaiRaport'.$idkelas.$idpelajaran.$idtahun.$semester;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		ob_clean();
	}

	public function pilihFile()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx';
		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('fileExcel')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$file = $_FILES["fileExcel"]["tmp_name"]; // mendapatkan temporary source dari file excel

			// tambahkan Library PHPExcel yang sudah di download
			$objPHPExcel =
			$objPHPExcel = IOFactory::load($file); // membuat objek dari library PHPExcel menggunakan metode load() untuk menemukan path dari file yang dipilih
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){

				$totalrow = $worksheet->getHighestRow();

				// Looping jumlah data

				$item = 0;
				$column = $this->db->list_fields('tblnilairaport');
				for($row=5; $row<=$totalrow; $row++){
					//   $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$semuaid=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$id =explode("_",$semuaid);
					$where = array(
						'idraport'=>$id[0],
						'idmutasi'=>$id[1],
						'idmapel'=>$id[2],
						'semesterraport'=>$id[3]
					);
					$xls= array();

					for ($i=6; $i < count($column)-1; $i++) {

						$col =$i;
						$tmp = array($column[$i-1]=>$worksheet->getCellByColumnAndRow($col, $row)->getValue());
						$xls=array_merge($xls,$tmp);
					}
					$this->db->update('tblnilairaport', $xls,$where);
				}
			}
		}
		redirect(base_url('admin/raport'));
	}

	public function getData($idpelajaran,$idkelas,$idtahun,$semester){
		// ambil nilai
		$data = array('data'=>array());

		$siswa= $this->db->query("SELECT * FROM view_mutasi WHERE idkelas=$idkelas AND idtahun=$idtahun")->result_array();
		$KD = $this->db->query("SELECT * FROM tblkd WHERE idmapel=$idpelajaran")->result_array();
		$no =1;
		foreach($siswa as $murid){
			$ujian= $this->db->query("SELECT * FROM tblnilairaport WHERE idmutasi=".$murid['idmutasi'])->row_array();
			$dataSiswa = array(
				$no,
				$murid['Nama'],
				$murid['nisn']
			);
			$nilaiPengetahuan = array('nilai'=>array());
			$nilaiKeterampilan = array('nilai'=>array());
			if(count($KD)==0){

			}else{
				foreach($KD as $bab){
					$nilai = $this->db->query("SELECT * FROM view_nilaikd WHERE idmutasi=".$murid['idmutasi']." AND idkd ='".$bab['idkd']."' AND semesterkd = $semester ORDER BY idkd")->row_array();

					$nilaiP = $nilai['nilaikdpengetahuan']=='' ? '0':$nilai['nilaikdpengetahuan'];
					$nilaiK = $nilai['nilaikdketerampilan']=='' ? '0':$nilai['nilaikdketerampilan'];
					$nilaiPengetahuan['nilai'][]=floatval($nilaiP);
					$nilaiKeterampilan['nilai'][]=floatval($nilaiK);
				}
				$rata=array();
				$np = array_sum($nilaiPengetahuan['nilai'])/count($nilaiPengetahuan['nilai']);
				$nk = array_sum($nilaiKeterampilan['nilai'])/count($nilaiKeterampilan['nilai']);
				$ratakd = number_format(array_sum(array($np,$nk))/2,2);
				$uts = $ujian['uts']=='' ? '0':$ujian['uts'];
				$uas = $ujian['uas']=='' ? '0':$ujian['uas'];

				array_push($rata,$ratakd,$uts,$uas);
				$data['data'][]= array_merge($dataSiswa,$rata);
				$no++;
			}
		}
		echo json_encode($data);
	}
}
