

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Promocion/form_alta_promocion.php' method='post'>
			<p>N° de Promocion: <input name='numero'  id='numero' type='text'  value=''  class='' required></p>
            <p>Nombre de la Promocion: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
			<p>Descripcion: <input name='descripcion'  id='descripcion' type='text'  value=''  class='' required></p>
			<p>Fecha de Inicio: <input name='fecha_inicio'  id='fecha_inicio' type='date'  value=''  class='' required></p>
            <p>Fecha de fin: <input name='fecha_fin'  id='fecha_fin' type='date'  value=''  class='' required></p>
            <p>Monto Minimo: <input name='monto_minimo'  id='monto_minimo' type='text'  value=''  class='' required></p>
            <p>Cantidad maxima de tickets: <input name='cantidad_tickets'  id='cantidad_tickets' type='text'  value=''  class='' required></p>
			 <input type='submit' name='btnAlta' id='btnAlta' value='Crear Promocion'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Promociones</caption>
            <thead>
			<tr class="">
					<td> Numero Promocion </td>
					<td> Nombre </td>
					<td> Descripcion </td>
					<td> Fecha de inicio </td>
                    <td> Fecha de fin </td>
                    <td> Monto minimo </td>
                    <td> Cantidad maxima de tickets </td>
                    <td> Editar </td>
                    <td> Eliminar </td>
			</tr>
            </thead>
			<?php
			for( $z=0 ; $z < count($prom) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $prom[$z][1]; ?></p></td>
					<td><p> <?php echo $prom[$z][2]; ?></p></td>
                    <td><p> <?php echo $prom[$z][3]; ?></p></td>
                    <?php $fecha= $prom[$z][4];?>
                    <?php list($ano,$mes,$dia) = explode("-",$fecha);
					$fecha="$dia/$mes/$ano"; ?>
                    <td><p> <?php echo $fecha; ?></p></td>
                    <?php $fecha2= $prom[$z][5];?>
                    <?php list($ano,$mes,$dia) = explode("-",$fecha2);
					$fecha2="$dia/$mes/$ano"; ?>
                    <td><p> <?php echo $fecha2; ?></p></td>
                    <td><p> $<?php echo $prom[$z][6]; ?></p></td>
                    <td><p> <?php echo $prom[$z][7]; ?></p></td>     
					<td><p><a href="../controller/modificar_promocion.php?idpromoeditar=<?php echo $prom[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Promocion/form_baja_promocion.php?idpromoborrar=<?php echo $prom[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } ?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->