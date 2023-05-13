<?php
include "./conexion.php";
		
			$con->query("insert into Entradas (productoID, precio, cantidad, fecha) value(
				'".$_REQUEST['producto']."',
                '".$_REQUEST['precio']."',
				'".$_REQUEST['cantidad']."',
				'".$_REQUEST['fecha']."'
				)");
		
                
		header("Location: ./index.php");

?>