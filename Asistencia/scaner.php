<?php

session_start();
require_once 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: http://172.20.10.3/Asistencia/login.php');
    exit();
}

$tokens = (int) file_get_contents('tokens.txt');


if ($tokens > 0) {
    $tokens--;
    file_put_contents('tokens.txt', $tokens);

    // Obtener el id del estudiante
    $correo = $_SESSION['usuario'];
    $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);
    $usuario = $resultado->fetch_assoc();

    // Registrar asistencia
    $sql = "INSERT INTO asistencias (usuario_id) VALUES ('" . $usuario['id'] . "')";
    $conexion->query($sql);

    header('Location: http://172.20.10.3/Asistencia/html.php');
    exit();
} else {
    echo "<h2>QR expirado, no hay tokens disponibles</h2>";
}
?>