<?php

require "../model/login.php";
require "../model/clientabm.php";
sessioncheck();


$cli=new Cliente();
$zonas= $cli->obtenerzonas(); 
//var_dump($zonas);
$view_page = "ReportesClientes/reportes.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
