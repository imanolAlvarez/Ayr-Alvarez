<?php
require "../model/login.php";
sessioncheck();
require_once "../model/productoabm.php";
require_once "../model/proveedorabm.php";
$productos = new Producto();


$categorias= $productos->getCategorias();

$prov= new Proveedor();
$proveedores= $prov->getAll();

if(isset($_GET['idProdeditar'])){
	$buscaPro = $productos->getProducto( $_GET['idProdeditar'] );
	
	$idmod= $buscaPro->id;
	$nombre= $buscaPro->nombre;
	$cod_barras= $buscaPro->cod_barras;
	$precio_costo= $buscaPro->precio_costo;
	$precio_venta= $buscaPro->precio_venta;
	$util= $buscaPro->util;
	$stock=$buscaPro->stock;
	$stock_minimo=$buscaPro->stock_minimo;
	$id_cat_producto= $buscaPro->id_cat_producto;
	$id_proveedor= $buscaPro->id_proveedor;

$proveedor= $prov->getProveedor($id_proveedor);
$categoria=$productos->getCategoria($idmod);
	
	//var_dump($categoria);
	
	}
$sesion_perfil=$_SESSION['perfil'];
$sesion_username=$_SESSION['username'];


$view_page = "/Producto/modificar_producto.php";
include "../views/layout.php";
?>