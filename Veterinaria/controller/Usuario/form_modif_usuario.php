<?php
require "../../model/userabm.php";
require "../../model/login.php";
sessioncheck();


$u=new Usuario();

$usr=$_POST;

if( $u->updUser($usr) ){
	header("Location: ../ABM_usuario.php");
}else{
	$view_page = "mensaje.php?mensaje='Usuario no modificado'";
	include "../../views/layout.php";
}




?>