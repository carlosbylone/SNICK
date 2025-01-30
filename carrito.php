<?php
include_once("conexion_bd.php");
include_once("Productos.php");

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$usuario = $_SESSION['nombre'];
$conexion = conectarBD(); // Asegurar que la conexión se establece antes de usarla
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/hombre.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hombre</title>
</head>

<body>
<header>
    <nav>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="Hombre.php" >Hombre</a></li>
            <li><a href="Mujer.php" >Mujer</a></li>
            <?php 
            if ($usuario === 'Admin') {
                echo "<li><a href='cierre.php'>Cerrar Sesión</a></li>";
                echo "<li><a href='usuario.php'>$usuario</a></li>";
                echo "<li><a href='carrito.php class='active''><i id='shopping' class='fa fa-shopping-cart'></i></a></li>";
            } else {
                echo "<li><a href='login.php'>$usuario</a></li>";
            }
            ?>
            <li><a href="ubicacion.html" >Donde encontrarnos</a></li>
        </ul>
    </nav>
</header>