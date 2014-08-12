<?php
require "../../model/proveedorabm.php";
require "../../model/login.php";
sessioncheck();



$p=new Proveedor();
//var_dump($_POST);die();

if (isset($_POST)){
$dni= $_POST['dni'];
$apellido= $_POST['apellido'];
$nombre= $_POST['nombre'];
$email= $_POST['email'];
$telefono= $_POST['telefono'];
$domicilio= $_POST['domicilio'];
$activo= $_POST['activo'];
$localidad= $_POST['localidad'];
$descripcion= $_POST['descripcion'];


if( $p->insProveedor($dni,$apellido,$nombre,$email,$telefono,$domicilio,$activo,$localidad, $descripcion) ){
	header("Location: ../ABM_proveedor.php");
}else{
	$view_page = "mensaje.php?mensaje='Proveedor no agregado'";
	include "../../views/layout.php";
}

}

?>
