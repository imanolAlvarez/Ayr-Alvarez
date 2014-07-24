

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Local/form_alta_local.php' method='post'>
            <p>Nombre del Local: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
			<p>Descripcion: <input name='descripcion'  id='descripcion' type='text'  value=''  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
						<option value='1' >Si</option>
						<option value='0' >No</option>
						</select></p>
			
			 <input type='submit' name='btnAlta' id='btnAlta' value='Crear Local'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example" >
		
			<caption> Lista de Locales</caption>
            <thead>
			<tr class="">
					<td> Numero Local </td>
					<td> Nombre </td>
					<td> Descripcion </td>
					<td> Activo </td>
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			<?php
			for( $z=0 ; $z < count($loc) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $loc[$z][0]; ?></p></td>
					<td><p> <?php echo utf8_encode($loc[$z][1]); ?></p></td>
                    <td><p> <?php echo utf8_encode($loc[$z][2]); ?></p></td>
                     <td><p> <?php if ($loc[$z][3] == 1){
										echo "Si";}
										else{ 
											echo "No";} ?></p></td>
					<td><p><a href="../controller/modificar_local.php?idloceditar=<?php echo $loc[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Local/form_baja_local.php?idlocborrar=<?php echo $loc[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } ?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->