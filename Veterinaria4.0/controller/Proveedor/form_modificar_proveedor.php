<?php
require "../../model/proveedorabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Proveedor();

$pro=$_POST;

if( $p->updProveedor($pro) ){
	header("Location: ../ABM_proveedor.php");
}else{
	$view_page = "mensaje.php?mensaje='Proveedor no modificado'";
	include "../../views/layout.php";
}




?>