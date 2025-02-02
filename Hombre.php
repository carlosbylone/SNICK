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
$conexion = conectarBD(); 
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
<button class="navbar-toggle" id="menu-toggle">
<i class="fas fa-bars"></i> </button>
    <nav>
        <ul>
            <li><a href="index.php" >Inicio</a></li>
            <li><a href="Hombre.php" class="active">Hombre</a></li>
            <li><a href="Mujer.php">Mujer</a></li>
            <?php
            if (isset($_SESSION['nombre'])) {
                echo "<li><a href='logout.php'>Cerrar Sesión</a></li>";
                
                if ($_SESSION['nombre'] !== 'Admin') {
                    echo "<li><a href='usuario.php'>$usuario</a></li>";
                }
                
                echo "<li><a href='carrito.php'><i class='fa fa-shopping-cart'></i> Carrito</a></li>";
            } else {
                echo "<li><a href='login.php'>Iniciar sesión</a></li>";
            }
            ?>
            <li><a href="ubicacion.php">Donde encontrarnos</a></li>
        </ul>
    </nav>
</header>





<?php
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
  echo "<section id='container'>";

  while ($fila = $resultado->fetch_assoc()) {
    echo "<div class='product'>";

    echo "<form action='agregar_al_carrito.php' method='post'>";
echo "  <input type='hidden' name='id_producto' value='" . $fila["ID"] . "'>";  
echo "  <img src='" . $fila["Imagen"] . "' alt='" . $fila["nombre_productos"] . "'>";
echo "  <div class='product-description'>";
echo "    <h5 class='product-title'>" . $fila["nombre_productos"] . "</h5>";
echo "    <p class='product-precio'>" . $fila["Precio"] . "€</p>";
echo "  <input type='hidden' name='categoria' value='productos'>";  
echo "    <button class='btn btn-primary' type='submit'><i class='fa fa-shopping-cart'></i> Añadir al carrito</button>";
echo "  </div>";
echo "</form>";

    if ($usuario === 'Admin') {
      echo "<form action='eliminar_producto.php' method='post' class='delete-form'>";
      echo "  <input type='hidden' name='id' value='" . $fila['ID'] . "'>";
      echo "  <button type='submit' class='delete-btn' onclick='return confirmDelete()'>X</button>";
      echo "</form>";
    }

    echo "</div>";
  }

  echo "</section>";
} else {
  echo "<p>No se encontraron productos.</p>";
}

$conexion->close();
?>

<footer>
  <?php if ($usuario === 'Admin') { ?>
    <form class="footer-admin-form" action="subir_producto.php" method="post" enctype="multipart/form-data">
      <label for="nombre_producto">Nombre del producto:</label>
      <input type="text" name="nombre_producto" required>
      <label for="precio">Precio:</label>
      <input type="number" name="Precio" step="0.01" required>
      <label for="imagen">Selecciona una imagen:</label>
      <input type="file" name="Imagen" required>
      <button type="submit">Subir producto</button>
    </form>
  <?php } ?>
  <div class="footer-icons">
    <a href="https://www.instagram.com"><img id="logo" src="assets/Imagenes/ii.webp" alt="" width="50"></a>
    <a class="w" href="https://www.whatsapp.com"><img id="logo" src="assets/Imagenes/l.png" alt="" width="50"></a>
  </div>
</footer>

<script src="assets/js/EventosTienda.js"></script>
<script src="assets/js/responsive.js"></script>

</body>

</html>
