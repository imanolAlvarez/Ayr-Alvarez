<?php
include_once "db.php";
	class Servicio{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM servicio');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Servicios: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		
		
		function getServicio($idServicio){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM servicio
					WHERE servicio.id = :id');
					$gsent->bindParam(':id', $idServicio, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchObject();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function getCategoria($idServicio){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM servicio
					INNER JOIN categoria_servicio ON (servicio.id_categoria = categoria_servicio.id)
					WHERE servicio.id = :id');
					$gsent->bindParam(':id', $idServicio, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchObject();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
			
		
	
		function getCategorias(){ //devuelve todas las categorias
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM categoria_servicio');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Categorias: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
	


		
		
		function insServicio($nombre, $precio_venta, $cod_barras, $descripcion,$idCategoria ){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO servicio (id, nombre, precio_venta, cod_barras, descripcion, id_categoria ) VALUES ('',?,?,?,?,?)");
					$stmt->bindParam(1,$nombre);
					$stmt->bindParam(2,$precio_venta);
					$stmt->bindParam(3,$cod_barras);
					$stmt->bindParam(4,$descripcion);
					$stmt->bindParam(5,$idCategoria);
					
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updServicio($serv){
			$conn = conectar(); //funcion que conecta con bd
			//var_dump($serv);die();
			$idServicio= $serv['id'];
			$nombre =$serv['nombre'];
			$precio_venta =$serv['precio_venta'];
			$cod_barras= $serv['cod_barras'];
		
		
			$descripcion =$serv['descripcion'];
			
			$id_categoria =$serv['categoria'];

			try{
					$stmt = $conn->prepare("UPDATE servicio SET nombre=:nombre, precio_venta=:precio_venta, cod_barras=:cod_barras, descripcion=:descripcion, id_categoria=:id_categoria
											where id=:id");
					
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,30);
					$stmt->bindParam(':cod_barras',$cod_barras, PDO::PARAM_STR,30);
					$stmt->bindParam(':precio_venta',$precio_venta, PDO::PARAM_STR,15);
					$stmt->bindParam(':descripcion',$descripcion, PDO::PARAM_STR,30);
					$stmt->bindParam(':id_categoria',$id_categoria, PDO::PARAM_INT,11);
					
					$stmt->bindParam(':id',$idServicio , PDO::PARAM_INT,11);
					
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delServicio($txtId)
		{	
		
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM servicio WHERE id = :id');
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