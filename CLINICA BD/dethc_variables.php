<?php 
$id_historia = $_POST["id_historia"];
$id_profesional = $_POST["id_profesional"];
$fecha_consulta = $_POST["fecha_consulta"];
$observaciones = $_POST["observaciones"];
$receta = $_POST["receta"];
$estudios_solicitados = $_POST["estudios_solicitados"];

$Server = "localhost";
$Base = "clinica";
$User = "root";
$Pass = "";

// Creo la conexión y la guardo en la variable $connect
$Connect = mysqli_connect($Server, $User, $Pass, $Base);
            
if (!$Connect) {
    die("Fallo la conexión " . mysqli_connect_error());
} else {
    echo "Conexión exitosa<br>";
}

// Consulta SQL para insertar el detalle de historia clínica
$Query = "INSERT INTO detallehistoriaclinica (id_detalle, id_historia, id_profesional, fecha_consulta, 
         observaciones, receta, estudios_solicitados)
         VALUES (NULL, '$id_historia', '$id_profesional', '$fecha_consulta', 
         '$observaciones', '$receta', '$estudios_solicitados')";

echo $Query . "<br>";

$Resultado = mysqli_query($Connect, $Query);

if ($Resultado) {
    // Obtenemos el ID del detalle recién creado
    $id_detalle = mysqli_insert_id($Connect);
    
    echo "<p>Detalle de historia clínica guardado correctamente con ID: $id_detalle</p>";
    echo "<p>Opciones:</p>";
    echo "<a href='dethc.php?id_historia=$id_historia'>Agregar otro detalle a esta historia</a> | ";
    echo "<a href='hc.php'>Crear nueva historia clínica</a>";
    
    // Opcional: mostrar resumen de la historia clínica y sus detalles
    echo "<h3>Detalles de la Historia Clínica $id_historia</h3>";
    
    $QueryDetalles = "SELECT d.id_detalle, d.fecha_consulta, 
                     CONCAT(p.nombre_profesional, ' ', p.apellido_profesional) AS nombre_profesional,
                     e.nombre_especialidad
                     FROM detallehistoriaclinica d
                     JOIN profesional p ON d.id_profesional = p.id_profesional
                     JOIN especialidad e ON p.id_especialidad = e.id_especialidad
                     WHERE d.id_historia = $id_historia
                     ORDER BY d.fecha_consulta DESC";
                     
    $ResultadoDetalles = mysqli_query($Connect, $QueryDetalles);
    
    if (mysqli_num_rows($ResultadoDetalles) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Fecha</th><th>Profesional</th><th>Especialidad</th></tr>";
        
        while ($detalle = mysqli_fetch_assoc($ResultadoDetalles)) {
            echo "<tr>";
            echo "<td>" . $detalle['id_detalle'] . "</td>";
            echo "<td>" . $detalle['fecha_consulta'] . "</td>";
            echo "<td>" . $detalle['nombre_profesional'] . "</td>";
            echo "<td>" . $detalle['nombre_especialidad'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
} else {
    echo "<p>Error al guardar: " . mysqli_error($Connect) . "</p>";
}
?>