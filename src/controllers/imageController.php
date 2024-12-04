<?php

class ImageController
{
    public static function handleImageUpload($file)
    {
        try {
            // Pasta de destino para salvar as imagens processadas
            $destinationPath = '../uploads/';

            // Gera um nome único para o arquivo
            $uniqueFileName = uniqid() . '_' . basename($file['name']);
            $destination = $destinationPath . $uniqueFileName;

            // Move o arquivo para a pasta de uploads
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Chama a função para comprimir e otimizar a imagem
                $optimizedFile = ImageHelper::compressImage($destination);

                // Retorna a imagem otimizada ao cliente no formato Base64
                return [
                    "message" => "Imagem otimizada com sucesso.",
                    "file" => base64_encode(file_get_contents($optimizedFile)) // Imagem em base64
                ];
            } else {
                throw new Exception("Erro ao mover o arquivo enviado.");
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ["error" => $e->getMessage()];
        }
    }
}
?>
