<?php

require "../model/login.php";
require_once "../model/reportes_locales.php";
sessioncheck();

$reporte= new Reporte();

if(isset($_GET['dato'])){
	$dato=$_GET['dato'];
}else{
	$dato='';
}

$view_page = "Reportes/reportes.php";

switch ($dato){
	case 'locxvalorticket':	
			$ticketvald= $_POST['ticketdesde'];
			$ticketvalh= $_POST['tickethasta'];
			$repo= $reporte->locxvalorticket( $ticketvald,$ticketvalh );
			$view_page = 'ReportesLocales/locxvalorticket.php';
		
		break;
	case 'locsinticket':	
			$repo= $reporte->locsinticket();
			$view_page = 'ReportesLocales/reporte_sinticket.php';
		
		break;
	case 'montopromedioticket':
			$repo= $reporte->montopromedioticket();
			$view_page = 'ReportesLocales/reporte_locxticketpromedio.php';
		
		break;	
	case 'canttickets':
			$repo= $reporte->cantticketstotal();
			$view_page = 'ReportesLocales/reporte_canttickets.php';
		break;
	case 'cantticketsxpromo':
			$repo= $reporte->cantticketsxpromo();
			$view_page = 'ReportesLocales/reporte_cantticketsxpromo.php';
		break;	
	default:
		$view_page = "ReportesLocales/reportes.php";
		break;
}

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
