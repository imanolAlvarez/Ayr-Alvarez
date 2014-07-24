<?php
require "../../model/laboratorioabm.php";
require "../../model/login.php";
sessioncheck();



$l=new Laboratorio();
/*
$username= $_POST['username'];
$password= $_POST['password'];
$perfil= $_POST['perfil'];
$activo= $_POST['activo'];
*/

if( $l->insLab($_POST) ){
	header("Location: ../ABM_laboratorio.php");
}else{
	$view_page = "mensaje.php?mensaje='Laboratorio no agregado'";
	include "../../views/layout.php";
}



?>
