function nuevoAjax(){
var xmlhttp=false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(E){
xmlhttp = false;	
}	
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
xmlhttp = new XMLHttpRequest();	
}
return xmlhttp;
}

//BUSCAR DNI
function validarDNI(){
resultado = document.getElementById('mostrar'); //tomas donde mostrar
dni=document.getElementById("dni").value; // tomas el dni

ajax=nuevoAjax();
ajax.open("POST", "../model/existedni.php",true); //( POST en este caso)
ajax.onreadystatechange=function() { 
if (ajax.readyState==4) { 

resultado.innerHTML = ajax.responseText //imprime el resultado de la pagina3.php en el div
}
}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("dni="+dni) //envia el dni en una variable llamada dni
}