<?php

session_start();
/*if (!$_SESSION["logueado"] ){
			header("Location: ../index.php");
}*/

require "productos.php";

$prod= new Producto();

if( $_POST['cod_prod'] != ' '){
	$cod = $_POST['cod_prod'];
			$prod= $prod->getProdxCod($cod);
			//var_dump($prod);
		if($prod == ''){
				echo '<p> Producto no encontrado </p>';
		}else{
		?>				

			<p style="color:red "><?php if( $prod->stock == 0){ echo 'Sin Stock';}else{ echo 'Stock : '.$prod->stock.' Unidades'; } ?> </p>
			
			<input  type='hidden' name="prod_id"  id="prod_id" value='<?php echo $prod->id; ?>'  ></p>
			<input  type='hidden' name="id_cat_producto"  id="id_cat_producto" value='<?php echo $prod->id_cat_producto; ?>'  ></p>
			<input  type='hidden' name="id_proveedor"  id="id_proveedor" value='<?php echo $prod->id_proveedor; ?>'  ></p>
			<input  type='hidden' name="stock"  id="stock" value='<?php echo $prod->stock; ?>'  ></p>
			<p>Nombre <input  type='text' name="prod_nombre"  id="prod_nombre" readonly="readonly" value="<?php echo $prod->nombre; ?>"  ></p>
			<p>Categor&iacute;a <input type='text'  name="prod_cat"  id="prod_cat" readonly="readonly" value='<?php echo $prod->cat; ?>'  ></p>
			<p style="font-size: 150%;"> $ <input  type='text' name="prod_precio" size='6' style="font-size: 150%;padding-left:2%;" id="prod_precio" readonly="readonly" value='<?php echo $prod->precio_venta; ?>'  ></p>
			<p><img id="prod_img" style="width:200px" src="../img_productos/<?php echo $prod->img; ?>" > </p>
				
	<?php 
		}				

	}else{
		echo '<p> Ingrese un c&oacute;digo de producto  </p>';

}?>	

