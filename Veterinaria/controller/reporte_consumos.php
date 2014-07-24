<?php

require "../model/login.php";
require "../model/reportes.php";
sessioncheck();

$reporte= new Reporte();

if(isset($_GET['dato'])){
	$dato=$_GET['dato'];
}else{
	$dato='';
}

$view_page = "Reportes/reportes.php";

switch ($dato){
	case 'fecha':	
			$fechad= $_POST['fechadesde'];
			$fechah= $_POST['fechahasta'];
			$repo= $reporte->getAllxfecha($fechad,$fechah);
			$view_page = 'Reportes/reporteXfecha.php';
		
		break;
	case 'valorticket':
			$ticketvald= $_POST['valorticketdesde'];
			$ticketvalh= $_POST['valortickethasta'];
			$repo= $reporte->getAllxticketval($ticketvald,$ticketvalh);
			$view_page = 'Reportes/reporteXticket.php';
		
		break;
	case 'cantticketxus':
			$ticketcantd= $_POST['cantticketdesde'];
			$ticketcanth= $_POST['canttickethasta'];
			$repo= $reporte->getAllxticketcant($ticketcantd,$ticketcanth);
			$view_page = 'Reportes/reporteXcantticket.php';
		
		break;	
	case 'horario':
			$horadesde= $_POST['horadesde'];
			$horahasta= $_POST['horahasta'];
			$repo= $reporte->getAllxhorario($horadesde,$horahasta);
			$view_page  = 'Reportes/reporteXhorario.php';
		
		break;
	default:
		$view_page = "Reportes/reportes.php";
		break;
}

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
