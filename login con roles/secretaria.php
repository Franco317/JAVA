<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: Login.html");
    exit;
}
$Usuario = $_SESSION['Usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <style>
        body {
            background-color:#c7180c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .mensaje {
            background-color: #d4edda;
            color: #000000;
            padding: 30px 50px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
            font-size: 24px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="mensaje">
        ¡Bienvenido secretario/a <strong><?php echo htmlspecialchars($Usuario); ?></strong>!
    </div>
</body>
</html>


