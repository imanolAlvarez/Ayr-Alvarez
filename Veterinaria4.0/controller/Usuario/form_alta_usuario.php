<?php
require "../../model/userabm.php";
require "../../model/login.php";
sessioncheck();



$u=new Usuario();

$username= $_POST['username'];
$password= $_POST['password'];
$perfil= $_POST['perfil'];
$activo= $_POST['activo'];


if( $u->insUser($username,$password,$perfil,$activo) ){
	header("Location: ../ABM_usuario.php");
}else{
	$view_page = "mensaje.php?mensaje='Usuario no agregado'";
	include "../../views/layout.php";
}



?>
