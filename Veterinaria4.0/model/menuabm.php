<?php
require_once "db.php";
class MenuABM
{
	function cargarMenu($txtPerfil )
	{ 

		switch ($txtPerfil){
			case 'Administrador':
				$txtPerfil='%Administrador%';
			break;
			case 'Secretaria':
				$txtPerfil='%Secretaria%';
			break;
		}
		
		$conn = conectar(); //funcion que conecta con bd
		try
		{		
				$gsent = $conn->prepare('SELECT * FROM menu WHERE activo = 1  AND perfil like :perfil  ORDER BY orden');
				$gsent->bindParam(':perfil', $txtPerfil, PDO::PARAM_STR, 12);
				$gsent->execute();
				
		}
		catch(PDOException $e)
		{
			echo "ERROR: " . $e->getMessage();
		}		
		
		return $gsent; 
	}	
	
	function cargarMenuHijo($txtPerfil ,$Padre)
	{ 

		switch ($txtPerfil){
			case 'Administrador':
				$txtPerfil='%Administrador%';
			break;
			case 'Secretaria':
				$txtPerfil='%Secretaria%';
			break;
		}
		
		$conn = conectar(); //funcion que conecta con bd
		try
		{		
				$gsent = $conn->prepare('SELECT * FROM menu WHERE activo = 1  AND perfil like :perfil AND padre = :padre ORDER BY orden');
				$gsent->bindParam(':perfil', $txtPerfil, PDO::PARAM_STR, 12);
				$gsent->bindParam(':padre', $Padre, PDO::PARAM_INT);
				$gsent->execute();
				//var_dump($gsent->fetch());
			//die($Padre);
		}
		catch(PDOException $e)
		{
			echo "ERROR: " . $e->getMessage();
		}		
		
		return $gsent; 
	}	
}	

//sin uso ************************************************************************** ABM menu	
/*	function selMenu($txtId = 0)
	{
		$obj_data=new Query();
		if ($txtId==0)
			$sql = "SELECT * FROM menu";
		else
			$sql = "SELECT * FROM menu WHERE id_menu = ".$txtId;
		$result=$obj_data->executeQuery($sql);
		return $result; 
	}	

	function selMenuLista($txtId = 0)
	{
		$obj_data=new Query();
		if ($txtId==0)
			$sql = "SELECT id_menu, descripcion, 1 AS activo FROM menu WHERE id_menu > 0";
		else
			$sql = "SELECT id_menu, descripcion, 1 AS activo FROM menu WHERE id_menu = ".$txtId;
		$result=$obj_data->executeQuery($sql);
		return $result; 
	}	

	function selMenuExist($txtUsr)
	{
		$obj_data=new Query();
		$sql = "SELECT * FROM menu WHERE descripcion = '".$txtDes."'";
		$result=$obj_data->executeQuery($sql);
		return $result; 
	}	

	function insMenu($txtDes)
	{
		$result = $this->selMenuExist($txtDes);
		if(mysql_num_rows($result)==0)
		{
			$obj_data=new Query();
			$sql = "INSERT INTO menu ";
			$sql .= "(descripcion) ";
			$sql .= "VALUES ('".$txtDes."')";
			$obj_data->executeQuery($sql);
			return $obj_data->getInsertId();
		}
		else
		{
			return -3; 
		}
	}	

	function updMenu($txtId, $txtDes)
	{
		$result = $this->selMenuExist($txtDes);
		if(mysql_num_rows($result)==0)
		{
			$obj_data=new Query();
			$sql = "UPDATE menu SET ";
			$sql .= "descripcion = '".$txtDes."' ";
			$sql .= "WHERE id_menu = ".$txtId;
			$obj_data->executeQuery($sql); 
			return $txtId;
		}
		else
		{
			return -3; 
		}
	}

	function updMenuActivo($txtId, $txtActivo)
	{
		$obj_data=new Query();
		$sql="UPDATE menu SET activo = ".$txtActivo." WHERE id_menu = ".$txtId;
		$obj_data->executeQuery($sql); 
		return $txtId;
	}

	function delMenu($txtId)
	{
		$obj_data=new Query();
		$sql = "DELETE FROM menu WHERE id_menu = ".$txtId;
		$obj_data->executeQuery($sql);
		return '<br/>Registros afectados: '.$obj_data->getAffect();
	}	*/

?>