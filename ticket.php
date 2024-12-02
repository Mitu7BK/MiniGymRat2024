<?php

// Incluir el archivo de conexión
include('conexion.php'); // Asegúrate de que la ruta sea correcta

session_start();

$_SESSION['carrito'] = []; // Vacia el carrito
$metodo = $_POST['metodo'];
$total = $_POST['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- En el head de tu HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin: 20px;
        }
        .ticket {
            border: 2px dashed #ff6600;
            padding: 20px;
            display: inline-block;
            text-align: left;
        }
        .ticket h1 {
            margin-top: 0;
        }
        .home-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 18px;
    margin-top: 20px;
}

.home-button:hover {
    background-color: #ff5500;
}

.home-button i {
    vertical-align: middle;
}

    </style>
</head>
<body>

<div class="ticket">
    <h1>Minigymrat</h1>
    <p>Compra realizada con éxito</p>
    <p><strong>Total:</strong> $<?php echo $total; ?></p>
    <p><strong>Método de pago:</strong> <?php echo ucfirst($metodo); ?></p>
    <p>¡Gracias por tu compra!</p>
</div>

<div style="text-align: center; margin-top: 20px;">
    <a href="index.php" class="home-button">
        <i class="fa fa-home" style="font-size: 20px; margin-right: 10px;"></i> Volver al inicio
    </a>
</div>

    
</body>
</html>
