<?php 
$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$DNI = $_POST["DNI"];
$FecNac = $_POST["FecNac"];
$Telefono = $_POST["Telefono"];
$Email = $_POST["Email"];

$Server = "localhost";
$Base = "clinica";
$User = "root";
$Pass = "";

//creo la conexion y la guardo en la variable $connect
$Connect = mysqli_connect($Server, $User, $Pass, $Base);
            
if (!$Connect) {
    die("Fallo la conexión " . mysqli_connect_error());
} else {
    echo "Conexión exitosa<br>";
}

$Query = "INSERT INTO `paciente`(`id_paciente`, `nombre_paciente`, `apellido_paciente`, `dni_paciente`,
 `fecha_nacimiento`, `telefono_paciente`, `email_paciente`)
VALUES (NULL, '$Nombre', '$Apellido', '$DNI', '$FecNac', '$Telefono', '$Email')"; 

echo $Query;

$Resultado = mysqli_query($Connect, $Query);

// verifico el resultado de la consulta
if ($Resultado) {
    echo "<br>Datos guardados correctamente";
} else {
    echo "<br>Error al guardar los datos: " . mysqli_error($Connect);
}
?>