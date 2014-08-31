<?php
require "../../model/clientabm.php";
require "../../model/login.php";
sessioncheck();


$c=new Cliente();

if( $c->delCliente($_GET['idcliborrar']) ){
	header("Location: ../ABM_cliente.php");
}else{
	$view_page = "mensaje.php?mensaje='Cliente no eliminado'";
	include "../../views/layout.php";
}




?>
