<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Listado de Ventas </caption>
            <thead>
			
			<tr class="">
					<td> Venta </td>
					<td> <b> Numero Factura </b> </td>
					<td> <b> Fecha </b> </td>
					<td> Monto   </td>
					<td> Cliente </td>
                    <td> Descuento Total </td>
                   <td> Efectivo/Tarjeta </td>
                    <td> Cantidad de Productos</td>
					
				
                    <td> Ver Detalle </td>
                   
			</tr>
            </thead>
			<?php
			//var_dump($produc);die();
		if(isset($ven)){ 	
			//var_dump($produc);die();
			for( $z=0 ; $z < count($ven) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $ven[$z][0]; ?></p></td>
					<td><p> <b><?php echo $ven[$z][1]; ?></b></p></td>
					<td><p> <b><?php echo $ven[$z][2]; ?></b></p></td>
                    <td><p> $ <?php echo utf8_encode($ven[$z][3]); ?></p></td>
                    <td><p> <?php echo $ven[$z][4]; ?></p></td>
                    <td><p> $ <?php echo $ven[$z][5]; ?></p></td>
                    <td><p> <?php if ($ven[$z][7] == 1){ 
									echo "Tarjeta";
								}else{
									echo "Efectivo";
								}
					?>
					
					
					</p></td>
					
					<td><p> <?php echo $ven[$z][6]; ?> Unidades</p></td>
					
					<td><p> <img  src='../img/ver.png'></p></td>
				
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
	</div>