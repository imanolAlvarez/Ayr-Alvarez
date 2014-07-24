<?php
require "../../model/localabm.php";
require "../../model/login.php";
sessioncheck();


$l=new Local();

if( $l->delLocal($_GET['idlocborrar']) ){
	header("Location: ../ABM_locales.php");
}else{
	$view_page = "mensaje.php?mensaje='Local no eliminado'";
	include "../../views/layout.php";
}




?>
