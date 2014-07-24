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
            unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box');
        });
		$('#linkAlta2').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box2');
        });
		$('#linkAlta3').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box3');
        });
		$('#linkAlta4').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box4');
        });
			$('#linkAlta5').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box5');
        });
			$('#linkAlta6').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box7');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box6');
        });
			$('#linkAlta7').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');
			unloadPopupBox('#popup_box8');
			loadPopupBox('#popup_box7');
        });
			$('#linkAlta8').click( function() {            
            unloadPopupBox('#popup_box');
			unloadPopupBox('#popup_box2');
			unloadPopupBox('#popup_box3');
			unloadPopupBox('#popup_box4');
			unloadPopupBox('#popup_box5');
			unloadPopupBox('#popup_box6');				
			unloadPopupBox('#popup_box7');				
			loadPopupBox('#popup_box8');
        });
		
		
        $('#popupBoxClose').click( function() {            
            unloadPopupBox('#popup_box');
        });
        $('#popupBoxClose2').click( function() {            
            unloadPopupBox('#popup_box2');
        });
        $('#popupBoxClose3').click( function() {            
            unloadPopupBox('#popup_box3');
        }); 
		$('#popupBoxClose4').click( function() {            
            unloadPopupBox('#popup_box4');
        });
		$('#popupBoxClose5').click( function() {            
            unloadPopupBox('#popup_box5');
        });
		$('#popupBoxClose6').click( function() {            
            unloadPopupBox('#popup_box6');
        });
		$('#popupBoxClose7').click( function() {            
            unloadPopupBox('#popup_box7');
        });
		$('#popupBoxClose8').click( function() {            
            unloadPopupBox('#popup_box8');
        });
	
 /**************funciones generales***************************************/ 		
        function unloadPopupBox(id) {    // TO Unload the Popupbox
            $(id).fadeOut(5);
            
        }    
        
        function loadPopupBox(ide) {    // To Load the Popupbox
            $(ide).fadeIn(500);
			$(ide).css({  "opacity": "1" , "border":"4px outset #fff"  });           
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











/*


window.onload=function(){	ocultartodos(); 

	$(".bt_plus").each(function (el)	
	{
		
		$(this).bind("click",addField);
	});
	
	};
//$(document).ready(function(){
		//ocultartodos();

//asigno el evento click a cada boton de la clase bt_plus y llamo a la funcion addField	
	

//});
	
	
//
		function addField(){     						
	// ID del elemento div quitandole la palabra "div_" de delante. Pasi asi poder aumentar el número.
							var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
							alert($(this).parent('div').type);
							if (clickID == 1){
								codi=document.getElementById('codigo[]').value;
							}
							else{
								codi=document.getElementById('codigo'+clickID).value;
							}
							
							if (codi != ''){
								var newID = (clickID+1);// Genero el nuevo numero id

								$newClone = $('#div_'+clickID).clone(true);// Creo un clon del elemento div que contiene los campos de texto

								$newClone.attr("id",'div_'+newID);		//Le asigno el nuevo numero id

								el_name=$newClone.children("input").eq(0).attr("name");

								//Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
								$newClone.children("input").eq(0).attr("id",'codigo'+newID).val('');
								$newClone.children("input").eq(0).attr("name",el_name+clickID).val('');
								
								$newClone.children("input").eq(0).val('');		//Borro el valor del segundo campo input(este caso es el campo de cantidad)

								$newClone.children("input").eq(1).attr("id",newID);		//Asigno nuevo id al boton							

								$newClone.insertAfter($('#div_'+clickID));		//Inserto el div clonado y modificado despues del div original

								$("#btn"+clickID).val('-').unbind("click",addField);		//Cambio el signo "+" por el signo "-" y le quito el evento addfield
								
								$(':input[tabindex=\'' + (newID+'1' )+ '\']').focus();
								$(':input[tabindex=\'' + (newID+'1' )+ '\']').select();

								//Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
								$("#div_"+clickID).bind("click",delRow);																	   
							}
							
							
						}
	//					
				/*		function delRow() {
								var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
								if( clickID = 1){
									var cant = document.getElementById('cantidad[]').value;	
									var precio = document.getElementById('precio[]').value;	
								}
								else{
									var cant = document.getElementById('cantidad'+clickID).value;
									var precio = document.getElementById('precio'+clickID).value;	
									
								}
						// Funcion que destruye el elemento actual una vez echo el click
						$(this).parent('div').remove();
						}
				*/
	//					
			/*			function mostrarCombo(idcheck,iddiv){
							//alert(idcheck+" "+iddiv);
							var checkeado= document.getElementById(idcheck).checked;
							
							  if (checkeado)
							  {
									document.getElementById(iddiv).style.display = 'block';  
							  }else {
									document.getElementById(iddiv).style.display = 'none'; //alert(iddiv.getElementsByTagName('div')[0].id);
							  }
							
						}
						
						function ocultartodos(){
						//alert(document.frm.getElementsByTagName('div')[0].getAttribute("ocultar"));
							for($a=0; $a<document.frm.getElementsByTagName('div').length ; $a++){
								if(document.frm.getElementsByTagName('div')[$a].getAttribute("ocultar") == "si"){
									document.frm.getElementsByTagName('div')[$a].style.display="none"; 
								}
							}
						}

//-------------			
						function mostrardiv(idcheck,iddiv){
							//alert(idcheck+" "+iddiv);
							var checkeado= document.getElementById(idcheck).checked;
							
							  if (checkeado)
							  {
									document.getElementById(iddiv).style.display = 'block';  
							  }else {
									document.getElementById(iddiv).style.display = 'none'; //alert(iddiv.getElementsByTagName('div')[0].id);
							  }
							
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


