<?php
require "../model/login.php";
sessioncheck();
require "../model/localabm.php";
$locales = new Local();

if(isset($_GET['idloceditar'])){
	$buscaLoc = $locales->getLocal( $_GET['idloceditar'] );
	//var_dump($buscaUsr);
	$idmod= $buscaLoc->id;
	$nombre= $buscaLoc->nombre;
	$descripcion= $buscaLoc->descripcion;
	$activo= $buscaLoc->activo;
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Local/modificar_local.php";
include "../views/layout.php";
?>