<?php

error_reporting(E_ALL);

// include("../../inc/cek_user_export.php"); // restriksi halaman admin

require_once 'excel/PHPExcel.php';

include "../config/koneksi.php";

$program = $_GET['program'];
$ta_sem = $_GET['ta_sem'];
$prodi = $_GET['prodi'];

   $sql1="select * from ta_sem where ta_sem='$ta_sem' " ;
                         
   $rs=mysqli_query($koneksi, $sql1);
   $data=mysqli_fetch_array($rs);
 
	$ta= $data['tahun_akademik'] ;

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Aank Anwarudin")
      ->setLastModifiedBy("Aank Anwarudin")
      ->setTitle("Office 2007 XLSX Test Document")
      ->setSubject("Office 2007 XLSX Test Document")
       ->setDescription("export ke excel Pendaftar Wisuda Reg-A .")
       ->setKeywords("office 2007 openxml php")
       ->setCategory("Pendaftaran Wisuda Reg A");
 

$sql = mysqli_query($koneksi, "select * FROM pendaftar_wisuda_rega WHERE ((program='$program') AND (ta_sem='$ta_sem') AND (prodi='$prodi')) ORDER BY nim ASC " );


$barisnomor = 6;
$baris = 7;
$baris2 = 7;
$baris3 = 7;
$barisfoto = 7 ;
$no = 0;			
while($row=mysqli_fetch_array($sql)){
$no = $no +1;

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
	   ->setCellValue('A1', 'REKAPITULASI PENDAFTARAN WISUDA :'.$program )
	   ->setCellValue('A2', 'TAHUN AKADEMIK :'.$ta)
	   ->setCellValue('A3', 'Prodi :'.$prodi)
	   ->setCellValue('A4', 'UNIVERSITAS MUHAMMADIYAH GOMBONG')
	   
       
       ->setCellValue('E'.$barisnomor, $no)
       ->setCellValue('E'.$baris++, 'NIM')
	   ->setCellValue('E'.$baris++, 'NAMA')
	   ->setCellValue('E'.$baris++, 'TEMPAT_LAHIR')	   
	   ->setCellValue('E'.$baris++, 'TGL_LAHIR')	   
       ->setCellValue('E'.$baris++, 'ALAMAT')
	   ->setCellValue('E'.$baris++, 'JEN_KEL')
       ->setCellValue('E'.$baris++, 'IPK')
       ->setCellValue('E'.$baris++, 'JUDUL_TUGAS_AKHIR')	 
       ->setCellValue('E'.$baris++, 'PESAN_DAN_KESAN');
      
		
$objPHPExcel->setActiveSheetIndex(0)


       ->setCellValue('F'.$baris2++, ':')
	   ->setCellValue('F'.$baris2++, ':')
	   ->setCellValue('F'.$baris2++, ':')	   
	   ->setCellValue('F'.$baris2++, ':')	   
       ->setCellValue('F'.$baris2++, ':')
	   ->setCellValue('F'.$baris2++, ':')
       ->setCellValue('F'.$baris2++, ':')
       ->setCellValue('F'.$baris2++, ':')	 
       ->setCellValue('F'.$baris2++, ':');


$objPHPExcel->setActiveSheetIndex(0)
  
       ->setCellValue('G'.$baris3++, $row['nim'])
	   ->setCellValue('G'.$baris3++, $row['nama'])
	   ->setCellValue('G'.$baris3++, $row['tmpt_lhr'])	   
	   ->setCellValue('G'.$baris3++, $row['tgl_lhr'])	   
       ->setCellValue('G'.$baris3++, $row['alamat'])
	   ->setCellValue('G'.$baris3++, $row['jenkel'])
       ->setCellValue('G'.$baris3++, $row['ipk'])
       ->setCellValue('G'.$baris3++, $row['judul_indo'])	 
       ->setCellValue('G'.$baris3++, $row['pesan']);
	

// Menambahkan file gambar pada document excel pada kolom B2
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Universitas Muh Gombong');
$objDrawing->setDescription('foto wisuda');
$objDrawing->setPath('../foto/'.$row['foto']);
$objDrawing->setCoordinates('B'.$barisfoto);
$objDrawing->setHeight(180);
$objDrawing->setWidth(130); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	 
$baris = $baris + 5;
$baris2 = $baris2 + 5;
$baris3 = $baris3 + 5;

$barisnomor = $barisnomor + 14 ;

$barisfoto = $barisfoto + 14;

}


 
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('rekapitulasi pendaftar wisuda');
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);




 
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="biodata_wisuda.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
 