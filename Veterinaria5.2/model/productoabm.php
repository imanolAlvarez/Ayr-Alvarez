<?php
include_once "db.php";
	class Producto{
		
/**/	function getAll(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM producto');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
			function getStockBajo(){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM producto WHERE producto.stock <= producto.stock_minimo');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
			function getProveedor($idProducto){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM producto
					INNER JOIN proveedor ON (producto.id_proveedor = proveedor.id)
					WHERE producto.id = :id');
					$gsent->bindParam(':id', $idProducto, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchObject();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
			function getCategoria($idProducto){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM producto
					INNER JOIN cat_producto ON (producto.id_cat_producto = cat_producto.id)
					WHERE producto.id = :id');
					$gsent->bindParam(':id', $idProducto, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchObject();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		function getProducto($idProducto){ //devuelve usuarios
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM producto
					WHERE producto.id = :id');
					$gsent->bindParam(':id', $idProducto, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetchObject();
			}
			catch(PDOException $e){
				echo "ERROR obtener Productos: " . $e->getMessage();
			}		
			return $result; 
		}
		
		
		
			function getCategorias(){ //devuelve todas las categorias
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('SELECT * FROM cat_producto');
					$gsent->execute();
					$result = $gsent->fetchAll();
			}
			catch(PDOException $e){
				echo "ERROR obtener Categorias: " . $e->getMessage();
			}		
			return $result; 
		}
		
	
		
		
	
		

		
		
		function insProducto($nombre,$cod_barras, $precio_costo, $precio_venta, $porcentaje_ganancia, $stock, $stock_minimo , $idProveedor,$idCategoria ){
			
			//revisar si existe ya uno!!!!!!!!
			
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$stmt = $conn->prepare("INSERT INTO producto (id, nombre, cod_barras, precio_costo, precio_venta, util, stock, stock_minimo, id_cat_producto, id_proveedor ) VALUES ('',?,?,?,?,?,?,?,?,?)");
					$stmt->bindParam(1,$nombre);
					$stmt->bindParam(2,$cod_barras);
					$stmt->bindParam(3,$precio_costo);
					$stmt->bindParam(4,$precio_venta);
					$stmt->bindParam(5,$porcentaje_ganancia);
					$stmt->bindParam(6,$stock);
					$stmt->bindParam(7,$stock_minimo);
					$stmt->bindParam(8,$idCategoria);
					$stmt->bindParam(9,$idProveedor);
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();
			}		
			$stmt->execute();
			$result = true;
			desconectar($conn);
			return $result; 
		}
		
		
		function updProducto($produc){
			$conn = conectar(); //funcion que conecta con bd
			//var_dump($produc['stock']);die();
			$idPro= $produc['id'];
			$nombre =$produc['nombre'];
			$cod_barras= $produc['cod_barras'];
			$precio_costo = $produc['precio_costo'];
			$precio_venta =$produc['precio_venta'];
			$porcentaje_ganancia =$produc['porcentaje_ganancia'];
			$stock=$produc['stock'];
			$stock_minimo=$produc['stock_minimo'];
			$idProveedor =$produc['proveedor'];
			$idCategoria =$produc['categoria'];
			$imagen='imagen';

			try{
					$stmt = $conn->prepare("UPDATE producto SET nombre=:nombre, cod_barras=:cod_barras, precio_costo=:precio_costo, precio_venta=:precio_venta, 
					util=:porcentaje_ganancia, img=:img, stock=:stock, 
					stock_minimo=:stock_minimo, id_cat_producto=:id_cat_producto, id_proveedor=:id_proveedor
					where id=:id");
					
					$stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR,30);
					$stmt->bindParam(':cod_barras',$cod_barras, PDO::PARAM_STR,30);
					$stmt->bindParam(':precio_costo',$precio_costo, PDO::PARAM_STR,15);
					$stmt->bindParam(':precio_venta',$precio_venta, PDO::PARAM_STR,15);
					$stmt->bindParam(':porcentaje_ganancia',$porcentaje_ganancia, PDO::PARAM_INT,3);
					$stmt->bindParam(':img',$imagen, PDO::PARAM_STR,30);
					$stmt->bindParam(':stock',$stock, PDO::PARAM_INT);
					$stmt->bindParam(':stock_minimo',$stock_minimo, PDO::PARAM_INT);
					$stmt->bindParam(':id_proveedor',$idProveedor, PDO::PARAM_INT,11);
					$stmt->bindParam(':id_cat_producto',$idCategoria, PDO::PARAM_INT,11);
			
					$stmt->bindParam(':id',$idPro , PDO::PARAM_INT,11);
					
				$stmt->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage(); 
				return false;
			}
	
			
			desconectar($conn);
			return true; 
		}
		
		
		function delProducto($txtId)
		{	
		
			$conn = conectar(); //funcion que conecta con bd
			try{		
					$gsent = $conn->prepare('DELETE FROM producto WHERE id = :id');
					$gsent->bindParam(':id', $txtId, PDO::PARAM_INT);
					$gsent->execute();
					
			}
			catch(PDOException $e){
				echo "ERROR: " . $e->getMessage();die();
			}	
			
			desconectar($conn);	
			return true; 
		}	
		
	}
	

?>
