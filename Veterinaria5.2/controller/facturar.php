<?php

require "../model/login.php";
sessioncheck();

include "../model/clientabm.php";

//$usuarios = new Usuario();
//$rsUsr = $usuarios->getAll(); //funcion que devuelve usuarios
/*
foreach ($rsUsr as $key => $useless){
	$users[]= array($useless['id'],$useless['username'], $usuarios->getPerfil( $useless['id_perfil'] ));
}

*/
$view_page = "Facturar/facturarajax.php";

if(isset($_GET['mensaje'])){
	$mensaje=$_GET['mensaje'];
}	
if(isset($_GET['mensaje_error'])){
	$mensaje_error=$_GET['mensaje_error'];
}	

$cli = new Cliente();
$cliente = $cli->getAll();

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];

include "../views/layout.php";

?>

