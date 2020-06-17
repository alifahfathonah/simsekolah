<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Import_buku extends CI_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->helper('date');
    $this->load->model('admin/Model_common');
    $this->load->model('admin_perpustakaan/Model_buku');
  }

  public function index()
  {
    $data['setting'] = $this->Model_common->get_setting_data();
    $data['class_name'] = get_class();

    $data['data_buku'] = $this->Model_buku->getAllBuku()->result();

    $this->load->view('admin_perpustakaan/view_header',$data);
    $this->load->view('admin_perpustakaan/view_import_buku',$data);
    $this->load->view('admin_perpustakaan/view_footer');
  }

  public function generate(){
    $jumlah = $_POST['jumlahinput'];

    $validator = array("success"=>false);

    // $this->db->db_select('sim');

    $judul=$this->db->list_fields('tblbuku');
    $deleteThis = array();
    for ($col=1; $col < count($judul)-1; $col++) {
      $deleteThis += array($judul[$col]=>null);
    }
    $this->db->delete('tblbuku',$deleteThis);

    for ($i=1; $i <= $jumlah ; $i++) {
      $microtime = floatval(substr((string)microtime(), 1, 8));
      $rounded = round($microtime, 3);
      $id = date("YmdHis") . str_replace('.','',(strlen(substr((string)$rounded, 1, strlen($rounded))) == 3 ? substr((string)$rounded, 1, strlen($rounded))."0" : substr((string)$rounded, 1, strlen($rounded))));

      $data = array(
        'idbuku'=> $id
      );

      $this->db->insert('tblbuku', $data);
    }

    // buat template

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getColumnDimension('A')->setVisible(false);


    $d= 'A';
    for ($i=0; $i < count($judul); $i++) {
      $sheet->setCellValue($d.'2', $judul[$i]);
      $sheet->getColumnDimension($d)->setAutoSize(true);
      ++$d.PHP_EOL;
    }
    $baris=3;
    $nomer=1;
    $huruf=range('A','Z');
    $data=$this->db->get('tblbuku')->result_array();
    $isi = array('isi'=>array());

    foreach($data as $item) {
      for ($i=0; $i < count($judul); $i++) {
        $sheet->setCellValue($huruf[$i].$baris, $item[$judul[$i]]);
      }
      $baris++;
      $nomer++;
    }

    $sheet->setCellValue('B'.$baris,"Batas input data");
    $spreadsheet->getActiveSheet()->getStyle('A'.$baris.':'.$huruf[count($judul)-1].$baris)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('CCF7EC0C');

    $writer = new Xlsx($spreadsheet);

    $filename = 'templateBuku';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    ob_end_clean();
  }

  public function pilihFile()
  {
    // $this->db->db_select('sim');
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

        $totalrow = $worksheet->getHighestRow()-1;
        // Looping jumlah data
        $item = 1;
        $judul=$this->db->list_fields('tblbuku');
        $xls = array();
        for($row=3; $row<=$totalrow; $row++){
          $data= array();
          $idbuku = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $i=1;
          while ($i < count($judul)) {
            $data += [
              $judul[$i++] => $worksheet->getCellByColumnAndRow($i, $row)->getValue()
            ];
          }

          $xls = $data;

          $id = array(
            'idbuku'=>$idbuku
          );

          $this->db->update('tblbuku', $xls,$id);
        }

      }

    }
    redirect(base_url('admin_perpustakaan/import_buku'));
  }
}
