<?php
require "../../model/localabm.php";
require "../../model/login.php";
sessioncheck();



$l=new Local();

$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$activo= $_POST['activo'];


if( $l->insLocal($nombre,$descripcion,$activo) ){
	header("Location: ../ABM_locales.php");
}else{
	$view_page = "mensaje.php?mensaje='Local no agregado'";
	include "../../views/layout.php";
}



?>
