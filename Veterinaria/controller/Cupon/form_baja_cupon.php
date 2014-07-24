<?php
require "../../model/cuponabm.php";
require "../../model/login.php";
sessioncheck();


$c=new Cupon();

if( $c->delCupon($_GET['idcupborrar']) ){
	header("Location: ../ABM_cupones.php");
}else{
	$view_page = "mensaje.php?mensaje='Cupon no eliminado'";
	include "../../views/layout.php";
}




?>
