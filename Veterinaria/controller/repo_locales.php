<?php

require "../model/login.php";
sessioncheck();



$view_page = "ReportesLocales/reportes.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
