<!DOCTYPE html>
<html>
	<head>
	
 	<title> Gesti&oacute;n Veterinaria </title>
     <script type="text/javascript">
    /**
     * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
     * Suma los valores de los cuadros de texto
     */
    function sumar()
    {

		var sumador=0;
		var cant= document.getElementById('cantidad').value; 
		for( i =0 ; i < cant ; i++){
			sumador = parseInt(sumador) + parseInt(verificar("monto"+i));
		}
		
        // realizamos la suma de los valores y los ponemos en la casilla del
        // formulario que contiene el total
        document.getElementById("total").value= sumador;
    }

    /**
     * Funcion para verificar los valores de los cuadros de texto. Si no es un
     * valor numerico, cambia de color el borde del cuadro de texto
     */
    function verificar(id)
    {
        var obj=document.getElementById(id);
        if(obj.value=="")
            value="0";
        else
            value=obj.value;
        if(validate_importe(value))
        {
            // marcamos como erroneo
            obj.style.borderColor="#808080";
            return value;
        }else{
            // marcamos como erroneo
            obj.style.borderColor="#f00";
            return 0;
        }
    }
	
	function chequeaMonto(){
	if( parseInt(document.getElementById("total").value) <  parseInt(document.getElementById("montototal").value)){
		alert( 'el monto de los tickets no es suficiente para acceder a la promocion');
		return false;
	}else{
		 //document.getElementById("test-form").submit();	
		 alert("Monto suficiente");
		 return true;
		}
	}
	
	
	 function imprSelec(nombre)

  {

		  var ficha = document.getElementById(nombre);

		  var ventimp = window.open(' ', 'popimpr');

		  ventimp.document.write( ficha.innerHTML );

		  ventimp.document.close();

		  ventimp.print( );

		  ventimp.close();

  } 
    
    /**
     * Funcion para validar el importe
     * Tiene que recibir:
     *  El valor del importe (Ej. document.formName.operator)
     *  Determina si permite o no decimales [1-si|0-no]
     * Devuelve:
     *  true-Todo correcto
     *  false-Incorrecto
     */
    function validate_importe(value,decimal)
    {
        if(decimal==undefined)
            decimal=0;

        if(decimal==1)
        {
            // Permite decimales tanto por . como por ,
            var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
        }else{
            // Numero entero normal
            var patron=new RegExp("^([0-9])*$")
        }

        if(value && value.search(patron)==0)
        {
            return true;
        }
        return false;
    }
    </script>
	

	
		<script type="text/javascript" src="../js/funciones.js" ></script>
		<script type="text/javascript" src="../js/jquery-1.8.2.min.js" ></script>
		<script type="text/javascript" src="../js/ajax.js" ></script>
	
		<link href="../css/estilo1.css" rel="stylesheet" >
		<meta charset="utf-8">
		<link rel="icon" type="image/png/ico" href="../favicon.ico" /> 
		
  			<style type="text/css" title="currentStyle">
			@import "../css/demo_page.css";
			@import "../css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
      
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

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
<h1 > +  Sistema de Gesti&oacute;n Veterinaria </h1>
	   
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
