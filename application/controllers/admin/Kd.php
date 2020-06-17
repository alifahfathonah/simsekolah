<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Kd extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Model_common');
    $this->load->model('Model_crud');
  }

  public function index()
  {
    $data['setting'] = $this->Model_common->get_setting_data();
    $data['pelajaran']= $this->db->get('tblmapel')->result_array();

    $this->load->view('admin/view_header',$data);
    $this->load->view('admin/view_kd',$data);
    $this->load->view('admin/view_footer');
  }

  function getkd($idpelajaran){
    $data = $this->db->get_where('tblkd',array('idmapel'=>$idpelajaran))->result();
    $isi=array('isi'=>array());
    $no=1;
    foreach($data as $item) {
      $isi['isi'][]=array(
        $no,
        $item->idmapel,
        $item->kdpengetahuan,
        $item->kdketerampilan
      );
      $no++;
    }
    echo json_encode($isi);
  }

  function generate($idmapel){
    $jumlah= $_POST['jumlahmapel'];

    $mapel = $this->db->query("SELECT * FROM `tblmapel` WHERE idmapel = ".$idmapel)->row_array();
    //insert table
    $dataKD= $this->db->query("SELECT * FROM `tblkd` WHERE idmapel = ".$idmapel);
    $jumlahdata = $dataKD->num_rows();

    if($jumlahdata==$jumlah){

    }else{
      if($jumlahdata<$jumlah){
        $kea=$jumlah;
        $jumlah = $jumlah-$jumlahdata;
        for ($i=1; $i <= $jumlah ; $i++) {
          // $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
          // $tanggal = $now->format('YmdHis');
          $tanggal = date('YmdHis');
          $tanggal +=$i;
          $ke = $jumlahdata+$i;
          $data = array(
            'idkd'=>$tanggal,
            'idmapel'=>$idmapel,
            'kdpengetahuan'=>'KD'.$ke,
            'kdketerampilan'=>'KD'.$ke
          );
          $this->db->insert('tblkd', $data);
        }
      } else {
        $jumlah = $jumlahdata-$jumlah;
        $id =$this->db->query("SELECT idkd FROM tblkd ORDER BY idkd DESC LIMIT $jumlah ")->result();
        foreach($id as $item) {
          $where = array(
            'idkd'=> $item->idkd
          );
          if($this->db->query('SELECT * FROM tblnilaikd WHERE idkd ='. $item->idkd)->num_rows()==0){
            $this->db->delete('tblkd',$where);
          }
        }
      }
    }

    // buat template
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getColumnDimension('A')->setVisible(false);

    $judul =array(
      "idkd","No","ID Mapel","Pengetahuan","Keterampilan"
    );
    //set autosize
    $d= 'A';
    for ($i=0; $i < count($judul); $i++) {
      $sheet->setCellValue($d.'4', $judul[$i]);
      $sheet->getColumnDimension($d)->setAutoSize(true);
      ++$d.PHP_EOL;
    }
    // akhir buat header

    // pelajaran apa
    $sheet->setCellValue('B2', 'Pelajaran : '.$mapel['mapel']);
    $sheet->setCellValue('A1',$mapel['idmapel']);

    // isi content berdasarkan database
    $dataKD= $this->db->query("SELECT * FROM `tblkd` WHERE idmapel = ".$idmapel);
    $data=$dataKD->result_array();
    $column = $this->db->list_fields('tblkd');

    $row =5;
    $no =1;
    foreach($data as $item) {
      $col= 'C';

      $sheet->setCellValue('A'.$row, $no);
      $sheet->setCellValue('B'.$row, $item['idkd']);
      for ($j=1; $j < count($column); $j++) {
        $isi = $item[$column[$j]];
        $sheet->setCellValue($col.$row, $isi);
        ++$col.PHP_EOL;
      }

      // foreach ($column as $k) {
      //   $isi = $item[$k];
      //   $sheet->setCellValue($col.$row, $isi);
      //   ++$col.PHP_EOL;
      // }

      $col='C';
      $row++;
      $no++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'templateKD'.$mapel['mapel'];

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    ob_clean();
  }

  public function pilihFile($idmapel)
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
        $column = $this->db->list_fields('tblkd');
        for($row=5; $row<=$totalrow; $row++){
          $xls= array();
          $id = array(
            'idkd'=>$worksheet->getCellByColumnAndRow(1, $row)->getValue()
          );

          for ($i=3; $i < count($column)+1; $i++) {
            $col =$i;
            $tmp = array($column[$i-2]=>$worksheet->getCellByColumnAndRow($col, $row)->getValue());
            $xls=array_merge($xls,$tmp);
          }
          $this->db->update('tblkd', $xls,$id);
        }
      }
    }
    redirect(base_url('admin/kd'));
  }
}
/* End of file Pelajaran.php */
?>
