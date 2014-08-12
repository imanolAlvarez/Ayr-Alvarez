

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Servicio/form_alta_servicio.php' method='post'>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
			 <p>Precio Venta: <input name='precio_venta'  id='precio_venta' type='floatval'  value=''  class='' required></p>
            <p>Codigo de Barras: <input name='cod_barras'  id='cod_barras' type='text'  value=''  class='' required></p>
           
           
           <p>Descripci&oacuten: <input name='descripcion'  id='descripcion' type='text'  value=''  class='' required></p>
			<p > Seleccione Categoria: <select name='categoria'  id='categoria' >
							
								<?php foreach ($categorias as $key =>$value ){?>
									<option value='<?php echo $value['id']; ?>' > <?php echo $value['descripcion'];  ?> </option> 
								<?php	}?>
								</select> 
							
							</p>
			 <input type='submit' name='btnAlta' id='btnAlta' value='Registrar Servicio'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Servicios </caption>
            <thead>
			<tr class="">
					<td> Nombre </td>
					<td> C&oacutedigo de Barras    </td>
                    <td> Precio venta </td>
                    <td> Categoria</td>
                   
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			
			<?php
			
		if(isset($servs)){ 	
			
			for( $z=0 ; $z < count($servs) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $servs[$z][2]; ?></p></td>
                    <td><p> <?php echo utf8_encode($servs[$z][3]); ?></p></td>
                    <td><p> <?php echo utf8_encode($servs[$z][1]); ?></p></td>
                    
                   <td><p> <?php	if(isset($servs[$z][5])){
									echo $servs[$z][5]; }?></p></td>
				
				
					<td><p><a href="../controller/modificar_servicio.php?idServeditar=<?php echo $servs[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Servicio/form_baja_servicio.php?idServborrar=<?php echo $servs[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->

