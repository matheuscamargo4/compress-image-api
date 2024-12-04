<?php

require_once 'ImageHelper.php';
require_once 'ImageController.php';

// Definir tipo de resposta como JSON
header('Content-Type: application/json');

// Verificar se é um pedido POST para compressão de imagem
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $response = ImageController::handleImageUpload($file);
        echo json_encode($response);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Arquivo de imagem não enviado."]);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método não permitido."]);
}
?>
