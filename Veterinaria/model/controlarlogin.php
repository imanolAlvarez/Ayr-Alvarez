<?php

require_once "claslogin.php";
	
		//pagina que llama a claslogin para revisar los datos 
		$log= new Login();
		$log->login($_POST['txtUsr'],$_POST['txtPass']);
		
		if ($log->retorno("error")!= null){ //si retorna error
				$mensajeerror = $log->retorno("error"); //informamos el error
				$iserror=1; 
				header("location: ../controller/login.php?err=Compruebe su nombre de usuario y password&iserror=1");
		}
	
		else{ 		//si es correcto inicio session{ 
				session_start();
				$_SESSION["sesid"] = session_id();
				$_SESSION["logueado"] = "true";
				$_SESSION["id"] = $log->retorno("id");
				$_SESSION["contrasenia"] = $log->retorno("password");
				$_SESSION["username"] = $log->retorno("username");
				$_SESSION["perfil"] = $log->retorno("perfil");
			
				//var_dump($_SESSION);die();
				header("location: ../controller/backend.php");
		}
?>
