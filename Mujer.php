<?php
include_once("conexion_bd.php");
include_once("Productos.php");

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$usuario = $_SESSION['nombre'];
$conexion = conectarBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/hombre.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Hombre</title>
</head>

<body>

<header>
    <button class="navbar-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="Hombre.php" >Hombre</a></li>
            <li><a href="Mujer.php" class="active">Mujer</a></li>
            <?php if (isset($_SESSION['nombre'])) { ?>
                <li><a href='logout.php'>Cerrar Sesión</a></li>
                <?php if ($_SESSION['nombre'] !== 'Admin') { ?>
                    <li><a href='usuario.php'><?php echo $usuario; ?></a></li>
                <?php } ?>
                <li><a href='carrito.php'><i class='fa fa-shopping-cart'></i> Carrito</a></li>
            <?php } else { ?>
                <li><a href='login.php'>Iniciar sesión</a></li>
            <?php } ?>
            <li><a href="ubicacion.php">Donde encontrarnos</a></li>
        </ul>
    </nav>
</header>

<section id='container'>
    <?php
    $sql = "SELECT * FROM productos_mujer";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<form action='agregar_al_carrito.php' method='post'>";
            echo "<input type='hidden' name='id_producto' value='" . $fila["ID"] . "'>";
            echo "<img src='" . $fila["Imagen"] . "' alt='" . $fila["nombre_productos"] . "'>";
            echo "<div class='product-description'>";
            echo "<h5 class='product-title'>" . $fila["nombre_productos"] . "</h5>";
            echo "<p class='product-precio'>" . $fila["Precio"] . "€</p>";
            echo "<input type='hidden' name='categoria' value='productos'>";
            echo "<button class='btn btn-primary' type='submit'><i class='fa fa-shopping-cart'></i> Añadir al carrito</button>";
            echo "</div>";
            echo "</form>";

            if ($usuario === 'Admin') {
                echo "<form action='eliminar_producto.php' method='post' class='delete-form'>";
                echo "<input type='hidden' name='id' value='" . $fila['ID'] . "'>";
                echo "<button type='submit' class='delete-btn' onclick='return confirmDelete()'>X</button>";
                echo "</form>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron productos.</p>";
    }

    $conexion->close();
    ?>
</section>

<?php if ($usuario === 'Admin') { ?>
    <div class="admin-panel">
        <button id="btn-add-product" class="btn-add-product">Añadir Producto</button>
        <form id="product-form" action="subir_producto.php" method="post" enctype="multipart/form-data" style="display: none;">
            <label for="nombre_producto">Nombre del producto:</label>
            <input type="text" name="nombre_producto" required>
            <label for="precio">Precio:</label>
            <input type="number" name="Precio" step="0.01" required>
            <label for="imagen">Selecciona una imagen:</label>
            <input type="file" name="Imagen" required>
            <button type="submit">Subir producto</button>
        </form>
    </div>
<?php } ?>

<footer>
    <div class="footer-icons">
        <a href="https://www.instagram.com"><img id="logo" src="assets/Imagenes/ii.webp" alt="" width="50"></a>
        <a class="w" href="https://www.whatsapp.com"><img id="logo" src="assets/Imagenes/l.png" alt="" width="50"></a>
    </div>
</footer>

<script src="assets/js/responsive.js"></script>
<script src="assets/js/formulario.js">
</script>

</body>
</html>
