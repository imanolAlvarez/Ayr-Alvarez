<?php
include "db.php";
	class Reporte{
		
	function getAllxfecha($desde,$hasta){ //consumo por ticket ordenada por usuario
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS idticket,tickets.monto AS montoticket, tickets.fecha AS fechaticket,tickets.hora AS horaticket,
						cupones.id AS idcupon,cupones.numero AS numerocupon, cupones.fecha AS fechacupon, cupones.id_promocion AS idpromocion,
						clientes.id AS idcliente, clientes.apellido AS apellidocliente, clientes.nombre AS nombrecliente, 
						locales.nombre AS nombrelocal
						FROM cupones 
															
						INNER JOIN tickets ON (tickets.idcupon = cupones.id)
						INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
						INNER JOIN locales ON (locales.id = tickets.idlocal)
						where tickets.fecha between :desde and :hasta									
						GROUP BY tickets.idticket
						ORDER BY clientes.apellido,clientes.nombre");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR consumo por ticket ordenada por usuario: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
	function getAllxticketval($desde,$hasta){ //consumo por valor de tickets
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT 	tickets.idticket AS idticket,tickets.monto AS montoticket, tickets.fecha AS fechaticket,tickets.hora AS horaticket,
									cupones.id AS idcupon,cupones.numero AS numerocupon, cupones.fecha AS fechacupon, cupones.id_promocion AS idpromocion,
									clientes.id AS idcliente, clientes.apellido AS apellidocliente, clientes.nombre AS nombrecliente, 
									locales.nombre AS nombrelocal
									FROM cupones 
																		
									INNER JOIN tickets ON (tickets.idcupon = cupones.id)
									INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
									INNER JOIN locales ON (locales.id = tickets.idlocal) 
									where tickets.monto  between :desde and :hasta");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR consumo por valor de tickets: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		function getAllxticketcant($desde,$hasta){ //consumo cantidad de tickets
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT * FROM 
							(SELECT tickets.idticket AS idticket,COUNT(tickets.idticket) AS cantidadtickets,tickets.monto AS montoticket, tickets.fecha AS fechaticket,tickets.hora AS horaticket,
							cupones.id AS idcupon,cupones.numero AS numerocupon, cupones.fecha AS fechacupon, cupones.id_promocion AS idpromocion,
							clientes.id AS idcliente, clientes.apellido AS apellidocliente, clientes.nombre AS nombrecliente, 
							locales.nombre AS nombrelocal
							
							FROM cupones 
																
							INNER JOIN tickets ON (tickets.idcupon = cupones.id)
							INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
							INNER JOIN locales ON (locales.id = tickets.idlocal)
															
							GROUP BY clientes.apellido
							ORDER BY clientes.apellido,clientes.nombre) AS tabla 
							WHERE cantidadtickets BETWEEN :desde AND :hasta");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener Usuarios: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
	function getAllxhorario($desde,$hasta){ //consumo por fecha
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS idticket,tickets.monto AS montoticket, tickets.fecha AS fechaticket,tickets.hora AS horaticket,
							cupones.id AS idcupon,cupones.numero AS numerocupon, cupones.fecha AS fechacupon, cupones.id_promocion AS idpromocion,
							clientes.id AS idcliente, clientes.apellido AS apellidocliente, clientes.nombre AS nombrecliente, 
							locales.nombre AS nombrelocal
							FROM cupones 
							INNER JOIN tickets ON (tickets.idcupon = cupones.id)
							INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
							INNER JOIN locales ON (locales.id = tickets.idlocal) 
							where tickets.hora between :desde and :hasta
							
								ORDER BY tickets.fecha DESC");
							
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR consumo por fecha: " . $e->getMessage();
			}		
			
			return $result; 
		}
	
}
?>
