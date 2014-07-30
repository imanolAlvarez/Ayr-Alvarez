<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
 	<title> Gesti&oacute;n Veterinaria </title>
	<script type="text/javascript" src="../js/funciones.js" ></script>
	<script type="text/javascript" src="../js/jquery-1.8.2.min.js" ></script>
	<script type="text/javascript" src="../js/ajax.js" ></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

	<link href="../css/estilo1.css" rel="stylesheet" >
	<link rel="icon" type="image/png/ico" href="../favicon.ico" /> 
	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').dataTable( {
				"sPaginationType": "full_numbers",
				"bLengthChange": false
				
			} );
		} );
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example2').dataTable( {
				"bSort": false,
				"sPaginationType": "full_numbers",
				"bLengthChange": false
			} );
		} );
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example3').dataTable( {
				"bSort": false,
				"bFilter": false,
				"bLengthChange": false,
				"sPaginationType": "full_numbers"
			} );
		} );
	</script>
	</head>
		
<body id="container" class='cont' >


<!--<span class='session1'><?php echo $sesion_perfil ;//.' ('.$sesion_username.')'  ?> </span>-->
	<!--style="background-image: url(../img/fondo.jpg);background-repeat:no-repeat;background-position:center"--> 	
<h1 >   Sistema de Gesti&oacute;n Veterinaria </h1>
	   
<header>
   <div class='menudes'> 
		<nav>
			<ul  id="nav">
			<?php include "../controller/menu.php";?>
			</ul>		
		 </nav> 
	</div>
</header>
     

<div class="contenedor2">
			<?php include '../views/'.$view_page; ?>
</div>


<footer>
   <?php include "../views/pie.php"; ?>
</footer>  



</body>
</html>
