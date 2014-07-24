<?php
require "../../model/cuponabm.php";
require "../../model/login.php";
sessioncheck();

var_dump($_POST);
//die();

$c=new Cupon();

$id= $_POST['id'];
$promo= $_POST['promo'];
$hora= date("H:i:s");
$fecha= date("Y/m/d");
$usuario= $_SESSION["id"];


$idcupon=$c->insCupon($hora,$fecha,$usuario,$id,$promo);
$t=new Cupon();
$cant= $_POST['cantidad'];



	for( $z=0 ; $z < $cant ; $z++ ){
		if (!empty($_POST['local'.$z])){
			$local=$_POST['local'.$z];
			$monto=$_POST['monto'.$z];
			$fechat=$_POST['fecha'.$z];
			$horat=$_POST['hora'.$z];
			
			$t->insTicket($idcupon,$local,$monto,$fechat,$horat);
		}
	}
	


header("Location: ../ABM_cupones.php");	












?>
