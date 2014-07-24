<?php
include "db.php";
	class Promocion{
		
/**/	function getAll(){ //devuelve locales
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM promociones');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Promociones: " . $e->getMessage();
			}		
			return $result; 
		}
		
/**/	function getPromocion($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM promociones WHERE id = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function insPromocion($numero,$nombre,$descripcion,$fecha_inicio,$fecha_fin,$monto_minimo,$cantidad_tickets){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO promociones (id, numero, nombre, descripcion, fecha_inicio, fecha_fin, monto_minimo, cantidad_tickets ) VALUES ('',?,?,?,?,?,?,?)");
					$stmt->bindParam(1,$numero);
					$stmt->bindParam(2,$nombre);
					$stmt->bindParam(3,$descripcion);
					$stmt->bindParam(4,$fecha_inicio);
					$stmt->bindParam(5,$fecha_fin);
					$stmt->bindParam(6,$monto_minimo);
					$stmt->bindParam(7,$cantidad_tickets);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updPromocion($promo){
			$conn = conectar(); //funcion que conecta con bd
			
			$numero =$promo["numero"];
			$nombre= $promo["nombre"];
			$descripcion= $promo["descripcion"];
			$fecha_inicio= $promo["fecha_inicio"];
			$fecha_fin= $promo["fecha_fin"];
			$monto_minimo= $promo["monto_minimo"];
			$cantidad_tickets= $promo["cantidad_tickets"];
			$promoid= $promo["id"];
			
			
			try{
					$stmt = $conn->prepare("UPDATE promociones SET numero=:numero, nombre=:nombre, descripcion=:descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, monto_minimo=:monto_minimo, cantidad_tickets=:cantidad_tickets  where id=:id");
					$stmt->bindParam(':numero',$numero, PDO::PARAM_INT,11);
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,25);
					$stmt->bindParam(':descripcion',$descripcion, PDO::PARAM_STR,255);
					$stmt->bindParam(':fecha_inicio',$fecha_inicio, PDO::PARAM_STR,20);
					$stmt->bindParam(':fecha_fin',$fecha_fin, PDO::PARAM_STR,20);
					$stmt->bindParam(':monto_minimo',$monto_minimo, PDO::PARAM_STR,11);
					$stmt->bindParam(':cantidad_tickets',$cantidad_tickets, PDO::PARAM_INT,11);
					$stmt->bindParam(':id',$promoid , PDO::PARAM_INT);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delPromocion($txtId)
		{	
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM promociones WHERE id = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					$gsent->execute();
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();die();
			}	
			
			desconectar($conn);	
			return true; 
		}	
		
	}
	

?>
