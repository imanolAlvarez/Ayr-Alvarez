

<!DOCTYPE html>

<html>
	<head>
	
 	<title> Gesti&oacute;n Veterinaria </title>
		<script type="text/javascript" src="../js/funciones.js" ></script>
		<script type="text/javascript" src="../js/jquery-1.8.2.min.js" ></script>
		<link href="../css/estilo1.css" rel="stylesheet">
		<meta charset="utf-8">
		<link rel="icon" type="image/png/ico" href="../favicon.ico" />
	</head>
<body style="background-image:none;">
			
<h1>   Sistema de Gesti&oacute;n Veterinaria </h1>
	   
<div class="contenedor2" style="height:600px;"> 
			<div class="divlog" id="divlog" > 
			<?php
			if( $error != ""){  
				echo "<div class='diverror'> ".$error." </div>";
			}?>
			
			<form action="../model/controlarlogin.php" method="post" class="login" id="frmLogin" name="frmLogin">
				<div class="letraCabecera">Bienvenido</div>
				<div class="inputLogin"> <input placeholder=' Usuario' type="text" id="txtUsr" name="txtUsr" required> </div>
				<div class="inputLogin"> <input  placeholder=' Password ' type="password" id="txtPass" name="txtPass" required> </div>
			
				<input  type="submit"  id="cmdAcepta" name="cmdAcepta" class="btnenviar" value="ENVIAR"  >
			</form>
		</div>
</div>





</body>
</html>
	
		
	
		



