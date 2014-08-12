

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Producto/form_alta_producto.php' method='post'>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
            <p>Codigo de Barras: <input name='cod_barras'  id='cod_barras' type='text'  value=''  class='' required></p>
            <p>Precio Costo: <input name='precio_costo'  id='precio_costo' type='floatval'  value=''  class='' required></p>
            <p>Precio Venta: <input name='precio_venta'  id='precio_venta' type='floatval'  value=''  class='' required></p>
            <p>Porcentaje Ganancia: <input name='porcentaje_ganancia'  id='porcentaje_ganancia' type='floatval'  value=''  class='' required></p>
			 <p>Stock: <input name='stock'  id='stock' type='number'  value=''  class='' required></p>
			 <p>Stock M&iacutenimo: <input name='stock_minimo'  id='stock_minimo' type='number'  value=''  class='' required></p>
			<p>Seleccionar Proveedor: <select name='proveedor'  id='proveedor'  required >
						<?php foreach ($proveedores as $key =>$value ){ ?>
									<option value='<?php echo $value['id']; ?>'> <?php echo $value['apellido'];  ?> </option> 
								<?php	}?>
						</select></p>
			<p >Seleccionar Categoria: <select name='categoria'  id='categoria' >
								
								<?php foreach ($categorias as $key =>$value ){?>
									<option value='<?php echo $value['id']; ?>' > <?php echo $value['descripcion'];  ?> </option> 
								<?php	}?>
								</select> 
							
							</p>
			 <input type='submit' name='btnAlta' id='btnAlta' value='Registrar Producto'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Productos </caption>
            <thead>
			<tr class="">
					<td> Nombre </td>
					<td> C&oacutedigo de Barras    </td>
					<td> Precio Costo </td>
                    <td> Precio venta </td>
                    <td> Proveedor </td>
                    <td> Categoria</td>
					<td> Stock </td>
					<td> Stock M&iacutenimo </td>
                   
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			<?php
			//var_dump($produc);die();
		if(isset($produc)){ 	
			
			for( $z=0 ; $z < count($produc) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $produc[$z][1]; ?></p></td>
                    <td><p> <?php echo utf8_encode($produc[$z][2]); ?></p></td>
                    <td><p> <?php echo utf8_encode($produc[$z][3]); ?></p></td>
                    <td><p> <?php echo $produc[$z][4]; ?></p></td>
                   <td><p> <?php	if(isset($produc[$z][9])){
									echo $produc[$z][9]; }?></p></td>
					<td><p> <?php	if(isset($produc[$z][10])){				
										echo $produc[$z][10]; }?></p></td>
					
					<td><p> <?php echo $produc[$z][8]; ?></p></td>
					<td><p> <?php echo $produc[$z][7]; ?></p></td>
					<td><p><a href="../controller/modificar_producto.php?idProdeditar=<?php echo $produc[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Producto/form_baja_producto.php?idProdborrar=<?php echo $produc[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->

