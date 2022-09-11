<?


	include("db.php");

if($_POST){
		
	
	$type = $_POST['type'];
	$u_ip = $_POST['ip'];
	$date = date('d.m.Y');
	
	$kontrol = $sql->prepare("SELECT * FROM zmx WHERE ip = ? AND type = ?");
	$kontrol->execute(array($u_ip,$type));
	$kontrol_varmi = $kontrol->rowCount();
	
	if($kontrol_varmi > 0){
		echo "Err 636: Your added info. Already Saved.";
		return;
	}
	
	$add_inf = $sql->prepare("INSERT INTO zmx SET ip=?, type=?, tarih=?");
	$inf_add = $add_inf->execute(array($u_ip,$type,$date));
	
	if($inf_add){
		echo "Your info added."; 
	}
	
	
}









?>