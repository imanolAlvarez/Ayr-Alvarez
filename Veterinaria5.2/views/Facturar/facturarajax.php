
<?php 
 if(isset($mensaje)){ 
	echo '<p  class="mensaje" > '. $mensaje .'</p>';
}
if(isset($mensaje_error)){ 
	echo '<p  class="mensaje_error" > '. $mensaje_error .'</p>';
}
?>
<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="loadPopupBox('#popup_box');"  >  &#9658; Agregar Producto  </a> </div>
<!--- Agregar    ---->

<div id="popup_box" style="display:block;">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">  &#9660; </a>    
	<h2>Agregar Producto</h2>
			<div class="input_izq" style="width:100%;">
			<p><select name='es_producto' id='es_producto' class='select' > <option value="si"> Producto </option><option value="no"> Servicio </option> </select></p>

			<p><input name='prod_cod'  id='prod_cod' type='text'  value='' placeholder='Ingrese Codigo' class='' onchange="BuscarProducto(this.value)"></p>
			</div>
			<br>
			<div id="prod">   
			
			</div>
			<input style="float: right;margin-right: 9%;margin-bottom: 2%;width: 83%;" type='button' name='btnAlta' id='btnAlta' value='Agregar' onclick="agregarenFactura();" >
</div>
<!--- fin Agregar   ---->


<form  action="../model/guardarFacturaM.php" method="post">

	<div  style="margin-left:5%;margin-top:2%;font-size:15px;">
	<hr> 
		Tarjeta <input type="checkbox" name="tarjeta" value="1" style="margin-right:5%">
		N. Factura
			<input style="font-size:15px;" name="numero"  id="numero" value='0'  >
		Fecha
			<input style="font-size:15px;" name="fecha"  id="fecha" value='<?php echo date('Y-m-d'); ?>'  >
		Cliente 
			<select style="font-size:15px;" name="cliente"  id="cliente" >
				<?php foreach ($cliente as $key =>$value ){ ?>
									<option value='<?php echo $value['id']; ?>'> <?php echo $value['apellido'];  ?> </option> 
								<?php	}?>
			</select>
		Total Factura 
			<input  readonly="readonly" style="font-size:15px;" name="totalTotal"  id="totalTotal" value='0' >
	</div>
	<hr>
	<div id="newDiv"></div>
	<!--- Tabla   ---->
	<div class="di" id="di" >
		<div class="divtabla">
			<table id="tabla">
			
				<caption> Detalle Factura</caption>
				<thead>
				<tr >		
					<td style="text-align:center" >Producto</td>
					<td style="text-align:center" >Cod.</td>
					<td style="text-align:center" >Categoria</td>
					<td style="text-align:center" >Precio Unit.</td>
					<td style="text-align:center" >Unidades</td>
					<td style="text-align:center" >Subtotal</td>
					<td style="text-align:center" >Descuento</td>
					<td style="text-align:center" >Total</td>
					<td>&nbsp;</td>
				</tr>
				</thead>
					<input type="hidden" name="cant" id="can"  >	
	
			</table>
			<input type="submit"  value="Agregar">
			<input type="button" value="Cancelar"  onclick="history.back()">	
		</div>	
	</div>
	<!--- fin Tabla   ---->

