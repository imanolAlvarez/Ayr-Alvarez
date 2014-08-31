<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Productos con Stock Cr&iacutetico </caption>
            <thead>
			<tr class="">
					<td> Nombre </td>
					<td > <b> Stock </b> </td>
					<td> <b> Stock M&iacutenimo </b> </td>
					<td> C&oacutedigo de Barras    </td>
					<td> Precio Costo </td>
                    <td> Precio venta </td>
                   
                    <td> Categoria</td>
					
                   
                    <td> Proveedor </td>
                   
			</tr>
            </thead>
			<?php
			//var_dump($produc);die();
		if(isset($produc)){ 	
			//var_dump($produc);die();
			for( $z=0 ; $z < count($produc) ; $z++ ){  ?>
					
				<tr class="trfino">
					<td><p> <?php echo $produc[$z][1]; ?></p></td>
					<td style="background-color:white"><p style="color:red"> <b><?php echo $produc[$z][8]; ?></b></p></td>
					<td><p> <b><?php echo $produc[$z][7]; ?></b></p></td>
                    <td><p> <?php echo utf8_encode($produc[$z][2]); ?></p></td>
                    <td><p> <?php echo utf8_encode($produc[$z][3]); ?></p></td>
                    <td><p> <?php echo $produc[$z][4]; ?></p></td>
                  
					<td><p> <?php	if(isset($produc[$z][10])){				
										echo $produc[$z][10]; }?></p></td>
					<?php
					if($produc[$z][9] <> 1){ ?>
					<td><p><a href="../controller/ver_proveedor.php?idProv=<?php echo $produc[$z][9]; ?>"> <img  src='../img/ver.png'></a></p></td>
					<?php } else {?> 
									<td> <p> - </p> </td> <?php } ?>
				</tr>
			<?php } 
		}else{
			echo" <p> No se encontraron registros </p>";
		}?>	
		</table>
	</div>
	</div>