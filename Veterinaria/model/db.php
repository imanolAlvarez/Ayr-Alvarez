<?php

set_time_limit(0);
function conectar(){

    $db_type='mysql';
    $db_host='localhost';
    $db_database='veterinaria';
    $db_username='root';
    $db_password='';
	
	try{
	
		$conn = new PDO('mysql:host=localhost;dbname=veterinaria', $db_username, $db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $e){
			echo "ERROR: " . $e->getMessage();
	}

	return $conn;
}

	
function desconectar ($db) {
    //$db->disconnect();
	unset($conn);
}
?>
