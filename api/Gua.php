<?php
header('Content-Type: application/json');
require_once 'conexion.php';

// 1. Recibir el texto que mandó el JavaScript
$datos = json_decode(file_get_contents('php://input'), true);
$contenido = trim($datos['contenido'] ?? '');

// 2. Si viene vacío, rechazar
if ($contenido === '') {
    http_response_code(400);
    echo json_encode(['error' => 'La nota no puede estar vacía']);
    exit;
}

// 3. Generar aleatoriedades
$posX = mt_rand(0, 80); 
$posY = mt_rand(0, 70);
$rotacion = mt_rand(-8, 8);
$totalTexturas = 1; // Cambiar el num en base a las texturas agregadas en la carpeta
$textura = mt_rand(1, $totalTexturas);

// 4. Guardar en la base de datos
$stmt = $pdo->prepare('INSERT INTO notas (Cont, PosX, PosY, Rotacion, Textura) VALUES (?, ?, ?, ?, ?)');
$stmt->execute([$contenido, $posX, $posY, $rotacion, $textura]);

// 5. Devolver la nota recién creada, para que JS la pinte sin recargar la página
echo json_encode([
    'Id' => $pdo->lastInsertId(),
    'Cont' => $contenido,
    'PosX' => $posX,
    'PosY' => $posY,
    'Rotacion' => $rotacion,
    'textura' => $textura
]);