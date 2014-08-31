<?php
require "../../model/clientabm.php";
require "../../model/login.php";
sessioncheck();



$c=new Cliente();

$dni= $_POST['dni'];
$apellido= $_POST['apellido'];
$nombre= $_POST['nombre'];
$mail= $_POST['mail'];
$fnac= $_POST['fnac'];
$telefono= $_POST['telefono'];
$domicilio= $_POST['domicilio'];
$activo= $_POST['activo'];
$zona= $_POST['zona'];


if( $c->insCliente($dni,$apellido,$nombre,$mail,$fnac,$telefono,$domicilio,$activo,$zona) ){
	header("Location: ../ABM_cliente.php");
}else{
	$view_page = "mensaje.php?mensaje='Cliente no agregado'";
	include "../../views/layout.php";
}



?>
