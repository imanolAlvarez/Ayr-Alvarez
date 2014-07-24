<?php

require "../model/login.php";
sessioncheck();

require "../model/laboratorioabm.php";

$laboratorios = new Laboratorio();
$rsLab = $laboratorios->getAll(); //funcion que devuelve laboratorios

 
foreach ($rsLab as $key => $useless){
	$labs[]= array($useless['id_laboratorio'],$useless['codigo_lab'],$useless['institucion'],$useless['tipo_laboratorio'],$useless['fecha_ingreso'] );
}
 
/* array (size=3)
  0 => 
    array (size=3)
      0 => string '1' (length=1)
      1 => string 'sec' (length=3)
      2 => string '2' (length=1)
  1 => 
    array (size=3)
      0 => string '2' (length=1)
      1 => string 'admin' (length=5)
      2 => string '1' (length=1)
*/


$view_page = "Laboratorio/ABM_laboratorio.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
