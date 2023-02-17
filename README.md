# DESAFIO GESUAS
- Aplicação para gerar o número NIS.

### Frontend:
- Tecnologias:
  - Docker
  - Vue.JS
  - Tailwind CSS.

### Api:
- Tecnologias:
  - Docker
  - Nginx
  - PHP
  - MySQL.

### Rodar aplicação
- Necessário ter o docker instalado 

- Clonar o repositório
[Link do repositório](https://github.com/matheussouzajose/gesuas)

### Frontend

Acessar a pasta do projeto frontend
```bash
cd gesuas/front
```

Copiar o arquivo .env.example
```bash
cp .env.example .env
```

Permitir permissão ao arquivo entrypoint.sh
```bash
chmod +x .docker/entrypoint.sh
```

Adicionar as dependências da aplicação
```bash
npm install
```

Subir a aplicação com docker
```bash
docker-composer up -d --build
```

### Backend

Acessar a pasta do projeto backend
```bash
cd gesuas/api
```

Copiar o arquivo .env.example
```bash
cp .env.example .env
```

Adicionar as dependências da aplicação
```bash
docker-compose run --rm composer install
```

Subir a aplicação com docker
```bash
docker-compose up -d --build nginx
```

Aplicação do frontend estará disponível na url: [Link da aplicação](https://localhost:8080)

### Enpoints:
- [POST] - http://localhost:8000/api/v1/accounts
- [GET] - http://localhost:8000/api/v1/accounts/{document_id}

#### Payload
```json
{
  "name": "Nome Exemplo"
}
```

#### Response
```json
{
  "data": {
    "id": 114,
    "name": "Matheus Souza Jose 1",
    "document_id": "00937071289",
    "created_at": "2023-02-17 19:23:53",
    "updated_at": null
  }
}
```

### Testes
Acessar o container da aplicação PHP
```bash
docker exec -it php-gesuas sh
```

Rodar o comando para executar os testes
```bash
composer test-php
```
