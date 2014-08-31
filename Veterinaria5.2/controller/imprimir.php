<?php

require "../model/login.php";
require "../model/cuponabm.php";
sessioncheck();

$sesion_username = $_SESSION['username'];
$sesion_perfil = $_SESSION['perfil'];

$c= new Cupon();

$idcupon= $_GET['idcupon'];
$cupon= $c->getCupon($idcupon);

/************Datos************/
$cliente= $cupon[0]->apellido.', '.$cupon[0]->nombre;
$mail= $cupon[0]->mail;
$tel= $cupon[0]->tel;
$promo= $cupon[0]->promocion;
$titulo='Con el siguiente cup&oacute;n particip&aacute; de....';
$fhoy= date("Y-m-d");  
$fdesde= $cupon[0]->fechaini;
$fhasta= $cupon[0]->fechafin;
$desc= 'Promoci&oacute;n v&aacute;lida desde '.$fdesde.' hasta '.$fhasta.'. Para participar en el Sorteo ... Bases y condicione en Stand de Informes del Pasaje Rodrigo';
/******************************/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/estilos_impresion.css" rel="stylesheet" type="text/css" media="print">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>imprimir Cup&oacute;n</title>
</head>

<body>


<table width="80%" border="0" cellpadding="0" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#666; background-color:#EDEBDD; border: #9B2520 9px solid; padding:25px;margin:0 auto; ">
  <tr>
    <th width="40%" align="left" scope="row"><img src="http://www.umoh.com.ar/logo_pasaje_color.png" alt="Pasaje Rodrigo" width="182" height="101" /></th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="center"><p style="color: #9B2520; font-size:15px" ><strong>PROMOCI&Oacute;N:</strong></p>
    <p><?php echo $promo; ?></p>
    <p><?php echo $titulo; ?></p></td>
  </tr>
  <tr>
    <th width="40%" style="color: #9B2520"  scope="row">&nbsp;</th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="right"><?php echo $fhoy; ?></td>
  </tr>
  <tr>
    <th width="40%" style="color: #9B2520"   align="left" scope="row">NOMBRE Y APELLIDO</th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="left"><?php echo $cliente; ?></td>
  </tr>
  <tr>
    <th  style="color: #9B2520" width="40%" align="left" scope="row">EMAIL</th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="left"><p><?php echo $mail; ?></p></td>
  </tr>
  <tr>
    <th width="40%"style="color: #9B2520"   align="left" scope="row">TEL&Eacute;FONO</th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="left"><?php echo $tel; ?></td>
  </tr>
  <tr>
    <th width="40%" align="left" scope="row">&nbsp;</th>
    <td width="5%">&nbsp;</td>
    <td width="55%" align="left">&nbsp; </td>
  </tr>
   <tr > <td colspan='3'><?php echo '*'.$desc; ?></td></tr>
</table>
<input type="button" name="imprimir"  style="margin-left:46%;margin-top:2%;width:100px;border: 1px solid #ccc;border-radius: 10px;padding:0.5em" value="Imprimir" class='imp' onclick="window.print();">

</body>
</html>