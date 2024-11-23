<?php
// Ponto de entrada para API. Vai redirecionar as requisições para os controladores
// Por que a pasta Public? Porque apenas os arquivos que realmente precisam ser acessíveis pela web ficam na pasta public (como index.php).
// Isso protege outros arquivos sensíveis, como configurações (config/), lógica do negócio (src/ ou app/), e bibliotecas (vendor/), que não devem ser acessíveis diretamente via URL.
