<?php
 // Define relative path from this script to mPDF

$nama_dokumen='Form Pendaftar Wisuda.pdf'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4'); 


//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

//sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
//-CONTOH Code START-->

 //KONEKSI
include("../config/koneksi.php");
$sql="select * from bebas_wisuda where nim='$_GET[nim]'  ";
$rs=mysqli_query($koneksi, $sql);
$row=mysqli_fetch_array($rs);
{ ?>

<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>

<table width="846" border="1">
  <tr>
    <td width="137" rowspan="4" align="center"><img src="../img/logo-stikes.png" width="80" height="79"></td>
    <td width="391" rowspan="4" align="center"><b>UNIVERSITAS MUHAMMADIYAH GOMBONG</b><br>
    Jl. Yos Sudarso. 461 Gombong, Kebumen.<br>
    Telp/Fax
    (0287)-472433 </td>
    <td width="109">No.Dokumen </td>
    <td width="13">:</td>
    <td width="162">FRM-BKM-MHS/012</td>
  </tr>
  <tr>
    <td>Revisi</td>
    <td>:</td>
    <td>00</td>
  </tr>
  <tr>
    <td>Tanggal Berlaku </td>
    <td>:</td>
    <td>01 Juni 2009</td>
  </tr>
  <tr>
    <td>Halaman</td>
    <td>:</td>
    <td>1 </td>
  </tr>
</table>
<table width="843" border="0">
  <tr>
  				<?php
				$sql2="select bebas_wisuda.*, tahun_akademik, semester from bebas_wisuda, ta_sem where (nim='$_GET[nim]' and bebas_wisuda.TA_sem=ta_sem.TA_sem)" ;
				$cari_angkatan=mysqli_query($koneksi, $sql2);
				$tampil=mysqli_fetch_array($cari_angkatan);
				?>
    <td colspan="5" align="center"><b>SURAT KETERANGAN / TANDA TERIMA <br>
      TELAH MNEGINPUT &amp; TARCER STUDI<br>      
UNIVERSITAS MUHAMMADIYAH GOMBONG<br>
TAHUN AKADEMIK :  <?php echo $tampil['tahun_akademik'];?> | <?php echo $tampil['semester'];?></b></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
    <td width="115" align="left">&nbsp;</td>
    <td width="184" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="left"><b>Yang Bertanda Tangan di bawah ini : </b></td>
  </tr>
  <tr>
    <td width="161" align="left">Nama </td>
    <td width="25">:</td>
    <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Jabatan</td>
    <td>:</td>
    <td colspan="3" align="left">KETUA / WAKA CDC</td>
  </tr>
  <tr>
    <td colspan="5" align="left">Menerangkan bahwa : </td>
  </tr>
  <tr>
    <td align="left">Nim</td>
    <td>:</td>
    <td colspan="3" align="left"><?php echo $row['nim'];?></td>
  </tr>
  <tr>
    <td align="left">Nama</td>
    <td>:</td>
    <td colspan="3" align="left"><?php echo $row['nama'];?></td>
  </tr>
  <tr>
    <td align="left">Program Studi</td>
    <td>:</td>
    <td colspan="3" align="left"><?php echo $row['prodi'];?></td>
  </tr>
  <tr>
    <td align="left">Judul KTI </td>
    <td>:</td>
    <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="left">Telah Menginput : </td>
  </tr>
  <tr>
    <td colspan="5" align="left">1. Tracer Studi</td>
  </tr>
  
  <tr>
    <td colspan="5" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Keterangan Lain </td>
    <td>:</td>
    <td colspan="3" align="left">............................................................................</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" align="left">............................................................................</td>
  </tr>
  <tr>
    <td align="left"></td>
    <td></td>
    <td colspan="3" align="left"></td>
  </tr>
</table>
<table width="844" border="0">
  <tr>
    <td width="188" rowspan="5">&nbsp;</td>
    <td width="47"></td>
    <td width="265"></td>
    <td width="326" align="center">Gombong, <?php echo date('d-m-Y'); ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td align="center">Ketua/ WaKa,</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td align="center">CDC UNIMUGO </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">( ......................................................) </td>
  </tr>
</table>
<p>=============================================================</p>
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
