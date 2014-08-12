<?php

/* Para el armado del menu: En la base de datos tienen que estar ordenados por 'orden', 
los hijos con el id del padre en el campo 'padre' y con 'submenu' en 1 . */

include("../model/menuabm.php");
	$menuData = new MenuABM();
	//print_r($_SESSION["perfil"]);
	$rsMenu = $menuData->cargarMenu($_SESSION["perfil"]); //carga el menu segun el perfil

	echo"
	
		<li class='current'><a href='../controller/backend.php'>&#8594; Home</a></li>";
		
		while($row = $rsMenu->fetch()){
			if( $row['padre'] == 0){	
				echo "<li><a href='".$row['destino']."' >".$row['descripcion']."</a>\n";
			}
			else{	
				$menuDataHijo = new MenuABM();
				$rsMenuHijo = $menuDataHijo->cargarMenuHijo($_SESSION["perfil"], $row['padre'] ); //carga el menu segun el perfil
				
				echo"<ul id='nav'>";
				while($rowhijo = $rsMenuHijo->fetch()){
					echo "<li><a href='".$rowhijo['destino']."' >".$rowhijo['descripcion']."</a></li>\n";
				}
				echo"</ul></li>";
				unset($menuDataHijo);
			}
				
		}  
		echo "<li class='salir'><a  href='logout.php' >Cerrar Sesion</a></li>\n";
	echo '</li></ul>';

 ?>
	
	
