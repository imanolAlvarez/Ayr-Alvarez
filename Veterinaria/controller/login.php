<?php

$titulo = "login";

if( isset($_GET['err'])){
	$error=$_GET['err'];
	}else{
	$error='';
	}

include "../views/login.php";

?>
