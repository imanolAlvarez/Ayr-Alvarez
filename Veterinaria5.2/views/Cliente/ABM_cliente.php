

<!--<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>-->
<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform');"  >  &#9658; Agregar  </a> </div>
<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">&#9660;</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Cliente/form_alta_cliente.php' method='post'>
			<p>DNI: <input name='dni'  id='dni' type='text'  value=''  class='' required></p>
			<p>Apellido: <input name='apellido'  id='apellido' type='text'  value=''  class='' required></p>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
            <p>E-mail: <input name='mail'  id='mail' type='email'  value=''  class='' required></p>
            <p>Fecha de Nacimiento: <input name='fnac'  id='fnac' type='date'  value=''  class='' required></p>
            <p>Telefono: <input name='telefono'  id='telefono' type='text'  value=''  class='' required></p>
            <p>Domicilio: <input name='domicilio'  id='domicilio' type='text'  value=''  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
						<option value='1' >Si</option>
						<option value='0' >No</option>
						</select></p>
			<p > Localidad: <select name='zona'  id='zona' >
								<option>Seleccione Localidad</option>
								<?php foreach ($zonas as $key =>$value ){?>
									<option value='<?php echo $value['idPartido']; ?>' > <?php echo $value['partido']; ?> </option> 
								<?php	}?>
								</select>
							
							</p>
			 <input type='submit' name='btnAlta' id='btnAlta' value='Crear cliente'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Clientes </caption>
            <thead>
			<tr class="">
					<td> DNI </td>
					<td> Apellido     </td>
					<td> Nombre </td>
                    <td> E-mail </td>
                    <td> Fecha Nacimiento </td>
                    <td> Telefono </td>
                    <td> Domicilio </td>
                    <td> Activo </td>
                    <td> Zona </td>
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			<?php
			
		if(isset($client)){ 	
			
			for( $z=0 ; $z < count($client) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $client[$z][1]; ?></p></td>
                    <td><p> <?php echo utf8_encode($client[$z][2]); ?></p></td>
                    <td><p> <?php echo utf8_encode($client[$z][3]); ?></p></td>
                    <td><p> <?php echo $client[$z][4]; ?></p></td>
                    <?php $fecha= $client[$z][5];?>
                    <?php list($ano,$mes,$dia) = explode("-",$fecha);
					$fecha="$dia/$mes/$ano"; ?>
                    <td><p> <?php echo $fecha; ?></p></td>
                    <td><p> <?php echo $client[$z][6]; ?></p></td>
                    <td><p> <?php echo utf8_encode($client[$z][7]); ?></p></td>
                    <td><p> <?php if ($client[$z][8] == 1){
										echo "Si";}
										else{ 
											echo "No";} ?></p></td>
					<td><p> <?php echo $client[$z][9]; ?></p></td>
					<td><p><a href="../controller/modificar_cliente.php?idclieditar=<?php echo $client[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Cliente/form_baja_cliente.php?idcliborrar=<?php echo $client[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->

