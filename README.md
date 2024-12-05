# 📸 API de Compressão de Imagens

A **API de Compressão de Imagens** permite o upload de imagens para compressão e retorna a imagem comprimida em formato Base64. É possível controlar a qualidade da compressão diretamente no código.
# ⚙️ **Requisitos**

* PHP 7.4 ou superior
* Composer para gerenciar as dependências do PHP
* Ferramentas de Compressão de Imagem:

  *  🖼️ jpegoptim
  *  🖼️ optipng
  *  🖼️ pngquant
  *  🖼️ gifsicle
### 📦 Dependências do Composer

As dependências PHP necessárias para o funcionamento da API são:

   1. **spatie/image-optimizer**: Biblioteca para otimizar imagens.

  Instalação:
```bash
composer require spatie/image-optimizer
```
  2. **symfony/http-foundation**: Para manipulação de requisições HTTP e respostas.

Instalação:

```bash
    composer require symfony/http-foundation
````
# ⚙️ **Configuração**
### 1. 📥 Clonar o Repositório

Clone o repositório para o seu ambiente local:
```bash
git clone https://github.com/seu-usuario/compress-image-api.git
cd compress-image-api
```
### 2. 📦  Instalar as Dependências
Se o Composer ainda não estiver instalado, siga as instruções aqui para instalar.
Instale as dependências do projeto:
```bash
composer install
```
### 3. 🛠️ **Instalar as Ferramentas de Compressão de Imagem**

Para garantir que a compressão de imagens funcione corretamente, é necessário instalar as ferramentas de compressão no seu sistema:

Para sistemas Debian/Ubuntu:

```bash
sudo apt-get install jpegoptim optipng pngquant gifsicle
```
### 🚀 **Enviar uma Imagem**

Para enviar uma imagem para a API, realize uma requisição **POST** para o endpoint /index.php, incluindo o arquivo de imagem no corpo da requisição. O campo da imagem deve ser chamado image.
### 🔄 Exemplo de Requisição cURL

No terminal, você pode usar o comando cURL para enviar a imagem:
```bash
curl -X POST -F "image=@/caminho/para/imagem.jpg" http://localhost:8000/index.php
```

* **image=@/caminho/para/imagem.jpg**: Substitua **"/caminho/para/imagem.jpg"** pelo caminho local da imagem que você deseja enviar.

Este comando enviará a imagem para o servidor local e processará a compressão.

### 📦 Resposta da API

Após o processamento da imagem, a API retornará um JSON contendo a imagem comprimida em formato Base64 e o caminho para acessá-la diretamente no servidor.

### 📝 Exemplo de Resposta

A resposta JSON será semelhante a esta:
```bash
{
    "compressed_image": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD...",
    "image_url": "/compressed/compressed_image_name.jpg"
}
```
* **compressed_image**: A imagem comprimida, codificada em Base64. Você pode usar essa string diretamente em páginas web ou outros aplicativos que aceitem esse formato.
* **image_url**: O caminho para acessar a imagem comprimida no servidor. A imagem estará salva na pasta compressed, e você pode acessá-la através dessa URL.
