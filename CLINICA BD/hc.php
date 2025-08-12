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
    
    // Consulta para obtener los pacientes
    $QueryPacientes="SELECT id_paciente, CONCAT(nombre_paciente, ' ', apellido_paciente, ' (', dni_paciente, ')') AS paciente_info FROM paciente ORDER BY apellido_paciente, nombre_paciente";
    $ResultadoPacientes=mysqli_query($Connect, $QueryPacientes);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Historia Clínica</title>
</head>
<body>
    <form action="hc_variables.php" method="post">
        <section class="form-register">    
            <h2>Nueva Historia Clínica</h2>

            <br>
            <label>Paciente</label>
            <select class="controls" name="id_paciente" required>
                <option value="">Seleccione un paciente</option>
                <?php
                    if (mysqli_num_rows($ResultadoPacientes) > 0) {
                        while ($registro = mysqli_fetch_array($ResultadoPacientes)) {
                            echo '<option value="'.$registro[0].'">'.$registro[1].'</option>'; 
                        }       
                    } else {
                        echo '<option value="">Sin datos disponibles</option>';
                    }
                ?>
            </select>
            <br>
            
            <label>Fecha de apertura</label>
            <input class="controls" type="date" name="fecha_apertura" required value="<?php echo date('Y-m-d'); ?>">
            <br>
            
            <label>Motivo de consulta</label>
            <textarea class="controls" name="motivo_consulta" rows="4" required></textarea>
            <br>
            
            <label>Antecedentes</label>
            <textarea class="controls" name="antecedentes" rows="4"></textarea>
            <br>
            
            <label>Diagnóstico</label>
            <textarea class="controls" name="diagnostico" rows="4"></textarea>
            <br>

            <label>Tratamiento</label>
            <textarea class="controls" name="tratamiento" rows="4"></textarea>
            <br>
            
            <input class="botons" type="submit" name="submit" value="Guardar">
            <input class="botons" type="reset" name="reset" value="Cancelar">
        </section>
    </form>
</body>
</html>