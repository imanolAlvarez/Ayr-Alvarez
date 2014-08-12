
<?php

require "../model/login.php";
sessioncheck();

require "../model/servicioabm.php";


$servicios = new Servicio();
$rsSer = $servicios->getAll(); //funcion que devuelve servicios
$categorias= $servicios->getCategorias();

	foreach ($rsSer as $key => $servicio){
		$categoria_serv=$servicios->getCategoria($servicio['id']);
		
	//var_dump($apellido_Proveedor->apellido);
		$servs[]= array($servicio['id'], $servicio['precio_venta'], $servicio['nombre'] ,$servicio['cod_barras'], $servicio['descripcion'], $categoria_serv->descripcion);
	}
//var_dump($produc);die();
	
//var_dump($servs);die();
$view_page = "Servicio/ABM_servicio.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>