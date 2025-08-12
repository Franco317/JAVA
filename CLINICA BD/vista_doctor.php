<?php
// Conexión a la base de datos
$Server = "localhost";
$User  = "root";
$Pass = "";
$Base = "clinica";
$Connect = mysqli_connect($Server, $User , $Pass, $Base) or die("No se pudo conectar");

// Obtener la lista de pacientes
$query_pacientes = "SELECT id_paciente, nombre_paciente, apellido_paciente FROM paciente";
$resultado_pacientes = mysqli_query($Connect, $query_pacientes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Paciente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Seleccionar Paciente</h1>
    <form action="vista_doctor.php" method="get">
        <label for="id_paciente">Seleccione un paciente:</label>
        <select name="id_paciente" id="id_paciente" required>
            <option value="">--Seleccione--</option>
            <?php while ($paciente = mysqli_fetch_assoc($resultado_pacientes)): ?>
                <option value="<?php echo $paciente['id_paciente']; ?>">
                    <?php echo $paciente['nombre_paciente'] . ' ' . $paciente['apellido_paciente']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Ver Detalles">
    </form>

    <?php
if (isset($_GET["id_paciente"]) && $_GET["id_paciente"] !== "") {
    $id_paciente = intval($_GET["id_paciente"]);
    /* Esto hace 3 cosas:

    Se fija si el campo id_paciente existe (isset)
    Verifica que no esté vacío (!== "")
    Convierte a número entero (intval()) para evitar inyecciones o errores
    📌Resultado: el resto del código solo se ejecuta si hay un ID válido. 
    Esto evita un error que estaba teniendo 
Warning: variable indefinida
Fatal error en SQL porque el valor estaba vacío
    */

    // Datos del paciente
    $query_paciente = "SELECT * FROM paciente WHERE id_paciente = $id_paciente";
    $resultado_paciente = mysqli_query($Connect, $query_paciente);

    if ($resultado_paciente && mysqli_num_rows($resultado_paciente) > 0) {
        $paciente = mysqli_fetch_array($resultado_paciente);
        //el operador && es un operador lógico "AND" (y lógico) si dos condiciones son verdaderas al mismo tiempo  devuelve true

        // Historia clínica
        $query_historia = "SELECT hc.*, d.* FROM historiaclinica hc 
                           LEFT JOIN detallehistoriaclinica d ON hc.id_historia = d.id_historia 
                           WHERE hc.id_paciente = $id_paciente";
        $resultado_historia = mysqli_query($Connect, $query_historia);
?>
        <!-- HTML para mostrar los datos -->
        <h2>Datos del Paciente</h2>
        <p>Nombre: <?php echo $paciente['nombre_paciente']; ?></p>
        <p>Apellido: <?php echo $paciente['apellido_paciente']; ?></p>
        <p>Fecha de Nacimiento: <?php echo $paciente['fecha_nacimiento']; ?></p>
        <p>Email: <?php echo $paciente['email_paciente']; ?></p>
        <p>Teléfono: <?php echo $paciente['telefono_paciente']; ?></p>

        <h2>Historial Clínico</h2>
        <table>
            <tr>
                <th>ID Historia</th>
                <th>Fecha Apertura</th>
                <th>Motivo Consulta</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
            </tr>
            <?php while ($historia = mysqli_fetch_assoc($resultado_historia)): ?>
            <tr>
                <td><?php echo $historia['id_historia']; ?></td>
                <td><?php echo $historia['fecha_apertura']; ?></td>
                <td><?php echo $historia['motivo_consulta']; ?></td>
                <td><?php echo $historia['diagnostico']; ?></td>
                <td><?php echo $historia['tratamiento']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
<?php
    }
}
?>
           