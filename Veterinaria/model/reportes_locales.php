<?php
include "db.php";
	class Reporte{
		
	function montopromedioticket(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS id,
							SUM(tickets.monto) AS montotickets,
							cupones.id AS idcupon,
							promociones.id AS idpromo,
							promociones.nombre,
							promociones.descripcion,
							COUNT(tickets.idticket) AS cantidadtickets
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							INNER JOIN promociones ON (cupones.id_promocion = promociones.id)
							INNER JOIN locales ON (locales.id = tickets.idlocal)
							INNER JOIN clientes ON (cupones.id_cliente= clientes.id)
										GROUP BY promociones.id
										ORDER BY tickets.monto");
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR montopromedioticket: " . $e->getMessage();
			}		
			
			return $result; 
		}	
		
		function locsinticket(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT * FROM locales WHERE id NOT IN (SELECT tickets.idlocal AS id
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							INNER JOIN locales ON (locales.id = tickets.idlocal)
							INNER JOIN clientes ON (cupones.id_cliente= clientes.id))");
				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR locsinticket: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		function locxvalorticket($desde,$hasta){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS id,
							tickets.monto AS monto,
							tickets.hora AS hora,
							tickets.fecha AS fecha,
							clientes.apellido AS clienteape,
							clientes.nombre AS clientenom,
							locales.nombre AS nombrelocal,
							locales.descripcion AS descripcion,
							locales.activo AS activo
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							INNER JOIN locales ON (locales.id = tickets.idlocal)
							INNER JOIN clientes ON (cupones.id_cliente= clientes.id)
										WHERE tickets.monto BETWEEN :desde AND :hasta
										ORDER BY tickets.monto");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener locxvalorticket: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		function cantticketstotal(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS id,

							locales.nombre AS nombrelocal,
							locales.descripcion AS descripcion,
							locales.activo AS activo,
							
							COUNT(tickets.idticket) AS cantidadtickets
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							
							RIGHT JOIN locales ON (locales.id = tickets.idlocal)
										GROUP BY locales.id");
				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener canttickets: " . $e->getMessage();
			}		
			
			return $result; 
		}	
		
		function cantticketsxpromo(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT
							locales.nombre AS nombrelocal,
							locales.descripcion AS descripcion,
							locales.activo AS activo,
							promociones.nombre AS nombre_promo,
							COUNT(tickets.idticket) AS cantidadtickets
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							RIGHT JOIN promociones ON (cupones.id_promocion = promociones.id)
							RIGHT JOIN locales ON (locales.id = tickets.idlocal)
										GROUP BY locales.nombre");
				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener canttickets: " . $e->getMessage();
			}		
			
			return $result; 
		}
	
	
}
?>
