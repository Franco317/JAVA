<?php
    include "conexion.php"; // Incluyo al proyecto el archivo conexion.php

    // Recibo los datos del formulario
   
    $Usuario= $_POST ["Usuario"];
    $Clave= $_POST ["Clave"];
    $Rol= $_POST ["Rol"];
    
   
    // Sentencia sql
    $Query ="INSERT INTO usuarios
    (Correo_usuario,Clave_usuario,rol_usuario)
     VALUES
    ('$Usuario','$Clave','$Rol')";

    echo $Query;

    //Envio la query a ejecutar a mysql
    $Resultado=mysqli_Query($Conexion,$Query);
 // Mensaje de alerta
    if ($Resultado) 
    {
        // Si el guardado de datos fue exitoso
        echo "<script>
                alert('¡Datos guardados correctamente!');
                window.location.href = 'CargaUsuario.html'; // Redirige al formulario o página principal
            </script>";
    } 
    else 
    {
        // Si hubo un error en el guardado de datos

        
        echo "<script>
                alert('Hubo un error al guardar los datos. Intenta nuevamente.');
                window.location.href = 'CargaUsuario.html'; // Redirige al formulario
            </script>";
    }


   
    //Cierro la Conexion a la BBDD
    mysqli_close($Conexion);


?>
