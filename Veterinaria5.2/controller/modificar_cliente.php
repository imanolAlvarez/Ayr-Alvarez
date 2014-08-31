<?php
require "../model/login.php";
sessioncheck();
require "../model/clientabm.php";
$clientes = new Cliente();

if(isset($_GET['idclieditar'])){
	$buscaCli = $clientes->getCliente( $_GET['idclieditar'] );
	//var_dump($buscaUsr);
	$idmod= $buscaCli->id;
	$dni= $buscaCli->dni;
	$apellido= $buscaCli->apellido;
	$nombre= $buscaCli->nombre;
	$mail= $buscaCli->mail;
	$fnac= $buscaCli->fnac;
	$telefono= $buscaCli->telefono;
	$domicilio= $buscaCli->domicilio;
	$activo= $buscaCli->activo;
	$zona= $buscaCli->partido;
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Cliente/modificar_cliente.php";
include "../views/layout.php";
?>