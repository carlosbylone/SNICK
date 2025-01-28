
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wfvC+TI7ZZxC+37GB1I2dJ2yAEv4iQ2LGMi2iYJN67CcDexPQH+STZ3zjR1do9S1++UWpJBkIyg/IhFF5Rf/MQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/css1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/Imagenes/p.jpg" />
</head>

<body>
   
    <header>
        <nav>

            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="Hombre.php">Hombre</a></li>
                <li><a href="Mujer.php">Mujer</a></li>
                <?php 
                if(isset($_SESSION['username'])){
                    $usuario=$_SESSION['username'];
                    echo "<li><a href='usuario.php'>$usuario</a></li>";
                    echo "<li><a href='carrito.php'><i class='fa fa-shopping-cart'></a></li>";
                //Abrimos sesion con el nombre de usuario despues del login


                }else{
                    $usuario="Iniciar Sesion";
                    echo "<li><a href='login.php'>$usuario</a></li>";

                }
                ?>
                <li><a href="ubicacion.html">Donde encontrarnos</a></li>

            </ul>
        </nav>
    </header>
    <div class="video">
        <iframe width="460" height="315" src="https://www.youtube.com/embed/ow935BLi-hE?si=GnAyyGXoJHYNcefF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <aside class="info">
            <p>Aqui encontraras las mejores marcas a los mejores precios, lo importante es que no solo te vendemos, sino que nos preocupamos que vistas bien</p>
        </aside>
    </div>
    <div class="title">
        <h1>SNICKS<br />SHOES</h1>

    </div>

    <h4 id="destacar">Productos Destacados</h4>

    <div id="destacados--inner">
        <i class="fa fa-angle-double-left" aria-hidden="true" id="slider-left"></i>
        <div class="slider-screen">
            <img name="Imagen" id="window" />
        </div>
        <i class="fa fa-angle-double-right" aria-hidden="true" id="slider-right"></i>
    </div>
    <h4 id="destacar">Scalpers</h4>


    <div id="container-shop">
        <i class="fa fa-angle-double-left" aria-hidden="true" id="slider-izquierda"></i>
        <div class="slider-screen">
            <img name="ropas" />
        </div>
        <i class="fa fa-angle-double-right" id="slider-derecha"></i>
    </div>
    <h4 id="destacar">Para Ellas</h4>
    <div id="container-shop">
        <i class="fa fa-angle-double-left" aria-hidden="true" id="deslizar-izquierda"></i>
        <div class="slider-screen">
            <img name="women" />
        </div>
        <i class="fa fa-angle-double-right" aria-hidden="true" id="deslizar-derecha"></i>
    </div>
    </div>
    <footer>
        <h5>Contactos:</h5>
        <a href="https://www.instagram.com"><img id="logo" src="assets/Imagenes/ii.webp" alt="" width="100px"></a>
        <a class="w" href="https://www.whatsapp.com"><img id="logo" src="assets/Imagenes/l.png" alt="" width="85px"></a>
        <hr class="selec">
        <address>
        </address>
    </footer>
    <script src="assets/js/slider.js"></script>

</body>

</html>