<!--- Modificar    ---->

<div  class="contenedor">  
	<h2>Modificar Local</h2>

		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Local/form_modif_local.php' method='post'>
            <p>Nombre del Local: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
			<p>Descripcion: <input name='descripcion'  id='descripcion' type='text'  value='<?php echo $descripcion;?>'  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
            	<?php if ($activo == 1){?>
							<option value='1' SELECTED >Si</option>
							<option value='0' >No</option>
                       <?php }else {?>
                        	<option value='1'>Si</option>
							<option value='0'  SELECTED >No</option>
				<?php	}?>
						
						</select></p>
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >
			 <input type='submit' name='btnMod' value='Modificar'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Modificar   ---->

