<?php
include("../config/koneksi.php");
														
// Ambil data yang dikirim dari form
$program	= $_POST['program'];
$ta_sem    	= $_POST['ta_sem'];
$prodi		= $_POST['prodi'];
$nim		= $_POST['nim'];



											

	$cek = mysqli_query($koneksi, "SELECT nim FROM bebas_wisuda WHERE nim='$nim' "); 
	if(mysqli_num_rows($cek) == 0)    // mengecek apakah no pendaftaran tidak ada dalam database
	{ 
		
		$insert = mysqli_query($koneksi, "INSERT INTO bebas_wisuda (program, ta_sem, prodi, nim) VALUES ('$program', '$ta_sem', '$prodi', '$nim') ") ; // query untuk menambahkan data ke dalam database
													
		if($insert)   // jika query insert berhasil dieksekusi
		 { 
			$response = array('status'=>'sukses');
		 }
		else    // jika query insert gagal dieksekusi
		 { 
			$response = array('status'=>'gagal');
		 }
	}
	else
	{ 
		$response = array('status'=>'dobel');
	}
 						
echo json_encode($response); // konversi variabel response menjadi JSON					
?>