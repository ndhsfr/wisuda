<?php
include("../config/koneksi.php");
														
// Ambil data yang dikirim dari form
$nim_cari	= $_POST['nim_cari'];
											

	$cek = mysqli_query($koneksi, "SELECT nim FROM bebas_wisuda WHERE nim='$nim_cari' "); 
	if(mysqli_num_rows($cek) == 0)    // mengecek apakah no pendaftaran tidak ada dalam database
	{ 
		$response = array('status'=>'kosong');
	}
	else
	{ 
		$response = array('status'=>'ada');
	}
 						
echo json_encode($response); // konversi variabel response menjadi JSON					
?>