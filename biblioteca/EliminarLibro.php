<?php

$id=$_GET['Id_libro'];
				
$User='root';
$Pass='';
$Server='localhost';
$Base='biblioteca';

			
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);
			 
			 

			$query="DELETE FROM libros WHERE Id_Libro='$id' ";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());
				echo "se elimino el dato";
			
			

			
		$resultado=mysqli_close($Connect);
	?>

