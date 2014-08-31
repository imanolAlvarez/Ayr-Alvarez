<?php
require "../model/login.php";
sessioncheck();
require_once "../model/servicioabm.php";
$servicios = new Servicio();


$categorias= $servicios->getCategorias();



if(isset($_GET['idServeditar'])){
	$buscaServ = $servicios->getServicio( $_GET['idServeditar'] );
	
	$idmod= $buscaServ->id;
	$nombre= $buscaServ->nombre;
	$cod_barras= $buscaServ->cod_barras;
	$precio_venta= $buscaServ->precio_venta;
	$descripcion=$buscaServ->descripcion;
	$id_categoria=$buscaServ->id_categoria;

	

$categoria=$servicios->getCategoria($idmod);
	
	//var_dump($categoria);
	
	}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Servicio/modificar_servicio.php";
include "../views/layout.php";
?>