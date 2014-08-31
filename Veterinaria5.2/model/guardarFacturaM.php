<?php

session_start();
include "db.php";

var_dump($_POST);
$cantrows = $_POST['cant'] - 1;

//comprobar si hay stock de todo sino volver a la factura y avisar
//verificar todos***********
	
		$hayStock = verificarStockProductos($_POST['cod'] , $_POST['unidades'] );
		if (!$hayStock){
			echo 'sin stock';
		}
	
//***************************

//si hay stock 
//1- insertar venta  y detalle
$nFactura = $_POST['numero']; //la venta tiene una factura

if(isset ($_POST['tarjeta'])){ //la venta tiene una forma de pago
	$tarjeta=$_POST['tarjeta'];
}else{
	$tarjeta=0;
}

$cliente = $_POST['cliente'];
$totalTotal = $_POST['totalTotal'];	
$fecha = $_POST['fecha'];

//insertamos la venta  
$idVenta = insVenta( $totalTotal, $fecha, $nFactura, $tarjeta);


//con el id generado insertamos los Detalles de la venta generada
	for ( $i=1; $i <= $cantrows ;$i++ ){
		
		//**************** es producto
		if( $_POST['producto'][$i] != '' ) { 
			
			$codigo = $_POST['cod'][$i];  
			$producto = $_POST['producto'][$i];
			$precio_unit = $_POST['precio_unit'][$i];  
			 
			$unidades = $_POST['unidades'][$i]; 
			$subtotal=$_POST['subtotal'][$i];
			$descuento=$_POST['descuento'][$i];
			$total=$_POST['total'][$i];
			
			$idProducto = averiguarIdProducto( $_POST['cod'][$i] );
			$idProducto=$idProducto->id;
			insDetalleVenta( (int)$nFactura, $precio_unit, $descuento, (int)$unidades, (int)$idVenta, (int)$cliente,$producto, (int)$idProducto, '' );	
			
			$ok = decrementarStock($idProducto, $unidades, $idVenta , $producto ); 
		}
		
		//***************** es servicio
		//if($_POST['es_producto'] == 'no'){}
		/*if( $_POST['nombre_serv'][$i] != '' ) {  
			$cliente = $_POST['cliente'];
			$precio_venta = $_POST['precio_venta'][$i];  
			$servicio = $_POST['nombre_serv'][$i];
			$precio = $_POST['precio'][$i];  
			 
			$unidades = $_POST['unidades'][$i]; 
			$subtotal=$_POST['subtotal'][$i];
			$descuento=$_POST['descuento'][$i];
			$total=$_POST['total'][$i];
			
			$idServicio = averiguarIdServicio( $_POST['codserv'][$i] );
			
			insDetalleVenta( $id='' , $nFactura, $precio_unit, $descuento, $unidades, $idVenta, $idcliente, '' , $idServicio);	
		}*/
		
	//	if(!$ok){ die('muero por error');}	// si hay error???
	}
	
