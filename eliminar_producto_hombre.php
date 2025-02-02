<?php
include_once("conexion_bd.php");
include_once("Productos.php");
session_start();
var_dump($_SESSION['nombre']);
if ($_SESSION['nombre'] !== 'Admin') {
    die("No tienes permisos para eliminar productos.");
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $conexion = conectarBD();
    $id = intval($_POST['id']);

    $sql = "DELETE FROM productos WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
       header("Location: Hombre.php?msg=Producto eliminado correctamente");
        exit();
    } else {
        
        echo "Error al eliminar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
  
    echo "Acceso no permitido.";
}
?>
