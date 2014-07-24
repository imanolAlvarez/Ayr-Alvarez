<?php
require "../../model/laboratorioabm.php";
require "../../model/login.php";
sessioncheck();


$l=new Laboratorio();
$lab=$_POST;

if( $l->updLab($lab) ){
	header("Location: ../ABM_laboratorio.php");
}else{
	$view_page = "mensaje.php?mensaje='Laboratorio no Modificado'";
	include "../../views/layout.php";
}




?>