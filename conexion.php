<?php


session_start();

$host = 'localhost'; // El servidor de la base de datos (generalmente localhost)
$usuario = 'root';   // El usuario de la base de datos (por defecto es 'root' en XAMPP)
$contrasena = '';    // La contraseña de la base de datos (por defecto está vacía en XAMPP)
$nombre_bd = 'tienda'; // El nombre de la base de datos que creaste

// Crear la conexión
$conn = new mysqli($host, $usuario, $contrasena, $nombre_bd);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
