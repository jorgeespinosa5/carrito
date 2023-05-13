<?php
include "./conexion.php";
		
			$con->query("insert into usuarios (nombre,apellido,usuario,password,sexo,pais,fechanacimiento,tipo) values(
				'".$_REQUEST['nombre']."',
				'".$_REQUEST['apellido']."',
				'".$_REQUEST['Usuario']."',	
				'".$_REQUEST['Password']."',
				'".$_REQUEST['sexo']."',
				'".$_REQUEST['pais']."',
				'".$_REQUEST['fechanacimiento']."',
				1)");
		
		
		header("Location: ./index.php");

?>