<?php

// Incluir el archivo de conexión
include('conexion.php'); // Asegúrate de que la ruta sea correcta

session_start();

// Verificar que el carrito no esté vacío
if (empty($_SESSION['carrito'])) {
    echo "<p>El carrito está vacío. Regresa al <a href='index.php'>catálogo</a> para agregar productos.</p>";
    exit();
}

// Calcular el total del carrito
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'];
}

// Procesar el formulario cuando el usuario selecciona una forma de pago
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['forma_pago'])) {
    $forma_pago = $_POST['forma_pago'];
    
    // Guardar la forma de pago seleccionada en la sesión
    $_SESSION['forma_pago'] = $forma_pago;
    
    // Redirigir a ticket.php para generar el ticket de compra
    header("Location: ticket.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago - Minigymrat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            font-size: 2em;
            margin-top: 20px;
        }
        .pago {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .forma-pago {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .boton {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .boton:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Selecciona tu Forma de Pago</h1>

    <div class="pago">
        <p>Total a Pagar: $<?php echo number_format($total, 2); ?></p>
        
        <form action="pagos.php" method="post">
            <div class="forma-pago">
                <input type="radio" id="tarjeta" name="forma_pago" value="Tarjeta de Crédito" required>
                <label for="tarjeta">Tarjeta de Crédito</label>
            </div>
            <div class="forma-pago">
                <input type="radio" id="transferencia" name="forma_pago" value="Transferencia">
                <label for="transferencia">Transferencia Bancaria</label>
            </div>
            <div class="forma-pago">
                <input type="radio" id="deposito" name="forma_pago" value="Depósito">
                <label for="deposito">Depósito Bancario</label>
            </div>
            <button type="submit" class="boton">Confirmar Pago</button>
        </form>
    </div>
</body>
</html>
