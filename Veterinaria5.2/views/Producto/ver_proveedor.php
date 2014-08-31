<div  class="contenedor" >  
	<h2>Proveedor </h2>

		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Proveedor/form_modificar_proveedor.php' method='post'>
        	<p>DNI: <input name='dni'  id='dni' type='text' value='<?php echo $dni;?>'  class='' required></p>
			<p>Apellido: <input name='apellido'  id='apellido' type='text'  value='<?php echo $apellido;?>'  class='' required></p>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
            <p>E-mail: <input name='email'  id='email' type='email'  value='<?php echo $email;?>'  class='' required></p>
            <p>Telefono: <input name='telefono'  id='telefono' type='text'  value='<?php echo $telefono;?>'  class='' required></p>
			<p>Localidad: <input name='localidad'  id='text' type='text'  value='<?php echo $localidad;?>'  class='' required></p>
            <p>Domicilio: <input name='domicilio'  id='domicilio' type='text'  value='<?php echo $domicilio;?>'  class='' required></p>
				<p>Activo: <select name='activo'  id='activo'  required >
            	<?php if ($activo == 1){?>
							<option value='1' SELECTED >Si</option>
							<option value='0' >No</option>
                       <?php }else {?>
                        	<option value='1'>Si</option>
							<option value='0'  SELECTED >No</option>
				<?php	}?>
						
						</select></p>
			          
            <p>Descripci&oacuten: <input name='descripcion'  id='descripcion' type='text'  value='<?php echo $descripcion;?>'  class='' required></p>    
             
							
			
			 <input name='btnCancel' type='button' id='btnCancel' value='Cerrar' onClick='window.history.back()'>
		 </form>
</div>