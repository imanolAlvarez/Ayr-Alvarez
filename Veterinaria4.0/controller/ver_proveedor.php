
<?php

require "../model/login.php";
sessioncheck();


require "../model/proveedorabm.php";




$prov= new Proveedor();

if(isset($_GET['idProv'])){
	$proveedor= $prov->getProveedor( $_GET['idProv'] );
//var_dump($proveedor);die();
		$nombre=$proveedor->nombre;
		$dni=$proveedor->dni;
		$email=$proveedor->email;
		$apellido=$proveedor->apellido;
		$telefono=$proveedor->telefono;
		$localidad=$proveedor->localidad;
		$domicilio=$proveedor->domicilio;
		$descripcion=$proveedor->descripcion;
		$activo=$proveedor->activo;



	$view_page = "Producto/ver_proveedor.php";
}
$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>