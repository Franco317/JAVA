<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
				
				$User='root';
				$Pass='';
				$Server='localhost';
				$Base='prueba franco';

			/*$ID_Alum=$_POST['ID_Alum'];
			
*/
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);

			if(isset($_POST['enviar']))
			{
				$id= $_POST['ID_Barrio'];
				$Nom_Barr=$_POST['Nombre_Barrio'];
				
				
				$query="UPDATE barrios SET Id_Barrio='$id', Nombre_Barrio='$Nom_Barr' where ID_Barrio = '$id'";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());
				echo "se modificaron correctamente los datos";
			}
			else
			{
				$ID= $_GET['ID'];
				$query="SELECT * FROM barrios where ID_Barrio = '$ID'";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());

				if (mysqli_num_rows($resultado)>0) 
					{
						while ($registro = mysqli_fetch_array($resultado)) 
								{
									?>
								<form method="POST" action="ModificaBarrio.php">
									<label>id</label>
									<input type="text" name="ID_Barrio" value="<?PHP echo $registro[0]; ?>"><br>
									<label>Nombre</label>
									<input type="text" name="Nombre_Barrio" value="<?PHP echo $registro[1]; ?>"><br>
						
									
						
									<input type="submit" name="enviar" value="guardar">
									<input type="reset" name="cancelar" value="Restablecer">
								</form>
				<?php  
								}	
					}
			}
	mysqli_close($Conexion);
?>








</body>
</html>