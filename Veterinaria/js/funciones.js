//-------------
/*
function mostrar(id){
		if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}

window.onload = function(){mostrar('altaform');}

*/	

    
window.onload=  function() {
    
 /*****************************************************/     
		$('#linkAlta').click( function() {          
			//unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box');
        });
		
        $('#popupBoxClose').click( function() {            
            unloadPopupBox('#popup_box');
        });
 /**************funciones generales***************************************/ 		
        function unloadPopupBox(id) {    // TO Unload the Popupbox
            $(id).fadeOut(5); 
        }    
        
        function loadPopupBox(ide) {    // To Load the Popupbox
            $(ide).fadeIn(500);
			//$(ide).css({  "opacity": "1" , "border":"4px outset #fff"  });           
        }     
 /*****************************************************/ 		
 };
 
function cargarcampos(){
	$('#consumo_x_fecha').html(' Cargando...');
 	var idA = $('#idAnalito').val();

	var CargaMet= '../controller/consumo_x_fecha.php?' ;
	$.post(CargaMet,function (responseText){			
			$('#consumo_x_fecha').html(responseText);
	});
}

function cargardivss(){
	var bot = $('.bt_plus');
	bot.each(function (el)	
	{	
		//alert( parseInt(document.getElementById('numero').value) + parseInt(document.getElementById('numero').value));
		$(this).bind("click",addField);
	});
}

function addField(){  

	var cliente= $('cliente').value;
	   
			   if(cliente=='')
				  {
					 alert('Seleccione cliente');
					 return;
				  }
				  
	// ID del elemento div quitandole la palabra "div_" de delante.asi poder aumentar el número.
	var tr = $(this).parent('td').parent('tr').attr('id');
	
	//var clickID = parseInt(  $(this).parent('div').attr('id').replace('div_','')  );
	var clickID = parseInt(  $(this).parent('td').parent('tr').attr('id').replace('div_','')  );
	
	var ttt;
	if (clickID == 1){
		ttt = document.getElementById('total').value;
	}
	if (clickID > 1){
		var l=$('total'+clickID).value;
		ttt = document.getElementById('total'+clickID).value;
	}
	
	if (ttt != ''){
		var newID = (clickID+1);// Genero el nuevo numero id

		$newClone = $('#div_'+clickID).clone(true);// Creo un clon del elemento div que contiene los campos de texto
		$newClone.attr("id",'div_'+newID);	       //Le asigno el nuevo numero id
		$newClone.attr("name",'div_'+newID);	   //Le asigno el nuevo numero name
		
		/*var block = $('div_'+clickID).getElementsByTagName("input");
		var sel = $('div_'+clickID).getElementsByTagName("select");
		for (i=1;i<block.length;i++){
			block[i].readOnly = true; 
		}
		for (i=0;i<sel.length;i++){
			sel[i].readOnly = true; 
		}*/
		
		document.getElementById("cantdivs").value= newID;
		//alert(document.getElementById("cantdivs").value);
		
		//capturo los campos para modificarlos
		var btn = $newClone.children("td").children(0);  
		var producto = $newClone.children("td").next().find('input');   
		var codigo = $newClone.children("td").next().next().find('input');  
		var categoria = $newClone.children("td").next().next().next().find('input');  
		var precio_unit = $newClone.children("td").next().next().next().next().find('input');   
		var unidades = $newClone.children("td").next().next().next().next().next().find('input');   
		var subtotal=$newClone.children("td").next().next().next().next().next().next().find('input'); 
		var descuento = $newClone.children("td").next().next().next().next().next().next().next().find('input'); 
		var total=$newClone.children("td").next().next().next().next().next().next().next().next().find('input');
		

		resetearYmodificarName('btn',btn,newID);
		resetearYmodificarName('producto',producto,newID);
		resetearYmodificarName('codigo',codigo,newID);
		resetearYmodificarName('categoria',categoria,newID);
		resetearYmodificarName('precio_unit',precio_unit,newID);
		resetearYmodificarName('unidades',unidades,newID);
		resetearYmodificarName('subtotal',subtotal,newID);
		resetearYmodificarName('descuento',descuento,newID);
		resetearYmodificarName('total',total,newID);
		//resetearYmodificarName('cual',cual,newID);
		
		
		$newClone.insertAfter($('#div_'+clickID));	//Inserto el div clonado y modificado despues del div original
		
		//document.getElementById('cual'+newID).value=newID;
		
		$("#btn"+clickID).val('-').unbind("click",addField);	//Cambio el signo "+" por el signo "-" y le quito el evento addfield
		$("#cod"+newID).focus();
		/*$(':input[tabindex=\'' + (newID+'1' )+ '\']').select();*/
	    //Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
		$("#btn"+clickID).bind('click',delRow);	 
		
	//arreglar total...............................
	
	}else{  alert('Complete los campos para agregar otra fila'); }
}

function resetearYmodificarName( nombre, campo, numeroDeNuevoName ){	  
	if(nombre== 'btn'){
		campo.attr('id', nombre+[numeroDeNuevoName]);
		campo.attr('name',nombre+[numeroDeNuevoName]);
		campo.val('+');
	}else{
		campo.attr('id', nombre+[numeroDeNuevoName]);  
		campo.attr('name',nombre+'[' + numeroDeNuevoName + ']');
		campo.val('');
		if( nombre == 'unidades' || nombre == 'descuento' || nombre == 'total')
		{
			campo.attr('onChange','calcular(this.id,' + numeroDeNuevoName + ')');
		}
	}
}


