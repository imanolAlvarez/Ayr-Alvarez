<?php
require "../../model/clientabm.php";
require "../../model/login.php";
sessioncheck();


$c=new Cliente();

$cli=$_POST;

if( $c->updCliente($cli) ){
	header("Location: ../ABM_cliente.php");
}else{
	$view_page = "mensaje.php?mensaje='Cliente no modificado'";
	include "../../views/layout.php";
}




?>