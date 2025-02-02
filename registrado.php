<?php
include_once("conexion_bd.php");
$conexion = conectarBD();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $correoExiste=False;
    $usuariosTablas=$conexion->prepare("SELECT DISTINCT ID from cliente where Correo_Electronico=?");
    $usuariosTablas->bind_param("s",$correo);
    $usuariosTablas->execute();
    $resultados=$usuariosTablas->get_result();

    if($resultados->num_rows>0){
        $correoExiste=True;
    }else{
        $correoExiste=False;

    }
    if(!$correoExiste){

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $insert = "INSERT INTO cliente (DNI, nombre, Correo_Electronico, Numero_de_Telefono, direccion, usuario, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $statement = $conexion->prepare($insert);

        $statement->bind_param('sssisss', $dni, $nombre, $correo, $telefono, $direccion, $usuario, $hashedPassword);

        $statement->execute();
        $_SESSION['nombre']=$nombre;
        header('Location:index.php?usuario=true');
        exit();

    } catch (Exception $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    } finally {
        $statement->close();
        $conexion->close();

    }
}else{
    echo '<p>No se ha enviado ningun datos</p>';

}
}
?>