function delRow() {
		var clickID = parseInt(  $(this).parent('td').parent('tr').attr('id').replace('div_','')  );
		if(clickID==1){
		    $('totalTotal').value = $('totalTotal').value - $('total').value;
		}else{
			$('totalTotal').value = $('totalTotal').value - $('total'+clickID).value;
		}
		/*document.getElementById("cantdivs").value=document.getElementById("cantdivs").value - 1;*/
		alert($('totalTotal').value);
		var td = $(this).parent();  
	    var tr = td.parent();
        tr.remove();	
	}
	

function calcular(id,num){
	
	if( document.getElementById(id).value == ''){
		document.getElementById(id).value = 0; 	
		return;
	}
	if( document.getElementById(id).value == '.'){
		document.getElementById(id).value = 0; 	
		return;
	}
	
	if(id == 'descuento' || id == 'unidades' || id == 'producto' || id == 'subtotal' || id == 'total' ){
		var tt= document.getElementById("totalTotal").value;
		switch (id) {
			/*case "producto":
				$("unidades").value = '';
				$("descuento").value = '';
				$("total").value = 0;
				$("totalTotal").value = 0;
				cambiaProducto('producto');	
			break;
			case "unidades":
				validar(id);
				$("total").value = 0;
				$("totalTotal").value = 0;
				actualizarPrecio('unidades');
				descuento('descuento');
			break;
			case "descuento":
				alert('descuenta');
				validar(id);
				document.getElementById("total").value = 0;
				document.getElementById("totalTotal").value = 0;
				actualizarPrecio('unidades');
				descuento('descuento');
			break;*/
			case "total":
				actualizartotalTotal('total',tt);
			break;
		}
	}	
	else{		
			
			switch (id) {
				
				/*case "producto"+num:
					$("descuento"+num).value = '';
					$("totalTotal").value = $("totalTotal").value - $("total"+num).value;
					$("total"+num).value = '';
					cambiaProducto("producto"+num);	
				break;
				case "unidades"+num:
					validar(id);
					$("totalTotal").value = $("totalTotal").value - $("total"+num).value;
					$("total"+num).value = '';
					actualizarPrecio("unidades"+num);
					descuento("descuento"+num);
				break;
				case "descuento"+num:
					validar(id);
					$("totalTotal").value = $("totalTotal").value - $("total"+num).value;
					$("total"+num).value = '';
					actualizarPrecio("unidades"+num);
					descuento("descuento"+num);
					
				break;*/
				case "total"+num:
					actualizartotalTotal("total"+num);
				break;
				
			}
		}	
}

function actualizartotalTotal(id){
		
		if(id == 'total'){
			if(document.getElementById('descuento').value=='')
				document.getElementById('descuento').value=0;
			
			document.getElementById('totalTotal').value = document.getElementById('total').value - document.getElementById('descuento').value;
		}else{ //ej total2
			var num = $(id).id.replace('total','') ;
			var tot=0;//alert(num);	
			
			if(document.getElementById('descuento'+num).value=='')
				document.getElementById('descuento'+num).value=0;
			
			if (num >= 1){ //recalcula totales
				for(i=0 ; i<=num ; i++){
					tot= tot + parseFloat(document.getElementById('total'+num).value);alert('entra tot='+tot);
				}
			}
			
			document.getElementById('totalTotal').value = parseFloat(document.getElementById('total').value) + parseFloat(tot);
		}			
}

function actualizarPrecio(id){ 	alert('actualizaprecio');
		if($(id).value == ''){
		     alert('Seleccione un producto'.$(id).value);
			 return;
		}
		else{
			if( id == 'unidades'){
				$('subtotal').value = $('unidades').value * $('precio_unit').value;
			}else{
				var num = $(id).id.replace('unidades','') ;
				$('subtotal'+num).value = $('unidades'+num).value * $('precio_unit'+num).value;
			}
		}	
}	

function validar(id){ 	alert('validar');
	var n=$(id).value;
	if (!/^([0-9])*[.]?[0-9]*$/.test(n)  ){
			alert("no es un numero  .... boludo");	
			$(id).value=0;
	}
}


function descuento(id){  alert('descontar');
		/*if($$(id).value==''){
			 return;
		}
		else{
			//$$('total').value = $$('subtotal').value - $$('desc').value;
			var tot;
			if( id == 'descuento[]'){
				
				$$('total[]').value = $$('subtotal[]').value - $$('descuento[]').value;
				tot = $$('total[]').value;
			}else{
				var num = $$(id).id.replace('descuento','') ;
				$$('total'+num).value = $$('subtotal'+num).value - $$('descuento'+num).value;
				tot = $$('total'+num).value;
				
			}
			$$('totalTotal').value = parseFloat($$('totalTotal').value) + parseFloat(tot);
		}*/
}
/*
function Check(this1){
	var valor = this1.value; //guardo valor del input
	var clickID = parseInt($(this1).parent('div').attr('id').replace('div_','')); // y el n div
	
	if (this1.id == 'codigo[]'){
		var cod = document.getElementById('codigo[]');	
		var pre = document.getElementById('precio[]');		
	}
	else{
		var cod= document.getElementById('codigo'+clickID);
		var pre = document.getElementById('precio'+clickID);	
		
	}	
		if(valor ==''){
			$(cod).val('');
			$(pre).val('');
			alert("Producto INEXISTENTE");
			return false;
		}
		else{
		    $.ajax(
			{
				async: false,
				type : 'GET',
				url : 'getprecio.php',
				data : 'valor=' + valor,
				success : function(precio) 
				{if(precio != "") {
					pre.value = precio;
				}
				else {
					pre.value = '';
					cod.value = '';
					alert("Ingrese un Código de Producto Existente o realice su Alta");
				}
				}
			});
		}
}*/


