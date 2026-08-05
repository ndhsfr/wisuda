<?php
include("../config/koneksi.php");
									
$nim				= $_POST['nim']; 
$pas_foto46 		= $_POST['pas_foto46'];
$fc_BAPS 			= $_POST['fc_BAPS'];
$fc_HPT 			= $_POST['fc_HPT'];
$fc_abstrak_indo 	= $_POST['fc_abstrak_indo'];
$fc_abstrak_english	= $_POST['fc_abstrak_english'];
$fc_ijazah_terakhir	= $_POST['fc_ijazah_terakhir'];

// if (isset($_POST['pas_foto46'])) 
//     $pas_foto46 = 1 ; else $pas_foto46 = 0 ; 
                                      
// if (isset($_POST['fc_BAPS'])) 
//    $fc_BAPS = 1 ; else $fc_BAPS = 0 ; 
                                      
// if (isset($_POST['fc_HPT'])) 
//    $fc_HPT = 1 ; else $fc_HPT = 0 ; 
                                      
// if (isset($_POST['fc_abstrak_indo'])) 
//     $fc_abstrak_indo = 1 ; else $fc_abstrak_indo = 0 ;
                      
// if (isset($_POST['fc_abstrak_english'])) 
//    $fc_abstrak_english = 1 ; else $fc_abstrak_english = 0 ;
                                      
// if (isset($_POST['fc_ijazah_terakhir'])) 
//    $fc_ijazah_terakhir = 1 ; else $fc_ijazah_terakhir = 0 ;


	$sql="update bebas_wisuda set pas_foto46='$pas_foto46', fc_BAPS='$fc_BAPS', fc_HPT='$fc_HPT', fc_abstrak_indo='$fc_abstrak_indo', fc_abstrak_english='$fc_ijazah_terakhir', fc_ijazah_terakhir='$fc_ijazah_terakhir' WHERE nim='$nim'";
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