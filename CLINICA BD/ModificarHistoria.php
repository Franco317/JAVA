<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar Historia Clínica</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        label {
            font-weight: bold;
            color: #34495e;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            grid-column: span 1;
        }
        input[type="reset"] {
            background-color: #7f8c8d;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        input[type="reset"]:hover {
            background-color: #6c7a7a;
        }
        .buttons {
            grid-column: span 2;
            margin-top: 20px;
        }
        .message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
	<div class="container">
		<h1>Modificar Historia Clínica</h1>

	<?php
				
				$User='root';
				$Pass='';
				$Server='localhost';
				$Base='clinica';//base de datos

			
			$Connect=mysqli_connect($Server,$User,$Pass,$Base);

			if(isset($_POST['enviar']))
			{
				$id= $_POST['id_historia'];//id_historia
				$id_paciente=$_POST['id_paciente'];//id_paciente
                $fecha_apertura=$_POST['fecha_apertura'];//fecha_apertura
                $motivo_consulta=$_POST['motivo_consulta'];//motivo_consulta
				$antecedentes=$_POST['antecedentes'];//antecedentes
				$diagnostico=$_POST['diagnostico'];//diagnostico
				$tratamiento=$_POST['tratamiento'];//tratamiento

				
				
				$query="UPDATE historiaclinica SET id_historia='$id', id_paciente='$id_paciente', fecha_apertura='$fecha_apertura',
                motivo_consulta='$motivo_consulta', antecedentes='$antecedentes', diagnostico='$diagnostico', tratamiento='$tratamiento' where id_historia = '$id'";//todas las variables vinculadas del php
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error($Connect));//connect
				echo "se modificaron correctamente los datos";
			}
			else
			{
				$ID= $_GET['id_historia'];//id_historia
                $query="SELECT * FROM historiaclinica where id_historia = '$ID'";
				$resultado=mysqli_query($Connect,$query) or die ("ERROR: ".mysqli_error($Connect));

				if (mysqli_num_rows($resultado)>0) 
					{
						while ($registro = mysqli_fetch_array($resultado)) //ModificarHistoria
								{
									?>
								<form method="POST" action="ModificarHistoria.php">
								
									<label>Id Historia</label>
									<input type="text" name="id_historia" value="<?PHP echo $registro[0]; ?>"><br>
									<label>Id Paciente</label>
									<input type="text" name="id_paciente" value="<?PHP echo $registro[1]; ?>"><br>
                                    <label>Fecha de Apertura</label>
									<input type="date" name="fecha_apertura" value="<?PHP echo $registro[2]; ?>"><br>
                                    <label>Motivo de Consulta</label>
									<input type="text" name="motivo_consulta" value="<?PHP echo $registro[3]; ?>"><br>
									<label>Antecedentes</label>
									<input type="text" name="antecedentes" value="<?PHP echo $registro[4]; ?>"><br>
									<label>Diagnóstico</label>
									<input type="text" name="diagnostico" value="<?PHP echo $registro[5]; ?>"><br>
									<label>Tratamiento</label>
									<input type="text" name="tratamiento" value="<?PHP echo $registro[6]; ?>"><br>

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