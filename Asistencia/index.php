<?php 

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}


require_once 'qr/qrlib.php';


$tokens = (int) file_get_contents('tokens.txt'); 

if($tokens > 0) {

    $url = "http://172.20.10.3/Asistencia/scaner.php";
    QRcode::png($url, 'qr.png', QR_ECLEVEL_L, 10);
    echo "<img src='qr.png'>";

}
else {
    echo "<h2>No hay tokens disponibles</h2>";
}



?>

<html>

<a href="login.php">back</a>
<a href="logout.php">logout</a>
    
</html>