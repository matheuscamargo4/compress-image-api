<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\ImageOptimizer\OptimizerChainFactory;

// Função para verificar se o arquivo enviado é uma imagem válida
function isValidImage($file) {
    return isset($file['tmp_name']) && exif_imagetype($file['tmp_name']);
}

// Função para compressão de imagem e salvamento no diretório "compressed"
function compressImage($imagePath, $outputPath, $quality = 75) {
    // Cria a cadeia de otimizadores
    $optimizerChain = OptimizerChainFactory::create();

    // Realiza a compressão
    $optimizerChain->optimize($imagePath);

    // Copia a imagem comprimida para o diretório de imagens comprimidas
    move_uploaded_file($imagePath, $outputPath);

    // Retorna a imagem comprimida em Base64
    return base64_encode(file_get_contents($outputPath));
}

try {
    // Verifica se a requisição é POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        error_log("Método não permitido. Apenas POST permitido.");
        echo json_encode(['error' => 'Método não permitido, use POST.']);
        exit;
    }

    // Verifica se o arquivo foi enviado
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        error_log("Erro ao enviar a imagem.");
        echo json_encode(['error' => 'Erro ao enviar a imagem.']);
        exit;
    }

    // Caminho do arquivo enviado
    $imagePath = $_FILES['image']['tmp_name'];

    // Cria um nome único para a imagem comprimida
    $imageName = uniqid('compressed_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $outputPath = __DIR__ . '/../compressed/' . $imageName;

    // Cria o diretório "compressed/" caso não exista
    if (!file_exists(__DIR__ . '/../compressed')) {
        mkdir(__DIR__ . '/../compressed', 0777, true);
    }

    // Realiza a compressão da imagem e salva no diretório "compressed/"
    $compressedImageBase64 = compressImage($imagePath, $outputPath, 85); // 85% de qualidade como exemplo

    // Prepare a resposta JSON com a imagem comprimida em Base64
    $response = [
        'compressed_image' => 'data:image/jpeg;base64,' . $compressedImageBase64,
        'image_url' => '/compressed/' . $imageName
    ];

    // Log da resposta para depuração
    error_log("Resposta JSON: " . json_encode($response));

    // Retorna a resposta JSON
    echo json_encode($response);

} catch (Exception $e) {
    // Caso algum erro ocorra
    error_log("Erro no servidor: " . $e->getMessage());
    echo json_encode(['error' => $e->getMessage()]);
}
