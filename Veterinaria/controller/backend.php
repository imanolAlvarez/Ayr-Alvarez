<?php

require "../model/login.php";
sessioncheck();

$title = "Bienvenido a la Administracion";

$sesion_username=$_SESSION['username'];
$sesion_perfil=$_SESSION['perfil'];


$view_page = "../views/blankform.php"; //de carpeta views
$msj="";

include "../views/layout.php";


?>

