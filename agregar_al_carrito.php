<?php
session_start();
include_once("conexion_bd.php");
$conexion = conectarBD();

// 1. Verificamos que venga por POST y que exista 'id_producto'
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_producto'])) {
    $id_producto = intval($_POST['id_producto']);

    // 2. Obtenemos info del producto
    $sqlProd = "SELECT * FROM productos WHERE ID = ?";
    $stmt = $conexion->prepare($sqlProd);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificamos si existe el producto
    if ($resultado->num_rows === 1) {
        $producto = $resultado->fetch_assoc();
        $ruta        = $producto['Imagen'];           // Columna en la BD 'productos'
        $nombreProd  = $producto['nombre_productos']; // Columna en la BD 'productos'
        $precio      = floatval($producto['Precio']); // Columna en la BD 'productos'
        $cantidad    = 1; // Puedes cambiarlo o recibirlo por POST

        // 3. Calculamos el precio total
        $precio_total = $precio * $cantidad;

        // 4. Obtenemos el id_cliente (si tuvieras tabla 'cliente')
        // Supongamos que guardas en $_SESSION['nombre'] el usuario
        // y en la tabla 'cliente' tienes un campo 'usuario' y 'ID'.
        // Si no tienes, pon un valor por defecto: $idCliente = 0;

        $usuarioLogueado = $_SESSION['nombre'];
        $idCliente = 0; // Valor por defecto, en caso de no tener relación

        // Ejemplo: Buscamos en 'cliente' para extraer su ID real
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

        // 5. Insertar en la tabla 'carrito'
        $sqlInsert = "INSERT INTO carrito (id_cliente, ruta, nombre, precio, cantidad, Precio_total)
                      VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        // Tipos de bind_param: i = integer, s = string, d = double
        // El orden coincide con la lista (id_cliente (i), ruta (s), nombre (s), precio (d), cantidad (i), Precio_total (d))
        $stmtInsert->bind_param("issiid", $idCliente, $ruta, $nombreProd, $precio, $cantidad, $precio_total);

        if ($stmtInsert->execute()) {
            // 6. Redirigimos de nuevo (u otra página) con mensaje
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
