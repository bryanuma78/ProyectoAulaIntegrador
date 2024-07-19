<?php
include('../dataAccess/conexion/Conexion.php');

class Ventas {
    private $id;
    private $cliente_id;
    private $producto_id;
    private $cantidad;
    private $fecha;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getFecha() {
        return $this->fecha;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function addVenta(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO ventas (cliente_id, producto_id, cantidad, fecha) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->cliente_id,
                $this->producto_id,
                $this->cantidad,
                $this->fecha
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readVentas(): array {
        $ventas = [];
        try {
            $sql = "SELECT * FROM ventas";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $ventas;
    }

    public function updateVenta($id): bool {
        $success = false;
        try {
            $sql = "UPDATE ventas SET cliente_id = ?, producto_id = ?, cantidad = ?, fecha = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->cliente_id,
                $this->producto_id,
                $this->cantidad,
                $this->fecha,
                $id
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function deleteVenta($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM ventas WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }
}
?>
