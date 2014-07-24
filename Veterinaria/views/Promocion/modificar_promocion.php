<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Promocion</h2>

		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Promocion/form_modif_promocion.php' method='post'>
        	<p>N° de Promocion: <input name='numero'  id='numero' type='text'  value='<?php echo $numero;?>'  class='' required></p>
            <p>Nombre de la Promocion: <input name='nombre'  id='nombre' type='text'  value='<?php echo $nombre;?>'  class='' required></p>
			<p>Descripcion: <input name='descripcion'  id='descripcion' type='text'  value='<?php echo $descripcion;?>'  class='' required></p>
            <p>Fecha de Inicio: <input name='fecha_inicio'  id='fecha_inicio' type='date'  value='<?php echo $fecha_inicio;?>'  class='' required></p>
            <p>Fecha de fin: <input name='fecha_fin'  id='fecha_fin' type='date'  value='<?php echo $fecha_fin;?>'  class='' required></p>
            <p>Monto Minimo: <input name='monto_minimo'  id='monto_minimo' type='text'  value='<?php echo $monto_minimo;?>'  class='' required></p>
            <p>Cantidad maxima de tickets: <input name='cantidad_tickets'  id='cantidad_tickets' type='text'  value='<?php echo $cantidad_tickets;?>'  class='' required></p>
			
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >
			 <input type='submit' name='btnMod' value='Modificar'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Modificar   ---->

