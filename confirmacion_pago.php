<?php
session_start();
include_once("conexion_bd.php");

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$status = isset($_GET['status']) ? $_GET['status'] : '';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pago</title>
    <link rel="stylesheet" href="assets/css/confirmacion.css">
</head>
<body>

<header>
    <h1>Confirmación de Pago</h1>
</header>

<main>
    <div class="container">
        <?php if ($status == 'success'): ?>
            <h2>¡Pago realizado con éxito!</h2>
            <p>Gracias por tu compra. Hemos recibido tu pago correctamente.</p>
            <p>Puedes ver tu factura en el enlace.</p>
            <a href="factura.php" class="btn">Ver factura</a>
        <?php else: ?>
            <h2>Hubo un problema con tu pago.</h2>
            <p>No pudimos procesar tu pago. Por favor, intenta nuevamente.</p>
            <a href="carrito.php" class="btn">Volver al carrito</a>
        <?php endif; ?>
    </div>
</main>

<footer>
    <p>&copy; 2024 Tienda Online. Todos los derechos reservados.</p>
</footer>

</body>
</html>
