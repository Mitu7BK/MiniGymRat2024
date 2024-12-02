<?php
session_start();
unset($_SESSION['carrito']); // Limpiar el carrito
header("Location: carrito.php");
exit();
