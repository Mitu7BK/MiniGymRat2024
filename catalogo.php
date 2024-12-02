

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Minigymrat</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        

        body

         {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .product-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .product-card h3 {
            margin: 10px 0;
            font-size: 1.1rem;
            color: #333;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<div style="text-align: left; margin: 10px;">
    <a href="index.php" style="text-decoration: none; background: #ff6600; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; transition: background 0.3s;">
        ⬅️ Volver al Inicio
    </a>
</div>
<body>

<h1>Catálogo de Minigymrat</h1>
<div style="text-align: right; margin-bottom: 20px;">
    <a href="carrito.php" style="background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Ir al carrito
    </a>
</div>


<?php
// Detectar la categoría seleccionada

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'camisas';

echo "<h2>" . ucfirst($categoria) . " Deportivos</h2>";
echo '<div class="product-container">';

// Mostrar productos según la categoría seleccionada
if ($categoria === 'camisas') {
    for ($i = 1; $i <= 41; $i++) {
        echo '<div class="product-card">
        <img src="/minigymrat/Camisa/' . $i . '.jpg" alt="Camisa ' . $i . '" class="product-img">
        <h3>Camisa ' . $i . '</h3>
        <form onsubmit="agregarAlCarrito(event)" style="margin-top: 10px;">
            <input type="hidden" name="producto" value="Camisa ' . $i . '">
            <input type="hidden" name="precio" value="199">
            <label for="cantidad-' . $i . '">Cantidad:</label>
            <input type="number" id="cantidad-' . $i . '" name="cantidad" value="1" min="1" style="width: 50px; margin: 5px;">
            <button type="submit" style="background: #ff6600; color: white; padding: 5px 10px; border-radius: 5px; border: none; cursor: pointer;">
                Agregar al carrito
            </button>
        </form>
      </div>';
    }
   


} elseif ($categoria === 'pants') {
    for ($i = 1; $i <= 20; $i++) {
        echo '<div class="product-card">
                <img src="/minigymrat/Pans/' . $i . '.jpg" alt="Pants ' . $i . '" style="width: 100%; max-height: 200px; object-fit: cover;">
                <h3>Pants ' . $i . '</h3>
                <form onsubmit="agregarAlCarrito(event)" style="margin-top: 10px;">
                    <input type="hidden" name="producto" value="Pants ' . $i . '">
                    <input type="hidden" name="precio" value="299">
                    <label for="cantidad-' . $i . '">Cantidad:</label>
                    <input type="number" id="cantidad-' . $i . '" name="cantidad" value="1" min="1" style="width: 50px; margin: 5px;">
                    <button type="submit" style="background: #ff6600; color: white; padding: 5px 10px; border-radius: 5px; border: none; cursor: pointer;">
                        Agregar al carrito
                    </button>
                </form>
              </div>';
    }
}
elseif ($categoria === 'shorts') {
    for ($i = 1; $i <= 20; $i++) {
        echo '<div class="product-card">
                <img src="/minigymrat/Short/' . $i . '.jpg" alt="Short ' . $i . '" style="width: 100%; max-height: 200px; object-fit: cover;">
                <h3>Short ' . $i . '</h3>
                <form onsubmit="agregarAlCarrito(event)" style="margin-top: 10px;">
                    <input type="hidden" name="producto" value="Short ' . $i . '">
                    <input type="hidden" name="precio" value="149">
                    <label for="cantidad-' . $i . '">Cantidad:</label>
                    <input type="number" id="cantidad-' . $i . '" name="cantidad" value="1" min="1" style="width: 50px; margin: 5px;">
                    <button type="submit" style="background: #ff6600; color: white; padding: 5px 10px; border-radius: 5px; border: none; cursor: pointer;">
                        Agregar al carrito
                    </button>
                </form>
              </div>';
    }
}
 else {
    echo "<p>No hay productos en esta categoría.</p>";
}

echo '</div>';
?>
<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];  // ID del producto
    $cantidad = $_POST['cantidad'];  // Cantidad del producto

    // Agregar el producto al carrito
    $_SESSION['carrito'][] = [
        'producto' => $_POST['producto'],
        'precio' => $_POST['precio'],
        'cantidad' => $cantidad,
    ];

    // Reducir el stock del producto
    $query = "UPDATE productos SET stock = stock - :cantidad WHERE id = :producto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':cantidad' => $cantidad, ':producto_id' => $producto_id]);

    // Redirigir o mostrar un mensaje
    echo "Producto añadido al carrito";
}
?>

<footer>
    &copy; <?php echo date("Y"); ?> Minigymrat. Todos los derechos reservados.
</footer>

<script>
    function agregarAlCarrito(event) {
        // Evitar que el formulario se envíe tradicionalmente
        event.preventDefault();

        // Crear el mensaje emergente
        const mensaje = document.createElement('div');
        mensaje.textContent = "Producto añadido al carrito";
        mensaje.style.position = "fixed";
        mensaje.style.top = "10px";
        mensaje.style.right = "10px";
        mensaje.style.padding = "10px 20px";
        mensaje.style.backgroundColor = "#28a745";
        mensaje.style.color = "white";
        mensaje.style.borderRadius = "5px";
        mensaje.style.boxShadow = "0 2px 4px rgba(0,0,0,0.2)";
        mensaje.style.zIndex = "9999";
        document.body.appendChild(mensaje);

        // Eliminar el mensaje después de 2 segundos
        setTimeout(() => {
            mensaje.remove();
        }, 2000);

        // Obtener los datos del formulario
        const form = event.target;
        const formData = new FormData(form);

        // Enviar los datos al carrito usando AJAX
        fetch('carrito.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log('Producto agregado:', data);
        })
        .catch(error => {
            console.error('Error al agregar al carrito:', error);
        });
    }
</script>



</body>
</html>
