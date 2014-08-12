
<?php

require "../model/login.php";
sessioncheck();

require "../model/clientabm.php";

/*$clientes = new Cliente();
$rsCli = $clientes->getAll();*/


$promo= $_GET['promo'];

$clientes = new Cliente();
$rsCli = $clientes->getAllxpromo($promo);


	foreach ($rsCli as $key => $cliente){
		$client[]= array($cliente['id'], $cliente['dni'], $cliente['apellido'], $cliente['nombre'], $cliente['mail'], $cliente['fnac'], $cliente['telefono'], $cliente['domicilio'], $cliente['activo'] ,$cliente['partido'] );
	}

		


$view_page = "Cliente/ver_cliente.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
