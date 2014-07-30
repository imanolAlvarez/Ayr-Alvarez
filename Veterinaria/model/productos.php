<?php
include "db.php";
	class Producto{
		

		
/**/	function getProdxCod($cod){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT productos.*,cat_productos.descripcion as cat FROM productos 
					inner join cat_productos on (productos.id_cat= cat_productos.id) 
					WHERE cod_barras = :cod');
					$gsent->bindParam(':cod', $cod, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener porducto por codigo de barras : " . $e->getMessage();
			}		
			return $result; 
		}


	}

?>
