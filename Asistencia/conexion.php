<?php


$host = "localhost";
$usuario = "root";
$password = "";
$basedatos = "asistencias_db";
$puerto = "3306";

$conexion = new mysqli($host, $usuario, $password, $basedatos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}



?>