<?php
include("../config/koneksi.php");
									
$nim			= $_POST['nim']; 
$program 		= $_POST['program'];
$tasem 			= $_POST['ta_sem'];
$prodi 			= $_POST['prodi'];
//$bebasprodi 	= $_POST['bebasprodi'];
//$bebasperpus1 	= $_POST['bebasperpus1'];
//$bebasperpus2 	= $_POST['bebasperpus2'];
//$bebaslp3m	 	= $_POST['bebaslp3m'];
//$bebasuang	 	= $_POST['bebasuang'];
//$bebaslabkes 	= $_POST['bebaslabkes'];
//$bebascdc    	= $_POST['bebascdc'];


	//$sql="update bebas_wisuda set program='$program', ta_sem='$tasem', prodi='$prodi', ket_prodi='$bebasprodi', ket_perpus='$bebasperpus1', ket_kti_perpus='$bebasperpus2',ket_lp3m='$bebaslp3m', ket_keuangan='$bebasuang', ket_labkes='$bebaslabkes', ket_cdc='$bebascdc' where nim='$nim' ";
	//$result	= mysqli_query($koneksi, $sql);


$sql="update bebas_wisuda set program='$program', ta_sem='$tasem', prodi='$prodi' where nim='$nim' ";


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