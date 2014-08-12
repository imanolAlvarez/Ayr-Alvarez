
<?php

require "../model/login.php";
sessioncheck();

require "../model/productoabm.php";


$productos = new Producto();
$rsPro = $productos->getStockBajo(); //funcion que devuelve productos





	foreach ($rsPro as $key => $producto){
		$apellido_Proveedor= $productos->getProveedor($producto['id']);
		$categoria_prod=$productos->getCategoria($producto['id']);
		
	
		$produc[]= array($producto['id'], $producto['nombre'], $producto['cod_barras'], $producto['precio_costo'], $producto['precio_venta'] ,$producto['util'], $producto['img'], $producto['stock_minimo'], $producto['stock'] ,$apellido_Proveedor->id,$categoria_prod->descripcion);
	}
//var_dump($produc);die();
	
//$cli=new Cliente();
//$zonas= $cli->obtenerzonas(); 


$view_page = "Producto/listado_stock_critico.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>