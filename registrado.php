<?php
include("conexion_bd.php");
include("registrado.js");
$conexion = conectarBD();

if(isset($_POST["registrado"])) {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $insert = "INSERT INTO cliente (DNI, nombre, Correo_Electronico, Numero_de_Telefono, direccion, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $statement = $conexion->prepare($insert);

        $statement->bind_param('sssisss', $dni, $nombre, $correo, $telefono, $direccion, $usuario, $hashedPassword);

        $statement->execute();

        header('Location:index.php?usuario=true');

    } catch (Exception $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    } finally {
        $statement->close();
        $conexion->close();
    }
}
?>
