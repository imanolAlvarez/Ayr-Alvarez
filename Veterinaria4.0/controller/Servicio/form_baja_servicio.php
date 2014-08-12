<?php
require "../../model/servicioabm.php";
require "../../model/login.php";
sessioncheck();


$s=new Servicio();

if( $s->delServicio($_GET['idServborrar']) ){
	header("Location: ../ABM_servicio.php");
}else{
	$view_page = "mensaje.php?mensaje='Servicio no eliminado'";
	include "../../views/layout.php";
}




?>
