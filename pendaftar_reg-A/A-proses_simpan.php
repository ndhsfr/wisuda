<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$TA_sem = $_POST['TA_sem']; 
$prodi = $_POST['prodi']; 
$nim = $_POST['nim']; 
$nama = $_POST['nama']; 
$tmpt_lhr = $_POST['tmpt_lhr']; 
$tgl_lhr = $_POST['tgl_lhr']; 
$alamat = $_POST['alamat']; 
$jenkel = $_POST['jenkel']; 
$ipk = $_POST['ipk']; 
$judul_indo = $_POST['judul_indo']; 
$judul_english = $_POST['judul_english'];
$pesan = $_POST['judul_english'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis')."-".$foto;

// Set path folder tempat menyimpan fotonya
$path = "../foto/".$fotobaru;

// Proses upload
// Cek apakah gambar berhasil diupload atau tidak
if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
	// Proses simpan ke Database
	$sql = $pdo->prepare("INSERT INTO pendaftar_wisuda_rega VALUES(:TA_sem,:prodi,:nim,:nama,:tmpt_lhr,:tgl_lhr,:alamat,:jenkel,:ipk,:judul_indo,:judul_english,:pesan,:foto)");
	$sql->bindParam(':TA_sem', $TA_sem);
	$sql->bindParam(':prodi', $prodi);	
	$sql->bindParam(':nim', $nim);
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':tmpt_lhr', $tmpt_lhr);
	$sql->bindParam(':tgl_lhr', $tgl_lhr);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':jenkel', $jenkel);
	$sql->bindParam(':ipk', $ipk);
	$sql->bindParam(':judul_indo', $judul_indo);
	$sql->bindParam(':judul_english', $judul_english);
	$sql->bindParam(':pesan', $pesan);

	$sql->bindParam(':foto', $fotobaru);
	$sql->bindParam(':foto', $fotobaru);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
}else{ // Jika proses upload gagal
	$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Gambar gagal untuk diupload', // Set pesan
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
