<?php
include "db.php";
	class Cupon{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT cupones.id AS id, clientes.apellido AS 				cliente, hora, fecha, 
										promociones.nombre as promocion,
										promociones.fecha_inicio as fechaini,
										promociones.fecha_fin as fechafin
										FROM cupones
										INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
										INNER JOIN promociones ON (promociones.id = cupones.id_promocion)
										ORDER BY cupones.id DESC
										');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Cupones: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function getCupon($idcupon){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT cupones.id AS id, cupones.numero AS numero, clientes.apellido AS apellido, hora, fecha,
										clientes.mail AS mail,
										clientes.dni AS dni,
										clientes.telefono AS tel,
										clientes.nombre AS nombre,
										promociones.nombre as promocion,
										promociones.fecha_inicio as fechaini,
										promociones.fecha_fin as fechafin
										FROM cupones
										INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
										INNER JOIN promociones ON (promociones.id = cupones.id_promocion)
										where cupones.id= ?
										');
					$gsent->bindParam(1,$idcupon);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener Clientes: " . $e->getMessage();
			}		
			return $result; 
		}
		
		function getPromovigente(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM promociones WHERE NOW() >= promociones.fecha_inicio AND NOW() <= promociones.fecha_fin');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR AL TRAER PROMOCION VIGENTE" . $e->getMessage();
			}		
			return $result; 
		}
		
		
		
		function getLocalesActivos(){ //devuelve locales activos
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM locales WHERE locales.activo = 1 ');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Locales activos: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		
		function getxcupon($id){ //devuelve cupones
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT cupones.id AS id, cupones.numero AS numero, cupones.id_cliente as cliente, cupones.id_promocion as idpromo, clientes.apellido AS apellido, clientes.nombre AS nombre, clientes.dni AS dni, hora, fecha,
										promociones.nombre as promocion,
										promociones.fecha_inicio as fechaini,
										promociones.fecha_fin as fechafin
										FROM cupones
										INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
										INNER JOIN promociones ON (promociones.id = cupones.id_promocion)
										WHERE cupones.id = :id ');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Cupon: " . $e->getMessage();
			}		
			return $result; 
		}
		
	function getModifcupon($id){ //devuelve cupones
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT cupones.id AS id, cupones.numero AS numero, cupones.id_cliente as cliente, cupones.id_promocion as idpromo, clientes.apellido AS apellido, clientes.nombre AS nombre, clientes.dni AS dni, hora, fecha,
										promociones.cantidad_tickets as cantidad,
										promociones.monto_minimo as montototal,
										promociones.nombre as promocion,
										promociones.fecha_inicio as fechaini,
										promociones.fecha_fin as fechafin
										FROM cupones
										INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
										INNER JOIN promociones ON (promociones.id = cupones.id_promocion)
										WHERE cupones.id = :id ');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener Cupon: " . $e->getMessage();
			}		
			return $result; 
		}
		
		function getTicketxcupon($id){ //devuelve tickets
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT tickets.idticket AS id, tickets.monto AS monto, tickets.hora AS 				hora, tickets.fecha AS fecha, 
										locales.nombre as local
										FROM tickets
										INNER JOIN cupones ON (cupones.id = tickets.idcupon)
										INNER JOIN locales ON (locales.id = tickets.idlocal)
										WHERE cupones.id = :id ');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Cupon: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function insCupon($hora,$fecha,$usuario,$id,$promo){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO cupones (id, numero, hora, fecha, id_usuario, id_cliente, id_promocion) VALUES ('','',?,?,?,?,?)");
					$stmt->bindParam(1,$hora);
					$stmt->bindParam(2,$fecha);
					$stmt->bindParam(3,$usuario);
					$stmt->bindParam(4,$id);
					$stmt->bindParam(5,$promo);
					$stmt->execute();
					$ultid= $conn->lastInsertId(); 
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			
			desconectar($conn);
			return $ultid;
		}
		
		
		
		
		function insTicket($idcupon,$local,$monto,$fechat,$horat){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO tickets (idticket, idcupon, idlocal, monto, fecha, hora) VALUES ('',?,?,?,?,?)");
					$stmt->bindParam(1,$idcupon);
					$stmt->bindParam(2,$local);
					$stmt->bindParam(3,$monto);
					$stmt->bindParam(4,$fechat);
					$stmt->bindParam(5,$horat);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updCupon($id,$hora,$fecha,$usuario,$cliente,$promo){
			$conn = conectar(); //funcion que conecta con bd
			
			$idcupon =$id;
			$horaact= $hora;
			$fechaact= $fecha;
			$usuariolog = $usuario;
			$clientecup =$cliente;
			$promocion =$promo;
			
			
			
			try{
					$stmt = $conn->prepare("UPDATE cupones SET id=:idcupon, hora=:horaact, fecha=:fechaact, id_usuario=:usuariolog, id_cliente=:clientecup, id_promocion=:promocion where id=:idcupon");
					$stmt->bindParam(':idcupon',$idcupon, PDO::PARAM_INT,11);
					$stmt->bindParam(':horaact',$horaact, PDO::PARAM_STR,15);
					$stmt->bindParam(':fechaact',$fechaact, PDO::PARAM_STR,15);
					$stmt->bindParam(':usuariolog',$usuariolog, PDO::PARAM_INT,15);
					$stmt->bindParam(':clientecup',$clientecup, PDO::PARAM_INT,30);
					$stmt->bindParam(':promocion',$promocion, PDO::PARAM_INT,15);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		
			function updTicket($idticket,$id,$local,$monto,$horat,$fechat){
			$conn = conectar(); //funcion que conecta con bd
			
			$ticket =$idticket;
			$idcupon= $id;
			$localact= $local;
			$montoact = $monto;
			$fecha =$fechat;
			$hora =$horat;
			
			
			
			try{
					$stmt = $conn->prepare("UPDATE tickets SET idticket=:ticket, idcupon=:idcupon, idlocal=:localact, monto=:montoact, hora=:hora, fecha=:fecha where idticket=:ticket");
					$stmt->bindParam(':ticket',$ticket, PDO::PARAM_INT,11);
					$stmt->bindParam(':idcupon',$idcupon, PDO::PARAM_INT,11);
					$stmt->bindParam(':localact',$localact, PDO::PARAM_INT,11);
					$stmt->bindParam(':montoact',$montoact, PDO::PARAM_INT,15);
					$stmt->bindParam(':hora',$hora, PDO::PARAM_STR,15);
					$stmt->bindParam(':fecha',$fecha, PDO::PARAM_STR,15);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		function delCupon($txtId)
		{	
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM cupones WHERE id = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					
					$gsent->execute();
					$gsent2 = $conn->prepare('DELETE FROM tickets WHERE tickets.idcupon = :id');
					$gsent2->bindParam(':id', $txtId, PDO::PARAM_INT);
				
					$gsent2->execute();
			}										
				
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();die();
			}	
			
			desconectar($conn);	
			return true; 
		}	
		
	}
		
?>