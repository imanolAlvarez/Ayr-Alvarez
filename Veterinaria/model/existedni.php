<?php 
$dni=$_POST['dni']; //recibe el dni 

require_once('conexion.php'); //conectas a la base

$comprobar =@mysql_query("SELECT * FROM clientes where clientes.dni='$dni'"); //consultas la base

if(@mysql_num_rows($comprobar)>0){
	$pepe=mysql_fetch_array($comprobar);
	echo '<p><input type="hidden" id="id" name="id" value="'.$pepe['id'].'" /></p>';
	echo '<p>Nombre del cliente:<input type="text" id="cliente" name="cliente" value="'.$pepe['nombre'].' '.$pepe['apellido'].'" disabled=true/></p>';
	echo '<p>E-mail:<input type="text" id="mail" name="mail" value="'.$pepe['mail'].'" disabled=true/></p>';
	echo '<p>Telefono:<input type="text" id="telefono" name="telefono" value="'.$pepe['telefono'].'" disabled=true/></p>';
	
	}
	
	else{
		
		echo 'El Cliente no Existe <a href="../controller/ABM_cliente.php" class="linkAlta" id="linkAlta"><img src="../img/add.png" ></img> </a>';
		
		} 

//imprimis resultado este se ve en el div de la pagina1.html


?>
