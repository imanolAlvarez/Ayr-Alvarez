<?php
require "../../model/productoabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Producto();

$pro=$_POST;
//var_dump($_POST);
if( $p->updProducto($pro) ){
	header("Location: ../ABM_producto.php");
}else{
	$view_page = "mensaje.php?mensaje='Producto no modificado'";
	include "../../views/layout.php";
}




?>