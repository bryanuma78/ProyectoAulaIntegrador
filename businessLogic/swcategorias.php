<?php
include('../dataAccess/conexion/Conexion.php');

class Categorias {
    private $conexionDB;

    public function __construct() {
        $conexion = new ConexionDB();
        $this->conexionDB = $conexion->conectar();
    }

    public function addCategoria($nombre, $descripcion, $imagen) {
        try {
            $sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria, imagen_categoria) VALUES (?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $imagen]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCategorias() {
        try {
            $sql = "SELECT * FROM categorias";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateCategoria($id, $nombre, $descripcion, $imagen) {
        try {
            $sql = "UPDATE categorias SET nombre_categoria = ?, descripcion_categoria = ?, imagen_categoria = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $imagen, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteCategoria($id) {
        try {
            $sql = "DELETE FROM categorias WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

$categoria = new Categorias();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_categoria'];
    $descripcion = $_POST['descripcion_categoria'];
    $imagen = $_POST['imagen_categoria'];
    $result = $categoria->addCategoria($nombre, $descripcion, $imagen);
    echo json_encode(['success' => $result]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $categoria->getCategorias();
    echo json_encode($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id'];
    $nombre = $_PUT['nombre_categoria'];
    $descripcion = $_PUT['descripcion_categoria'];
    $imagen = $_PUT['imagen_categoria'];
    $result = $categoria->updateCategoria($id, $nombre, $descripcion, $imagen);
    echo json_encode(['success' => $result]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    $result = $categoria->deleteCategoria($id);
    echo json_encode(['success' => $result]);
}
?>