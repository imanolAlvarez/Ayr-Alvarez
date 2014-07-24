

<!--- Tabla   ---->
<div class="di" id="di" >
		<div  class="contenedor">  
       
			<?php
			
		if(isset($cup)){ 	
			
			for( $z=0 ; $z < count($cup) ; $z++ ){  ?>
				
					<p><strong>NOMBRE Y APELLIDO: </strong><?php echo $cup[$z][1]; ?>
					 <?php echo $cup[$z][2]; ?></p>
                    <p><strong>DNI:</strong> <?php echo $cup[$z][3]; ?></p>
                    <p><strong>PROMOCION DEL CUPON:</strong> <?php echo $cup[$z][4]; ?></p>
                    <p><h2>Tickets asociados al cupon:</h2></p>
              	 	<?php for( $i=0 ; $i < count($ticke) ; $i++ ){  ?>
                    		
                 	  		<p><strong>  Local: </strong><?php echo $ticke[$i][1]; ?>
                  	 		   <strong>  Monto:  </strong><?php echo $ticke[$i][2]; ?>
                   	 		 <strong> Fecha:  </strong><?php echo $ticke[$i][4]; ?>
                   	  		<strong> Hora:  </strong><?php echo $ticke[$i][3]; ?></p>
							<?php } ?>
                    <p><a href="../controller/ABM_cupones.php"> <img  src='../img/volver.png'></a></p>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
	
	</div>
</div>
<!--- fin Tabla   ---->

