

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table >
		
			<caption> Lista de Clientes de la promoci&iacute;on n&uacute;mero <?php echo $promo; ?></caption>
			<tr class="">
					<td> DNI </td>
					<td> Apellido </td>
					<td> Nombre </td>
                    <td> E-mail </td>
                    <td> Fecha Nacimiento </td>
                    <td> Telefono </td>
                    <td> Domicilio </td>
                    <td> Activo </td>
                    <td> Localidad </td>
              
			</tr>
			<?php
			
		if(isset($client)){ 	
			
			for( $z=0 ; $z < count($client) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $client[$z][1]; ?></p></td>
                    <td><p> <?php echo $client[$z][2]; ?></p></td>
                    <td><p> <?php echo $client[$z][3]; ?></p></td>
                    <td><p> <?php echo $client[$z][4]; ?></p></td>
                    <td><p> <?php echo $client[$z][5]; ?></p></td>
                    <td><p> <?php echo $client[$z][6]; ?></p></td>
                    <td><p> <?php echo $client[$z][7]; ?></p></td>
                    <td><p> <?php if ($client[$z][8] = 1){
										echo "Si";}
										else{ 
											echo "No";} ?></p></td>
					<td><p> <?php echo $client[$z][9]; ?></p></td>
					</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->

