<?php
include('../businessLogic/swventas.php');

$ventas = json_decode(file_get_contents('php://input'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ventas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente ID</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta as $venta): ?>
                <tr>
                    <td><?php echo $venta['id']; ?></td>
                    <td><?php echo $venta['cliente_id']; ?></td>
                    <td><?php echo $venta['producto_id']; ?></td>
                    <td><?php echo $venta['cantidad']; ?></td>
                    <td><?php echo $venta['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
