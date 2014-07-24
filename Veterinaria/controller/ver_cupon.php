
<?php

require "../model/login.php";
sessioncheck();

require "../model/cuponabm.php";

/*$clientes = new Cliente();
$rsCli = $clientes->getAll();*/


$cupo = $_GET['idcupon'];

$cupones = new Cupon();
$rsCup = $cupones->getxcupon($cupo);


	foreach ($rsCup as $key => $cupon){
		$cup[]= array($cupon['id'], $cupon['apellido'], $cupon['nombre'], $cupon['dni'],$cupon['promocion'] );
	}

	//var_dump($cup);	
$tickets= new Cupon();
$rstick= $tickets->getTicketxcupon($cupo);

	foreach ($rstick as $key => $ticket){
		$ticke[]=array($ticket['id'], $ticket['local'], $ticket['monto'], $ticket['hora'], $ticket['fecha'] );


	}
	
$view_page = "Cupon/ver_cupon.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
