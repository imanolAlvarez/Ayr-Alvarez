<?php
include_once "db.php";
	class Proveedor{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM proveedor
					WHERE proveedor.activo = 1');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Proveedores: " . $e->getMessage();
			}		
			return $result; 
		}
		

		
	
		
		
/**/	function getProveedor($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM proveedor
					 WHERE id = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function insProveedor($dni,$apellido,$nombre,$email,$telefono,$domicilio,$activo,$localidad, $descripcion){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO proveedor (id, dni, apellido, nombre, email, telefono, domicilio, activo, localidad, descripcion ) VALUES ('',?,?,?,?,?,?,?,?,?)");
					$stmt->bindParam(1,$dni);
					$stmt->bindParam(2,$apellido);
					$stmt->bindParam(3,$nombre);
					$stmt->bindParam(4,$email);
					$stmt->bindParam(5,$telefono);
					$stmt->bindParam(6,$domicilio);
					$stmt->bindParam(7,$activo);
					$stmt->bindParam(8,$localidad);
					$stmt->bindParam(9,$descripcion);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updProveedor($pro){
			$conn = conectar(); //funcion que conecta con bd
			
			$dni =$pro["dni"];
			$apellido= $pro["apellido"];
			$nombre = $pro["nombre"];
			$email =$pro["email"];
			$descripcion =$pro["descripcion"];
			$telefono =$pro["telefono"];
			$domicilio =$pro["domicilio"];
			$activo =$pro["activo"];
			$localidad = $pro["localidad"];
			$proid= $pro["id"];
			
			
			try{
					$stmt = $conn->prepare("UPDATE proveedor SET dni=:dni, nombre=:nombre, apellido=:apellido,  email=:email, descripcion=:descripcion, telefono=:telefono, domicilio=:domicilio, activo=:activo, localidad=:localidad  where id=:id");
					$stmt->bindParam(':dni',$dni, PDO::PARAM_INT,11);
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,30);
					$stmt->bindParam(':apellido',$apellido, PDO::PARAM_STR,30);
					$stmt->bindParam(':domicilio',$domicilio, PDO::PARAM_STR,30);
					$stmt->bindParam(':localidad',$localidad, PDO::PARAM_STR,30);
					$stmt->bindParam(':telefono',$telefono, PDO::PARAM_STR,30);
					$stmt->bindParam(':descripcion',$descripcion, PDO::PARAM_STR,30);
					$stmt->bindParam(':email',$email, PDO::PARAM_STR,30);
					
					
					
					$stmt->bindParam(':activo',$activo, PDO::PARAM_STR,11);
					
					$stmt->bindParam(':id',$proid , PDO::PARAM_INT);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delProveedor($txtId)
		{	
		
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM proveedor WHERE id = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					$gsent->execute();
					
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}	
			
			desconectar($conn);	
			return true; 
		}	
		
	}
	

?>
