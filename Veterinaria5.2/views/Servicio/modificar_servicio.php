
<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Servicio</h2>
		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Servicio/form_modif_servicio.php' method='post'>
			<p>Nombre: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
            <p>Codigo de Barras: <input name='cod_barras'  id='cod_barras' type='text'  value='<?php echo $cod_barras;?>'  class='' required></p>
           
            <p>Precio Venta: <input name='precio_venta'  id='precio_venta' type='floatval'  value='<?php echo $precio_venta;?>'  class='' required></p>
           
			 <p>Descripci&oacuten: <input name='descripcion'  id='descripcion' type='text'  value='<?php echo $descripcion;?>'  class='' required></p>
			
			
			<p > Categoria: <select name='categoria'  id='categoria' >
								<option  value='<?php echo $categoria->id_categoria; ?>' > <?php echo $categoria->descripcion; ?> </option>
								<?php foreach ($categorias as $key =>$value ){?>
									<option value='<?php echo $value['id']; ?>' > <?php echo $value['descripcion'];  ?> </option> 
								<?php	}?>
								</select> 
							
							</p>
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >				
			 <input type='submit' name='btnAlta' id='btnAlta' value='Modificar Servicio'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>

