<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/registro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

</head>

<body id="container">
    <form action="validar.php" method="post" class="form">
        
    <div class="arrow">
        <a href="login.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
        </div>
        <h1 class="form_title" style="color:burlywood; font-size:40px; ">SNICKS</h1>
        <h2>Registrate</h2>
        <div class="form_container">
            <div class="form_group">
                <input type="text" name="nombre" class="form_input" placeholder="">
                <label for="nombre" class="form_label">Introduce tu nombre</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="text" name="user" class="form_input" placeholder="">
                <label for="user" class="form_label">Introduce tu usuario</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="password" name="password" class="form_input" placeholder="">
                <label for="password" class="form_label">Introduce tu contraseña</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="password" name="confirma_password" class="form_input" placeholder="">
                <label for="password" class="form_label">Confirma tu contraseña</label>
                <span class="form_line"></span>
            </div>
            <div class="politica">
            <input type="checkbox" name="" id="" required> <label for="">Acepto la politica de la empresa</label>
            </div>
            <input type="submit" value="Registrarse" class="form_submit" name="registro">
            
        </div>
    </form>
    </div>
<script src="assets/js/validacion.js"></script>
</body>

</html>