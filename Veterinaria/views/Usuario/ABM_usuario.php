

<div class="alta" ><a href='#' class="linkAlta" id='linkAlta' onclick="mostrar('altaform')" >  &#9658; Agregar  </a> </div>
<!--- Agregar    ---->

<div id="popup_box" >    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">  &#9660; </a>    
	<h2>Complete el Formulario de Alta</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Usuario/form_alta_usuario.php' method='post'>
			<p>Username: <input name='username'  id='username' type='text'  value=''  class='' required></p>
			<p>Password: <input name='password'  id='password' type='text'  value=''  class='' required></p>
			<p>Repetir Password: <input name='re-password'  id='re-password' type='text'  value=''  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
						<option value='0' >Seleccione...</option>
						<option value='1' >Si</option>
						<option value='0' >No</option>
						</select></p>
			<p>Perfil: <select name='perfil' id='perfil' onclick='' required></p>
							<option value='0' >Seleccione...</option>
							<option value='1' >Administrador</option>
						</select></p>
			
			 <input type='submit' name='btnAlta' id='btnAlta' value='Crear usuario'>
			 <input type='reset' name='btnLimp' id='btnLimp' value='Limpiar'>
		 </form>
</div>
<!--- fin Agregar   ---->

<!--- Tabla   ---->
<div class="di" id="di" >
	<div class="divtabla">
		<table id="example">
		
			<caption> Lista de Usuarios </caption>
            <thead>
			<tr >
					<td> Username </td>
					<td> Perfil </td>
					<td> Editar </td>
					<td> Eliminar </td>
			</tr>
            </thead>
			<?php
			for( $z=0 ; $z < count($users) ; $z++ ){  ?>
					
				<tr class="trfino" >
					<td><p> <?php echo $users[$z][1]; ?></p> </td>
					<td><p> <?php echo $users[$z][2]; ?>   </p></td>
					<td><p><a href="../controller/modificar_usuario.php?idusreditar=<?php echo $users[$z][0]; ?>">  <img  src='../img/edit.png'> </a></p></td>
					<td><p><a onClick="javascript: return confirm('Estas seguro?');" href="../controller/Usuario/form_baja_usuario.php?idusrborrar=<?php echo $users[$z][0]; ?>"> <img class='' src='../img/delete.png'>  </a></p></td>
				</tr>
			<?php } ?>	
		</table>
	</div>
</div>
<!--- fin Tabla   ---->



