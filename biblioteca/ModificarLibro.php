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
				$Base='biblioteca';//base de datos

			
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);

			if(isset($_POST['enviar']))
			{
				$id= $_POST['Id_libro'];
				$Titulo_libro=$_POST['Titulo_libro'];
                $Autor_libro=$_POST['Autor_libro'];
                $Anio_publicacion=$_POST['Anio_publicacion'];//creas variables y le pones el nombre del campo , que se vinculle a las opciones

				
				
				$query="UPDATE libros SET Id_libro='$id',Titulo_libro='$Titulo_libro', Autor_libro='$Autor_libro',
                Anio_publicacion='$Anio_publicacion' where Id_libro = '$id'";//todas las variables vinculadas del php
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());//connect
				echo "se modificaron correctamente los datos";
			}
			else
			{
				$ID= $_GET['Id_libro'];//Id_usuario
                $query="SELECT * FROM libros where Id_libro = '$ID'";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());

				if (mysqli_num_rows($resultado)>0) 
					{
						while ($registro = mysqli_fetch_array($resultado)) //modificausuario
								{
									?>
								<form method="POST" action="ModificarLibro.php"> 
								
									<label>Id</label>
									<input type="text" name="Id_libro" value="<?PHP echo $registro[0]; ?>"><br>
									<label>Titulo</label>
									<input type="text" name="Tiulo_libro" value="<?PHP echo $registro[1]; ?>"><br>
                                    <label>Autor</label>
									<input type="text" name="Autor_libro" value="<?PHP echo $registro[2]; ?>"><br>
                                    <label>Fecha de publicacion</label>
									<input type="date" name="Anio_publicacion" value="<?PHP echo $registro[6]; ?>"><br>//todoslos campos de nuevo
                                   

                                    <input type="submit" name="enviar" value="guardar">
									<input type="reset" name="cancelar" value="Restablecer">
								</form>
				<?php  
								}	
					}
			}
	mysqli_close($Connect);
?>








</body>
</html>