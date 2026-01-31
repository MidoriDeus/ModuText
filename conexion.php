<?php

$conexion = new mysqli(
    $_ENV['DB_HOST'] ?? 'localhost:3307',
    $_ENV['DB_USER'] ?? 'root',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? 'modutex'
);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

//echo "Conexión exitosa a la base de datos";

$conexion->set_charset("utf8");

?>
