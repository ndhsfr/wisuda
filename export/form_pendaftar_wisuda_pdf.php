<?php
 // Define relative path from this script to mPDF

$nama_dokumen='Form Pendaftar Wisuda.pdf'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . 'mpdf.php');

$mpdf=new mPDF('utf-8','A4'); 

//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

//sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
//-CONTOH Code START-->

 //KONEKSI
include("../config/koneksi.php");
$sql="select pendaftar_wisuda_rega.*, bebas_wisuda.* from pendaftar_wisuda_rega, bebas_wisuda where (pendaftar_wisuda_rega.nim='$_GET[nim]') and (pendaftar_wisuda_rega.nim=bebas_wisuda.nim)";
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
    Jl. Yos Suarso. 461 Gombong, Kebumen.<br>
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
				$sql2="select pendaftar_wisuda_rega.*, tahun_akademik, semester from pendaftar_wisuda_rega, ta_sem where (nim='$_GET[nim]' and pendaftar_wisuda_rega.TA_sem=ta_sem.TA_sem)" ;
				$cari_angkatan=mysqli_query($koneksi, $sql2);
				$tampil=mysqli_fetch_array($cari_angkatan);
				?>
    <td colspan="7" align="center"><b>FORMULIR PENDAFTARAN <br> 
    CALON WISUDAWAN/ WISUDAWATI
<br>
UNIVERSITAS MUHAMMADIYAH GOMBONG<br>
TAHUN AKADEMIK :  <?php echo $tampil['tahun_akademik'];?> | <?php echo $tampil['semester'];?></b></td>
  </tr>
  <tr>
    <td colspan="5" align="center">&nbsp;</td>
    <td align="left">Program Studi : </td>
    <td align="left"><?php echo $tampil['prodi'];?></td>
  </tr>
  <tr>
    <td colspan="5" align="left"><b>Biodata Diri  :</b> </td>
    <td width="119" align="left">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="145" align="left">NIM</td>
    <td width="12">:</td>
    <td colspan="5" align="left"><?php echo $tampil['nim'];?></td>
  </tr>
  <tr>
    <td align="left">Nama</td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['nama'];?></td>
  </tr>
  <tr>
    <td align="left">Tempat Lahir </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['tmpt_lhr'];?></td>
  </tr>
  <tr>
    <td align="left">Tanggal Lahir </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['tgl_lhr'];?></td>
  </tr>
  <tr>
    <td align="left">Alamat</td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['alamat'];?></td>
  </tr>
  <tr>
    <td align="left">Jenis Kelamin </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['jenkel'];?></td>
  </tr>
  <tr>
    <td align="left">Nilai IPK Terakhir </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['ipk'];?></td>
  </tr>
  <tr>
    <td align="left">Judul Tugas Akhir<br>
    (versi Indonesia) </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['judul_indo'];?></td>
  </tr>
  <tr>
    <td align="left">Judul Tugas Akhir<br>
(versi English) </td>
    <td>:</td>
    <td colspan="5" align="left"><?php echo $tampil['judul_english'];?></td>
  </tr>
  <tr>
    <td align="left"></td>
    <td>&nbsp;</td>
    <td colspan="5" align="left"></td>
  </tr>
  <tr>
    <th align="left">Keterangan</th>
    <td>:</td>
    <td colspan="5" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Surat Ket. Bebas</td>
    <td>:</td>
    <td align="left">- Prodi</td>
    <td align="left">:</td>
    <td align="left">
				<?php $status = $row['ket_prodi']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      				<span><?php  echo "$pesan" ?></span> <?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      				<span><?php  echo "$pesan" ?></span> <?php }  ?>
	</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="220" align="left">- Laborat Kesehatan<br>
- Perpustakaan <br>
- Keuangan <br>
- CDC </td>
    <td width="9" align="left">:<br>
      :<br>
      :<br>
      :</td>
    <td width="153" align="left">
				<?php $status = $row['ket_labkes']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      				<span><?php  echo "$pesan" ?></span> <?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      				<span><?php  echo "$pesan" ?></span> <?php }  ?>
				<br>      
				<?php $status = $row['ket_perpus']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
                	<span> <?php  echo "$pesan" ?></span> <?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
                	<span> <?php  echo "$pesan" ?></span> <?php }  ?>
				<br>
      			<?php $status = $row['ket_keuangan']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      				<span> <?php  echo "$pesan" ?> </span> 	<?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      				<span> <?php  echo "$pesan" ?> </span> <?php }  ?>
                <br>
      			<?php $status = $row['ket_cdc']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      				<span> <?php  echo "$pesan" ?> </span> 	<?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      				<span> <?php  echo "$pesan" ?> </span> <?php }  ?>
