<?php

require "../model/login.php";
sessioncheck();

require "../model/userabm.php";

$usuarios = new Usuario();
$rsUsr = $usuarios->getAll(); //funcion que devuelve usuarios

foreach ($rsUsr as $key => $useless){
	$users[]= array($useless['id'],$useless['username'], $usuarios->getPerfil( $useless['id_perfil'] ));
}
/*   var_dump($users);   ejemplo de como lo arma para poder mostrar mas simple
array (size=3)
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






$view_page = "Usuario/ABM_usuario.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
