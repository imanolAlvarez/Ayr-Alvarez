
<!--- Modificar    ---->

<div  class="contenedor" >  
	<h2>Modificar Usuario</h2>

		<!-- <form action='../controller/Usuario/form_alta_usuario.php' method='post' name='frm' > -->
		<form id="test-form" class="white-popup-block mfp-hide" action='../controller/Usuario/form_modif_usuario.php' method='post'>
			<p>Username: <input name='username'  id='username' type='text'  value='<?php echo $username;?>'  class='' required></p>
			
			<p>Password: <input name='password'  id='password' type='text'  value='<?php echo $password;?>'  class='' required></p>
			<p>Repetir Password: <input name='re-password'  id='re-password' type='text'  value=''  class='' required></p>
			<p>Activo: <select name='activo'  id='activo'  required >
            	<?php if ($activo == 1){?>
							<option value='1' SELECTED >Si</option>
							<option value='0' >No</option>
                       <?php }else {?>
                        	<option value='1'>Si</option>
							<option value='0'  SELECTED >No</option>
				<?php	}?>
						
						</select></p>
			<p>Perfil: <select name='perfil' id='perfil' onclick='' required></p>
            			<?php if ($id_perfil == 1){?>
							<option value='1' SELECTED>Administrador</option>
							<option value='2' >Secretaria</option>
                         <?php }else {?>
                            		<option value='1' >Administrador</option>
									<option value='2'SELECTED >Secretaria</option>
                                    	<?php	}?>
						</select></p>
			<input name='id'  id='id' type='hidden'  value='<?php echo $idmod;?>'  class='' >
			 <input type='submit' name='btnMod' value='Modificar'>
			 <input type='reset' name='btnLimp' value='Limpiar'>
			 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
		 </form>
</div>
<!--- fin Modificar   ---->

