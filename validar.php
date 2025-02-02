<?php 
session_start();
include_once("conexion_bd.php"); 
$conexion = conectarBD(); 

if (isset($_POST["botonEnvio"])) {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    
    if($usuario==="admin"||$usuario==="ADMIN"){
        if($password==="Admin"){
            $_SESSION['nombre'] = "Admin";
            header('Location:index.php?admin=true');
            exit();
        }
    }
    $usuariosTablas = $conexion->prepare("SELECT DISTINCT ID, usuario, contraseña, dni FROM cliente WHERE usuario=?");
    $usuariosTablas->bind_param("s", $usuario);
    $usuariosTablas->execute();
    $resultados = $usuariosTablas->get_result();

    if ($resultados->num_rows > 0) {
        $fila = $resultados->fetch_assoc();
        $hash_password = $fila['contraseña']; 
        $user = $fila['usuario'];
        $dni_usuario = $fila['dni'];
        $id_usuario=$fila['ID'];

        if (password_verify($password, $hash_password)) {
            $_SESSION['nombre'] = $usuario;
            $_SESSION['ID_CLIENTE'] = $id_usuario;
            $_SESSION['ID'] = $id_usuario;
            $_SESSION['DNI'] = $dni_usuario;
            header('Location:index.php?usuario=true');
            exit();
        } else {
            echo "La contraseña es incorrecta.";
        }
    } else {
        echo "El usuario no está registrado.";
    }
    $usuariosTablas->close();
}
?>
