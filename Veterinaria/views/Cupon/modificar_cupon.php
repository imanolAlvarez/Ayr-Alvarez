
<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Cupon</h2>

		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Cupon/form_modif_cupon.php' method='post'>
			<p>Apellido y Nombre: <input name='apenom'  id='apenom' type='text'  value='<?php echo $apellido;?> <?php echo $nombre;?>'  class='' disabled="disabled"></p>
			<input type="hidden" id="idcliente" name="idcliente" value="<?php echo $cliente; ?>">
           <p>Usuario logeado:<input type="text" id="usuario" name="usuario" value="<?php echo $sesion_username ?>" disabled="disabled"></p>  
            <p>Promocion: <input name='promo'  id='promo' type='text'  value='<?php echo $promocion;?>'  class=''disabled="disabled"></p>
            <input type="hidden" id="idpromo" name="idpromo" value="<?php echo $promoid; ?>">
            <input type="hidden" id="montototal" name="montototal" value="<?php echo $montototal; ?>">
            <input type="hidden" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
             <?php for( $i=0 ; $i < count($ticke) ; $i++ ){  ?>
           <p>Seleccione Local: <select id="local<?php echo $i;?>" name="local<?php echo $i;?>"> 
														<option value=''>Seleccione Local</option>
            											<?php for( $z=0 ; $z < count($localact) ; $z++ ){  ?>
            													<option value='<?php echo $localact[$z]['0']; ?>'><?php echo $localact[$z][1]; ?></option>
                   										 <?php }?>
                                                     </select>
                                                     
                                                     
                  <input type="hidden" id="idtick<?php echo $i;?>" name="idtick<?php echo $i;?>" value="<?php echo $ticke[$i]['0']; ?>">                                  
				Monto de compra:<input type="text" id="monto<?php echo $i;?>" name="monto<?php echo $i;?>"  value='<?php echo $ticke[$i]['2']; ?>' onkeyup="javascript:sumar();">Fecha:<input type="date" id="fecha<?php echo $i;?>" name="fecha<?php echo $i;?>"  value='<?php echo $ticke[$i]['4']; ?>'>Hora:<input type="text" id="hora<?php echo $i;?>" name="hora<?php echo $i;?>"  value='<?php echo $ticke[$i]['3']; ?>'></p>
                    
                    <?php } ?>
                    <p>Total: <input type="text" id="total" disabled value="0"></p>
                  				<br /><br />
			        
							
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >
			 <input type='submit' name='btnMod' value='Modificar'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Modificar   ---->

