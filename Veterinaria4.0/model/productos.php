<?php
include "db.php";
	class Producto{
		

		
/**/	function getProdxCod($cod){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT producto.*,cat_producto.descripcion as cat FROM producto 
					inner join cat_producto on (producto.id_cat_producto= cat_producto.id) 
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
