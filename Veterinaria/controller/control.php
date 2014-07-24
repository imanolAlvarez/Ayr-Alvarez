<?php
session_start();
if (!isset($_SESSION['auth'])){
	$title = "Acceso no autorizado";
	$usuario = "Sin Acceso";
	$view_page = "no_autorizado.php";
	include "../views/layout.php";
	exit();
	}
?>
