<?php
session_start();

// Verificamos que haya un usuario en sesión
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

include_once("conexion_bd.php");
$conexion = conectarBD();

$sql = "SELECT * FROM carrito";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <!-- Tu hoja de estilo principal -->
    <link rel="stylesheet" href="assets/css/hombre.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="Hombre.php">Hombre</a></li>
            <li><a href="Mujer.php">Mujer</a></li>
            <li><a href="carrito.php" class="active">Carrito</a></li>
        </ul>
    </nav>
</header>

<h1 style="margin-top:120px; text-align:center;">Carrito de Compras</h1>

<div class="cart-container"><!-- Contenedor con margen y scroll horizontal si hace falta -->
    <table class="cart-table"><!-- Tabla con estilo responsive -->
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Si hay productos en el carrito
        if ($resultado->num_rows > 0) {
            $sumaTotal = 0;
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                // Cambia 'imagen' por el nombre real de tu columna (por ejemplo, 'ruta')
                echo "<td><img src='" . $fila['ruta'] . "' alt='" . $fila['nombre'] . "' width='80'></td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['precio'] . " €</td>";
                echo "<td>" . $fila['cantidad'] . "</td>";
                // Cambia 'precio_total' por 'Precio_total' u otro nombre si difiere en tu BD
                echo "<td>" . $fila['Precio_total'] . " €</td>";

                // Asume que tu clave primaria se llama 'id' (o 'ID', ajústalo según tu BD)
                echo "<td>
                        <form action='borrarcarro.php' method='post'>
                            <input type='hidden' name='id_carrito' value='" . $fila['ID'] . "'>
                            <button type='submit'>Eliminar</button>
                        </form>
                      </td>";
                echo "</tr>";

                $sumaTotal += $fila['Precio_total']; 
            }
        } else {
            // Si no hay artículos, puedes mostrar un mensaje
            echo "<tr><td colspan='6'>No hay artículos en el carrito.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div><!-- Fin de .cart-container -->

<?php
// Mostrar el total si hay productos
if ($resultado->num_rows > 0) {
    echo "<h2 style='text-align:center; margin-bottom:40px;'>Total del carrito: " . $sumaTotal . " €</h2>";
}
$conexion->close();
?>

</body>
</html>
