<?php
require "../../model/localabm.php";
require "../../model/login.php";
sessioncheck();


$l=new Local();

$loc=$_POST;

if( $l->updLocal($loc) ){
	header("Location: ../ABM_locales.php");
}else{
	$view_page = "mensaje.php?mensaje='Local no modificado'";
	include "../../views/layout.php";
}




?>