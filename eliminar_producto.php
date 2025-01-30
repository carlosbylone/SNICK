<?php
include_once("conexion_bd.php");
session_start();

if ($_SESSION['nombre'] !== 'Admin') {
    die("No tienes permisos para eliminar productos.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $conexion = conectarBD();
    $id = intval($_POST['id']);

    $sql = "DELETE FROM productos_mujer WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: Mujer.php?msg=Producto eliminado");
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>