<script type="text/javascript" >	
	
	document.getElementById('can').value=1;
	document.getElementById("prod_cod").focus();
	document.getElementById("prod_cod").style.fontSize='150%';
	
	
	function BuscarProducto(str)
	{
		var xmlhttp;

		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("prod").innerHTML=xmlhttp.responseText; 
			}
		}
		
		xmlhttp.open("POST","../model/prod.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var esprod= document.getElementById("es_producto").value;
		xmlhttp.send("cod_prod="+str+"&es_producto="+esprod);

	}
	
	function agregarenFactura(){
		var id= document.getElementById("prod_id").value;
		var cat=document.getElementById("prod_cat").value;
		var prec=document.getElementById('prod_precio').value;
		var nombre= document.getElementById('prod_nombre').value;
		var cod= document.getElementById('prod_cod').value;
		var cant= document.getElementById('can').value;
		var id_cat_prod= document.getElementById('id_cat_producto').value;
		
		//cantidad original es 1 ya que el titulo cuenta como 1 row
		var table = document.getElementById("tabla");
		//alert(table.rows.length);
		
		var ant=table.rows.length-1;
		if(table.rows.length > 1){ //aviso que el anterior esta sin completar sin contar la primera columna o sea la row 2
			if( document.getElementById('unidades['+(ant)+']').value == '' ){
				alert( 'complete la fila anterior');
				document.getElementById('popup_box').style.display='none';
				document.getElementById('unidades['+(ant)+']').focus();
				exit;
			}
		}
		
		nue= table.rows.length; //donde lo inserto
		var row = table.insertRow(nue);
		
		//color a celdas impares y pares
		if (nue %2==0) table.rows[cant].style.backgroundColor = "white";
					else table.rows[nue].style.backgroundColor = "#ddd"; 
					
		// Inserto celdas
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
		var cell9 = row.insertCell(8);
		
		// agrego a las celdas el contenido 
		cell1.innerHTML = "<input type='text' readonly='readonly' id='producto["+nue+"]' name='producto["+nue+"]' value='"+nombre+"'  ></input>";
		cell2.innerHTML = "<input type='text' readonly='readonly' id='cod["+nue+"]' name='cod["+nue+"]'  value="+cod+" ></input>";
		cell3.innerHTML = "<input type='text' readonly='readonly' id='categoria["+nue+"]' name='categoria["+nue+"]'  value="+cat+" ></input>";
		cell4.innerHTML = "<input type='text' readonly='readonly' id='precio_unit["+nue+"]' name='precio_unit["+nue+"]'  size='6' value="+prec+" ></input>";
		
		cell5.innerHTML = "<input type='text'  id='unidades["+nue+"]'  onkeyup='validar(this.id)' onchange='calcularU(this.value, "+nue+")' name='unidades["+nue+"]'  size='4'   ></input>";
		cell6.innerHTML = "<input type='text'  id='subtotal["+nue+"]'  name='subtotal["+nue+"]' size='6' readonly='readonly' ></input>";
		cell7.innerHTML = "<input type='text'  id='descuento["+nue+"]'  onkeyup='validar(this.id)' onblur='calcularD(this.value, "+nue+")' name='descuento["+nue+"]' value='0' size='6'  ></input>";
		cell8.innerHTML = "<input type='text' id='total["+nue+"]' name='total["+nue+"]' onchange='calcularT(this.value, "+nue+")' size='6' readonly='readonly' value='0'></input> ";
		cell9.innerHTML = "<a onclick='borrar("+nue+");' href='#' > &#10006; </a></td> ";
		
		/*agrego un hidden
		var newinp = document.createElement('div');
        newinp.innerHTML = "<br><input type='hidden' name='id_cat_prod' id='id_cat_prod' value="+id_cat_prod+">";
        document.getElementById('newDiv').appendChild(newinp);
		*/
		//alert('deshabilitar'+(nue-1) );
		deshabilitar(nue-1);
		document.getElementById('prod_cod').value='';
		document.getElementById('prod').innerHTML="";
		document.getElementById('unidades['+nue+']').focus();
		document.getElementById('popup_box').style.display='none';
		
		//actualiza el contador
		document.getElementById('can').value= parseInt(document.getElementById('can').value) + parseInt(1);
	}
	
	function deshabilitar(cant){
		c = cant;
		if(cant > 0){
			document.getElementById('producto['+c+']').readOnly = true; document.getElementById('producto['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('cod['+c+']').readOnly = true; document.getElementById('cod['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('categoria['+c+']').readOnly = true; document.getElementById('categoria['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('precio_unit['+c+']').readOnly = true; document.getElementById('precio_unit['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('unidades['+c+']').readOnly = true; document.getElementById('unidades['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('subtotal['+c+']').readOnly = true; document.getElementById('subtotal['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('descuento['+c+']').readOnly = true; document.getElementById('descuento['+c+']').style.backgroundColor = "#ddd";
			document.getElementById('total['+c+']').readOnly = true; document.getElementById('total['+c+']').style.backgroundColor = "#ddd";
		}
	}
	
	function borrar(num){
		//descontar del totaltotal
		
		document.getElementById('totalTotal').value = document.getElementById('totalTotal').value - document.getElementById("total["+num+"]").value;
		document.getElementById("tabla").deleteRow(num);
		document.getElementById('can').value= parseInt(document.getElementById('can').value) - parseInt(1);
	}
	
	function calcularU(unidades , c){
		
		var precio = document.getElementById('precio_unit['+c+']').value;
		document.getElementById('subtotal['+c+']').value = unidades * precio;
		document.getElementById('descuento['+c+']').value = 0 ;
		document.getElementById('total['+c+']').value = unidades * precio ;
		calcularT( '',c);
	}
	
	function calcularD(descuento , c){
		
		document.getElementById('total['+c+']').value = document.getElementById('subtotal['+c+']').value;
		var subtotal = document.getElementById('subtotal['+c+']').value;
		document.getElementById('total['+c+']').value = subtotal - descuento;
		calcularT( '',c);
	}
	
	function calcularT(total , c){
		var tot=0;
		if (c == 1){
			document.getElementById('totalTotal').value = document.getElementById('total['+c+']').value;
		}else{
				for( i=1 ; i <= c ; i++ ){
					tot= tot + parseFloat(document.getElementById('total['+i+']').value);
				}
			document.getElementById('totalTotal').value = parseFloat(tot);
		}
	}
	
	function validar(id){ 
	var n= document.getElementById(id).value;
	if (!/^([0-9])*[.]?[0-9]*$/.test(n)  ){
			alert("Campo que procesa numeros");	
			document.getElementById(id).value=0;
	}
}
	
</script>

<script>
$(window).keypress(function(e) {
    if(e.keyCode == 13) {
        agregarenFactura();
	}
	if(e.keyCode == 43) {
        document.getElementById("linkAlta").click(); 
	}
});
</script>