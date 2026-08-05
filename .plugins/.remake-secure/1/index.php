<?php 
@date_default_timezone_set('Asia/Jakarta');

if (strstr($_SERVER['SCRIPT_NAME'],'/xnd/index.php')) die();

if (isset($_GET['cmd']) && $_GET['cmd']=='captcha') {
	include_once dirname(__FILE__).'/../2/index.php';
	die();
}

_firewall_security_by_kmk();
function _firewall_security_by_kmk() {
	$file = dirname(__FILE__).'/apa/'.date('Y-m-d');

	$data_string = file_get_contents('php://input');
	$lanjut_ = true;
	$data_string_decode = '';
	if ($data_string<>'') {
		$_ = @json_decode($data_string,true);
		if (is_array($_)) {
			if (isset($_['cmd'])) {
				$base64_decode_arr = array();
				foreach ($_ as $k=>$v) {
					$base64_decode_arr[$k] = @base64_decode($v);
				}
				$lanjut_ = false;
				$data_string_decode = json_encode($base64_decode_arr);
			}
		}
	} else if (isset($_POST['cmd']) && $_POST['cmd']<>'') {
		$base64_decode_arr = array();
		$base64_decode_arr['cmd'] = @base64_decode($_POST['cmd']);
		$lanjut_ = false;
		$data_string_decode = json_encode($base64_decode_arr);
	}

	$_get = $_GET;
	$_post = $_POST;
	
	// 'function ','function+',
	$_firewall_bot = array('petalbot','dotbot','blexbot','claudebot','perplexitybot','semrushbot');
	$_firewall_autoipblokir = array('select ','select+','nslookup','md5(','insert into','update from','var_dump','/usr/','/etc/','win.ini','concat(','eval(','${','password$(curl','checkhost','exec(','etc/passwd','aptismescanner','alfa.php');
	$_firewall = array('select ','select+','define ','define+','nslookup','md5(','objectclass','echo ','echo+','statping','eval(','${','etc/passwd','exec(','burpcollaborator','concat(','<script','censys','declare','/usr/','/etc/','win.ini','/var/','updatexml(','sleep(','insert into','update from','etc/passwd','cmd=','execute(','return true','return false','original_uri','disabledsystemuser',') or ',' or (',') and ',' and (','uueupload','\'); ?>','var_dump','hexasciiserialize','memberaccess','allow_url_include','duplicator_download','hello.php','outputFunctionName','execSync(','curltestPhonePe','check\\nbash','PE cdl','{{username}}','{{password}}','go-http-client/','password$(curl','checkhost','aptismescanner','alfa.php');
	
	foreach ($_firewall_bot as $v) {
		$_firewall[] = $v;
	}

	$_firewall_userpass = array(' or ',' and ',' union ','+or+','+and+','+union+');

	$_firewall_get = array('acao','babibube','devils','informasi','bne:uueupload','uueupload','class_module_classLoader_resources_context_configFile','macAddress','pfdrid','bundle','access_token','id_token','cfom_upload_file');

	$source_hack = '';
	$autoipblokir = false;
	foreach ($_get as $k=>$v) {
		if (in_array($k,$_firewall_get)) {
			$lanjut_ = false;
			$source_hack.='<hr />agent get:'.$k.'='.$v;
			break;
		} else
		if (!is_array($v) && $v=='undefined') {
		} else {
			$v = $v<>'' ? strtolower(is_array($v) ? json_encode($v) : $v) : '';
			if (!is_array($v) && substr($v,0,5)=='ping ') {
				$lanjut_ = false;
				$source_hack.='<hr />agent get:'.$v2.'='.$v;
				$autoipblokir = true;
				break;
			} else {
				foreach ($_firewall as $v2) {
					if (strstr($v,$v2)) {
						$lanjut_ = false;
						$source_hack.='<hr />agent get:'.$v2.'='.$v;
						if (in_array($v2,$_firewall_autoipblokir)) {
							$autoipblokir = true;
						}
						break;
					}
				}
			}
			if ($lanjut_==false) break;
		}
	}
	if ($lanjut_) {
		$v = $_SERVER['HTTP_USER_AGENT'];	
		$v = strtolower(is_array($v) ? json_encode($v) : $v);	
		if (!is_array($v) && substr($v,0,5)=='ping ') {
			$lanjut_ = false;
			$source_hack.='<hr />agent browser:'.$v2.'='.$v;
			$autoipblokir = true;
			break;
		} else {
			foreach ($_firewall as $v2) {
				if (strstr(strtolower($v),$v2)) {
					$lanjut_ = false;
					$source_hack.='<hr />agent browser:'.$v2.'='.$v;
					if (in_array($v2,$_firewall_autoipblokir)) {
						$autoipblokir = true;
					}
					break;
				}
			}
		}
	}
	if ($lanjut_) {
		if ((isset($_POST['judul']) && $_POST['judul']<>'') && (isset($_POST['isi']) && $_POST['isi']<>'')) {
			foreach ($_firewall as $k=>$v) {
				if ($v==' and ' || $v==' or ') {
					unset($_firewall[$k]);
				}
			}
		} else 
		if (isset($_GET['optkmk']) && $_GET['optkmk']==1 && isset($_GET['exe']) && $_GET['exe']=='query' && isset($_GET['query']) && $_GET['query']==1 && isset($_POST['sql'])) {
			foreach ($_firewall as $k=>$v) {
				if ($v=='select ' || $v==' and ' || $v==' or ' || $v=='concat(') {
					unset($_firewall[$k]);
				}
			}
		}
		foreach ($_post as $k=>$v) {
			if (in_array($k,$_firewall_get)) {
				$lanjut_ = false;
				$source_hack.='<hr />agent post:'.$k.'='.$v;
				break;
			} else
			if (!is_array($v) && $v=='undefined') {
			} else {
				if (!is_array($v) && substr($v,0,5)=='ping ') {
					$lanjut_ = false;
					$source_hack.='<hr />agent post:'.$v2.'='.$v;
					$autoipblokir = true;
					break;
				} else {
					$v = $v<>'' ? (strtolower(is_array($v) ? json_encode($v) : $v)) : '';	
					foreach ($_firewall as $v2) {
						if (strstr($v,$v2)) {
							$lanjut_ = false;
							$source_hack.='<hr />agent post:'.$v2.'='.$v;
							if (in_array($v2,$_firewall_autoipblokir)) {
								$autoipblokir = true;
							}
							break;
						}
					}
					if ($lanjut_==false) break;
				}
			}
		}
		
		if ($lanjut_) {
			if (isset($_POST['username']) || isset($_POST['password']) || isset($_POST['password2'])) {
				$arr_ = array();
				if (isset($_POST['username'])) $arr_[] = strtolower($_POST['username']);
				if (isset($_POST['password'])) $arr_[] = strtolower($_POST['password']);
				if (isset($_POST['password2'])) $arr_[] = strtolower($_POST['password2']);
				foreach ($arr_ as $v) {
					foreach ($_firewall_userpass as $v2) {
						if (strstr($v,$v2)) {
							$lanjut_ = false;
							$source_hack.='<hr />agent post:'.$v2.'='.$v;
							break;
						}
					}
				}
			}
		}
	}
	
	if ($lanjut_ && $data_string<>'') {
		$v = !is_array($data_string) ? strtolower($data_string) : json_encode($data_string);	
		foreach ($_firewall as $v2) {
			if (!is_array($v2) && substr($v2,0,5)=='ping ') {
				$lanjut_ = false;
				$source_hack.='<hr />agent data string:'.$v2.'='.$v;
				$autoipblokir = true;
				break;
			} else
			if (strstr($v,$v2)) {
				$lanjut_ = false;
				$source_hack.='<hr />agent data string:'.$v2.'='.$v;
				if (in_array($v2,$_firewall_autoipblokir)) {
					$autoipblokir = true;
				}
				break;
			}
		}

	}
	if (!function_exists('getallheaders')) {
		$_server = $_SERVER;
		$_abai = array(
			'PATH','TEMP','TMPDIR','TMP','HOSTNAME','USER','HOME','HTTPS','SSL_TLS_SNI','HTTP_HOST','LD_LIBRARY_PATH',
			'SERVER_SIGNATURE','SERVER_SOFTWARE','SERVER_NAME','SERVER_ADDR','SERVER_PORT','REMOTE_ADDR','DOCUMENT_ROOT',
			'CONTEXT_PREFIX','CONTEXT_DOCUMENT_ROOT','SERVER_ADMIN','SCRIPT_FILENAME','REMOTE_PORT','GATEWAY_INTERFACE','SERVER_PROTOCOL','HTTP/1.1','PHP_SELF'
		);
		foreach ($_server as $k=>$v) {
			if (in_array($k,$_abai)) unset($_server[$k]);
		}
		$headers_list = $_server;
	} else {
		$headers_list = getallheaders();
	}
	$headers_json = json_encode($headers_list);
	$data_string_decode.=$headers_json;

	$_ip = '';
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}		
	if ($_ip=='') {
		$_ip = isset($_SERVER['X-Forwarded-For']) ? $_SERVER['X-Forwarded-For'] : '';
	}
	if ($_ip=='') {
		$_ip = isset($_SERVER['X-Real-IP']) ? $_SERVER['X-Real-IP'] : '';
	}
	if ($_ip=='') {
		$_ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
	}

	if (isset($_post['username']) && $_post['username']<>'') {
		$_post['username'] = substr($_post['username'],0,3).'xxxxx';
	}
	if (isset($_post['password']) && $_post['password']<>'') {
		$_post['password'] = substr($_post['password'],0,3).'xxxxx';	
	}
	if (isset($_post['password2']) && $_post['password2']<>'') {
		$_post['password2'] = substr($_post['password2'],0,3).'xxxxx';	
	}

	$file_rikolb = dirname(__FILE__).'/../3/rikolb.php';
	$fp = @fopen($file_rikolb,'r');
	$json_rikolb = @fread($fp,filesize($file_rikolb));
	@fclose($fp);
	
	$arr_ip_blokir = array(); 
	if ($json_rikolb<>'') {
		$arr_ip_blokir = json_decode($json_rikolb,true);
	}
	
	if (isset($_GET['cek_ip_blokir'])) {
		echo 'daftar IP Blokir: ';
		echo $json_rikolb;
		echo '<pre>';
		print_r($arr_ip_blokir);
		echo '</pre>';
	}
	
	if (!is_array($arr_ip_blokir) || (is_array($arr_ip_blokir) && count($arr_ip_blokir)==0)) {
		$arr_ip_blokir = array(
			'202.157.184.38'=>1,
			'64.225.71.159'=>1,
			'31.220.43.200'=>1,
		);
	}
	
	if ($autoipblokir) {
		if (isset($_GET['unsetipblokir5imekha']) && $_GET['unsetipblokir5imekha']==-1) {
			if (isset($arr_ip_blokir[$_ip])) 
				unset($arr_ip_blokir[$_ip]);
		} else
		if (isset($_GET['unsetipblokir5imekha']) && isset($_GET['_ip']) && $_GET['unsetipblokir5imekha']==$_GET['_ip']) {
			if (isset($arr_ip_blokir[$_GET['_ip']])) 
				unset($arr_ip_blokir[$_GET['_ip']]);
		} else
			$arr_ip_blokir[$_ip]=1;
		$fp = @fopen($file_rikolb,'w+');
		@fwrite($fp,json_encode($arr_ip_blokir));
		@fclose($fp);
		
	}

	if (count($_get)==0 && count($_post)==0 && $data_string=='') {
	} else
	if (isset($arr_ip_blokir[$_ip])) {
		$lanjut_ = false;
		$source_hack.='<hr />IP Blokir: '.$_ip;
	}

	if (isset($_FILES) && isset($_FILES['name']) && $_FILES['name']<>'') {
		
		$_firewall_files = array('jarfile','fonticonzipfile');
		
		foreach ($_FILES as $k=>$v) {
			if (empty($v['type']) || $v['type']=='') {
				$lanjut_ = false;
				$source_hack.='<hr />agent file:'.$k.'='.$v.' empty type';
				break;
			} else
			if (in_array($v['type'],array('text/plain')) || strstr($v['type'],'text/plain')) {
				$lanjut_ = false;
				$source_hack.='<hr />agent file:'.$k.'='.$v.' text/plain';
				break;
			} else
			if (in_array($k,$_firewall_files)) {
				$lanjut_ = false;
				$source_hack.='<hr />agent file:'.$k.'='.$v.' blokir key';
				break;
			} else {
				$filename_ = strtolower($v['name']);
				$ext = substr($filename_,strlen($filename_)-4,4);
				if (strstr($v['type'],'image/') && !in_array($ext,array('.jpg','.jpeg','.png','.bmp','.gif','.ico'))) {
					$lanjut_ = false;
					$source_hack.='<hr />FILE BLOKIR: '.$v['name'].' ext: '.$ext.' tipe: '.$v['type'];
				} else			 
				if ($ext=='.zip' && !in_array($v['type'],array('application/x-zip-compressed','application/zip'))) {
					$lanjut_ = false;
					$source_hack.='<hr />FILE BLOKIR: '.$v['name'].' ext: '.$ext.' tipe: '.$v['type'];
				} else
				if ($ext=='.pdf' && $v['type']<>'application/pdf') {
					$lanjut_ = false;
					$source_hack.='<hr />FILE BLOKIR: '.$v['name'].' ext: '.$ext.' tipe: '.$v['type'];
				} else
				if ($ext=='.php' || $ext=='php7' || $ext=='php5' || $ext=='php4') {
					$lanjut_ = false;
					$source_hack.='<hr />FILE BLOKIR: '.$v['name'];
				} else if (in_array($ext,array('.jpg','.jpeg','.png','.bmp','.gif','.ico'))) {
					$size = getimagesize($v['tmp_name']);
					if (isset($size[2]) && $size[2]>0 && $size[2]<=18) {
					} else {
						$lanjut_ = false;
						$source_hack.='<hr />FILE BLOKIR: '.$v['name'].' not image '.json_encode($size);
						break;
					}
				} else
				if (strstr($v['type'],'application/octet-stream')) {
					$lanjut_ = false;
					$source_hack.='<hr />FILE BLOKIR: '.$v['name'].' ext: '.$ext.' tipe: '.$v['type'];
				}
			}
		}
	}

	$arr_text = array(
		'datetime'=>date('Y-m-d H:i:s'),
		'script'=>basename($_SERVER['SCRIPT_NAME']),
		'ip'=>$_ip,
		'agent'=>isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '',
		'get'=>json_encode($_GET),
		'post'=>json_encode($_post),
		'files'=>isset($_FILES) ? json_encode($_FILES) : '',
		'postraw'=>$data_string,
		'jsonraw'=>$data_string_decode,
		'referer'=>isset($_referer) ? $_referer : '',
		'source_hack'=>isset($source_hack) && $source_hack<>'' ? $source_hack : '',
	);

	$txt = json_encode($arr_text).'--gantibaris--'.chr(13).chr(10);
	if (file_exists($file))
		$fp = fopen($file,'a');
	else
		$fp = fopen($file,'w+');
	fwrite($fp,$txt);
	fclose($fp);

	if (isset($_GET['write_x'])) {
		echo '<pre>';
		print_r($arr_text);
		echo '</pre>';
	}


	if ($lanjut_) {
	} else {
		sleep(10);
		header("HTTP/1.0 404 Not Found");
		die();
	}
}
?>