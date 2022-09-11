<?




try {
     $sql = new PDO("mysql:host=localhost;dbname=script;charset=utf8", "root", "your_new_password_xyz");
	
} catch ( PDOException $e ){
     print $e->getMessage();
}






?>