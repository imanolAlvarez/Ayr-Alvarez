

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" ><img src="../img/add.png" ></img> </a> </div>

<!--- Agregar    ---->

<div id="popup_box" class="contenedor">    <!-- OUR PopupBox DIV-->
	
    <a id="popupBoxClose">Cerrar</a>    
	<h2>Carga de Cupon</h2>
        	<p>Ingrese Dni de Cliente:<input type="text" id="dni" name="dni" required /><!----Aca esta el DNI que envias---->
			<input type="submit" onclick="javascript:validarDNI();" value="Verificar Dni" /></p>
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Cupon/form_alta_cupon.php' method='post' onsubmit='return chequeaMonto()' >
			<p><div id="mostrar"></div> </p><!----Aca se muestra el resultado---->
             <p>Usuario logeado:<input type="text" id="usuario" name="usuario" value="<?php echo $sesion_username ?>" disabled="disabled"></p>  
			<p style=" color: #3F6; font-size:14px;">Seleccione Promocion:<select id="promo" name="promo" required>
           								 <option>Seleccione Promocion</option>
      									 <?php for( $z=0 ; $z < count($promovig) ; $z++ ){  ?>
											<option value='<?php echo $promovig[$z]['0']; ?>' SELECTED><?php echo $promovig[$z][1]; ?></option>
           										 <?php $monto=$promovig[$z][2]; $cantidad=$promovig[$z][3]; ?>
           									 <?php }?>
                                     </select></p>
							<input type="hidden" id="montototal" name="montototal" value="<?php echo $monto; ?>">
            <h2><p>Carga de Ticket</p></h2>
            <p>La cantidad Maxima de tickets es de: <?php echo $cantidad; ?></p>
            			<input type="hidden" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
            			<?php $cont=0;?>
			  			<?php for( $i=0 ; $i < $cantidad ; $i++ ){?>
         					   <p>Seleccione Local: <select id="local<?php echo $cont;?>" name="local<?php echo $cont;?>" > 
														<option value=''>Seleccione Local</option>
            											<?php for( $z=0 ; $z < count($localact) ; $z++ ){  ?>
            													<option value='<?php echo $localact[$z]['0']; ?>'><?php echo $localact[$z][1]; ?></option>
                   										 <?php }?>
                                                     </select>
				Monto de compra:<input type="text" id="monto<?php echo $cont;?>" name="monto<?php echo $cont;?>"  value='' onkeyup="javascript:sumar();">Fecha:<input type="date" id="fecha<?php echo $cont;?>" name="fecha<?php echo $cont;?>"  value=''>Hora:<input type="text" id="hora<?php echo $cont;?>" name="hora<?php echo $cont;?>"  value=''></p>
                	
                	<?php $cont++;?>
					<?php }?>
                    <p>Total: <input type="text" id="total" disabled value="0"></p>
                    
                  				<br /><br />
  			 					 <input type='submit' name='btnAlta' id='btnAlta'  value='Crear Cupon'>
								 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
								 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
			</form>
</div>
<!--- fin Agregar  

<DIV ID="seleccion" style=''>
 <img  src='../img/f9.jpg'> Este texto es lo que se imprimirá cuando se pulse el enlace. </img>
<a href="javascript:imprSelec('seleccion')" >Imprime la ficha</a>
 ---->

<!--- Tabla   ---->

<div class="di" id="di" >
	<div class="divtabla">
		<table id="example2" >
		
			<caption> Lista de Cupones </caption>
            <thead>
			<tr>
                    
                    <th> N° de Cupon</th>
                    <th> Cliente</th>
                    <th> Promocion</th>
                    <th>Hora </th>
                    <th>Fecha</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Imprimir</th>
                    <th>Eliminar</th>
			</tr>
            </thead>
			<?php
			
		if(isset($cupon)){ 	
			//var_dump($cupon);
			for( $z=0 ; $z < count($cupon) ; $z++ ){  ?>
					
				<tr class="trfino">
                	<?php $id=$cupon[$z][0];?>
					<td><p> <?php echo $id; ?></p></td>
					<td><p> <?php echo $cupon[$z][1]; ?></p></td>
                    <td><p> <?php echo $cupon[$z][2]; ?></p></td>
                    <td><p> <?php echo $cupon[$z][3]; ?></p></td>  
                    <?php $fecha= $cupon[$z][4];?>
                    <?php list($ano,$mes,$dia) = explode("-",$fecha);
					$fecha="$dia/$mes/$ano"; ?>
                    <td><p> <?php echo $fecha; ?></p></td>
                    

					<td><p><a href="../controller/ver_cupon.php?idcupon=<?php echo $cupon[$z][0]; ?>"> <img  src='../img/ver.png'></a></p></td>
					<td><p><a href="../controller/modificar_cupon.php?idcupon=<?php echo $cupon[$z][0]; ?>"> <img  src='../img/edit.png'></a></p></td>
					<td><p><a href="../controller/imprimir.php?idcupon=<?php echo $cupon[$z][0]; ?>"> <img  src='../img/imprimir.png'></a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro? Se eliminara el cupon con sus tickets asociados');" href="../controller/Cupon/form_baja_cupon.php?idcupborrar=<?php echo $cupon[$z][0]; ?>"> <img class='' src='../img/delete.png'> </a></p></td>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
			/*
			DELETE FROM cupones WHERE id= idcupon										
DELETE FROM tickets WHERE idcupon= idcupon
			*/
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   

</DIV>---->