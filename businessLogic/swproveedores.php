<?php
include('../dataAccess/dataAccessLogic/Proveedor.php');

$response = array('success' => false, 'message' => 'Invalid request');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer proveedores
    $conexionDB = new ConexionDB();
    $proveedor = new Proveedor($conexionDB);
    $proveedores = $proveedor->readProveedores();
    echo json_encode($proveedores);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar proveedor
    $data = json_decode(file_get_contents('php://input'), true);
    $nombreProveedor = $data['Nombre_proveedor'];
    $contacto = $data['Contacto'];
    $terminosNegociacion = $data['Terminos_negociacion'];

    $conexionDB = new ConexionDB();
    $proveedor = new Proveedor($conexionDB);
    $proveedor->setNombreProveedor($nombreProveedor);
    $proveedor->setContacto($contacto);
    $proveedor->setTerminosNegociacion($terminosNegociacion);

    if ($proveedor->addProveedor()) {
        $response['success'] = true;
        $response['message'] = 'Proveedor agregado correctamente';
    } else {
        $response['message'] = 'Error al agregar el proveedor';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar proveedor
    $data = json_decode(file_get_contents('php://input'), true);
    $idProveedor = $data['ID_proveedor'];
    $nombreProveedor = $data['Nombre_proveedor'];
    $contacto = $data['Contacto'];
    $terminosNegociacion = $data['Terminos_negociacion'];

    $conexionDB = new ConexionDB();
    $proveedor = new Proveedor($conexionDB);
    $proveedor->setNombreProveedor($nombreProveedor);
    $proveedor->setContacto($contacto);
    $proveedor->setTerminosNegociacion($terminosNegociacion);

    if ($proveedor->updateProveedor($idProveedor)) {
        $response['success'] = true;
        $response['message'] = 'Proveedor actualizado correctamente';
    } else {
        $response['message'] = 'Error al actualizar el proveedor';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar proveedor
    $idProveedor = intval($_GET['id']);

    $conexionDB = new ConexionDB();
    $proveedor = new Proveedor($conexionDB);
    if ($proveedor->deleteProveedor($idProveedor)) {
        $response['success'] = true;
        $response['message'] = 'Proveedor eliminado correctamente';
    } else {
        $response['message'] = 'Error al eliminar el proveedor';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>
