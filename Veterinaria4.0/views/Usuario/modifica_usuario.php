
<div class="di" id="di" >
	
	<h2> Realizar cambios en Usuario y enviar </h2>
		<form action='../controller/execabm.php' method='post' name='frm' id='frmModifica'>
			<p>Username: <input name='username'  id='username' type='text'  value='<? echo $_GET['username']; ?>'  class='' ></p>
			<p>Password: <input name='contrasenia'  id='contrasenia' type='text'  value='<? echo $_GET['contrasenia']; ?>'  class='' ></p>
			<p>Repetir Password: <input name='re-password'  id='re-contrasenia' type='text'  value='<?                   ?>'  class='' ></p>
			<p>Activo: <input name='activo'  id='activo' type='text'  value='1'  class='' ></p>
			<p>Perfil: <select name='perfil' id='perfil' onclick='' ></p>
							<option value='Administrador' >Administrador</option>
							<option value='Secretaria' >Secretaria</option>
						</select></p>
			
			<input type='hidden' name='id' id='id' value='<? echo $_GET['id']; ?>'>
			
			<input type='submit' name='btnMod' id='btnMod' value='Modificar Usuario'>
			<input type='reset' name='btnAlta' id='btnAlta' value='Limpiar'>
			<input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>

	
</div>

