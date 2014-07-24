<?php
require "../model/login.php";
sessioncheck();
require "../model/promoabm.php";
$promos = new Promocion();

if(isset($_GET['idpromoeditar'])){
	$buscaPromo = $promos->getPromocion( $_GET['idpromoeditar'] );
	//var_dump($buscaUsr);
	$idmod= $buscaPromo->id;
	$numero= $buscaPromo->numero;
	$nombre= $buscaPromo->nombre;
	$descripcion= $buscaPromo->descripcion;
	$fecha_inicio= $buscaPromo->fecha_inicio;
	$fecha_fin= $buscaPromo->fecha_fin;
	$monto_minimo= $buscaPromo->monto_minimo;
	$cantidad_tickets= $buscaPromo->cantidad_tickets;
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Promocion/modificar_promocion.php";
include "../views/layout.php";
?>