<?php
session_start();

// Inicializar carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar productos al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto'])) {
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Guardar en el carrito
    $_SESSION['carrito'][] = [
        'producto' => $producto,
        'precio' => $precio,
        'cantidad' => $cantidad,
    ];
}

// Eliminar un producto del carrito
if (isset($_POST['eliminar'])) {
    $indice = $_POST['indice'];  // Recibir el índice del producto
    unset($_SESSION['carrito'][$indice]);  // Eliminar el producto por índice
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);  // Reindexar el array
}

// Calcular total
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- En el head de tu HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .cart-table {
            width: 100%;
            max-width: 600px;
            margin: auto;
            border-collapse: collapse;
            text-align: left;
        }
        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .cart-table th {
            background: #ff6600;
            color: white;
        }
        .total {
            margin-top: 20px;
            text-align: center;
            font-size: 1.2rem;
        }
        .payment-methods {
            margin: 20px 0;
            text-align: center;
        }
        .payment-methods button {
            margin: 10px;
            padding: 10px 20px;
            background: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Carrito de Compras</h1>

<table class="cart-table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['carrito'] as $indice => $item): ?>
        <tr>
            <td><?php echo $item['producto']; ?></td>
            <td><?php echo $item['cantidad']; ?></td>
            <td>$<?php echo $item['precio']; ?></td>
            <td>$<?php echo $item['precio'] * $item['cantidad']; ?></td>
            <td>
                <!-- Formulario para eliminar el producto -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                    <button type="submit" name="eliminar" class="delete-button">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="total">
    Total a pagar: <strong>$<?php echo $total; ?></strong>
</div>

<div class="payment-methods">
    <h3>Selecciona un método de pago:</h3>
    <form action="ticket.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit" name="metodo" value="tarjeta">Tarjeta Débito</button>
        <button type="submit" name="metodo" value="transferencia">Transferencia</button>
        <button type="submit" name="metodo" value="efectivo">Efectivo (OXXO)</button>
    </form>
</div>


</body>
</html>
