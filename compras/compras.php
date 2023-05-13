<?php
session_start();
include "../conexion.php";

if(isset($_SESSION['Usuario'])){

        $usuario=$_SESSION['Usuario'];
		$arreglo=$_SESSION['carrito'];
		$numeroventa=0;
		$rechazado=0;
		$re=$con->query("select * from compras order by numeroventa DESC limit 1") or die(mysql_error());	
while ($f=$re->fetch_array()) {
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}
for($i=0; $i<count($arreglo);$i++){

	$re=$con->query("select idProducto, existencia from productos 
	where idProducto=".$arreglo[$i]['Id']);

		while (	$f=$re->fetch_array()) {
					$existencia=$f['existencia'];	
				} //fin del while

		if ($arreglo[$i]['Cantidad'] <= $existencia){
			$con->query("insert into compras (numeroventa,precio,
			cantidad,subtotal,fecha,productoId,usuarioId) values(
				".$numeroventa.",
		        '".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."',
				CURRENT_DATE(),
				'".$arreglo[$i]['Id']."',
                '".$usuario."'
                )");
			} //fin del if
			else {
				$rechazado=1;
			}//Fin del else
			} //fin del for 
unset($_SESSION['carrito']);
header("Location: ../nota.php?rechazado=".$rechazado."&numventa=".$numeroventa."");
	  
	}
	else 
	{
     header("Location: ../login.php");
  	 }
	
?>