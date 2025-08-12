<?php 
$NombrePR = $_POST["NombrePR"];
$ApellidoPR = $_POST["ApellidoPR"];
$Matricula = $_POST["Matricula"];
$DNIPR = $_POST["DNIPR"];
$FecNacPR = $_POST["FecNacPR"];
$TelefonoPR = $_POST["TelefonoPR"];
$EmailPR = $_POST["EmailPR"];
$ID_especialidad = $_POST["ID_especialidad"]; // Faltaba el punto y coma aquí

$Server = "localhost";
$Base = "clinica";
$User = "root";
$Pass = "";

// Creo la conexión y la guardo en la variable $connect
$Connect = mysqli_connect($Server, $User, $Pass, $Base);
            
if (!$Connect) {
    die("Fallo la conexión ".mysqli_connect_error());
} else {
    echo "Conexión exitosa";
}

// Corregimos la consulta SQL - había problemas con las comillas y comas
$Query = "INSERT INTO `profesional` (`id_profesional`, `nombre_profesional`, `apellido_profesional`, 
 `matricula`, `telefono_profesional`, `email_profesional`, `id_especialidad`)
VALUES (NULL, '$NombrePR', '$ApellidoPR', '$Matricula', '$TelefonoPR', '$EmailPR', '$ID_especialidad')";

echo $Query;

$Resultado = mysqli_query($Connect, $Query);

if ($Resultado) {
    echo "<p>Registro guardado correctamente</p>";
} else {
    echo "<p>Error al guardar: " . mysqli_error($Connect) . "</p>";
}
?>