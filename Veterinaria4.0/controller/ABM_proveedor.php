
<?php

require "../model/login.php";
sessioncheck();

require "../model/proveedorabm.php";

$proveedores = new Proveedor();
$rsPro = $proveedores->getAll(); //funcion que devuelve clientes




	foreach ($rsPro as $key => $proveedor){
		$prove[]= array($proveedor['id'], $proveedor['dni'], $proveedor['nombre'], $proveedor['apellido'], $proveedor['localidad'] ,$proveedor['domicilio'], $proveedor['telefono'],  $proveedor['email'], $proveedor['descripcion'],$proveedor['activo'] );
	}
	
	//var_dump($prove);die();
	
//$cli=new Cliente();
//$zonas= $cli->obtenerzonas(); 


$view_page = "Proveedor/ABM_proveedor.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
