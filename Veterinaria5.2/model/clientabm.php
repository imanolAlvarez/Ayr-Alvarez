<?php
include "db.php";
	class Cliente{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM clientes
					INNER JOIN tbl_partidos ON clientes.zona = tbl_partidos.idPartido');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Clientes: " . $e->getMessage();
			}		
			return $result; 
		}
		
		function obtenerzonas(){
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare("SELECT * FROM tbl_partidos WHERE codProvincia='AR-B'");
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Zonas: " . $e->getMessage();
			}		
			return $result; 
		
		}
		
		
		function getAllxpromo($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM clientes 
							INNER JOIN cupones ON (clientes.id = cupones.id_cliente)
							INNER JOIN tbl_partidos ON (clientes.zona = tbl_partidos.idPartido)
							WHERE cupones.id_promocion = :id ');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				echo "ERROR obtener Clientes: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		
/**/	function getCliente($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM clientes
					INNER JOIN tbl_partidos ON clientes.zona = tbl_partidos.idPartido WHERE id = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function insCliente($dni,$numero,$apellido,$nombre,$mail,$fnac,$telefono,$domicilio,$activo,$zona){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO clientes (id, dni, apellido, nombre, mail, fnac, telefono, domicilio, activo, zona ) VALUES ('',?,?,?,?,?,?,?,?,?)");
					$stmt->bindParam(1,$dni);
					$stmt->bindParam(2,$apellido);
					$stmt->bindParam(3,$nombre);
					$stmt->bindParam(4,$mail);
					$stmt->bindParam(5,$fnac);
					$stmt->bindParam(6,$telefono);
					$stmt->bindParam(7,$domicilio);
					$stmt->bindParam(8,$activo);
					$stmt->bindParam(9,$zona);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updCliente($client){
			$conn = conectar(); //funcion que conecta con bd
			
			$dni =$client["dni"];
			$apellido= $client["apellido"];
			$nombre = $client["nombre"];
			$mail =$client["mail"];
			$fnac =$client["fnac"];
			$telefono =$client["telefono"];
			$domicilio =$client["domicilio"];
			$activo =$client["activo"];
			$zona = $client["zona"];
			$cliid= $client["id"];
			
			
			try{
					$stmt = $conn->prepare("UPDATE clientes SET dni=:dni, apellido=:apellido, nombre=:nombre, mail=:mail, fnac=:fnac, telefono=:telefono, domicilio=:domicilio, activo=:activo, zona=:zona  where id=:id");
					$stmt->bindParam(':dni',$dni, PDO::PARAM_INT,11);
					$stmt->bindParam(':apellido',$apellido, PDO::PARAM_STR,15);
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,15);
					$stmt->bindParam(':mail',$mail, PDO::PARAM_STR,30);
					$stmt->bindParam(':fnac',$fnac, PDO::PARAM_STR,15);
					$stmt->bindParam(':telefono',$telefono, PDO::PARAM_INT,11);
					$stmt->bindParam(':domicilio',$domicilio, PDO::PARAM_STR,11);
					$stmt->bindParam(':activo',$activo, PDO::PARAM_STR,11);
					$stmt->bindParam(':zona',$zona, PDO::PARAM_STR,20);
					$stmt->bindParam(':id',$cliid , PDO::PARAM_INT);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delCliente($txtId)
		{	
		
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM clientes WHERE id = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					$gsent->execute();
					
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();die();
			}	
			
			desconectar($conn);	
			return true; 
		}	
		
			function getAllV(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT venta.numero, venta.fecha, venta.id, venta.monto_total, clientes.apellido as cliente , SUM(descuento) AS desc_total, venta.tarjeta, SUM(cantidad) AS cant_prods  FROM venta
					left JOIN detalle_venta ON (venta.id = detalle_venta.id_venta)
					left JOIN clientes ON(detalle_venta.id_cliente = clientes.id)
					GROUP BY detalle_venta.id_venta ');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener ventas: " . $e->getMessage();
			}	
			desconectar($conn);
			return $result; 
		}
		
	}
	

?>
