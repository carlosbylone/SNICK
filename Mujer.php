<?php
include_once("conexion_bd.php");
include_once("Productos.php");

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

if (isset($_GET['msg'])) {
    echo "<script>
            alert('" . htmlspecialchars($_GET['msg']) . "');
          </script>";
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
            <li><a href="Mujer.php" class="active">Mujer</a></li>
            <?php 
           if (isset($_GET['usuario']) || isset($_GET['Admin'])) {
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

<i class="fa fa-shopping-cart" id="bueno"></i>

<?php
$sql = "SELECT * FROM productos_mujer";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<section id='container'>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<form action='carrito.php' method='post'>";
        echo "<input type='hidden' name='precio' value='" . $fila["Precio"] . "'>";
        echo "<input type='hidden' name='titulo' value='" . $fila["nombre_productos"] . "'>";
        echo "<input type='hidden' name='cantidad' value='1'>";
        echo "<img src='" . $fila["Imagen"] . "' alt='" . $fila["nombre_productos"] . "'>";
        echo "<div class='product-description'>";
        echo "<h5 class='product-title'>" . $fila["nombre_productos"] . "</h5>";
        echo "<p class='product-precio'>" . $fila["Precio"] . "€</p>";
        echo "<button class='btn btn-primary' type='submit'><i class='fa fa-shopping-cart'></i> Añadir al carrito</button>";

        if ($usuario === 'Admin') {
            echo "<form action='eliminar_producto.php' method='post' class='delete-form'>";
            echo "<input type='hidden' name='id' value='" . $fila["ID"] . "'>";
            echo "<button type='submit' class='delete-btn'>X</button>";
            echo "</form>";
        }

        echo "</div>";
        echo "</form>";
        echo "</div>";
    }

    echo "</section>";
} else {
    echo "<p>No se encontraron productos.</p>";
}

$conexion->close();
?>

<footer>
    <h5>Contactos:</h5>
    <a href="https://www.instagram.com"><img id="logo" src="assets/Imagenes/ii.webp" alt="" width="100px"></a>
    <a class="w" href="https://www.whatsapp.com"><img id="logo" src="assets/Imagenes/l.png" alt="" width="85px"></a>
    <address>
        <h3>C/Crevillent</h3>
    </address>
</footer>

<script src="assets/js/EventosTienda.js"></script>

</body>
</html>
