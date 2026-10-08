<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$datos = json_decode(file_get_contents('php://input'), true);
$id = (int)($datos['id'] ?? 0);

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'ID inválido']);
    exit;
}

$stmt = $pdo->prepare('DELETE FROM notas WHERE Id = ?');
$stmt->execute([$id]);

echo json_encode(['success' => true]);