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
    
    // Obtener el ID de historia clínica
    $id_historia = isset($_GET['id_historia']) ? $_GET['id_historia'] : '';
    
    if (empty($id_historia)) {
        die("Error: No se proporcionó un ID de historia clínica válido");
    }
    
    // Obtener información de la historia clínica
    $QueryHistoria = "SELECT h.id_historia, CONCAT(p.nombre_paciente, ' ', p.apellido_paciente) AS nombre_paciente, 
                     h.fecha_apertura, h.motivo_consulta 
                     FROM historiaclinica h 
                     JOIN paciente p ON h.id_paciente = p.id_paciente 
                     WHERE h.id_historia = $id_historia";
                     
    $ResultadoHistoria = mysqli_query($Connect, $QueryHistoria);
    
    if (mysqli_num_rows($ResultadoHistoria) == 0) {
        die("Error: No se encontró la historia clínica especificada");
    }
    
    $historia = mysqli_fetch_assoc($ResultadoHistoria);
    
    // Consulta para obtener los profesionales
    $QueryProfesionales = "SELECT p.id_profesional, CONCAT(p.nombre_profesional, ' ', p.apellido_profesional, ' (', e.nombre_especialidad, ')') AS profesional_info 
                          FROM profesional p 
                          JOIN especialidad e ON p.id_especialidad = e.id_especialidad 
                          ORDER BY p.apellido_profesional, p.nombre_profesional";
                          
    $ResultadoProfesionales = mysqli_query($Connect, $QueryProfesionales);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Historia Clínica</title>
</head>
<body>
    <h2>Agregar Detalle a Historia Clínica</h2>
    
    <div class="info-historia">
        <p><strong>Paciente:</strong> <?php echo $historia['nombre_paciente']; ?></p>
        <p><strong>Fecha de apertura:</strong> <?php echo $historia['fecha_apertura']; ?></p>
        <p><strong>Motivo de consulta:</strong> <?php echo $historia['motivo_consulta']; ?></p>
    </div>
    
    <form action="dethc_variables.php" method="post">
        <input type="hidden" name="id_historia" value="<?php echo $id_historia; ?>">
        
        <section class="form-register">    
            <h3>Nuevo Detalle de Consulta</h3>

            <br>
            <label>Profesional</label>
            <select class="controls" name="id_profesional" required>
                <option value="">Seleccione un profesional</option>
                <?php
                    if (mysqli_num_rows($ResultadoProfesionales) > 0) {
                        while ($registro = mysqli_fetch_array($ResultadoProfesionales)) {
                            echo '<option value="'.$registro[0].'">'.$registro[1].'</option>'; 
                        }       
                    } else {
                        echo '<option value="">Sin datos disponibles</option>';
                    }
                ?>
            </select>
            <br>
            
            <label>Fecha y hora de consulta</label>
            <input class="controls" type="datetime-local" name="fecha_consulta" required value="<?php ?>">
            <br>
            
            <label>Observaciones</label>
            <textarea class="controls" name="observaciones" rows="4" required></textarea>
            <br>
            
            <label>Receta</label>
            <textarea class="controls" name="receta" rows="4"></textarea>
            <br>
            
            <label>Estudios solicitados</label>
            <textarea class="controls" name="estudios_solicitados" rows="4"></textarea>
            <br>
            
            <input class="botons" type="submit" name="submit" value="Guardar">
            <input class="botons" type="reset" name="reset" value="Cancelar">
        </section>
    </form>
</body>
</html>