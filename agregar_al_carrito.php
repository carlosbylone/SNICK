<?php
session_start();
include_once("conexion_bd.php");
$conexion = conectarBD();


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_producto'])) {
    $id_producto = intval($_POST['id_producto']);

    $categoria = $_POST['categoria']; 

    if ($categoria == "productos") {
        $sqlProd = "SELECT * FROM productos WHERE ID = ?";
    } elseif ($categoria == "productos_mujer") {
        $sqlProd = "SELECT * FROM productos_mujer WHERE ID = ?";
    }
    
    $stmt = $conexion->prepare($sqlProd);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $producto = $resultado->fetch_assoc();
        $ruta        = $producto['Imagen'];           
        $nombreProd  = $producto['nombre_productos']; 
        $precio      = floatval($producto['Precio']); 
        $cantidad    = 1; 

        $precio_total = $precio * $cantidad;

       
        $usuarioLogueado = $_SESSION['nombre'];
        $idCliente = 0; 

        $sqlCliente = "SELECT ID FROM cliente WHERE usuario = ? LIMIT 1";
        $stmtCliente = $conexion->prepare($sqlCliente);
        $stmtCliente->bind_param("s", $usuarioLogueado);
        $stmtCliente->execute();
        $resCliente = $stmtCliente->get_result();
        if ($resCliente->num_rows === 1) {
            $rowCliente = $resCliente->fetch_assoc();
            $idCliente = intval($rowCliente['ID']); 
        }
        $stmtCliente->close();

        $sqlInsert = "INSERT INTO carrito (id_cliente, ruta, nombre, precio, cantidad, Precio_total)
                      VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bind_param("issiid", $idCliente, $ruta, $nombreProd, $precio, $cantidad, $precio_total);

        if ($stmtInsert->execute()) {
            header("Location: Hombre.php?msg=Producto añadido al carrito");
            exit();
        } else {
            echo "Error al insertar en carrito: " . $stmtInsert->error;
        }
        $stmtInsert->close();

    } else {
        echo "No se encontró el producto con ID $id_producto";
    }

    $stmt->close();
} else {
    echo "Petición inválida.";
}

$conexion->close();
?>
