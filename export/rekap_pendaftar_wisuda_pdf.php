<?php
 // Define relative path from this script to mPDF

$nama_dokumen='BIODATA_Wisuda.pdf'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4'); 


//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

//sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
//-CONTOH Code START-->

 //KONEKSI
include("../config/koneksi.php");

// $program = $_GET['program'];
// $TA_sem = $_GET['TA_sem'];
// $prodi = $_GET['prodi'];
$no_sk = $_GET['no_sk'];

$sql2 = mysqli_query($koneksi, "select * from pendaftar_wisuda_rega where no_sk='$no_sk' "); 

$data2 = mysqli_fetch_array($sql2);
  
  // untuk mengisi kop judul
   $sql1 = "select * from ta_sem where TA_sem='".$data2['TA_sem']."' " ;
                         
   $rs=mysqli_query($koneksi, $sql1);
   $data=mysqli_fetch_array($rs);
 
	 $TA= $data['tahun_akademik'] ;
	 $semester= $data['semester'] ;	
?>

<style type="text/css">
<!--
.style4 {font-size: 12px}
-->
</style>

<table width="843" border="0">
  <tr>
  				
    <th colspan="5" align="center">BIODATA <br> 
    	WISUDAWAN/ WISUDAWATI <?php echo $data2['program']  ?> | No-SK= <?php echo "$no_sk"  ?>
        <br>
        PRODI : <?php echo $data2['prodi'] ?><br>
		STIKES MUHAMMADIYAH GOMBONG<br>
		TAHUN AKADEMIK :  <?php echo "$TA" ?> | <?php echo "$semester" ?></th>
  </tr>
  <tr>
    <td width="147" align="left"></td>
    <td width="14"></td>
    <td width="299" colspan="3" align="left"></td>
  </tr>
</table>
<?php

// $sql = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega where (program='$program') AND (TA_sem='$TA_sem') AND (prodi='$prodi') AND (no_sk='$no_sk') ORDER BY nim ASC"); 

$sql = mysqli_query($koneksi, "select * from pendaftar_wisuda_rega where no_sk='$no_sk' ORDER BY nim ASC "); 

while ($row = mysqli_fetch_array($sql))
{
?>

<table width="565" align="left">
  <tr>
    <td width="183" rowspan="9"><img src="../foto/<?php echo $row['foto']; ?>" width="150" height="150"></td>
    <td width="8">&nbsp;</td>
    <td width="146">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="191">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nim</td>
    <td>&nbsp;</td>
    <td><?php echo $row['nim'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama</td>
    <td>&nbsp;</td>
    <td><?php echo $row['nama'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tempat/ Tanggal Lahir </td>
    <td>&nbsp;</td>
    <td><?php echo $row['tmpt_lhr'];?> / <?php echo $row['tgl_lhr'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jenis Kelamin </td>
    <td>&nbsp;</td>
    <td><?php echo $row['jenkel'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>&nbsp;</td>
    <td><?php echo $row['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>IPK</td>
    <td>&nbsp;</td>
    <td><?php echo $row['ipk'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Judul Tugas akhir </td>
    <td>&nbsp;</td>
    <td><?php echo $row['judul_indo'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pesan &amp; Kesan </td>
    <td>&nbsp;</td>
    <td><?php echo $row['pesan'];?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?php

}
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
</p>
