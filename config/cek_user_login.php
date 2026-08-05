<?php
include_once dirname(__FILE__).'/../.plugins/.remake-secure/index.php';
//if (session_status() == PHP_SESSION_NONE) { // mengecek apakah session belum dimulai
    session_start(); // maka mulai session
//}

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['userwis']) || empty($_SESSION['userwis'])) 
{ 
   header('location:login.php');exit;
	//echo '<script language="javascript">document.location="../index.php";</script>'; // maka diarahkan ke halaman login
}
?>