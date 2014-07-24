<?php

require "../model/login.php";
sessioncheck();

require "../model/promoabm.php";

$promos = new Promocion();
$rsPromo = $promos->getAll(); //funcion que devuelve usuarios

foreach ($rsPromo as $key => $promo){
	$prom[]= array($promo['id'], $promo['numero'], $promo['nombre'], $promo['descripcion'], $promo['fecha_inicio'], $promo['fecha_fin'], $promo['monto_minimo'], $promo['cantidad_tickets'] );
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






$view_page = "Promocion/ABM_promocion.php";

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];
include "../views/layout.php";

?>
