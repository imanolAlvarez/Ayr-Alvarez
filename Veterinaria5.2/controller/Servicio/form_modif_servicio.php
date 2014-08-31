<?php
require "../../model/servicioabm.php";
require "../../model/login.php";
sessioncheck();


$s=new Servicio();

$serv=$_POST;
//var_dump($_POST);
if( $s->updServicio($serv) ){
	header("Location: ../ABM_servicio.php");
}else{
	$view_page = "mensaje.php?mensaje='Servicio no modificado'";
	include "../../views/layout.php";
}




?>