</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Surat Ket. Penyerahan</td>
    <td>:</td>
    <td align="left">- Tugas Akhir di Perpustakaan</td>
    <td align="left">:</td>
    <td align="left"><?php $status = $row['ket_kti_perpus']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      <span>
      <?php  echo "$pesan" ?>
      </span>
      <?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      <span>
      <?php  echo "$pesan" ?>
      </span>
      <?php }  ?></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">- Tugas Akhir di LP3M</td>
    <td align="left">:</td>
    <td align="left"><?php $status = $row['ket_lp3m']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>
      <span>
      <?php  echo "$pesan" ?>
      </span>
      <?php  } 
				else {				
					$pesan = 'Belum Ada'; 	?>
      <span>
      <?php  echo "$pesan" ?>
      </span>
      <?php }  ?></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Mengumpulkan Berkas</td>
    <td>:</td>
    <td align="left">- Pas Foto 4x6 (2 lbr) </td>
    <td align="left">:</td>
    <td align="left">
			<?php $status = $tampil['pas_foto46']; 
		  		if ($status == 1 ) {					
					$pesan = ' Ada' ;  ?>					
					<span><?php  echo "$pesan" ?></span>  <?php  } 
				else {					
					$pesan = 'Belum Ada'; 	?>				
				  	<span> <?php  echo "$pesan" ?></span><?php }  ?>
    </td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">- FC Baitul Arqom <br>
      - FC Sertifikat HPT<br>
      - FC abstrak versi : Indo<br>
      - FC Abstrak versi : English<br>
      - FC Ijazah terakhir </td>
    <td align="left">:<br>
      :<br>
      :<br>
      :<br>
      :</td>
    <td align="left"><?php $status = $tampil['fc_BAPS']; 
		  		if ($status == 1 ) {					
					$pesan = 'Ada' ;  ?>					
					<span><?php  echo "$pesan" ?> </span> <?php  } 
				else {
					$check = '';
					$pesan = 'Belum Ada';  ?>			
				  	<span> <?php  echo "$pesan" ?> </span>   <?php }  ?>
    			<br>
    			<?php $status = $tampil['fc_HPT']; 
		  		if ($status == 1 ) {					
					$pesan = 'Ada' ;  ?>
					<span><?php  echo "$pesan" ?> </span> <?php  } 
				else {
					$check = '';
					$pesan = 'Belum Ada';  ?>
				  	<span> <?php  echo "$pesan" ?> </span> <?php }  ?>
    			<br>
    			<?php $status = $tampil['fc_abstrak_indo']; 
		  		if ($status == 1 ) {					
					$pesan = 'Ada' ;  ?>
					<span><?php  echo "$pesan" ?> </span> <?php  } 
				else {
					$check = '';
					$pesan = 'Belum Ada'; ?>			
				  	<span> <?php  echo "$pesan" ?> </span> <?php }  ?>
    			<br>
    			<?php $status = $tampil['fc_abstrak_english']; 
		  		if ($status == 1 ) {					
					$pesan = 'Ada' ;  ?>			
					<span><?php  echo "$pesan" ?> </span> <?php  } 
				else {
					$check = '';
					$pesan = 'Belum Ada';  ?>			
				  	<span> <?php  echo "$pesan" ?> </span> <?php }  ?>
    			<br>
    			<?php $status = $tampil['fc_ijazah_terakhir']; 
		  		if ($status == 1 ) {					
					$pesan = 'Ada' ;   ?>  					
					<span><?php  echo "$pesan" ?> </span> <?php  } 
				else {
					$check = '';
					$pesan = 'Belum Ada';   ?>					
  					<span> <?php  echo "$pesan" ?> </span> <?php }  ?></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="left">Lainnya : ............................................................................................................ </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"></td>
    <td></td>
    <td colspan="5" align="left"></td>
  </tr>
</table>
<table width="844" border="0">
  <tr>
    <td width="188" rowspan="3"><table width="" height="" border="" align="center">
      <tr>
        <!-- <td align="center"><img src="../foto/<?php // echo $row['foto']; ?>" width="150" height="150"></td> -->
        <td align="center">
        <?php 
          include("phpqrcode/qrlib.php");

          $text= '
		  NIM 		  : '.$row['nim'].'
		  NAMA 		: '.$row['nama'].'
		  NO SK 		: '.$row['no_sk'].'
		  Kesan/Pesan : '.$row['pesan'].'
		  ' ;		  
		
          QRCode::png("$text", "image.png", "L", 4, 4);

          echo " <img src='image.png' /> "; 
        ?>
         

        </td>
      </tr>
    </table>	</td>
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
    <td><p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td align="center">Barcode Identitas</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php //echo $row['nama'];?></td>
    <td align="center">Ari Purwanti </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"> </td>
    <td align="center">(Bagian Administrasi Akademik) </td>
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
