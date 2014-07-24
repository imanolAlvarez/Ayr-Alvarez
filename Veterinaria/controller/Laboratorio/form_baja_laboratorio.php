<?php
require "../../model/laboratorioabm.php";
require "../../model/login.php";
sessioncheck();


$l=new Laboratorio();

if( $l->delLaboratorio($_GET['idlabborrar']) ){
	header("Location: ../ABM_laboratorio.php");
}else{
	$view_page = "mensaje.php?mensaje='Laboratorio no eliminado'";
	include "../../views/layout.php";
}




?>