header('Location: ../controller/facturar.php?mensaje=Venta Realizada con exito');
	
	
	function verificarStockProductos($array_codigos, $unidades){
		$conn = conectar(); //funcion que conecta con bd	
		
		for ( $i=1; $i <= count($array_codigos) ;$i++){
				try{	
						$gsent = $conn->prepare('SELECT producto.stock  FROM producto WHERE cod_barras = :cod');
						$gsent->bindParam(':cod', $array_codigos[$i], PDO::PARAM_INT);
						$gsent->execute();
						$result = $gsent->fetch(PDO::FETCH_OBJ);
						
						if( $result->stock < $unidades[$i]){
							echo ('unidades en stock: '.$result->stock .' unidades pedidas: '. $unidades[$i]);
							header('Location: ../controller/facturar.php?mensaje_error=no hay stock suficiente en el producto: '. $array_codigos[$i]);die();
						}
				}
				catch(PDOException $e){
					echo "ERROR obtener porducto por codigo de barras para verificar STOCK: " . $e->getMessage();
					die();
				}		
		}
		return true;
	}

	function insVenta( $totalTotal, $fecha, $nFactura,$tarjeta){
		$conn = conectar(); //funcion que conecta con bd
		try{
			$gsent = $conn->prepare( "insert into venta(id, monto_total, fecha, numero,tarjeta) 
												values('',:totalTotal, :fecha, :nFactura,:tarjeta)");
			$gsent->bindParam(':totalTotal', $totalTotal, PDO::PARAM_STR,11);
			$gsent->bindParam(':fecha', $fecha, PDO::PARAM_STR,11);
			$gsent->bindParam(':nFactura', $nFactura, PDO::PARAM_INT);
			$gsent->bindParam(':tarjeta', $tarjeta, PDO::PARAM_INT);
			$gsent->execute();
			
			$ultimoid = $conn->lastInsertId("id");
		}
		catch(PDOException $e){
			echo "ERROR al insertar venta: " . $e->getMessage();
			die();
		}	
		desconectar ($conn);		
		return $ultimoid;
	}

	function averiguarIdProducto($cod){
		$conn = conectar(); //funcion que conecta con bd
		try{				
					$gsent = $conn->prepare('SELECT id FROM producto WHERE cod_barras = :cod');
					$gsent->bindParam(':cod', $cod, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
				echo "ERROR obtener ID producto por codigo de barras : " . $e->getMessage();
				die();
		}
		desconectar ($conn);		
		return $result; 
	}
	
	function averiguarIdServicio($codserv){
		try{		
					$gsent = $conn->prepare('SELECT id from servicio where cod_barras = :codserv');
					$gsent->bindParam(':codserv', $codserv, PDO::PARAM_INT);
					$gsent->execute();
					$result = $gsent->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
				echo "ERROR obtener porducto por codigo de barras : " . $e->getMessage();
		}	
		desconectar ($conn);
		return $result; 
	}
	
	function decrementarStock($idProducto, $stock, $idVenta ,$nombre_producto){
			$conn = conectar(); //funcion que conecta con bd
			try{
				$stmt = $conn->prepare("UPDATE producto SET stock=(stock-:stock) where id=:id");
				$stmt->bindParam(':stock',$stock, PDO::PARAM_STR,11);
				$stmt->bindParam(':id',$idProducto , PDO::PARAM_INT);
				$stmt->execute();
				$error='false';
			}
			catch(PDOException $e){
				echo "ERROR decrementar stock: " . $e->getMessage(); 	
				$error='true';
			}
			
			echo 'hay error? '.$error.' - decrementa '.$stock.' en el producto con id '.$idProducto;
			try{
				$dia_hora= date('Y-m-d H:i:s');
				$gsent = $conn->prepare( "insert into historial(id, unidades, id_producto, venta, dia_hora, nombre_producto, error) 
						values('',:unidades, :id_producto, :idventa , :dia_hora,:nombre_producto, :error)");
				$gsent->bindParam(':unidades',$stock, PDO::PARAM_INT);
				$gsent->bindParam(':id_producto',$idProducto , PDO::PARAM_INT);
				$gsent->bindParam(':idventa',$idVenta , PDO::PARAM_INT);
				$gsent->bindParam(':dia_hora',$dia_hora , PDO::PARAM_STR, 50);
				$gsent->bindParam(':nombre_producto',$nombre_producto , PDO::PARAM_STR, 50);
				$gsent->bindParam(':error',$error , PDO::PARAM_STR, 11);
				$gsent->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR guardar en guardar en historial : " . $e->getMessage(); 	
				die();
			}
			desconectar ($conn);
			return true; 
	}
	
	function insDetalleVenta( $nFactura, $precio_unit, $descuento, $unidades, $idVenta, $idcliente, $nombre_producto ,$idProducto, $idServicio ){
		$conn = conectar(); 
			try{
				$gsent = $conn->prepare( "insert into detalle_venta(id, numero, precio_unitario ,descuento,  cantidad, id_venta, id_cliente, id_producto,id_servicio, nombre_producto) 
															values('', :numerof ,:precio_unit,:descuento ,:unidades, :idventa, :idcliente, :id_producto, 0 ,:nombre_producto)");
				var_dump ($precio_unit);
				$gsent->bindParam(':numerof',$nFactura, PDO::PARAM_STR,11);
				$gsent->bindParam(':precio_unit',$precio_unit, PDO::PARAM_STR,11);
				$gsent->bindParam(':descuento',$descuento, PDO::PARAM_STR,11);
				$gsent->bindParam(':unidades',$unidades, PDO::PARAM_STR,11);
				$gsent->bindParam(':idventa',$idVenta , PDO::PARAM_STR,11);
				$gsent->bindParam(':idcliente',$idcliente , PDO::PARAM_STR,11);
				$gsent->bindParam(':id_producto',$idProducto , PDO::PARAM_STR,11);
				$gsent->bindParam(':nombre_producto',$nombre_producto, PDO::PARAM_STR,11 );
				$gsent->execute();
				
			}
			catch(PDOException $e){
				echo "ERROR guardar en detalle venta lpm! : " . $e->getMessage(); 	
				die();
			}
			desconectar ($conn);

	}
	
// $gsent->beginTransaction();

/* $gsent->commit();
  
} catch (Exception $e) {
		$gsent->rollBack();
		echo "Fallo: " . $e->getMessage();
} */


?>