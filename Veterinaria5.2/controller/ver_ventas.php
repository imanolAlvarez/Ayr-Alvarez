
<?php

require "../model/login.php";
sessioncheck();


require "../model/clientabm.php";


$cliente = new cliente();
$rsv = $cliente->getAllV();

$cl= new cliente();


	foreach ($rsv as $key => $venta){
	
	$ven[]= array($venta['id'], $venta['numero'], $venta['fecha'], $venta['monto_total'], $venta['cliente'], $venta['desc_total'], $venta['cant_prods'], $venta['tarjeta']);
	}
//var_dump($rsv);die();
	

$view_page = "Venta/ver_ventas.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>