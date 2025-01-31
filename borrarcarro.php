<?php
session_start();
include_once("conexion_bd.php");
$conexion = conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carrito'])) {
    $id_carrito = intval($_POST['id_carrito']);
    $sql = "DELETE FROM carrito WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_carrito);
    $stmt->execute();
    $stmt->close();
}
header("Location: carrito.php");
exit();
?>
