<?php
include("../config/koneksi.php");
									
$nim		= $_POST['nim']; 
$ket_lp3m 	= $_POST['ket_lp3m'];

	$sql="update bebas_wisuda set ket_lp3m='$ket_lp3m' WHERE nim='$nim'";
	$result	= mysqli_query($koneksi, $sql);
	
	if ($result) // Jika proses update berhasil
	{
	  	$response = array('status'=>'sukses');

	 //  	$response = array(
		// 'status'=>'sukses', // Set status
		// 'pesan'=>'Data berhasil disimpan' // Set pesan
		// );
	}
	  else
	{ // Jika proses update gagal
		$response = array('status'=>'error');

		// $response = array(
		// 'status'=>'error', // Set status
		// 'pesan'=>'Data gagal disimpan' // Set pesan
		// );
	}

echo json_encode($response); // konversi variabel response menjadi JSON					
?>