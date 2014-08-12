<?php
require "../model/login.php";
sessioncheck();
require "../model/proveedorabm.php";
$proveedor = new Proveedor();

if(isset($_GET['id_provedor_editar'])){
	$buscaPro = $proveedor->getProveedor( $_GET['id_provedor_editar'] );
	
	$idmod= $buscaPro->id;
	$dni= $buscaPro->dni;
	$apellido= $buscaPro->apellido;
	$nombre= $buscaPro->nombre;
	$email= $buscaPro->email;
	$descripcion= $buscaPro->descripcion;
	$telefono= $buscaPro->telefono;
	$domicilio= $buscaPro->domicilio;
	$activo= $buscaPro->activo;
	$localidad= $buscaPro->localidad;
}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Proveedor/modificar_proveedor.php";
include "../views/layout.php";
?>