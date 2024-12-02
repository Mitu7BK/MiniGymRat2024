<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minigymrat - Inicio</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- CSS interno -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 100;
            background-image: url('fondo.jpg'); 
            background-size: 500;
            background-position: center;
            color: white;
        }
        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 100px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 3rem;
        }
        header p {
            font-size: 1.2rem;
            margin-top: 5px;
        }
        .catalog-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 50px 20px;
            gap: 20px;
        }
        .catalog-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .catalog-card:hover {
            transform: translateY(-5px);
        }
        .catalog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .catalog-card h2 {
            margin: 15px 0;
            font-size: 1.5rem;
            color: #003366;
        }
        .catalog-card a {
            display: block;
            margin: 10px auto 20px;
            text-decoration: none;
            background: #ff6600;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            width: 80%;
            transition: background 0.3s;
        }
        .catalog-card a:hover {
            background: #cc5200;
        }
        footer {
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            color: white;
            font-size: 0.9rem;
        }
    </style>
    

</head>
<body>

<header>
<div style="position: absolute; top: 20px; right: 20px;">
    <a href="carrito.php" style="text-decoration: none; color: white; font-size: 1.5rem;">
        🛒 <i class="fas fa-shopping-cart"></i>
    </a>
</div>

    <h1>Minigymrat</h1>
    <p>Descubre nuestra ropa deportiva</p>
</header>

<section class="catalog-section">
    <!-- Tarjeta de Camisas -->
    <div class="catalog-card">
        <img src="Camisa/1.jpg" alt="Camisas Deportivas">
        <h2>Camisas Deportivas</h2>
        <a href="catalogo.php?categoria=camisas" class="button">Camisas Deportivas</a>
    </div>
    <!-- Tarjeta de Pants -->
    <div class="catalog-card">
        <img src="Pans/1.jpg" alt="Pants Deportivos">
        <h2>Pants Deportivos</h2>
        <a href="catalogo.php?categoria=pants" class="button">Pants Deportivos</a>
    </div>
    <!-- Tarjeta de Shorts -->
    <div class="catalog-card">
        <img src="Short/1.jpg" alt="Shorts Deportivos">
        <h2>Shorts Deportivos</h2>
        <a href="catalogo.php?categoria=shorts" class="button">Shorts Deportivos</a>
    </div>
</section>


<footer>
    &copy; <?php echo date("Y"); ?> Minigymrat. Todos los derechos reservados al Poderosisimo Tec del Istmo
</footer>

</body>
</html>
