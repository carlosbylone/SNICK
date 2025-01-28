<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

</head>

<body id="section" class="light">
    <form action="validar.php" method="post" class="form">
        <div class="arrow">
            <a href="inicio.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
        </div>
        <div class="change">
            <i id="color" class="fa fa-adjust" aria-hidden="true"></i>
        </div>
        <h1 class="form_title" style="color:burlywood; font-size:40px; ">SNICKS</h1>
        <h2>Inicia Sesión</h2>
        <p>¿Aun no tienes cuenta? <a href="registro.php">Registrate aquí</a></p>

        <div class="form_container">

            <div class="form_group">
                <input type="text" name="user" class="form_input" placeholder="">
                <label for="user" class="form_label">Introduce tu usuario</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="password" name="password" class="form_input" placeholder="">
                <label for="password" class="form_label">Introduce tu contraseña</label>
                <span class="form_line"></span>
                <?php if(isset($_GET['intento'])){
                        echo"<span style='color:red;'>Incia sesion para acceder a esta pagina </span>";
                
            }
            if(isset($_GET['credenciales'])){
                echo"<span  style='color:red;>Credenciales incorrectas </span>";
            
            }
                    ?>
            </div>
            <input type="submit" value="Iniciar" class="form_submit" name="botonEnvio">
        </div>
    </form>
    <script src="assets/js/mode.js"></script>

</body>

</html>