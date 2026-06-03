# asistencia

registro de asistencia simple mediante codigos QR utilizando,

PHP, MySQL, HTML, CSS, 

con la libreria 

PHPqr y qrlib


# ejecucion 

Hay que levantar un hosting local, puede ser con cualquier programa,
como XAMMP o WAMMP,

Se inicia el index.php y se generara un codigo QR, el cual por cada escaneo se consumira un token del archivo, tokens.txt si
esta en 0 significa que ya no se pueden hacer mas escaneos y dira, codigo QR expirado, si se quiere seguir probando solo se cambia el numero
de tokens que necesitemos osea la cantidad de veces que queramos que sea escaneado.







