<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$resultado = $pdo->query('SELECT * FROM notas');
$filas = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($filas);