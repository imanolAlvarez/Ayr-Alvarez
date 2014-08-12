
<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Producto</h2>
		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Producto/form_modif_producto.php' method='post'>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
            <p>Codigo de Barras: <input name='cod_barras'  id='cod_barras' type='text'  value='<?php echo $cod_barras;?>'  class='' required></p>
            <p>Precio Costo: <input name='precio_costo'  id='precio_costo' type='floatval'  value='<?php echo $precio_costo;?>'  class='' required></p>
            <p>Precio Venta: <input name='precio_venta'  id='precio_venta' type='floatval'  value='<?php echo $precio_venta;?>'  class='' required></p>
            <p>Porcentaje Ganancia: <input name='porcentaje_ganancia'  id='porcentaje_ganancia' type='floatval'  value='<?php echo $util;?>'  class='' required></p>
			<p>Stock: <input name='stock'  id='stock' type='number'  value='<?php echo $stock; ?>'  class='' required></p>
			 <p>Stock M&iacutenimo: <input name='stock_minimo'  id='stock_minimo' type='number'  value='<?php echo $stock_minimo;?>'  class='' required></p>
			
			<p>Proveedor: <select name='proveedor'  id='proveedor'  required >
						<option  value='<?php echo $proveedor->id; ?>' ><?php echo $proveedor->apellido;  ?> </option> 
						<?php foreach ($proveedores as $key =>$value ){?>
									<option value='<?php echo $value['id']; ?>'> <?php echo $value['apellido'];  ?> </option> 
								<?php	}?>
						</select></p>
			<p > Categoria: <select name='categoria'  id='categoria' >
								<option  value='<?php echo $categoria->id_cat_producto; ?>' > <?php echo $categoria->descripcion; ?> </option>
								<?php foreach ($categorias as $key =>$value ){?>
									<option value='<?php echo $value['id']; ?>' > <?php echo $value['descripcion'];  ?> </option> 
								<?php	}?>
								</select> 
							
							</p>
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >				
			 <input type='submit' name='btnAlta' id='btnAlta' value='Modificar Producto'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>

