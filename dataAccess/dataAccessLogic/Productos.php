<?php
include('../dataAccess/conexion/Conexion.php');

class Productos {
    private $id_producto;
    private $nombre_producto;
    private $descripcion_producto;
    private $precio_producto;
    private $imagen_producto;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Getters
    public function getIdProductos() {
        return $this->id_producto;
    }

    public function getNombreProductos() {
        return $this->nombre_producto;
    }

    public function getDescripcionProductos() {
        return $this->descripcion_producto;
    }

    public function getPrecioProductos() {
        return $this->precio_producto;
    }

    public function getImagenProductos() {
        return $this->imagen_producto;
    }

    // Setters
    public function setIdProductos($id) {
        $this->id_producto = $id;
    }

    public function setNombreProductos($nombre) {
        $this->nombre_producto = $nombre;
    }

    public function setDescripcionProductos($descripcion) {
        $this->descripcion_producto = $descripcion;
    }

    public function setPrecioProductos($precio) {
        $this->precio_producto = $precio;
    }

    public function setImagenProductos($imagen) {
        $this->imagen_producto = $imagen;
    }

    public function addProducto(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, imagen_producto) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->nombre_producto,
                $this->descripcion_producto,
                $this->precio_producto,
                $this->imagen_producto
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readProductos(): array {
        $productos = [];
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $productos;
    }

    public function updateProductos($id): bool {
        $success = false;
        try {
            $sql = "UPDATE productos SET nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, imagen_producto = ? WHERE id_producto = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->nombre_producto,
                $this->descripcion_producto,
                $this->precio_producto,
                $this->imagen_producto,
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

    public function deleteProductos($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM productos WHERE id_producto = ?";
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

