<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$correo = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Registrada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { min-height: 100vh; background: #003F8A; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2rem; font-family: Arial, sans-serif; }
        .card { background: #fff; border-radius: 16px; padding: 2.5rem 2rem; max-width: 420px; width: 100%; text-align: center; }
        .logo-bar { display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 1.5rem; }
        .logo-circle { width: 56px; height: 56px; border-radius: 50%; background: #003F8A; display: flex; align-items: center; justify-content: center; }
        .logo-circle i { font-size: 28px; color: #fff; }
        .mined-title { text-align: left; }
        .mined-title p { margin: 0; font-size: 11px; color: #555; line-height: 1.3; }
        .mined-title strong { font-size: 13px; color: #003F8A; }
        .flag-bar { display: flex; height: 6px; width: 100%; border-radius: 999px; overflow: hidden; margin-bottom: 1.5rem; }
        .flag-bar div { flex: 1; }
        .divider { border: none; border-top: 0.5px solid #e0e0e0; margin: 1rem 0; }
        .check-circle { width: 72px; height: 72px; border-radius: 50%; background: #EAF3DE; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; }
        .check-circle i { font-size: 36px; color: #3B6D11; }
        .main-title { font-size: 20px; font-weight: 500; color: #003F8A; margin: 0 0 0.5rem; }
        .subtitle { font-size: 14px; color: #555; margin: 0 0 1.5rem; }
        .badge { display: inline-block; background: #EAF3DE; color: #3B6D11; font-size: 12px; padding: 4px 12px; border-radius: 999px; margin-bottom: 1.5rem; }
        .info-box { background: #F1F5FB; border-radius: 8px; padding: 1rem; text-align: left; margin-bottom: 1.5rem; }
        .info-row { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #333; margin-bottom: 6px; }
        .info-row:last-child { margin-bottom: 0; }
        .info-row i { font-size: 16px; color: #003F8A; }
        .footer-text { font-size: 11px; color: #aaa; margin-top: 1.5rem; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo-bar">
            <div class="logo-circle">
                <i class="ti ti-school"></i>
            </div>
            <div class="mined-title">
                <strong>MINED</strong>
                <p>Ministerio de Educación</p>
                <p>El Salvador</p>
            </div>
        </div>

        <div class="flag-bar">
            <div style="background:#003F8A;"></div>
            <div style="background:#fff; border-top: 0.5px solid #eee; border-bottom: 0.5px solid #eee;"></div>
            <div style="background:#003F8A;"></div>
        </div>

        <hr class="divider">

        <div class="check-circle">
            <i class="ti ti-circle-check"></i>
        </div>

        <h1 class="main-title">Asistencia registrada</h1>
        <p class="subtitle">Tu asistencia ha sido registrada correctamente en el sistema.</p>

        <span class="badge"><i class="ti ti-check"></i> Verificado</span>

        <div class="info-box">
            <div class="info-row">
                <i class="ti ti-user"></i>
                <span><?php echo $correo; ?></span>
            </div>
            <div class="info-row">
                <i class="ti ti-calendar"></i>
                <span id="fecha"></span>
            </div>
            <div class="info-row">
                <i class="ti ti-clock"></i>
                <span id="hora"></span>
            </div>
        </div>

        <p class="footer-text">Sistema de Asistencia Digital &copy; 2025 MINED El Salvador</p>
    </div>

    <script>
        const now = new Date();
        const fecha = now.toLocaleDateString('es-SV', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        const hora = now.toLocaleTimeString('es-SV', { hour: '2-digit', minute: '2-digit' });
        document.getElementById('fecha').textContent = fecha.charAt(0).toUpperCase() + fecha.slice(1);
        document.getElementById('hora').textContent = hora;
    </script>
</body>
</html>