<?php
include("db.php");


	class Login{ 
		//variables de la clase
		var $username;
		var $password; 
		var $id; 
		var $perfil;
		var $error;
		
		function login($usr='admin', $password='admin'){   
			$this->password = $password;
			$this->username = $usr;
			 //error de formato? 
			if (!preg_match("/^[a-z]{3,15}$/",strtolower($usr))){//si no hay error de formato consulto a la bd
				$this->error = "Usuario incorrecto <br>";
			}
			else{ 
				$this->error = false;
			}
			
			if (!$this->error) { //pide los datos del usuario		
				$conn = conectar(); //funcion que conecta con bd
				
				$gsent = $conn->prepare('SELECT *
					FROM usuario
					WHERE username = :username AND password = :password');
				$gsent->bindParam(':username', $usr, PDO::PARAM_INT);
				$gsent->bindParam(':password', $password, PDO::PARAM_STR, 12);
				$gsent->execute();
				
				$resColumn = $gsent->fetchAll();
				$usuario= $resColumn[0];
				//print_r($usuario);die();
				//$usuario = mysql_fetch_array($result);
				
				//si devuelve info la guarda en la clase
				if ($usuario["id"] != null) { 					
					$this->id = $usuario["id"];
					$this->username = $usuario["username"];
					//$this->perfil = $usuario["id_perfil"];
					$this->activo = $usuario["activo"];
					
					/*$q="SELECT descripcion FROM perfil WHERE id = ".$usuario["id_perfil"];
					$res = mysql_query($q,$db);
					$p = mysql_fetch_array($res);*/
					$gsent = $conn->prepare('SELECT descripcion FROM perfil WHERE id = :id');
					$gsent->bindParam(':id', $usuario["id_perfil"], PDO::PARAM_INT);
					$gsent->execute();
						
					$resColumn = $gsent->fetchAll();
					$perf= $resColumn[0];
					
					$this->perfil = $perf['descripcion'];
				}
				else { //sino informa que no esta en la base de datos 
					$this->error .= "Compruebe su nombre de usuario y password"; 
				} 
				desconectar($db);
			}
		}	
		
		function titulo($usuarioid){
				$db = conectar();
				$result = mysql_query("SELECT titulo FROM tirulodepagina WHERE usuario_id = '".$usuarioid."'");
				
				/*if(PEAR::isError($result)){
					die("error -->   ".$result->getMessage());
				}*/
				/*$titulo = $result->fetchAll(MDB2_FETCHMODE_ASSOC);
				//print_r($titulo);die();
				desconectar($db);*/
				return 'titulo';
		}
		
		function retorno($a){
			return $this->$a;
		}
			
	}
	
	

?>
