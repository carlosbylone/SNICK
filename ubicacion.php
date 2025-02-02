<?php
include_once('validar.php');
include_once('registrado.php');
$usuario;

if(isset($_SESSION['nombre'])){
    $usuario=$_SESSION['nombre'];
}else{
    $usuario="Iniciar Sesion";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wfvC+TI7ZZxC+37GB1I2dJ2yAEv4iQ2LGMi2iYJN67CcDexPQH+STZ3zjR1do9S1++UWpJBkIyg/IhFF5Rf/MQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/css1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>

<body>

<header>
<button class="navbar-toggle" id="menu-toggle">
<i class="fas fa-bars"></i> </button>
    <nav>
        <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="Hombre.php">Hombre</a></li>
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
    <div id="gps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6268.478799212812!2d-0.74698675!3d38.22755179999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b0b287af9bcb%3A0x11049a41a5fbf4eb!2s03296%20Matola%2C%20Alicante!5e0!3m2!1ses!2ses!4v1701121430659!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
    <hr>
    <footer>
        <h5>Contactos:</h5>
        <a href="https://www.instagram.com"><img src="assets/Imagenes/ii.webp" alt="" width="100px"></a>
     <a  class="w" href="https://www.whatsapp.com"><img src="assets/Imagenes/l.png" alt="" width="85px"></a>
     <address>
        <h3>C/Crevillent</h3>
    
    </address>
    </footer>
<script src="assets/js/responsive.js"></script>

</body>
</html>