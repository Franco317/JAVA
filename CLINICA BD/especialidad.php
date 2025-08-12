<?php
$Especialidad= $_POST["nombre_especialidad"];
$Descripcion= $_POST["descripcion"];

$Server="localhost";
$User="root";
$Pass="";
$Base="clinica";

$Connect=mysqli_connect($Server, $User ,$Pass , $Base);
            
if (!$Connect){
    die ("fallo la conexion ".mysqli_connect_error());
}
else{
    echo"conexion exitosa";
}
$Query="INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`, `descripcion`)
VALUES (NULL,'$Especialidad','$Descripcion')";

echo $Query;

$Resultado= mysqli_query($Connect, $Query);





?>