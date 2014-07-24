
<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Cliente</h2>

		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Cliente/form_modif_cliente.php' method='post'>
        	<p>DNI: <input name='dni'  id='dni' type='text' value='<?php echo $dni;?>'  class='' required></p>
			<p>Apellido: <input name='apellido'  id='apellido' type='text'  value='<?php echo $apellido;?>'  class='' required></p>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
            <p>E-mail: <input name='mail'  id='mail' type='email'  value='<?php echo $mail;?>'  class='' required></p>
            <p>Fecha de Nacimiento: <input name='fnac'  id='fnac' type='date'  value='<?php echo $fnac;?>'  class='' required></p>
            <p>Telefono: <input name='telefono'  id='telefono' type='text'  value='<?php echo $telefono;?>'  class='' required></p>
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
			          <?php
                $cli=new Cliente();
				$zonas= $cli->obtenerzonas();      ?>  
                
                <p > Localidad: <select name='zona'  id='zona' >
								
								<?php foreach ($zonas as $key =>$value ){?>
                                 <?php $select="";
									if ($value['partido'] == $zona){
										$select= "SELECTED";}
										echo '<option value="'.$value['idPartido'].'" '.$select.'>'.$value['partido'].' </option>'?>
                                      <?php } ?>
								</select></p>
							
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >
			 <input type='submit' name='btnMod' value='Modificar'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Modificar   ---->

