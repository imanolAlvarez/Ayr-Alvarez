<?php
require "../model/login.php";
sessioncheck();
require "../model/userabm.php";
$usuarios = new Usuario();

if(isset($_GET['idusreditar'])){
	$buscaUsr = $usuarios->getUser( $_GET['idusreditar'] );
	//var_dump($buscaUsr);
	$idmod= $buscaUsr->id;
	$username= $buscaUsr->username;
	$password= $buscaUsr->password;
	$id_perfil= $buscaUsr->id_perfil;
	$activo= $buscaUsr->activo;
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Usuario/modificar_usuario.php";
include "../views/layout.php";
?>