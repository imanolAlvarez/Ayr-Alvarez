
<?php

require "../model/login.php";
sessioncheck();

require "../model/clientabm.php";

$clientes = new Cliente();
$rsCli = $clientes->getAll(); //funcion que devuelve usuarios




	foreach ($rsCli as $key => $cliente){
		$client[]= array($cliente['id'], $cliente['dni'], $cliente['apellido'], $cliente['nombre'], $cliente['mail'], $cliente['fnac'], $cliente['telefono'], $cliente['domicilio'], $cliente['activo'] ,$cliente['partido'] );
	}
	
$cli=new Cliente();
$zonas= $cli->obtenerzonas(); 


$view_page = "Cliente/ABM_cliente.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
