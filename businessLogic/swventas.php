<?php
include('../dataAccess/dataAccessLogic/Ventas.php');

$response = array('success' => false, 'message' => 'Invalid request');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer ventas
    $conexionDB = new ConexionDB();
    $venta = new Ventas($conexionDB);
    $ventas = $venta->readVentas();
    echo json_encode($ventas);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar venta
    $data = json_decode(file_get_contents('php://input'), true);
    $clienteId = $data['cliente_id'];
    $productoId = $data['producto_id'];
    $cantidad = $data['cantidad'];
    $fecha = $data['fecha'];

    $conexionDB = new ConexionDB();
    $venta = new Venta($conexionDB);
    $venta->setClienteId($clienteId);
    $venta->setProductoId($productoId);
    $venta->setCantidad($cantidad);
    $venta->setFecha($fecha);

    if ($venta->addVenta()) {
        $response['success'] = true;
        $response['message'] = 'Venta agregada correctamente';
    } else {
        $response['message'] = 'Error al agregar la venta';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar venta
    $data = json_decode(file_get_contents('php://input'), true);
    $idVenta = $data['id'];
    $clienteId = $data['cliente_id'];
    $productoId = $data['producto_id'];
    $cantidad = $data['cantidad'];
    $fecha = $data['fecha'];

    $conexionDB = new ConexionDB();
    $venta = new Venta($conexionDB);
    $venta->setClienteId($clienteId);
    $venta->setProductoId($productoId);
    $venta->setCantidad($cantidad);
    $venta->setFecha($fecha);

    if ($venta->updateVenta($idVenta)) {
        $response['success'] = true;
        $response['message'] = 'Venta actualizada correctamente';
    } else {
        $response['message'] = 'Error al actualizar la venta';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar venta
    $idVenta = intval($_GET['id']);

    $conexionDB = new ConexionDB();
    $venta = new Venta($conexionDB);
    if ($venta->deleteVenta($idVenta)) {
        $response['success'] = true;
        $response['message'] = 'Venta eliminada correctamente';
    } else {
        $response['message'] = 'Error al eliminar la venta';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>
