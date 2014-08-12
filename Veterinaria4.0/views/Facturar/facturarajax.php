
<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="loadPopupBox('#popup_box');"  >  &#9658; Agregar Producto  </a> </div>
<!--- Agregar    ---->

<div id="popup_box" style="display:block;">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">  &#9660; </a>    
	<h2>Agregar Producto</h2>
			
			<p>Codigo: <input name='prod_cod'  id='prod_cod' type='text'  value=''  class='' onchange="BuscarProducto(this.value)"></p>
			<div id="prod"></div>
			<input type='button' name='btnAlta' id='btnAlta' value='Agregar' onclick="agregarenFactura();" >
</div>
<!--- fin Agregar   ---->


<form  action="../model/guardarFacturaM.php" method="post">

	<div  style="margin-left:15%;margin-top:2%;font-size:15px;">
	<hr> 
		N&uacute;mero
			<input style="font-size:15px;" name="numero"  id="numero" value='123'  >
		Fecha
			<input style="font-size:15px;" name="fecha"  id="fecha" value='<?php echo date('Y-m-d'); ?>'  >
		Cliente 
			<input style="font-size:15px;" name="cliente"  id="cliente" value='' placeholder="..." >
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
			<input type="button" value="Cancelar"  onclick="cancelarFactura()">	
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
		xmlhttp.send("cod_prod="+str);

	}
	
	function agregarenFactura(){
		var id= document.getElementById("prod_id").value;
		var cat=document.getElementById("prod_cat").value;
		var prec=document.getElementById('prod_precio').value;
		var nombre= document.getElementById('prod_nombre').value;
		var cod= document.getElementById('prod_cod').value;
		var cant= document.getElementById('can').value;
		var id_cat_prod= document.getElementById('id_cat_producto').value;
		
		
		var table = document.getElementById("tabla");
		
		deshabilitar(cant);
		
		var row = table.insertRow(cant);
		
		//color a celdas impares y pares
		if (cant %2==0) table.rows[cant].style.backgroundColor = "white";
					else table.rows[cant].style.backgroundColor = "#ddd"; 
					
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
		cell1.innerHTML = "<input type='text' readonly='readonly' id='producto["+cant+"]' name='producto["+cant+"]' value='"+nombre+"'  ></input>";
		cell2.innerHTML = "<input type='text' readonly='readonly' id='cod["+cant+"]' name='cod["+cant+"]'  value="+cod+" ></input>";
		cell3.innerHTML = "<input type='text' readonly='readonly' id='categoria["+cant+"]' name='categoria["+cant+"]'  value="+cat+" ></input>";
		cell4.innerHTML = "<input type='text' readonly='readonly' id='precio_unit["+cant+"]' name='precio_unit["+cant+"]'  size='6' value="+prec+" ></input>";
		
		cell5.innerHTML = "<input type='text'  id='unidades["+cant+"]'  onkeyup='validar(this.id)' onchange='calcularU(this.value, "+cant+")' name='unidades["+cant+"]'  size='4'   ></input>";
		cell6.innerHTML = "<input type='text'  id='subtotal["+cant+"]'  name='subtotal["+cant+"]' size='6' readonly='readonly' ></input>";
		cell7.innerHTML = "<input type='text'  id='descuento["+cant+"]'  onkeyup='validar(this.id)' onblur='calcularD(this.value, "+cant+")' name='descuento["+cant+"]'  size='6'  ></input>";
		cell8.innerHTML = "<input type='text' id='total["+cant+"]' name='total["+cant+"]' onchange='calcularT(this.value, "+cant+")' size='6' value=''  readonly='readonly'></input> ";
		cell9.innerHTML = "<a onclick='borrar("+cant+");' href='#' > &#10006; </a></td> ";
		
		/*agrego un hidden
		var newinp = document.createElement('div');
        newinp.innerHTML = "<br><input type='hidden' name='id_cat_prod' id='id_cat_prod' value="+id_cat_prod+">";
        document.getElementById('newDiv').appendChild(newinp);
		*/
		
		document.getElementById('prod_cod').value='';
		document.getElementById('prod').innerHTML="";
		document.getElementById('unidades['+cant+']').focus();
		document.getElementById('popup_box').style.display='none';
		
		document.getElementById('can').value= parseInt(document.getElementById('can').value) + parseInt(1);
	}
	
	function deshabilitar(cant){
		c = cant-1;
		if(cant > 1){
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
		document.getElementById('totalTotal').value = document.getElementById('totalTotal').value - document.getElementById("total"+num).value;
		document.getElementById("tabla").deleteRow(num);
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