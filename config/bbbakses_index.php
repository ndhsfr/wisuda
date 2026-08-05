<?php
include_once dirname(__FILE__).'/.plugins/.remake-secure/index.php';

//if (session_status() == PHP_SESSION_NONE) { // mengecek apakah session belum dimulai
    session_start(); // maka mulai session
//}

//jika session tidak kosong atau ada sessionnya
if (!empty($_SESSION['userwis'])) 
{
 	if ($_SESSION['id_role'] == 1){ // jika level session adalah admin
		//redirect ke halaman home
		echo '<script language="javascript">document.location="admin";</script>'; // maka ke halaman home
			}
	else if ($_SESSION['id_role'] == 2){ // jika level session adalah staff
		//redirect ke halaman home2
		echo '<script language="javascript">document.location="admin";</script>'; // maka ke halaman home1
			}
	else if ($_SESSION['id_role'] == 3){ // jika level session adalah dosen
		//redirect ke halaman home3
		echo '<script language="javascript">document.location="index.php";</script>'; // maka ke halaman home2
			}
	else if ($_SESSION['id_role'] == 4){ // jika level session adalah dosen
		//redirect ke halaman home3
		echo '<script language="javascript">document.location="admin";</script>'; // maka ke halaman home2
			}
}
?> 
