<?php
    $Nombre= $_POST["Nombre"];
    $Apellido= $_POST["Apellido"];
    $FecNac= $_POST["FecNac"];
    $DNI= $_POST["DNI"];
    $Genero= $_POST["Genero"];
    $Calle= $_POST["Calle"];
    $Numero= $_POST["Numero"];
    $Barrio= $_POST["Barrio"];
    $Telefono= $_POST["telefono"];
    $Email= $_POST["email"];
    

    $Server="localhost";
    $Base="prueba franco";
    $User="root" ;
    $Pass="" ;

    //creo la conexion y la guardo en la variable $connect

    $Connect=mysqli_connect($Server, $User ,$Pass , $Base);
                
    if (!$Connect){
        die ("fallo la conexion ".mysqli_connect_error());
    }
    else{
        echo"conexion exitosa";
    }

$Query="INSERT INTO `personas`(`id_Persona`, `Apellido_Persona`, `Nombre_Persona`, `DNI_Persona`, `FecNac_Persona`,
 `Genero_persona`, `Calle_Persona`, `Num_Persona`, `Barrio_Persona`, `Telefono`, `Email`)
VALUES (0,'$Apellido','$Nombre', '$DNI', '$FecNac', 
'$Genero','$Calle','$Numero', '$Barrio', '$Telefono', '$Email')"; 
 
 echo $Query;

 $Resultado= mysqli_query($Connect,$Query);

?>