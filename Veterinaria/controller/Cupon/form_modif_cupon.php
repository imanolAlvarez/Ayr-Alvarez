<?php
require "../../model/cuponabm.php";
require "../../model/login.php";
sessioncheck();


$c=new Cupon();


$id= $_POST['id'];
$hora= date("H:i:s");
$fecha= date("Y/m/d");
$usuario= $_SESSION["id"];
$cliente= $_POST['idcliente'];
$promo= $_POST['idpromo'];
$c->updCupon($id,$hora,$fecha,$usuario,$cliente,$promo);

$t=new Cupon();
$cant= $_POST['cantidad'];

	for( $z=0 ; $z < $cant ; $z++ ){
		if (!empty($_POST['local'.$z])){
			$id= $_POST['id'];
			$idticket=$_POST['idtick'.$z];
			$local=$_POST['local'.$z];
			$monto=$_POST['monto'.$z];
			$fechat=$_POST['fecha'.$z];
			$horat=$_POST['hora'.$z];
			
			$t->updTicket($idticket,$id,$local,$monto,$horat,$fechat);
		}
	}



	header("Location: ../ABM_cupones.php");

	
	include "../../views/layout.php";





?>