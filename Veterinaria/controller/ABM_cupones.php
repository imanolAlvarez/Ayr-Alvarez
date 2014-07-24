
<?php

require "../model/login.php";
sessioncheck();

require "../model/cuponabm.php";

$cupones = new Cupon();
$rsCup = $cupones->getAll(); //funcion que devuelve usuarios




	foreach ($rsCup as $key => $ticket){
		$cupon[]= array($ticket['id'], $ticket['cliente'], $ticket['promocion'], $ticket['hora'], $ticket['fecha']);
	}



$promosVigente = new Cupon();
$rsPromo = $promosVigente->getPromovigente();//funcion que devuelve todas las promociones vigentes


foreach ($rsPromo as $key => $promvig){
		$promovig[]= array($promvig['id'], $promvig['nombre'], $promvig['monto_minimo'], $promvig['cantidad_tickets']);
	}


$LocalActivo = new Cupon();
$rslocact = $LocalActivo->getLocalesActivos();//funcion que devuelve todas las promociones vigentes


foreach ($rslocact as $key => $locact){
		$localact[]= array($locact['id'], $locact['nombre'], $locact['activo']);
	}



$view_page = "Cupon/ABM_cupon.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
