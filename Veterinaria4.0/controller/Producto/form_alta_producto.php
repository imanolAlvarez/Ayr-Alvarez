<?php
require "../../model/productoabm.php";
require "../../model/login.php";
sessioncheck();



$p=new Producto();
//var_dump($_POST);die();
if (isset($_POST)){
	$nombre= $_POST['nombre'];
	$cod_barras=$_POST['cod_barras'];
	$precio_costo=$_POST['precio_costo'];
	$precio_venta=$_POST['precio_venta'];
	$porcentaje_ganancia=$_POST['porcentaje_ganancia'];
	$stock=$_POST['stock'];
	$stock_minimo=$_POST['stock_minimo'];
	$idProveedor=$_POST['proveedor'];
	$idCategoria=$_POST['categoria'];



if( $p->insProducto($nombre,$cod_barras, $precio_costo, $precio_venta, $porcentaje_ganancia, $stock, $stock_minimo, $idProveedor, $idCategoria  ) ){
	header("Location: ../ABM_producto.php");
}else{
	$view_page = "mensaje.php?mensaje='Producto no agregado'";
	include "../../views/layout.php";
}

}

?>
