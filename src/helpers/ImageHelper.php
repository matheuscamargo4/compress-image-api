<?php

use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageHelper
{
    public static function compressImage($filePath)
    {
        try {
            // Cria um objeto de otimização de imagem com a configuração padrão
            $optimizerChain = OptimizerChainFactory::create();

            // Otimiza a imagem
            $optimizerChain->optimize($filePath);

            // Retorna o caminho da imagem otimizada
            return $filePath;
        } catch (Exception $e) {
            throw new Exception("Erro ao otimizar a imagem: " . $e->getMessage());
        }
    }
}
?>
