<?php
include "db.php";
	class Local{
		
/**/	function getAll(){ //devuelve locales
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM locales');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Locales: " . $e->getMessage();
			}		
			return $result; 
		}
		
/**/	function getLocal($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM locales WHERE id = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function insLocal($numloc,$nombre,$descripcion,$activo){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO locales (id, nombre, descripcion, activo ) VALUES ('',?,?,?)");
					$stmt->bindParam(2,$nombre);
					$stmt->bindParam(3,$descripcion);
					$stmt->bindParam(4,$activo);
					$stmt->execute();
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updLocal($loc){
			$conn = conectar(); //funcion que conecta con bd
			
			$nombre= $loc["nombre"];
			$descripcion= $loc["descripcion"];
			$activo =$loc["activo"];
			$locid= $loc["id"];
			
			
			try{
					$stmt = $conn->prepare("UPDATE locales SET nombre=:nombre, descripcion=:descripcion, activo=:activo  where id=:id");
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,25);
					$stmt->bindParam(':descripcion',$descripcion, PDO::PARAM_STR,255);
					$stmt->bindParam(':activo',$activo, PDO::PARAM_STR,11);
					$stmt->bindParam(':id',$locid , PDO::PARAM_INT);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delLocal($txtId)
		{	
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM locales WHERE id = :id');
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
