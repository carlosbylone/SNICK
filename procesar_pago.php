<?php
session_start();
include_once("conexion_bd.php");

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$dni = $_SESSION['DNI'];
$id_cliente = $_SESSION['ID_CLIENTE'] ?? $_SESSION['ID'] ?? null;

$conexion = conectarBD();
$total = isset($_POST['total']) ? floatval($_POST['total']) : 0;

if ($total > 0) {
    $stmt = $conexion->prepare("INSERT INTO pagos (usuario_id, total, fecha) VALUES (?, ?, NOW())");
    $stmt->bind_param("id", $id_cliente, $total);
    
    if ($stmt->execute()) {
        $stmt = $conexion->prepare("DELETE FROM carrito WHERE id_cliente = ?");
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        
        // Redireccionar a la página de confirmación
        header("Location: confirmacion_pago.php?status=success");
        exit();
    } 
} else {
    header("Location: carrito.php?error=invalid_amount");
    exit();
}
?>
