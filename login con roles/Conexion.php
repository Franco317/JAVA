<?php
    
    // Declaro variables para la conexion a la BD
       
    $Server= "localhost"; 
    $User= "root";
    $Pass= ""; 
    $Base= "usuario"; 
    // Establezco la conexion a la BBDD
    $Conexion = mysqli_connect($Server, $User, $Pass, $Base) or 
    die ("No se puedo establecer la conexion ".mysqli_connect.error());

    
?>