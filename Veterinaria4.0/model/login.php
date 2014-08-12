<?php

	
	function sessioncheck(){ 
		session_start();
		
		if (!$_SESSION["logueado"] ){
			//header("Location: ../controller/index.php");
		}
	}
	

?>
