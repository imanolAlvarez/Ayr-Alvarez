<?php
include "db.php";
	class Laboratorio{
		
/**/	function getAll(){ //devuelve laboratorios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM laboratorio');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Laboratorios: " . $e->getMessage();
			}		
			return $result; 
		}
		

		
		
/**/	function getLaboratorio($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM laboratorio WHERE id_laboratorio = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}
			
	
	
	/**/
	function insLab($laboratorio){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO laboratorio (id_laboratorio, codigo_lab, institucion, sector, dni_responsable,
domicilio, domicilio_correspondencia, ciudad, pais, codigo_postal, mail, fax, fecha_ingreso, tipo_laboratorio, empresa_intermedia, coordenadas) 
					 VALUES ('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bindParam(1,$laboratorio["codigo_lab"]);
					$stmt->bindParam(2,$laboratorio["institucion"]);
					$stmt->bindParam(3,$laboratorio["sector"]);
					$stmt->bindParam(4,$laboratorio["dni_responsable"]);
					$stmt->bindParam(5,$laboratorio["domicilio"]);
					$stmt->bindParam(6,$laboratorio["domicilio_correspondencia"]);
					$stmt->bindParam(7,$laboratorio["ciudad"]);
					$stmt->bindParam(8,$laboratorio["pais"]);
					$stmt->bindParam(9,$laboratorio["codigo_postal"]);
					$stmt->bindParam(10,$laboratorio["mail"]);
					$stmt->bindParam(11,$laboratorio["fax"]);
					$stmt->bindParam(12,$laboratorio["fecha_ingreso"]);
					$stmt->bindParam(13,$laboratorio["tipo_laboratorio"]);
					$stmt->bindParam(14,$laboratorio["empresa_intermedia"]);
					$stmt->bindParam(15,$laboratorio["coordenadas"]);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		function delLaboratorio($txtId)
		{	
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM laboratorio WHERE id_laboratorio = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					$gsent->execute();
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();die();
			}	
			
			desconectar($conn);	
			return true; 
		}	
	

		
		function updLab($lab){
			$conn = conectar(); //funcion que conecta con bd		
			try{
					$stmt = $conn->prepare("UPDATE laboratorio SET  codigo_lab=:codigo_lab, institucion=:institucion,
 sector=:sector, dni_responsable=:dni_responsable, domicilio=:domicilio, domicilio_correspondencia=:domicilio_correspondencia, ciudad=:ciudad, 
pais=:pais, codigo_postal=:codigo_postal, mail=:mail, fax=:fax, fecha_ingreso=:fecha_ingreso, tipo_laboratorio=:tipo_laboratorio, 
empresa_intermedia=:empresa_intermedia, coordenadas=:coordenadas     where id_laboratorio=:id");
					$stmt->bindParam(':codigo_lab',$lab["codigo_lab"], PDO::PARAM_STR,15);
					$stmt->bindParam(':institucion',$lab["institucion"], PDO::PARAM_STR,15);
					$stmt->bindParam(':sector',$lab["sector"], PDO::PARAM_STR,11);
					$stmt->bindParam(':dni_responsable',$lab["dni_responsable"], PDO::PARAM_INT);
					$stmt->bindParam(':domicilio',$lab["domicilio"], PDO::PARAM_STR,21);
					$stmt->bindParam(':domicilio_correspondencia',$lab["domicilio_correspondencia"], PDO::PARAM_STR,21);
					$stmt->bindParam(':ciudad',$lab["ciudad"], PDO::PARAM_STR,15);
					$stmt->bindParam(':pais',$lab["pais"], PDO::PARAM_STR,15);
					$stmt->bindParam(':codigo_postal',$lab["codigo_postal"], PDO::PARAM_INT);
					$stmt->bindParam(':mail',$lab["mail"], PDO::PARAM_STR,18);
					$stmt->bindParam(':fax',$lab["fax"], PDO::PARAM_INT);
					$stmt->bindParam(':fecha_ingreso',$lab["fecha_ingreso"], PDO::PARAM_STR,18);
					$stmt->bindParam(':tipo_laboratorio',$lab["tipo_laboratorio"], PDO::PARAM_STR,11);
					$stmt->bindParam(':empresa_intermedia',$lab["empresa_intermedia"], PDO::PARAM_STR,15);
					$stmt->bindParam(':coordenadas',$lab["coordenadas"], PDO::PARAM_INT);
					$stmt->bindParam(':id',$lab["id_laboratorio"] , PDO::PARAM_INT);
					$stmt->execute();
					
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}

		
	} // FIn CLASE Laboratorio
?>
