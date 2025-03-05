<?php
class Categoria {
    private $conn;
    private $tableName = "categorias";

    public function __construct($db){
        $this->conn = $db;
    }

    public function listarCategorias(){
        $query = "SELECT * FROM " . $this->tableName . " WHERE estado_auditoria = '1' ORDER BY fecha_creacion_auditoria DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerCategoria($idCategoria){
        $query = "SELECT * FROM " . $this->tableName . " WHERE estado_auditoria = '1' AND id_categoria = :id_categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_categoria',$idCategoria);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }

    public function insertarCategoria($categoria){
        $query = "INSERT INTO " . $this->tableName . " (nombre, imagen_url) VALUES ( :nombre, :imagenUrl  )";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre',$categoria['nombre']);
        $stmt->bindParam(':imagenUrl',$categoria['imagenUrl']);
        return $stmt->execute();
    }

    public function actualizarCategoria($categoria){
        $query = "UPDATE " . $this->tableName . " SET nombre = :nombre , imagen_url = :imagenUrl WHERE id_categoria = :idCategoria";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre',$categoria['nombre']);
        $stmt->bindParam(':imagenUrl',$categoria['imagenUrl']);
        $stmt->bindParam(':idCategoria',$categoria['idCategoria']);
        return $stmt->execute();
    }

    public function darBajaCategoria(){

    }

}
