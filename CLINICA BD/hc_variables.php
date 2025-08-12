<?php 
$id_paciente = $_POST["id_paciente"];
$fecha_apertura = $_POST["fecha_apertura"];
$motivo_consulta = $_POST["motivo_consulta"];
$antecedentes = $_POST["antecedentes"];
$diagnostico = $_POST["diagnostico"];
$tratamiento = $_POST["tratamiento"];

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

// Consulta SQL para insertar la historia clínica
$Query = "INSERT INTO historiaclinica (id_historia, id_paciente, fecha_apertura, motivo_consulta, 
         antecedentes, diagnostico, tratamiento)
         VALUES (NULL, '$id_paciente', '$fecha_apertura', '$motivo_consulta', 
         '$antecedentes', '$diagnostico', '$tratamiento')";

echo $Query . "<br>";

$Resultado = mysqli_query($Connect, $Query);

if ($Resultado) {
    // Obtenemos el ID de la historia clínica recién creada
    $id_historia = mysqli_insert_id($Connect);
    
    echo "<p>Historia clínica guardada correctamente con ID: $id_historia</p>";
    echo "<p>Ahora puede agregar un detalle a esta historia:</p>";
    echo "<a href='dethc.php?id_historia=$id_historia'>Agregar detalle</a> | ";
    echo "<a href='hc.php'>Crear nueva historia clínica</a>";
} else {
    echo "<p>Error al guardar: " . mysqli_error($Connect) . "</p>";
}
?>