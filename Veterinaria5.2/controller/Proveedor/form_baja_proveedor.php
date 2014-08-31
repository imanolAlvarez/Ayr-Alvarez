<?php
require "../../model/proveedorabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Proveedor();


//idproborrar

if( $p->delProveedor($_GET['idproborrar']) ){
	header("Location: ../ABM_cliente.php");
}else{
	$view_page = "mensaje.php?mensaje='Proveedor no eliminado'";
	include "../../views/layout.php";
}




?>
