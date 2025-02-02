<?php 
session_start();
include_once("conexion_bd.php");
$conexion = conectarBD();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$usuario = $_SESSION['nombre'];
$sql = "SELECT * FROM carrito";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="assets/css/carrito.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<header>
    <button class="navbar-toggle" id="menu-toggle">
        <i class="fa-solid fa-bars"></i>
    </button>
    <nav>
        <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="Hombre.php">Hombre</a></li>
            <li><a href="Mujer.php">Mujer</a></li>
            <?php
            if (isset($_SESSION['nombre'])) {
                echo "<li><a href='logout.php'>Cerrar Sesión</a></li>";
                echo "<li><a href='usuario.php'>$usuario</a></li>";
                echo "<li><a href='carrito.php' class='active'><i class='fa fa-shopping-cart'></i> Carrito</a></li>";
            } else {
                echo "<li><a href='login.php'>Iniciar sesión</a></li>";
            }
            ?>
            <li><a href="ubicacion.php">Donde encontrarnos</a></li>
        </ul>
    </nav>
</header>

<h1 style="margin-top:120px; text-align:center;">Carrito de Compras</h1>

<div class="cart-container">
    <table class="cart-table">
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
        if ($resultado->num_rows > 0) {
            $sumaTotal = 0;
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . $fila['ruta'] . "' alt='" . $fila['nombre'] . "' width='80'></td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['precio'] . " €</td>";
                echo "<td>" . $fila['cantidad'] . "</td>";
                echo "<td>" . $fila['Precio_total'] . " €</td>";
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
            echo "<tr><td colspan='6'>No hay artículos en el carrito.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php
if ($resultado->num_rows > 0) {
    echo "<h2 style='text-align:center; margin-bottom:40px;'>Total del carrito: " . $sumaTotal . " €</h2>";
    echo "<div style='text-align:center; margin-bottom:50px;'>
            <script src='https://www.paypal.com/sdk/js?client-id=TU_CLIENT_ID&currency=EUR'></script>
            <div id='paypal-button-container'></div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: { value: '" . $sumaTotal . "' }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                alert('Pago completado por ' + details.payer.name.given_name);
                                window.location.href = 'confirmacion_pago.php';
                            });
                        }
                    }).render('#paypal-button-container');
                });
            </script>
            <form action='procesar_pago.php' method='post'>
                <input type='hidden' name='total' value='" . $sumaTotal . "'>
                <button type='submit' style='padding:10px 20px; font-size:18px; background-color:#28a745; color:white; border:none; cursor:pointer;'>Pagar Manualmente</button>
            </form>
          </div>";
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
<script src="assets/js/responsive.js"></script>

</body>
</html>
