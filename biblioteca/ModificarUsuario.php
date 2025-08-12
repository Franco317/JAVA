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
				$id= $_POST['Id_Usuario'];
				$Nombre_usuario=$_POST['Nombre_usuario'];
                $Apellido_usuario=$_POST['Apellido_usuario'];
                $FecNac_usuario=$_POST['FecNac_usuario'];//creas variables y le pones el nombre del campo , que se vinculle a las opciones

				
				
				$query="UPDATE usuarios SET Id_usuario='$id', Nombre_usuario='$Nombre_usuario', Apellido_usuario='$Apellido_usuario',
                FecNac_usuario='$FecNac_usuario' where Id_usuario = '$id'";//todas las variables vinculadas del php
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());//connect
				echo "se modificaron correctamente los datos";
			}
			else
			{
				$ID= $_GET['Id_usuario'];//Id_usuario
                $query="SELECT * FROM usuarios where Id_usuario = '$ID'";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error());

				if (mysqli_num_rows($resultado)>0) 
					{
						while ($registro = mysqli_fetch_array($resultado)) //modificausuario
								{
									?>
								<form method="POST" action="ModificarUsuario.php"> 
								
									<label>Id</label>
									<input type="text" name="Id_usuario" value="<?PHP echo $registro[0]; ?>"><br>
									<label>Nombre</label>
									<input type="text" name="Nombre_usuario" value="<?PHP echo $registro[1]; ?>"><br>
                                    <label>Apellido</label>
									<input type="text" name="Apellido_usuario" value="<?PHP echo $registro[2]; ?>"><br>
                                    <label>Fecha de nacimiento</label>
									<input type="date" name="FecNac_usuario" value="<?PHP echo $registro[3]; ?>"><br>//todoslos campos de nuevo
                                   

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