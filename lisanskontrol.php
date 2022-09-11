<?
$ip = $_GET['ipcheck'];
if(isset($ip)){
	if(!file_exists("licenses/$ip.txt")){
		echo "Yok";
	}else{
		echo "Var";
	}
}

if(isset($_GET['versioncheck'])){
echo "2";
return;
}

if(!isset($ip)){
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}
echo GetIP();
}




?>