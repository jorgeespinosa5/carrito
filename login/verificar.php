<?php
session_start();
include "../conexion.php";
$re=$con->query("select * from usuarios where 
				usuario='".$_POST['Usuario']."' AND 
 				password='".$_POST['Password']."'")	
				 or die(mysql_error());

	while ($f=mysqli_fetch_array($re)) {
		$id=$f['idUsuario'];
		$tipo=$f['tipo'];
	}

	if(isset($id)){
		$_SESSION['Usuario']=$id;

		if ($tipo==1) {
			header("Location: ../index.php");
		}
		
		if ($tipo==2) {
			header("Location: ../admin.php");
		}
		if ($tipo==3) {
			header("Location: ../dashboard.php");
		}
		
		}
		else
		{
		header("Location: ../login.php?error=datos no validos");
		}
?>