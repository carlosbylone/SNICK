<?php
session_start();
include_once("conexion_bd.php");
$conexion=conectarBD();
require('fpdf/fpdf.php'); 
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php?intento=true");
    exit();
}

$usuario = $_SESSION['nombre'];
$id_cliente = $_SESSION['ID_CLIENTE'] ?? $_SESSION['ID'] ?? null;


$stmt = $conexion->prepare("SELECT Correo_electronico, DNI FROM cliente WHERE ID = ?");
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

$dni_usuario = $cliente['DNI'];

$stmt = $conexion->prepare("SELECT total, fecha FROM pagos WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 1");
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$resultado = $stmt->get_result();
$pago = $resultado->fetch_assoc();

$total_pago = $pago['total'];
$fecha_pago = $pago['fecha'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Factura de Compra', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 10, "Nombre: $usuario", 0, 1);
$pdf->Cell(100, 10, "DNI: $dni_usuario", 0, 1);
$pdf->Cell(100, 10, "Fecha de Pago: $fecha_pago", 0, 1);
$pdf->Cell(100, 10, "Total Pagado: €$total_pago", 0, 1);
$pdf->Ln(10);
$pdf->Cell(190, 10, 'Gracias por su compra.', 0, 1, 'C');

$pdf->Output('D', "Factura_$usuario.pdf");
?>
