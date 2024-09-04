<?php
if(!isset($_SESSION['username'])){
    header("Location:login.php?intento=true");
    exit();
  }else{
    session_start();
  }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/mujer.css">
    <title>Mujer</title>
</head>

<body>
    <header>
    <nav>

<ul>
    <li><a href="inicio.php">Inicio</a></li>
    <li><a href="Hombre.php">Hombre</a></li>
    <li><a href="Mujer.php">Mujer</a></li>
    <li>
        <a href="carrito.php"><i class="fa fa-shopping-cart"></i></a>
    </li>
    <li><a href="login.php">Iniciar sesión</a></li>
    <li><a href="ubicacion.html">Donde encontrarnos</a></li>

</ul>
</nav>
    </header>
    <section id="container">
        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="50">
                <input type="hidden" name="titulo" id="titulo" value="Vestido">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/ves.jpg">
                <div id="product-description">
                    <h4 class="product-title">Vestido</h4>
                    <p class="product-precio">50€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="39,99">
                <input type="hidden" name="titulo" id="titulo" value="Conjunto gris">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/women2.jpg">
                <div>
                    <h4 class="product-title">Conjunto gris</h4>
                    <p class="product-precio">39.99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="39,99">
                <input type="hidden" name="titulo" id="titulo" value="Conjunto negro">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/womenn.jpg">
                <div>
                    <h4 class="product-title">Conjunto negro</h4>
                    <p class="product-precio">39,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="254,99">
                <input type="hidden" name="titulo" id="titulo" value="Conjunto de diseño">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/con2.jpg">
                <div>
                    <h4 class="product-title">Conjunto de diseño</h4>
                    <p class="product-precio">254,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>
        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="69,99">
                <input type="hidden" name="titulo" id="titulo" value="Conjunto Rojo">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/conjunto1.webp">
                <div>
                    <h4 class="product-title">Conjunto Rojo</h4>
                    <p class="product-precio">69,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="100,99">
                <input type="hidden" name="titulo" id="titulo" value="Vestido Verde">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/vestido gala.webp">
                <div>
                    <h4 class="product-title">Conjunto verde</h4>
                    <p class="product-precio">100,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="49,99">
                <input type="hidden" name="titulo" id="titulo" value="Vestido Playa">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/VestidoPlaya.webp">
                <div>
                    <h4 class="product-title">Vestido playa</h4>
                    <p class="product-precio">49,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="9,99">
                <input type="hidden" name="titulo" id="titulo" value="Blusa">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/blusa.webp">
                <div>
                    <h4 class="product-title">Blusa</h4>
                    <p class="product-precio">9,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="59,99">
                <input type="hidden" name="titulo" id="titulo" value="Blusa ingles">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/Blusaingles.webp">
                <div>
                    <h4 class="product-title">Blusa ingles</h4>
                    <p class="product-precio">59,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="39,99">
                <input type="hidden" name="titulo" id="titulo" value="Conjunto blanco elegante">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/elegantemujer.webp">
                <div>
                    <h4 class="product-title">Conjunto blanco elegante</h4>
                    <p class="product-precio">39,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="99,99">
                <input type="hidden" name="titulo" id="titulo" value="Vestido Coral">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/coral.webp">
                <div>
                    <h4 class="product-title">Vestido Coral</h4>
                    <p class="product-precio">99,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="product">
            <form action="cart.php" id="formulario" name="formulario" method="post">
                <input type="hidden" name="precio" id="precio" value="20,99">
                <input type="hidden" name="titulo" id="titulo" value="Falda larga">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <img src="assets/Imagenes/falda larga.webp">
                <div>
                    <h4 class="product-title">Falda larga</h4>
                    <p class="product-precio">20,99€</p>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

    </section>

    <hr>
    <footer>
        <h4>Contactos:</h4>
        <a href="https://www.instagram.com"><img id="logo" src="assets/Imagenes/ii.webp" alt="" width="100px"></a>
        <a class="w" href="https://www.whatsapp.com"><img id="logo" src="assets/Imagenes/l.png" alt="" width="85px"></a>
    </footer>
    <script src="assets/js/EventosTienda.js"></script>
</body>

</html>