
<?php

require "../model/login.php";
sessioncheck();

require "../model/productoabm.php";
require "../model/proveedorabm.php";

$productos = new Producto();
$rsPro = $productos->getAll(); //funcion que devuelve productos
$categorias= $productos->getCategorias();

$prov= new Proveedor();
$proveedores= $prov->getAll();


	foreach ($rsPro as $key => $producto){
		$apellido_Proveedor= $productos->getProveedor($producto['id']);
		$categoria_prod=$productos->getCategoria($producto['id']);
		
	//var_dump($apellido_Proveedor->apellido);
		$produc[]= array($producto['id'], $producto['nombre'], $producto['cod_barras'], $producto['precio_costo'], $producto['precio_venta'] ,$producto['util'], $producto['img'], $producto['stock_minimo'], $producto['stock'] ,$apellido_Proveedor->apellido,$categoria_prod->descripcion);
	}

	
//$cli=new Cliente();
//$zonas= $cli->obtenerzonas(); 


$view_page = "Producto/ABM_producto.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
