

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Proveedor/form_alta_proveedor.php' method='post'>
			<p>DNI: <input name='dni'  id='dni' type='text'  value=''  class='' required></p>
			<p>Apellido: <input name='apellido'  id='apellido' type='text'  value=''  class='' required></p>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
            <p>E-mail: <input name='email'  id='email' type='email'  value=''  class='' required></p>
            <p>Telefono: <input name='telefono'  id='telefono' type='text'  value=''  class='' required></p>
			<p>Localidad: <input name='localidad'  id='localidad' type='text'  value=''  class='' required></p>
            <p>Domicilio: <input name='domicilio'  id='domicilio' type='text'  value=''  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
						<option value='1' >Si</option>
						<option value='0' >No</option>
						</select></p>
			 <p>Descripci&oacuten: <input name='descripcion'  id='descripcion' type='textarea'  value=''  class='' ></p>			
		
			 <input type='submit' name='btnAlta' id='btnAlta' value='Registrar Proveedor'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Proveedores </caption>
            <thead>
			<tr class="">
					<td> DNI </td>
					<td> Nombre </td>
					<td> Apellido     </td>
					<td> Localidad </td>
					<td> Domicilio </td>
					<td> Telefono </td>
                    <td> E-mail </td>
                    <td> Activo </td>
                 
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			<?php
				//var_dump($prove);die();
		if(isset($prove)){ 	
			
			for( $z=0 ; $z < count($prove) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $prove[$z][1]; ?></p></td>
                    <td><p> <?php echo utf8_encode($prove[$z][2]); ?></p></td>
                    <td><p> <?php echo utf8_encode($prove[$z][3]); ?></p></td>
                    <td><p> <?php echo $prove[$z][4]; ?></p></td>
					<td><p> <?php echo $prove[$z][5]; ?></p></td>
                    <td><p> <?php echo $prove[$z][6]; ?></p></td>
					<td><p> <?php echo $prove[$z][7]; ?></p></td>
                    <td><p> <?php if ($prove[$z][9] == 1){
										echo "Si";}
										else{ 
											echo "No";} ?></p></td>
					<td><p><a href="../controller/modificar_proveedor.php?id_provedor_editar=<?php echo $prove[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro que desea elimnar?');" href="../controller/Proveedor/form_baja_proveedor.php?idproborrar=<?php echo $prove[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->