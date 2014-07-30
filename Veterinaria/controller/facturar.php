<?php

require "../model/login.php";
sessioncheck();

//require "../model/userabm.php";

//$usuarios = new Usuario();
//$rsUsr = $usuarios->getAll(); //funcion que devuelve usuarios
/*
foreach ($rsUsr as $key => $useless){
	$users[]= array($useless['id'],$useless['username'], $usuarios->getPerfil( $useless['id_perfil'] ));
}

*/
$view_page = "Facturar/facturarajax.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>

