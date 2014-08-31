<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Entradas y Salidas </caption>
            <thead>
			
			<tr class="">
					<td> id </td>
					<td> <b> Numero </b> </td>
					<td> <b> Fecha </b> </td>
					<td> Monto   </td>
					<td> Cliente </td>
                    <td> Descuento Total </td>
                   
                    <td> Cantidad de Productos</td>
					
					<td> Entrada / Salida </td>
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
                    <td><p> <?php echo utf8_encode($ven[$z][3]); ?></p></td>
                    <td><p> <?php echo $ven[$z][4]; ?></p></td>
                    <td><p> <?php echo $ven[$z][5]; ?></p></td>
					<td><p> <?php echo $ven[$z][6]; ?></p></td>
					<td><p style='color:darkgreen;font-size:125%;'>  Entrada <span style='font-size:200%;'>&#8681;<span> </p></td>
					<td><p> <img  src='../img/ver.png'></p></td>
				
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
	</div>