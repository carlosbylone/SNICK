<?php
include("conexion_bd"); 
session_start();
$conexion=conectarBD(); 

if(isset($_POST["registro"])){
    $nombre=isset($_POST["nombre"]);
    $usuario=isset($_POST["user"]);
    $password=isset($_POST["password"]);



}
