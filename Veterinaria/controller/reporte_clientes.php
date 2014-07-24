<?php

require "../model/login.php";
require_once "../model/reportes_clientes.php";
sessioncheck();




$cli=new Reporte();


$reporte= new Reporte();

if(isset($_GET['dato'])){
	$dato=$_GET['dato'];
}else{
	$dato='';
}

$view_page = "Reportes/reportes.php";

switch ($dato){
	case 'cantclixpromo':	
			$repo= $reporte->getAllCantClixpromo();
			$view_page = 'ReportesClientes/reporte_clixpromo.php';
		
		break;
	case 'zona':	
			$zona= $_POST['zona'];
			$repo= $reporte->getAllClixzona($zona);
			$view_page = 'ReportesClientes/reporte_clixzona.php';
		
		break;
	case 'clientreedades':	
			$fechad= $_POST['edaddesde'];
			$fechah= $_POST['edadhasta'];
			$repo= $reporte->getAllClixedades($fechad,$fechah);
			$view_page = 'ReportesClientes/reporte_cliedades.php';
		
		break;
	case 'cliporvalticket':
			$ticketvald= $_POST['ticketdesde'];
			$ticketvalh= $_POST['tickethasta'];
			$repo= $reporte->getAllclixvalorticket($ticketvald,$ticketvalh);
			$view_page = 'ReportesClientes/reporte_clixticket.php';
		
		break;
	case 'climasconsumo':
			$repo= $reporte->getAllClixmasconsumo();
			$view_page = 'ReportesClientes/reporte_climascons.php';
		
		break;	
	case 'fechacumple':
		if(isset($_POST['mes'])){
			$dia= $_POST['dia'];
			$mes= $_POST['mes'];
			$repo= $reporte->getAllclixcumple($dia,$mes);
		}
			$view_page  = 'ReportesClientes/reporte_clixcumple.php';
		break;
	case 'etaria':
			$d= $_POST['etariadesde'];
			$h= $_POST['etariahasta'];
			$repo= $reporte->getAllclixetaria($d,$h);
			$view_page = 'ReportesClientes/reporte_clixetaria.php';
		
	break;	
		
	default:
		$view_page = "ReportesClientes/reportes.php";
		break;
}

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
