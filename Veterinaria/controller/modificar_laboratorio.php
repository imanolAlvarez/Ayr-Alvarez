<?php
require "../model/login.php";
sessioncheck();
require "../model/laboratorioabm.php";
$laboratorios = new Laboratorio();

if(isset($_GET['idlabmodificar'])){
	$buscaLab = $laboratorios->getLaboratorio( $_GET['idlabmodificar'] );
	//var_dump($buscaLab);
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Laboratorio/modificar_laboratorio.php";
include "../views/layout.php";
?>