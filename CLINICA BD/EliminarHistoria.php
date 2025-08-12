<?php

$id=$_GET['id_historia'];
				
$User='root';
$Pass='';
$Server='localhost';
$Base='clinica';//BD

			
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);//connect
			 
			 

			$query="DELETE FROM historiaclinica WHERE id_historia ='$id' ";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());
				echo "se elimino el dato";//cambio
			
			

			
		$resultado=mysqli_close($Connect);//connect
	?>