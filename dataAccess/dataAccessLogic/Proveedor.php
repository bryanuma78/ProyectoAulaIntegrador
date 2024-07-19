<?php
include('../dataAccess/conexion/Conexion.php');

class Proveedor {
    private $ID_proveedor;
    private $Nombre_proveedor;
    private $Contacto;
    private $Terminos_negociacion;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    public function setNombreProveedor($nombre) {
        $this->Nombre_proveedor = $nombre;
    }

    public function setContacto($contacto) {
        $this->Contacto = $contacto;
    }

    public function setTerminosNegociacion($terminos) {
        $this->Terminos_negociacion = $terminos;
    }

    public function addProveedor(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO Proveedor (Nombre_proveedor, Contacto, Terminos_negociacion) 
                    VALUES (?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->Nombre_proveedor,
                $this->Contacto,
                $this->Terminos_negociacion
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readProveedores(): array {
        $proveedores = [];
        try {
            $sql = "SELECT * FROM Proveedor";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $proveedores;
    }

    public function updateProveedor($id): bool {
        $success = false;
        try {
            $sql = "UPDATE Proveedor SET Nombre_proveedor = ?, Contacto = ?, Terminos_negociacion = ? WHERE ID_proveedor = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->Nombre_proveedor,
                $this->Contacto,
                $this->Terminos_negociacion,
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

    public function deleteProveedor($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM Proveedor WHERE ID_proveedor = ?";
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
