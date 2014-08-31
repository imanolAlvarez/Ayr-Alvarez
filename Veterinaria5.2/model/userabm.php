<?php
include "db.php";
	class Usuario{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM usuario');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Usuarios: " . $e->getMessage();
			}		
			return $result; 
		}
		
/**/	function getPerfil($perfil){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT descripcion FROM perfil WHERE id = :id');
					$gsent->bindParam(':id', $perfil, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_NUM);
			}
			catch(PDOException $e){
				echo "ERROR Obtener perfil: " . $e->getMessage();
			}		
			return $result[0]; 
		}
		
		
/**/	function getUser($id){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM usuario WHERE id = :id');
					$gsent->bindParam(':id', $id, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
			}
			catch(PDOException $e){
				echo "ERROR obtener ID : " . $e->getMessage();
			}		
			return $result; 
		}

		
		function insUser($username,$password,$perfil,$activo){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO usuario (id, username,password, id_perfil, activo ) VALUES ('',?,?,?,?)");
					$stmt->bindParam(1,$username);
					$stmt->bindParam(2,$password);
					$stmt->bindParam(3,$perfil);
					$stmt->bindParam(4,$activo);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updUser($usuar){
			$conn = conectar(); //funcion que conecta con bd
			
			$usrname =$usuar["username"];
			$usrperfil= $usuar["perfil"];
			$usractivo= $usuar["activo"];
			$usrpassword = $usuar["password"];
			$usrid= $usuar["id"];
			
			
			try{
					$stmt = $conn->prepare("UPDATE usuario SET username=:username, password=:password, id_perfil=:id_perfil, activo=:activo  where id=:id");
					$stmt->bindParam(':username',$usrname, PDO::PARAM_STR,11);
					$stmt->bindParam(':password',$usrpassword, PDO::PARAM_STR,11);
					$stmt->bindParam(':id_perfil',$usrperfil, PDO::PARAM_STR,11);
					$stmt->bindParam(':activo',$usractivo, PDO::PARAM_STR,11);
					$stmt->bindParam(':id',$usrid , PDO::PARAM_INT);
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}

		function delUser($txtId)
		{	
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM usuario WHERE id = :id');
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
