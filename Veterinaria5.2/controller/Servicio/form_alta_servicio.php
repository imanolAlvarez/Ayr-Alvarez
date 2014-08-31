<?php
require "../../model/servicioabm.php";
require "../../model/login.php";
sessioncheck();



$s=new Servicio();
//var_dump($_POST);die();
if (isset($_POST)){
	$nombre= $_POST['nombre'];
	$precio_venta=$_POST['precio_venta'];
	$cod_barras=$_POST['cod_barras'];
	$descripcion=$_POST['descripcion'];
	
	
	
	$idCategoria=$_POST['categoria'];



if( $s->insServicio($nombre, $precio_venta ,$cod_barras, $descripcion, $idCategoria  ) ){
	header("Location: ../ABM_servicio.php");
}else{
	$view_page = "mensaje.php?mensaje='Servicio no agregado'";
	include "../../views/layout.php";
}

}

?>
