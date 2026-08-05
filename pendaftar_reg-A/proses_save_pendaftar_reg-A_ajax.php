<?php
include("../../config/koneksi.php");
														
// Ambil data yang dikirim dari form
$ta_sem		     		= $_POST['TA'];
$prodi		     		= $_POST['prodi'];
$nim			 		= $_POST['nim'];
$nama			 		= $_POST['nama'];
$tmpt_lhr				= $_POST['tmpt_lhr'];
$tgl_lhr		 		= $_POST['tgl_lhr'];
$alamat	 		 		= $_POST['alamat'];
$jenkel			 		= $_POST['jenkel'];
$ipk			 		= $_POST['ipk'];
$judul_indo				= $_POST['judul_indo'];
$judul_english			= $_POST['judul_english'];
$pesan				 	= $_POST['pesan'];
			

$cek = mysqli_query($koneksi, "SELECT nim FROM pendaftar_wisuda_reg-A WHERE nim='$nim'"); 
	if(mysqli_num_rows($cek) == 0)    
	{ 
		
		$insert = mysqli_query($koneksi, "INSERT INTO pendaftar_wisuda_reg-A (ta_sem, prodi, nim, nama, tmpt_lhr, tgl_lhr, alamat, jenkel, ipk, judul_indo, judul_english, pesan ) VALUES ('$ta_sem', '$prodi', '$nim', '$nama', '$tmpt_lhr', '$tgl_lhr', '$alamat', '$jenkel', '$ipk', '$judul_indo', '$judul_english', '$pesan' ) ") ; // query untuk menambahkan data ke dalam database
													
		if($insert)   // jika query insert berhasil dieksekusi
		 { 
			$response = array('status'=>'sukses');
		 }
		else    // jika query insert gagal dieksekusi
		 { 
			$response = array('status'=>'error');
		 }
	}
	else
	{ 
		$response = array('status'=>'dobel');
	}
 
						
echo json_encode($response); // konversi variabel response menjadi JSON					

?>