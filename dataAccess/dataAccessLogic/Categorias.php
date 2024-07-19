<?php
include('../dataAccess/conexion/Conexion.php');

class Categorias {
    private $id;
    private $nombre_categoria;
    private $descripcion_categoria;
    private $imagen_categoria;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    public function addcategorias(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria, imagen_categoria) VALUES (?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->nombre_categoria, $this->descripcion_categoria, $this->imagen_categoria]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readcategorias(): array {
        $categorias = [];
        try {
            $sql = "SELECT * FROM categorias";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $categorias;
    }

    public function updatecategorias($id): bool {
        $success = false;
        try {
            $sql = "UPDATE categorias SET nombre_categoria = ?, descripcion_categoria = ?, imagen_categoria = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->nombre_categoria, $this->descripcion_categoria, $this->imagen_categoria, $id]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function deletecategorias($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM categorias WHERE id = ?";
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

    // Getters and setters
    public function setNombreCategoria($nombre) {
        $this->nombre_categoria = $nombre;
    }

    public function setDescripcionCategoria($descripcion) {
        $this->descripcion_categoria = $descripcion;
    }

    public function setImagenCategoria($imagen) {
        $this->imagen_categoria = $imagen;
    }

    public function getNombreCategoria() {
        return $this->nombre_categoria;
    }

    public function getDescripcionCategoria() {
        return $this->descripcion_categoria;
    }

    public function getImagenCategoria() {
        return $this->imagen_categoria;
    }
}
?>

