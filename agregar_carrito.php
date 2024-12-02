<?php
// Incluir la conexión
include('conexion.php');
session_start(); // Si no lo has hecho aún

// Obtener los datos del formulario
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

// Consultar el producto desde la base de datos
$sql = "SELECT * FROM productos WHERE id = $producto_id";
$resultado = $conn->query($sql);
$producto = $resultado->fetch_assoc();

// Agregar el producto al carrito en la sesión
$_SESSION['carrito'][] = [
    'producto' => $producto['nombre'],
    'precio' => $producto['precio'],
    'cantidad' => $cantidad
];

// Actualizar el stock
$nuevo_stock = $producto['stock'] - $cantidad;
$sql_actualizar_stock = "UPDATE productos SET stock = $nuevo_stock WHERE id = $producto_id";
$conn->query($sql_actualizar_stock);

// Redirigir al carrito
header('Location: carrito.php');
exit();
?>
