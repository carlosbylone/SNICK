<?php
session_start();
include_once("conexion_bd.php");

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$usuarioSesion = $_SESSION['nombre'];
$conexion = conectarBD();

$sql = "SELECT * FROM cliente WHERE usuario = ? LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuarioSesion);
$stmt->execute();
$result = $stmt->get_result();
$datosUsuario = $result->fetch_assoc();
$stmt->close();

// Verificar que sí haya un registro
if (!$datosUsuario) {
    echo "<p>No se encontró el usuario en la base de datos.</p>";
    $conexion->close();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $nuevoUsuario = $_POST['usuario'];
    $nuevaDireccion = $_POST['direccion'];
    
    $nuevaPass = $_POST['password'];
    $sqlUpdate = "";
    $params = [];
    $types = "";
    
    if (!empty($nuevaPass)) {
        $hash = password_hash($nuevaPass, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE cliente SET usuario = ?, Direccion = ?, contraseña = ? WHERE ID = ?";
        $params = [$nuevoUsuario, $nuevaDireccion, $hash, $datosUsuario['ID']];
        $types = "sssi";
    } else {
        $sqlUpdate = "UPDATE cliente SET usuario = ?, Direccion = ? WHERE ID = ?";
        $params = [$nuevoUsuario, $nuevaDireccion, $datosUsuario['ID']];
        $types = "ssi";
    }
    
    $stmtUp = $conexion->prepare($sqlUpdate);
    $stmtUp->bind_param($types, ...$params);
    
    if ($stmtUp->execute()) {
        $_SESSION['nombre'] = $nuevoUsuario;
        header("Location: usuario.php?msg=Datos actualizados");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmtUp->error;
    }
    $stmtUp->close();
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/usuario.css">
</head>
<body>
<header>
<button class="navbar-toggle">
<i class="fas fa-bars"></i> </button>
    <nav>
        <ul>
            <li><a href="index.php" >Inicio</a></li>
            <li><a href="Hombre.php">Hombre</a></li>
            <li><a href="Mujer.php">Mujer</a></li>
            <?php
            if (isset($_SESSION['nombre'])) {
                echo "<li><a href='logout.php'>Cerrar Sesión</a></li>";
                
                if ($_SESSION['nombre'] !== 'Admin') {
                    echo "<li><a href='usuario.php' class='active'>$usuarioSesion</a></li>";
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

<section id="container-usuario">
    <h2>Datos de tu perfil</h2>
    <?php if (isset($_GET['msg'])) { ?>
        <p class="mensaje"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php } ?>
    <form class="usuario-form" action="usuario.php" method="post">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" 
               value="<?php echo htmlspecialchars($datosUsuario['usuario']); ?>" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion"
               value="<?php echo htmlspecialchars($datosUsuario['Direccion']); ?>">

        <label for="password">Nueva contraseña (déjalo en blanco si no deseas cambiarla):</label>
        <input type="password" id="password" name="password">

        <button type="submit" name="actualizar">Actualizar Datos</button>
    </form>
</section>
<script src="assets/js/responsive.js"></script>

</body>
</html>
