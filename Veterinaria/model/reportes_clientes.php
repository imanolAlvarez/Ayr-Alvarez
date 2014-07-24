<?php
include "db.php";
	class Reporte{
		
	function getAllCantClixpromo(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT 
							 cupones.id_promocion AS idpromocion,
							promociones.descripcion AS descpromo,
							promociones.nombre AS nombrepromo,
							promociones.fecha_inicio,
							promociones.fecha_fin,
							promociones.cantidad_tickets AS cantidadmax,
						
							COUNT(DISTINCT clientes.id) AS cantclientes,
							COUNT(tickets.idticket) AS canttickets
							FROM cupones 
							INNER JOIN tickets ON (tickets.idcupon = cupones.id)
							INNER JOIN clientes ON (clientes.id = cupones.id_cliente)
							INNER JOIN locales ON (locales.id = tickets.idlocal) 
							INNER JOIN promociones ON (promociones.id = cupones.id_promocion)
							GROUP BY promociones.id 
							ORDER BY promociones.fecha_inicio DESC");
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR getAllCantClixpromo: " . $e->getMessage();
			}		
			
			return $result; 
		}	
		
		
		function nombreZona($p){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT partido from tbl_partidos WHERE idPartido= :p");
					//SELECT localidad FROM tbl_localidades WHERE codProvincia='AR-B' AND idPartido=128 OR idPartido=82 OR idPartido=105 ORDER BY idLocalidad DESC
					$gsent->bindParam(':p', $p, PDO::PARAM_STR,11);				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR getAllCantClixpromo: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		
		function getAllClixzona($zona){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT * from clientes WHERE zona=:zona");
					$gsent->bindParam(':zona', $zona, PDO::PARAM_STR,11);				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR getAllCantClixpromo: " . $e->getMessage();
			}		
			
			return $result; 
		}	
		
		
		
	
		function getAllClixedades($desde,$hasta){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT * ,YEAR(CURDATE())-YEAR(clientes.fnac ) AS edad 
							FROM clientes
							WHERE (YEAR(CURDATE()) - YEAR(clientes.fnac )) BETWEEN :desde AND :hasta");
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
		
		function getAllclixetaria($desde,$hasta){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("	SELECT clientes.nombre,
										clientes.apellido,
										clientes.zona,
										clientes.dni,
										clientes.mail,
										clientes.fnac,
										clientes.telefono,
										clientes.domicilio,
										clientes.activo,
										YEAR(CURDATE())-YEAR(clientes.fnac ) AS edad ,
										SUM(tickets.monto) AS monto_total
										FROM clientes 
										LEFT JOIN cupones ON (cupones.id_cliente = clientes.id)
										LEFT JOIN tickets ON (tickets.idcupon = cupones.id)
										LEFT JOIN locales ON (locales.id = tickets.idlocal)
										LEFT JOIN promociones ON (promociones.id = cupones.id_promocion) 
										WHERE YEAR(CURDATE())-YEAR(clientes.fnac ) BETWEEN :desde AND :hasta 
										GROUP BY clientes.apellido
										ORDER BY monto_total DESC");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_INT);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_INT);
				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR : " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		function getAllclixvalorticket($desde,$hasta){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("SELECT tickets.idticket AS id,
							tickets.monto AS monto,
							tickets.hora AS hora,
							tickets.fecha AS fecha,
							clientes.apellido AS clienteape,
							clientes.nombre AS clientenom,
							locales.nombre AS nombrelocal
							FROM tickets 
							INNER JOIN cupones ON (cupones.id = tickets.idcupon)
							INNER JOIN locales ON (locales.id = tickets.idlocal)
							INNER JOIN clientes ON (cupones.id_cliente= clientes.id)
										WHERE tickets.monto BETWEEN :desde AND :hasta");
					$gsent->bindParam(':desde', $desde, PDO::PARAM_STR,11);
					$gsent->bindParam(':hasta', $hasta, PDO::PARAM_STR,11);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener getAllclixvalorticket: " . $e->getMessage();
			}		
			
			return $result; 
		}
		
		function getAllClixmasconsumo(){ 
			$conn = conectar();
			try{		
					$gsent = $conn->prepare("		SELECT clientes.nombre,
										clientes.apellido,
										clientes.zona,
										clientes.dni,
										clientes.mail,
										clientes.fnac,
										clientes.telefono,
										clientes.domicilio,
										clientes.activo,
										SUM(tickets.monto) AS monto_total
										FROM clientes 
										LEFT JOIN cupones ON (cupones.id_cliente = clientes.id)
										LEFT JOIN tickets ON (tickets.idcupon = cupones.id)
										LEFT JOIN locales ON (locales.id = tickets.idlocal)
										LEFT JOIN promociones ON (promociones.id = cupones.id_promocion) 
										GROUP BY clientes.apellido
										ORDER BY monto_total DESC");
				
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener Usuarios: " . $e->getMessage();
			}		
			
			return $result; 
		}	
		
		function getAllclixcumple($dia, $mes){ 
			$conn = conectar();
			if($dia='0'){
					try{		
					$gsent = $conn->prepare("SELECT * from clientes WHERE MONTH(clientes.fnac) = :mes AND DAY(clientes.fnac) = :dia  ");
					$gsent->bindParam(':dia', $dia, PDO::PARAM_INT);
					$gsent->bindParam(':mes', $mes, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchAll(PDO::FETCH_OBJ);
					}
					catch(PDOException $e){
						echo "ERROR getAllclixcumple c dia: " . $e->getMessage();
					}	
			}else{
					try{		
							$gsent = $conn->prepare("SELECT * from clientes WHERE MONTH(clientes.fnac) = :mes  ");
							$gsent->bindParam(':mes', $mes, PDO::PARAM_INT);
							$gsent->execute();
							$result = $gsent->fetchAll(PDO::FETCH_OBJ);
					}
					catch(PDOException $e){
						echo "ERROR getAllclixcumple: " . $e->getMessage();
					}		
			}
			return $result; 
		
		}
	
}
?>
