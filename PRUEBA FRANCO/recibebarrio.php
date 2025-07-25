<?php
     $Barrio=$_POST["Barrio"];

     $Server="localhost";
     $Base="prueba franco";
     $User="root" ;
     $Pass= "" ;

     $Connect=mysqli_connect($Server, $User ,$Pass , $Base);
                
    if (!$Connect){
        die ("fallo la conexion ".mysqli_connect_error());
    }
    else{
        echo"conexion exitosa";
    }

    $Query="INSERT INTO `barrios`(`Nombre_Barrrio`) VALUES ('$Barrio')";
 
    echo $Query;

    $Resultado= mysqli_query($Connect,$Query);

?>