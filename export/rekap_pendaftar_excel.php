<?php

error_reporting(E_ALL);

// include("../../inc/cek_user_export.php"); // restriksi halaman admin

require_once 'excel/PHPExcel.php';

include "../config/koneksi.php";

$program = $_GET['program'];
$TA_sem = $_GET['TA_sem'];
$prodi = $_GET['prodi'];

   $sql1="select * from ta_sem where ta_sem='$TA_sem' " ;
                         
   $rs=mysqli_query($koneksi, $sql1);
   $data=mysqli_fetch_array($rs);
 
	$TA= $data['tahun_akademik'] ;

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Aank Anwarudin")
      ->setLastModifiedBy("Aank Anwarudin")
      ->setTitle("Office 2007 XLSX Test Document")
      ->setSubject("Office 2007 XLSX Test Document")
       ->setDescription("export ke excel Pendaftar Wisuda")
       ->setKeywords("office 2007 openxml php")
       ->setCategory("Pendaftaran Reg A");
 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
	   ->setCellValue('A1', 'REKAPITULASI PENDAFTARAN WISUDA '.$program.' ')
	   ->setCellValue('A2', 'TAHUN AKADEMIK : '.$TA.'  ')
	   ->setCellValue('A3', 'Prodi : '.$prodi.' ')
	   ->setCellValue('A4', 'UNIVERSITAS MUHAMMADIYAH GOMBONG')
	   
       ->setCellValue('A6', 'NIM')
	   ->setCellValue('B6', 'NAMA')
	   ->setCellValue('C6', 'TEMPAT_LAHIR')	   
	   ->setCellValue('D6', 'TGL_LAHIR')	   
       ->setCellValue('E6', 'ALAMAT')
	   ->setCellValue('F6', 'JEN_KEL')
       ->setCellValue('G6', 'IPK')
       ->setCellValue('H6', 'JUDUL_TUGAS_AKHIR_(versi: indo)')
	   ->setCellValue('I6', 'JUDUL_TUGAS_AKHIR_(versi: english)')
       ->setCellValue('J6', 'PESAN_DAN_KESAN')
       ->setCellValue('K6', 'NAMA_FILE_FOTO') 
       ->setCellValue('L6', 'PROGRAM')
       ->setCellValue('M6', 'PAS FOTO 4X6')
       ->setCellValue('N6', 'FC BAITUL ARQAM')
     ->setCellValue('O6', 'FC HPT')
       ->setCellValue('P6', 'FC ABSTARK INDO')
       ->setCellValue('Q6', 'FC ABSTRAK ENGLISH') 
       ->setCellValue('R6', 'FC IJAZAH TERAKHIR');
 
		$sql = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega where (program='$program') AND (ta_sem='$TA_sem') AND (prodi='$prodi') ORDER BY nim ASC "); 

$baris = 7;
$no = 0;			
while($row=mysqli_fetch_array($sql)){
$no = $no +1;
$objPHPExcel->setActiveSheetIndex(0)
     ->setCellValue("A$baris", $row['nim'])
     ->setCellValue("B$baris", $row['nama'])
	 ->setCellValue("C$baris", $row['tmpt_lhr'])
     ->setCellValue("D$baris", $row['tgl_lhr'])	 
     ->setCellValue("E$baris", $row['alamat'])
	 ->setCellValue("F$baris", $row['jenkel'])
	 ->setCellValue("G$baris", $row['ipk'])
     ->setCellValue("H$baris", $row['judul_indo'])
     ->setCellValue("I$baris", $row['judul_english'])
	 ->setCellValue("J$baris", $row['pesan'])
	 ->setCellValue("K$baris", $row['foto'])
   ->setCellValue("L$baris", $row['program'])
   ->setCellValue("M$baris", $row['pas_foto46'])
     ->setCellValue("N$baris", $row['fc_BAPS'])
     ->setCellValue("O$baris", $row['fc_HPT'])
   ->setCellValue("P$baris", $row['fc_abstrak_indo'])
   ->setCellValue("Q$baris", $row['fc_abstrak_english'])
   ->setCellValue("R$baris", $row['fc_ijazah_terakhir']);
	 
$baris = $baris + 1;
}


 
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('rekapitulasi pendaftar wisuda');
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);




 
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rekap_pendaftar_wisuda.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
 