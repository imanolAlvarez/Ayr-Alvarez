<?php
require "../../model/productoabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Producto();

if( $p->delProducto($_GET['idProdborrar']) ){
	header("Location: ../ABM_producto.php");
}else{
	$view_page = "mensaje.php?mensaje='Producto no eliminado'";
	include "../../views/layout.php";
}




?>
