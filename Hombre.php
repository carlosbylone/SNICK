<?php
if(!isset($_SESSION['username'])){
  header("Location:login.php?intento=true");
  exit();
}else{
  session_start();
}
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
      <li><a href="Hombre.php">Hombre</a></li>
      <li><a href="Mujer.php">Mujer</a></li>

      <li><a href="ubicacion.html">Donde encontrarnos</a></li>

    </ul>
  </nav>
  </header>
  <i class="fa fa-shopping-cart" id="bueno"></i>
  <section id="container">
    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="110,00">
        <input type="hidden" name="titulo" id="titulo" value="Jersey Scalpers">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/je.jpg">
        <div id="product-description">
          <h5 class="product-title">Jersey Scalpers</h5>
          <p class="product-precio">110,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="120,00">
        <input type="hidden" name="titulo" id="titulo" value="Jersey Scalpers">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/je2.jpg">
        <div>
          <h5 class="product-title">Jersey Scalpers</h5>
          <p class="product-precio">120,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Chaqueta militar">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/modelo2.jpg">
        <div>
          <h5 class="product-title">Chaqueta militar</h5>
          <p class="product-precio">50,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="40,00">
        <input type="hidden" name="titulo" id="titulo" value="Camisa Oliva">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/Camisa.webp">
        <div>
          <h5 class="product-title">Chaqueta paramilitar</h5>
          <p class="product-precio">40,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="1050,00">
        <input type="hidden" name="titulo" id="titulo" value="Brunello Cucinelli">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/cucinelli.webp">
        <div>
          <h5 class="product-title">Burnello Cucinelli</h5>
          <p class="product-precio">1050,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Camisa Beige">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/camisa1.webp">
        <div>
          <h5 class="product-title">Camisa Beige</h5>
          <p class="product-precio">50,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Camisa Negra">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/camisa2.webp">
        <div>
          <h5 class="product-title">Camisa Negra</h5>
          <p class="product-precio">50,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="20,00">
        <input type="hidden" name="titulo" id="titulo" value="Camiseta">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/camiseta.webp">
        <div>
          <h5 class="product-title">Camiseta</h5>
          <p class="product-precio">20,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="39,99">
        <input type="hidden" name="titulo" id="titulo" value="Chaqueta jeans">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/chaqueta jeans.webp">
        <div>
          <h5 class="product-title">Chaqueta Jeans</h5>
          <p class="product-precio">39,99€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Polo">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/polo1.webp">
        <div>
          <h5 class="product-title">Polo</h5>
          <p class="product-precio">50,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Pantalon corto">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/pantalon corto.webp">
        <div>
          <h5 class="product-title">Pantalon corto</h5>
          <p class="product-precio">50,00€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>

    <div class="product">
      <form action="cart.php" id="formulario" name="formulario" method="post">
        <input type="hidden" name="precio" id="precio" value="50,00">
        <input type="hidden" name="titulo" id="titulo" value="Americana">
        <input type="hidden" name="cantidad" id="cantidad" value="1">
        <img src="assets/Imagenes/americana.webp">
        <div>
          <h5 class="product-title">Polo</h5>
          <p class="product-precio">63,99€</p>
          <button class="btn btn-primary" id="boton" type="submit"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
        </div>
      </form>
    </div>




  </section>
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