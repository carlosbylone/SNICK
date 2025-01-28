<?php
include("conexion_bd.php"); 
$conexion=conectarBD(); 
session_start();


if(isset($_POST["botonEnvio"])){
    $nombre=isset($_POST["nombre"]) ? $_POST["nombre"]:"" ;
    $dni=isset($_POST["dni"]) ? $_POST["dni"]:"" ;
    $usuario=isset($_POST["user"]) ? $_POST["user"]:"" ;
    $password=isset($_POST["password"]) ? $_POST["password"]:"" ;
    $correo=isset($_POST["correo"]) ? $_POST["correo"]:"" ;
    $telefono=isset($_POST["telefono"]) ? $_POST["telefono"]:"" ;
    $direccion=isset($_POST["direccion"]) ? $_POST["direccion"]:"" ;
    $existe=false;
    $usuariosTablas=$conexion->prepare("SELECT DISTINCT usuario, contraseña from cliente where usuario=? and contraseña=?");
    $usuariosTablas->bind_param("ss",$usuario,$contraseña);
    $usuariosTablas->execute();
    $resultados=$usuariosTablas->get_result();

    if($resultados->num_rows>0){
        $fila = $resultados->fetch_assoc();
        $hash_password=$fila['contraseña'];
            if(password_verify($password, $hash_password)){
                $_SESSION['username']=$usuario;
                header('Location:index.php?usuario=true');
                exit();
            }else{
                echo"La contraseña es incorrecta.";
            }
       
        
    }else{
        echo"El usuario no esta registrado.";
    }
    $usuariosTablas->close();
}