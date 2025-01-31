<?php
include_once("conexion_bd.php");
include_once("Productos.php");
session_start();
var_dump($_SESSION['nombre']);
if ($_SESSION['nombre'] !== 'Admin') {
    die("No tienes permisos para eliminar productos.");
}


// ... (resto de tu código PHP)

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $conexion = conectarBD();
    $id = intval($_POST['id']);

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos_mujer WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirigir a la página de productos con un mensaje de éxito
        header("Location: Mujer.php?msg=Producto eliminado correctamente");
        exit();
    } else {
        // Mostrar un mensaje de error
        echo "Error al eliminar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    // Si no se ha enviado el formulario de eliminación, mostrar un mensaje de error
    echo "Acceso no permitido.";
}
?>
