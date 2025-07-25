<?php
session_start();
include "conexion.php";

// Recibo los datos del formulario
$Usuario = $_POST["Usuario"];
$Clave = $_POST["Clave"];

// Consulta SQL
$Query = "SELECT * FROM usuarios WHERE Correo_usuario='$Usuario' AND Clave_usuario='$Clave'";
$Resultado = mysqli_query($Conexion, $Query);

if (mysqli_num_rows($Resultado) == 1) {
    $Fila = mysqli_fetch_assoc($Resultado);

    //Guardamos en sesión
    $_SESSION['Usuario'] = $Fila['Correo_usuario'];
    $_SESSION['Rol'] = $Fila['rol_usuario'];

    //Según el rol, redirigimos o mostramos algo distinto
    switch ($Fila['rol_usuario']) {
        case 1: // Paciente
            header("Location: bienvenida.php"); // O admin.php
            break;
        case 2: // Doctor
            header("Location: bienvdoctor.php");
            break;
        case 3: // Secretarios
            header("Location: secretaria.php");
            break;
        default:
            echo "<script>
                    alert('Rol desconocido. Consultá al administrador.');
                    window.location.href = 'Login.html';
                  </script>";
            break;
    }
    exit;
} else {
    echo "<script>
            alert('Usuario o clave incorrectos');
            window.location.href = 'Login.html';
          </script>";
}

mysqli_close($Conexion);
?>
