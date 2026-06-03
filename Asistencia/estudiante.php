<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'estudiante') {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Estudiante</title>
</head>
<body>
    <h2>Bienvenido Estudiante</h2>
    <p>Sesión: <?php echo $_SESSION['usuario']; ?></p>

    <p>Escaneá el QR que te muestre tu maestro para registrar tu asistencia</p>

    

    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>