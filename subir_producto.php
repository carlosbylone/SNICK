<?php
session_start();
include_once("conexion_bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre_producto'], $_POST['Precio']) && isset($_FILES['Imagen'])) {
        $nombre_producto = $_POST['nombre_producto'];
        $precio = $_POST['Precio'];
        
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $nombreArchivo = basename($_FILES["Imagen"]["name"]);
        $target_file = $target_dir . $nombreArchivo;

        if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $target_file)) {
            $conexion = conectarBD();
            $sql = "INSERT INTO productos(Imagen, nombre_productos, Precio) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssd", $target_file, $nombre_producto, $precio);

            if ($stmt->execute()) {
                header("Location: Hombre.php?msg=Producto añadido correctamente");
                exit();
            } else {
                echo "Error al añadir el producto: " . $stmt->error;
            }
            $stmt->close();
            $conexion->close();
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "Método no permitido.";
}
?>
