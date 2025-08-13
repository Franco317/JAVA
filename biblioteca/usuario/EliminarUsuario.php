<?php

$id=$_GET['Id_usuario'];//Idusuario
				
$User='root';
$Pass='';
$Server='localhost';
$Base='biblioteca';//BD

			
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);//connect
			 
			 

			$query="DELETE FROM usuarios WHERE Id_usuario='$id' ";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());
				echo "se elimino el dato";//cambio
			
			

			
		$resultado=mysqli_close($Connect);//connect
	?>
