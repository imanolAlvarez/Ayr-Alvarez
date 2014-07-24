<?php
require "../../model/promoabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Promocion();

if( $p->delPromocion($_GET['idpromoborrar']) ){
	header("Location: ../ABM_promociones.php");
}else{
	$view_page = "mensaje.php?mensaje='Promocion no eliminada'";
	include "../../views/layout.php";
}




?>
