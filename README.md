# Compress Image API 📸✨

Este é um projeto de uma API em PHP que recebe uma imagem, comprime e retorna a versão otimizada da imagem. A API suporta os formatos **JPEG**, **PNG** e **GIF**. A compressão é realizada utilizando técnicas padrão de compressão de imagens com o objetivo de reduzir o tamanho do arquivo sem perda significativa de qualidade.

## Funcionalidades

- **Upload de Imagem**: A API aceita imagens nos formatos JPEG, PNG e GIF.
- **Compressão de Imagem**: A imagem é comprimida para reduzir seu tamanho.
- **Retorno de Imagem em Base64**: Após a compressão, a imagem comprimida é retornada ao usuário no formato **Base64**.
  
## Tecnologias Utilizadas

- **PHP 7.4 ou superior**: A API foi desenvolvida com PHP.
- **Bibliotecas PHP para Compressão**:
  - `jpegoptim` para otimizar imagens JPEG.
  - `optipng` para otimizar imagens PNG.
  - `pngquant` para compressão adicional de PNG.
  - `gifsicle` para compressão de GIFs.

## Instalação

### 1. Clone o repositório

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/seuusuario/compress-image-api.git
cd compress-image-api
```
### 2. Instale as dependências do Composer

Para instalar as dependências do Composer, execute o seguinte comando dentro do diretório do projeto:
```bash
composer install
```
### 3. Instale as ferramentas de compressão de imagem

Se você estiver utilizando Windows, pode instalar as ferramentas necessárias com o Chocolatey:
```bash
choco install jpegoptim optipng pngquant gifsicle
```
Para Linux ou Mac, você pode instalar as ferramentas com os seguintes comandos:
```bash
sudo apt-get install jpegoptim optipng pngquant gifsicle
```
### 4. Configuração do Servidor Local

A API pode ser executada em um servidor local utilizando o Laragon, XAMPP, ou qualquer outro servidor PHP local.

  * Coloque o projeto no diretório de servidor (exemplo: C:\laragon\www\compress-image-api\).
  * Abra o navegador e acesse: http://localhost/compress-image-api/public.

## Endpoints

### POST /compress-image

Descrição

Comprime uma imagem enviada e retorna a versão comprimida em formato Base64.

Parâmetros

  * image: Arquivo de imagem (JPEG, PNG, GIF). O arquivo é enviado como multipart/form-data.
    
Exemplo de Requisição
```bash
POST /compress-image
Content-Type: multipart/form-data
{
  "image": "path_to_image_file.jpg"
}
```
Exemplo de Resposta
```bash
{
  "message": "Imagem processada com sucesso.",
  "file": "base64_encoded_image_string"
}
```
**Erros**

  * **500** - Erro interno do servidor: Quando ocorre um erro durante o processamento da imagem.
  * **400** - Requisição inválida: Caso não seja enviado um arquivo de imagem válido.
