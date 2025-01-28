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
    <form action="registrado.php" id="formulario" method="post" class="form">
        <div class="arrow">
            <a href="login.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
        </div>
        <h1 class="form_title" style="color:burlywood; font-size:40px;">SNICKS</h1>
        <h2>Registrate</h2>
        <div class="form_container">
            <div class="form_group">
                <input type="text" name="nombre" id="nombre" class="form_input" placeholder="" required>
                <label for="nombre" class="form_label">Introduce tu nombre</label>
                <span class="form_line"></span>
                <p id="validado-name"></p>
            </div> 
            <div class="form_group">
                <input type="text" name="direccion" id="direccion" class="form_input" placeholder="" required>
                <label for="direccion" class="form_label">Introduce tu direccion</label>
                <span class="form_line"></span>
                <p id="validado"></p>

            </div>
            <div class="form_group">
                <input type="text" name="dni" id="dni" class="form_input" placeholder="" required>
                <label for="dni" class="form_label">DNI/NIF/NIE</label>
                <span class="form_line"></span>
                <p id="validado-dni"></p>

            </div>
            <div class="form_group">
                <input type="email" name="correo" id="correo" class="form_input" placeholder="" required>
                <label for="correo" class="form_label">Introduce tu correo</label>
                <span class="form_line"></span>
                <p id="validado-correo"></p>

            </div>
            <div class="form_group">
                <input type="text" name="telefono" id="telefono" class="form_input" placeholder="" required>
                <label for="telefono" class="form_label">Introduce tu teléfono</label>
                <span class="form_line"></span>
                <p id="validado-phone"></p>

            </div>
            <div class="form_group">
                <input type="text" name="usuario" id="usuario" class="form_input" placeholder="" required>
                <label for="usuario" class="form_label">Introduce tu usuario</label>
                <span class="form_line"></span>
                <p id="validado-user"></p>

            </div>
            <div class="form_group">
                <input type="password" name="password" id="password" class="form_input" placeholder="" required>
                <label for="password" class="form_label">Introduce tu contraseña</label>
                <span class="form_line"></span>
                <p id="validado-password"></p>

            </div>
            <div class="form_group">
                <input type="password" name="confirma_password" id="confirma_password" class="form_input" placeholder="" required>
                <label for="password" class="form_label">Confirma tu contraseña</label>
                <span class="form_line"></span>
                <p id="validado-repass"></p>

            </div>
            <div class="politica">
                <input type="checkbox" name="" id="" required> 
                <label for="">Acepto la política de la empresa</label>

            </div>
            <input type="submit" value="Registrarse" class="form_submit" name="registro">
        </div>
    </form>
    <script src="assets/js/validacion.js"></script>
    <script src="assets/js/validar.js"></script>
</body>
</html>
