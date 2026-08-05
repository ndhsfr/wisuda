<?php 
if (isset($_GET['show_error']) && $_GET['show_error']==1) {
	
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	if (isset($_GET['raid_secure']) && $_GET['raid_secure']==1) {
		echo '1. display_error<br />';
	}
} else {
	error_reporting(0);
}
if (isset($_GET['cmd']) && $_GET['cmd']=='captcha') {
	include_once dirname(__FILE__).'/2/index.php';
	die();
}
include_once dirname(__FILE__).'/1/index.php';
if (isset($_COOKIE['kmksecurity']) && $_COOKIE['kmksecurity']==md5(date('Y-m-d').$_SERVER['HTTP_USER_AGENT'])) {
	if (!defined('kmksecurity')) 
	  define('kmksecurity','by irfan.inside@gmail.com');
} else {
	if (isset($_GET['raid_secure']) && $_GET['raid_secure']==1) {
		echo '3. include 1/gifnoc.php<br />';
	}
	include_once dirname(__FILE__).'/1/captcha.inc.php';
	die();
}
?>