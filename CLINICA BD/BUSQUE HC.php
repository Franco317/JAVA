<?php

$option = $_GET['option'];
$Buscar = $_GET['Buscar'];

$bandera = 0;

$Server = "localhost";
$User = "root";
$Pass = "";
$Base = "clinica";

$Connect = mysqli_connect($Server, $User, $Pass, $Base)
    or die("No se pudo conectar");

// Consultas según la opción de búsqueda seleccionada
if ($option == "1") {
    // Búsqueda por nombre del paciente
    $query = "SELECT hc.id_historia, p.nombre_paciente, p.apellido_paciente, 
              hc.fecha_apertura, hc.motivo_consulta, hc.diagnostico, hc.tratamiento 
              FROM historiaclinica hc 
              INNER JOIN paciente p ON hc.id_paciente = p.id_paciente 
              WHERE p.nombre_paciente LIKE '%$Buscar%' 
              ORDER BY p.nombre_paciente";
}
if ($option == "2") {
    // Búsqueda por apellido del paciente
    $query = "SELECT hc.id_historia, p.nombre_paciente, p.apellido_paciente, 
              hc.fecha_apertura, hc.motivo_consulta, hc.diagnostico, hc.tratamiento 
              FROM historiaclinica hc 
              INNER JOIN paciente p ON hc.id_paciente = p.id_paciente 
              WHERE p.apellido_paciente LIKE '%$Buscar%' 
              ORDER BY p.apellido_paciente";
}
if ($option == "3") {
    // Búsqueda por diagnóstico
    $query = "SELECT hc.id_historia, p.nombre_paciente, p.apellido_paciente, 
              hc.fecha_apertura, hc.motivo_consulta, hc.diagnostico, hc.tratamiento 
              FROM historiaclinica hc 
              INNER JOIN paciente p ON hc.id_paciente = p.id_paciente 
              WHERE hc.diagnostico LIKE '%$Buscar%' 
              ORDER BY hc.fecha_apertura DESC";
}
if ($option == "4") {
    // NUEVO: Búsqueda por tratamiento
    $query = "SELECT hc.id_historia, p.nombre_paciente, p.apellido_paciente, 
              hc.fecha_apertura, hc.motivo_consulta, hc.diagnostico, hc.tratamiento 
              FROM historiaclinica hc 
              INNER JOIN paciente p ON hc.id_paciente = p.id_paciente 
              WHERE hc.tratamiento LIKE '%$Buscar%' 
              ORDER BY hc.fecha_apertura DESC";
}

$resultado = mysqli_query($Connect, $query);

echo "<table style=\"border:5px solid grey\">";
echo "<tr style=\"border:2px solid grey\" bgcolor=\"#a8c9ff\">";
echo "<td>ID Historia</td>";
echo "<td>Nombre Paciente</td>";
echo "<td>Apellido Paciente</td>";
echo "<td>Fecha Apertura</td>";
echo "<td>Motivo Consulta</td>";
echo "<td>Diagnóstico</td>";
echo "<td>Tratamiento</td>";
echo "<td>Opciones</td>";
echo "</tr>";

while ($registro = mysqli_fetch_array($resultado)) {
    if ($bandera == 1) {
        echo "<tr style=\"border:2px solid grey\" bgcolor=\"#01df01\">";
        echo "<td>" . $registro['id_historia'] . "</td>";
        echo "<td>" . $registro['nombre_paciente'] . "</td>";
        echo "<td>" . $registro['apellido_paciente'] . "</td>";
        echo "<td>" . $registro['fecha_apertura'] . "</td>";
        echo "<td>" . $registro['motivo_consulta'] . "</td>";
        echo "<td>" . $registro['diagnostico'] . "</td>";
        echo "<td>" . $registro['tratamiento'] . "</td>";
        echo "<td><a href=ModificarHistoria.php?id_historia=" . $registro['id_historia'] . ">Modificar</a> ";
        echo "<a href=EliminarHistoria.php?id_historia=" . $registro['id_historia'] . ">Eliminar</a> ";
        echo "<a href=detalles_hc.php?id_historia=" . $registro['id_historia'] . ">Ver Detalles</a></td>";
        
        $bandera = 0;
    } else {
        echo "<tr style=\"border:2px solid grey\" bgcolor=\"#d5f5ad\">";
        echo "<td>" . $registro['id_historia'] . "</td>";
        echo "<td>" . $registro['nombre_paciente'] . "</td>";
        echo "<td>" . $registro['apellido_paciente'] . "</td>";
        echo "<td>" . $registro['fecha_apertura'] . "</td>";
        echo "<td>" . $registro['motivo_consulta'] . "</td>";
        echo "<td>" . $registro['diagnostico'] . "</td>";
        echo "<td>" . $registro['tratamiento'] . "</td>";
        echo "<td><a href=ModificarHistoria.php?id_historia=" . $registro['id_historia'] . ">Modificar</a> ";
        echo "<a href=EliminarHistoria.php?id_historia=" . $registro['id_historia'] . ">Eliminar</a> ";
        echo "<a href=detalles_hc.php?id_historia=" . $registro['id_historia'] . ">Ver Detalles</a></td>";
        
        $bandera = 1;
    }
    echo "</tr>";
}

echo "</table>";

mysqli_close($Connect);
?>