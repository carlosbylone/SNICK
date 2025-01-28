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
    
    $usuariosTablas = $conexion->prepare("SELECT DISTINCT usuario, contraseña FROM cliente WHERE usuario=?");
    $usuariosTablas->bind_param("s", $usuario);
    $usuariosTablas->execute();
    $resultados = $usuariosTablas->get_result();

    if ($resultados->num_rows > 0) {
        $fila = $resultados->fetch_assoc();
        $hash_password = $fila['contraseña']; // Asegúrate de que "contraseña" sea el nombre exacto del campo
        $user = $fila['usuario'];

        if (password_verify($password, $hash_password)) {
            $_SESSION['nombre'] = $usuario;
            header('Location:inicio.php?usuario=true');
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
