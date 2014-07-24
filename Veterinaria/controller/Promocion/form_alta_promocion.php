<?php
require "../../model/promoabm.php";
require "../../model/login.php";
sessioncheck();



$p=new Promocion();

$numero= $_POST['numero'];
$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$fecha_inicio= $_POST['fecha_inicio'];
$fecha_fin= $_POST['fecha_fin'];
$monto_minimo= $_POST['monto_minimo'];
$cantidad_tickets= $_POST['cantidad_tickets'];


if( $p->insPromocion($numero,$nombre,$descripcion,$fecha_inicio,$fecha_fin,$monto_minimo,$cantidad_tickets) ){
	header("Location: ../ABM_promociones.php");
}else{
	$view_page = "mensaje.php?mensaje='Promocion no agregado'";
	include "../../views/layout.php";
}



?>
