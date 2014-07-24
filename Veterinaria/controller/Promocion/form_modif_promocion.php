<?php
require "../../model/promoabm.php";
require "../../model/login.php";
sessioncheck();


$p=new Promocion();

$promo=$_POST;

if( $p->updPromocion($promo) ){
	header("Location: ../ABM_promociones.php");
}else{
	$view_page = "mensaje.php?mensaje='Promocion no modificada'";
	include "../../views/layout.php";
}




?>