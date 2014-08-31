<?php
require "../../model/userabm.php";
require "../../model/login.php";
sessioncheck();


$u=new Usuario();

if( $u->delUser($_GET['idusrborrar']) ){
	header("Location: ../ABM_usuario.php");
}else{
	$view_page = "mensaje.php?mensaje='Usuario no eliminado'";
	include "../../views/layout.php";
}




?>
