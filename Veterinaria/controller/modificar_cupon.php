<?php
require "../model/login.php";
sessioncheck();
require "../model/cuponabm.php";
$cupones = new Cupon();


if(isset($_GET['idcupon'])){
	
	$buscaCup = $cupones->getModifcupon($_GET['idcupon']);
	//var_dump($buscaUsr);
	$idmod= $buscaCup->id;
	$apellido= $buscaCup->apellido;
	$nombre= $buscaCup->nombre;
	$cliente= $buscaCup->cliente;
	$promocion= $buscaCup->promocion;
	$promoid= $buscaCup->idpromo;
	$montototal= $buscaCup->montototal;
	$cantidad= $buscaCup->cantidad;
	$LocalActivo = new Cupon();
	$rslocact = $LocalActivo->getLocalesActivos();//funcion que devuelve todas las promociones vigentes

	foreach ($rslocact as $key => $locact){
			$localact[]= array($locact['id'], $locact['nombre'], $locact['activo']);
	}

	$tickets= new Cupon();
	$rstick= $tickets->getTicketxcupon($_GET['idcupon']);

	foreach ($rstick as $key => $ticket){
		$ticke[]=array($ticket['id'], $ticket['local'], $ticket['monto'], $ticket['hora'], $ticket['fecha'] );


	}
	
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Cupon/modificar_cupon.php";
include "../views/layout.php";
?>