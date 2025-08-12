<?php
    $Server="localhost";
    $User="root";
    $Pass="";
    $Base="clinica";

    $Connect=mysqli_connect($Server, $User, $Pass, $Base);
    
    // Verificar si la conexión fue exitosa
    if (!$Connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $QueryA="SELECT * FROM especialidad ORDER BY nombre_especialidad";
    $ResultadoA=mysqli_query($Connect,$QueryA);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario profesional</title>
</head>
<body>
    <form action="profesional.php" method="post">
        <section class="form-register">    
            <h2>Datos del Profesional</h2>

            <br>
            <label>Nombre</label>
            <input class="controls" type="text" name="NombrePR" required>
            <br>
            
            <label>Apellido</label>
            <input class="controls" type="text" name="ApellidoPR" required>
            <br>
            
            <label>Matricula</label>
            <input class="controls" type="text" name="Matricula" required>
            <br>
            
            <label>DNI</label>
            <input class="controls" type="number" name="DNIPR" required>
            <br>
            
            <label>FecNac</label>
            <input class="controls" type="date" name="FecNacPR">
            <br>

            <label>Telefono</label>
            <input class="controls" type="text" name="TelefonoPR" placeholder="351...">
            <br>
            
            <label>Email</label>
            <input class="controls" type="email" name="EmailPR">
            <br>
            
            <label>Especialidad</label>
            <select class="controls" name="ID_especialidad" required>
                <option value="">Seleccione una especialidad</option>
                <?php
                    if (mysqli_num_rows($ResultadoA) > 0) {
                        while ($registro = mysqli_fetch_array($ResultadoA)) {
                            echo '<option value="'.$registro[0].'">'.$registro[1].'</option>'; 
                        }       
                    } else {
                        echo '<option value="">Sin datos disponibles</option>';
                    }
                ?>
            </select>
            <br><br>

            <input class="botons" type="submit" name="submit" value="Guardar">
            <input class="botons" type="reset" name="reset" value="Cancelar">
        </section>
    </form>
</body>
</html>