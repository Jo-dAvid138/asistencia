<?php 
session_start();
require_once 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $password = $_POST['password'];
    $rol_seleccionado = $_POST['rol'];
    

    if ($rol_seleccionado == 'estudiante') {
        $nie = $_POST['nie'];
        $correo = $nie . '@clases.edu.sv';
        unset($_POST['correo']); // ← limpia el correo del maestro
    } else {
        $correo = $_POST['correo'];
        $nie = null;
    }

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $usuario['correo'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == 'maestro') {
            header('Location: dashboard.php');
        } else {
            header('Location: estudiante.php');
        }
        exit();
    } else {
        echo "<p>Correo o contraseña incorrectos</p>";
    }
}

?>

<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <label>¿Quién eres?</label>
    <br>
    <button type="button" onclick="mostrarEstudiante()">Estudiante</button>
    <button type="button" onclick="mostrarMaestro()">Maestro</button>

    <form method="POST">
        <input type="hidden" name="rol" id="rol-hidden" value="">

        <div id="campo-nie" style="display:none;">
            <input type="number" name="nie" id="nie" placeholder="NIE">
        </div>

        <div id="campo-correo" style="display:none;">
            <input type="email" name="correo" id="correo" placeholder="Correo institucional">
        </div>

        <br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <script>
        function mostrarEstudiante() {
            document.getElementById('campo-nie').style.display = 'block';
            document.getElementById('campo-correo').style.display = 'none';
            document.getElementById('rol-hidden').value = 'estudiante';
        }

        function mostrarMaestro() {
            document.getElementById('campo-nie').style.display = 'none';
            document.getElementById('campo-correo').style.display = 'block';
            document.getElementById('rol-hidden').value = 'maestro';
        }
    </script>
</body>
</html>