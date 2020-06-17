<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Nilaikd extends CI_Controller
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
		$this->load->view('admin/view_nilaikd',$siswa);
		$this->load->view('admin/view_footer');
	}

	// Belum ada filter kelas,semester,tahun,pelajaran
	public function generate($idpelajaran,$idkelas,$idtahun,$semester){
		// insert
		$siswa= $this->db->query("SELECT * FROM view_mutasi WHERE idkelas=$idkelas AND idtahun=$idtahun")->result_array();
		$KD = $this->db->query("SELECT * FROM tblkd WHERE idmapel= $idpelajaran")->result_array();

		$i =1;
		foreach($siswa as $murid){
			$idmutasi = $murid['idmutasi'];
			foreach($KD as $bab){
				$nilai = $this->db->query("SELECT * FROM view_nilaikd WHERE idmutasi=".$murid['idmutasi']." AND idkd ='".$bab['idkd']."' AND semesterkd='".$semester."' ORDER BY idkd");
				if($nilai->num_rows()==0){
					// $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
					// $tanggal = $now->format('YmdHis');
					$tanggal = date('YmdHis')+$i;
					// $tanggal +=$i;

					$data = array(
						'idnilaikd'=>$tanggal,
						'idkd'=>$bab['idkd'],
						'idmutasi'=>$idmutasi,
						'nilaikdpengetahuan'=>'0',
						'nilaikdketerampilan'=>'0',
						'sikap'=>'',
						'semesterkd'=>$semester
					);
					$this->db->insert('tblnilaikd', $data);
				}
				$i++;
			}
		}

		//template
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getColumnDimension('A')->setVisible(false);


		$judul =array(
			"idkd","Nama","NISN"
		);
		$kd = $this->db->query("SELECT * FROM tblkd WHERE idmapel= $idpelajaran");
		$materi =$kd->result_array();
		// Merge cell
		$a='D';
		$num = $kd->num_rows()-1;
		$b = chr(ord($a)+$num);
		$sheet->mergeCells($a."3:".$b."3");
		$b++;
		$c = chr(ord($b)+$num);
		$sheet->mergeCells($b."3:".$c."3");

		$sheet->setCellValue($a.'3','Pengetahuan');
		$sheet->setCellValue($b.'3','Keterampilan');
		//
		// buat Header
		for ($i=0; $i < 2; $i++) {
			$ke =1;
			foreach($materi as $id){
				array_push($judul,'KD'.$ke);
				$ke++;
			}

		}
		array_push($judul,'Sikap');

		//set autosize
		$d= 'A';
		for ($i=0; $i < count($judul); $i++) {
			$sheet->setCellValue($d.'4', $judul[$i]);
			$sheet->getColumnDimension($d)->setAutoSize(true);
			++$d.PHP_EOL;

		}


		//
		$baris =5;
		$sheet->mergeCells("B1:E1");
		$jud= $this->db->query('SELECT * FROM tblmapel WHERE idmapel='.$idpelajaran)->row_array();

		$sheet->setCellValue('B1','Mata Pelajaran : '.$jud['mapel']);
		foreach($siswa as $murid){
			$idmutasi = $murid['idmutasi'];
			$sheet->setCellValue('B'.$baris,$murid['Nama']);
			$sheet->setCellValue('C'.$baris,$murid['nisn']);
			$col='D';
			$idnilaikd='';
			foreach($KD as $bab){
				$nilai = $this->db->query("SELECT * FROM view_nilaikd WHERE idmutasi=".$murid['idmutasi']." AND idkd ='".$bab['idkd']."' AND semesterkd ='".$semester."' ORDER BY idkd")->result_array();

				foreach ($nilai as $nilaiKd) {
					$idnilaikd=$idnilaikd.'_'.$nilaiKd['idnilaikd'];

					$sheet->setCellValue($col.$baris,$nilaiKd['nilaikdpengetahuan']);
					++$col.PHP_EOL;
				}
				$sheet->setCellValue('A'.$baris,$idnilaikd);

				foreach ($nilai as $nilaiKd) {
					$sheet->setCellValue($col.$baris,$nilaiKd['nilaikdketerampilan']);
					++$col.PHP_EOL;
					$sheet->setCellValue($col.$baris,$nilaiKd['sikap']);
				}

			}
			$baris++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'templateNilaiKD'.$idkelas.$idpelajaran.$idtahun.$semester;

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
				$data= array();
				$item = 0;

				for($row=5; $row<=$totalrow; $row++){
					//   $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$idnilai=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$idnilaikd =explode("_",$idnilai);
					$col = 4;
					for ($i=1; $i < count($idnilaikd); $i++) {
						$idne = $idnilaikd[$i];

						$num = count($idnilaikd)-1;
						// ambil nilai pengetahuan
						$nilaipeng=$worksheet->getCellByColumnAndRow($col, $row)->getValue();
						$col = $col+$num;
						// ambil nilai keterampilan
						$nilaiket=$worksheet->getCellByColumnAndRow($col, $row)->getValue();
						$col = $col-($num)+1;
						$colom = 3 + (count($idnilaikd))*2;
						$sikap=$worksheet->getCellByColumnAndRow($colom, $row)->getValue();
						$isi = array(

							'nilaikdpengetahuan'=>$nilaipeng,
							'nilaikdketerampilan'=>$nilaiket,
							'sikap'=>$sikap
						);
						$id = array(
							'idnilaikd'=>$idne,
						);

						$this->db->update('tblnilaikd', $isi,$id);
					}

				}

			}

		}
		redirect('admin/nilaikd');

	}




	public function getData($idpelajaran,$idkelas,$idtahun,$semester){
		// ambil nilai
		$data = array('data'=>array());
		$siswa= $this->db->query("SELECT * FROM view_mutasi WHERE idkelas=$idkelas AND idtahun=$idtahun")->result_array();
		$KD = $this->db->query("SELECT * FROM tblkd WHERE idmapel=$idpelajaran")->result_array();
		$no =1;
		foreach($siswa as $murid){

			$dataSiswa = array(
				$no,
				$murid['Nama'],
				$murid['nisn']
			);
			$nilaiPengetahuan = array('nilai'=>array());
			$nilaiKeterampilan = array('nilai'=>array());
			foreach($KD as $bab){
				$nilai = $this->db->query("SELECT * FROM view_nilaikd WHERE idmutasi=".$murid['idmutasi']." AND idkd ='".$bab['idkd']."' AND semesterkd = $semester ORDER BY idkd")->row_array();

				$nilaiP = $nilai['nilaikdpengetahuan']=='' ? '0':$nilai['nilaikdpengetahuan'];
				$nilaiK = $nilai['nilaikdketerampilan']=='' ? '0':$nilai['nilaikdketerampilan'];
				$nilaiPengetahuan['nilai'][]=$nilaiP;
				$nilaiKeterampilan['nilai'][]=$nilaiK;
			}

			$data['data'][]= array_merge($dataSiswa,$nilaiPengetahuan['nilai'],$nilaiKeterampilan['nilai']);
			$no++;
		}
		echo json_encode($data);



	}

	public function getkd($id= null){
		if($id){
			$kd = $this->db->query("SELECT * FROM tblkd WHERE idmapel = $id")->result_array();
			echo json_encode($kd);
		}
	}



}
