<?php
// Verificar si se recibió el parámetro id_historia
if (!isset($_GET['id_historia'])) {
    echo "Error: No se proporcionó ID de historia clínica";
    exit;
}

$id_historia = $_GET['id_historia'];

$Server = "localhost";
$Base = "clinica";
$User = "root";
$Pass = "";

$Connect = mysqli_connect($Server, $User, $Pass, $Base)
    or die("No hubo conexión");

// Consulta para obtener información de la historia clínica y el paciente
$query_historia = "SELECT hc.*, p.*
                   FROM historiaclinica hc
                   INNER JOIN paciente p ON hc.id_paciente = p.id_paciente
                   WHERE hc.id_historia = $id_historia";

$resultado_historia = mysqli_query($Connect, $query_historia);

if (!$resultado_historia || mysqli_num_rows($resultado_historia) == 0) {
    echo "Error: No se encontró la historia clínica especificada";
    mysqli_close($Connect);
    exit;
}

$historia = mysqli_fetch_assoc($resultado_historia);

// Consulta para obtener los detalles (consultas) relacionados con esta historia clínica
$query_detalles = "SELECT d.*, pr.nombre_profesional, pr.apellido_profesional, e.nombre_especialidad
                   FROM detallehistoriaclinica d
                   INNER JOIN profesional pr ON d.id_profesional = pr.id_profesional
                   INNER JOIN especialidad e ON pr.id_especialidad = e.id_especialidad
                   WHERE d.id_historia = $id_historia
                   ORDER BY d.fecha_consulta DESC";

$resultado_detalles = mysqli_query($Connect, $query_detalles);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Historia Clínica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        .info-section {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            color: #34495e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions {
            margin-top: 20px;
        }
        .button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-right: 10px;
        }
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de Historia Clínica #<?php echo $historia['id_historia']; ?></h1>
        
        <div class="info-section">
            <h2>Información del Paciente</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nombre:</span> 
                    <?php echo $historia['nombre_paciente'] . ' ' . $historia['apellido_paciente']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">DNI:</span> 
                    <?php echo $historia['dni_paciente']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Fecha de Nacimiento:</span> 
                    <?php echo $historia['fecha_nacimiento']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono:</span> 
                    <?php echo $historia['telefono_paciente']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span> 
                    <?php echo $historia['email_paciente']; ?>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>Información de la Historia Clínica</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Fecha de Apertura:</span> 
                    <?php echo $historia['fecha_apertura']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Motivo de Consulta:</span> 
                    <?php echo $historia['motivo_consulta']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Antecedentes:</span> 
                    <?php echo $historia['antecedentes']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Diagnóstico:</span> 
                    <?php echo $historia['diagnostico']; ?>
                </div>
                <div class="info-item">
                    <span class="info-label">Tratamiento:</span> 
                    <?php echo $historia['tratamiento']; ?>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>Historial de Consultas</h2>
            
            <?php if (mysqli_num_rows($resultado_detalles) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Profesional</th>
                            <th>Especialidad</th>
                            <th>Observaciones</th>
                            <th>Receta</th>
                            <th>Estudios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($detalle = mysqli_fetch_assoc($resultado_detalles)): ?>
                            <tr>
                                <td><?php echo $detalle['fecha_consulta']; ?></td>
                                <td><?php echo $detalle['nombre_profesional'] . ' ' . $detalle['apellido_profesional']; ?></td>
                                <td><?php echo $detalle['nombre_especialidad']; ?></td>
                                <td><?php echo $detalle['observaciones']; ?></td>
                                <td><?php echo $detalle['receta']; ?></td>
                                <td><?php echo $detalle['estudios_solicitados']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay consultas registradas para esta historia clínica.</p>
            <?php endif; ?>
        </div>
        
        <div class="actions">
            <a href="ModificarHistoria.php?id_historia=<?php echo $id_historia; ?>" class="button">Modificar Historia</a>
            <a href="LISTA HC.php" class="button">Volver al Listado</a>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($Connect);
?>