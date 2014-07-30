


<form  action="guardarFacturaM.php" method="post">

<div  style="margin-left:30%;margin-top:2%;font-size:25px;">
<hr> 
	Cliente 
		<input style="font-size:25px;" name="cliente"  id="cliente" value='' placeholder="No es cliente.." >
	Total Factura: 
		<input  readonly="readonly" style="font-size:25px;" name="totalTotal"  id="totalTotal" value='0' >
</div>
<hr>

<table cellpadding="0" cellspacing="0" border="1" align="center" width="90%" >
	    <caption> Detalle factura</caption>
		<tr>
			<td>&nbsp;</td>
		    <td style="text-align:center" >Producto</td>
		    <td style="text-align:center" >Cod.</td>
			<td style="text-align:center" >Descripci&oacute;n</td>
			<td style="text-align:center" >Precio Unit.</td>
			<td style="text-align:center" >Unidades</td>
			<td style="text-align:center" >Subtotal</td>
			<td style="text-align:center" >Descuento</td>
			<td style="text-align:center" >Total</td>
		</tr>	

		<input type="hidden" name="cant" id="can"  >

		<tr id='div_1' class='div_1' style="background-color:#ccc">
			<td id="sd" width="25px" style="text-align:center;"> 
				<input  type='button' id='btn1' value='+' name='btn1' class='bt_plus'  >
			</td>
			<td  style="text-align:center;" > 
				<input type="text"  id="prod" name="prod"  ></input>
			</td> 
			<td style="text-align:center;" >
				<input type="text" step="any"   id="cod" name="cod"  ></input>
			</td>	
			<td style="text-align:center;" >
				<input type="text" step="any"  id="descripcion" name="descripcion" ></input>
			</td>
			
			<!--A completar -->
			<td  style="text-align:center;"  >
				<input type='text'  id="precio_unit" name="precio_unit"  size='6'   ></input>
			</td>
			<td  style="text-align:center;"  >
				<input type='text'  id="unidades" name="unidades"  size='4'   ></input>
			</td><!--onChange='calcular(this.id,1)'-->
			
			<td  style="text-align:center;" >
				<input type='text'  id="subtotal" name="subtotal" size='6'  ></input>
			</td >
			<td  style="text-align:center;" >
				<input type="text" step="any"   id="descuento"  name="descuento"  size='6' ></input>
			</td><!--onChange='calcular(this.id,1)'-->
			<td  style="text-align:center;" >
				<input type='text' id="total" name="total" onChange='calcular(this.id,1)'  size='6'   ></input>
			</td> <!---->
		</tr> 
</table>


<input type="submit" class="botones" value="Agregar">
<input type="button" value="Cancelar" class="botonesc" onclick="cancelarFactura()">
	
	
<input type="hidden" id="filaActual" value="filaPar" />
<input type="hidden" name="cantdivs" id="cantdivs"  >

<script type="text/javascript" >	
	window.onload=cargardivss();	
</script>