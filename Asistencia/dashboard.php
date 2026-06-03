<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'maestro') {
    header('Location: login.php');
    exit();
}
?>

<html>
<head>
    <title>Dashboard Maestro</title>
</head>
<body>
    <h2>Bienvenido Maestro</h2>
    <p>Sesión: <?php echo $_SESSION['usuario']; ?></p>

    <a href="index.php">Ver QR</a>
    <br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>