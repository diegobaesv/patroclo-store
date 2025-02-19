<?php
require_once __DIR__ . '/../app/config/Database.php';
require_once __DIR__ . '/../app/models/Categoria.php';

echo "<p>Hola desde index.php</p>";

$database = new Database();
$conn = $database->getConnection();

if ($conn) {
    echo "<p>La conexion ha sido exitosa :D</p>";
} else {
    echo "<p>La conexion ha fallado :(</p>";
}

$categoriaModel = new Categoria($conn);

$categorias = $categoriaModel->listarCategorias();

echo "<div>";
print_r($categorias);
echo "</div>";