# Documentação dos endpoints no Postman

### Collection do Postman em: docs\api-noticias.postman_collection.json

### Documentação JWT utilizada: https://jwt-auth.readthedocs.io/en/develop/

## Login

Descrição: Autentica o usuário e retorna um token JWT.

Método: POST

URL: http://localhost:8989/api/auth/login

Body: raw (JSON)

json:
`{
"email": "user@example.com",
"password": "password"
}`

## Register

Descrição: Registra um novo usuário.

Método: POST

URL: http://localhost:8989/api/auth/register

Body: raw (JSON)

json:
`{
"name": "User Name",
"email": "user@example.com",
"password": "password"
}`

## Me

Método: POST

Descrição: Retorna os dados do usuário autenticado.

URL: http://localhost:8989/api/me

Headers:

-   Authorization: Bearer {token}

## Logout

Método: POST

Descrição: Faz logout do usuário e invalida o token JWT.

URL: http://localhost:8989/api/logout

Headers:

-   Authorization: Bearer {token}

## Refresh Token

Método: POST

Descrição: Atualiza o token JWT.

URL: http://localhost:8989/api/refresh

Headers:

-   Authorization: Bearer {token}

## Get All News

Método: GET

Descrição: Retorna todas as notícias.

URL: http://localhost:8989/api/news

Headers:

-   Authorization: Bearer {token}

## Create News

Método: POST

Descrição: Cria uma nova notícia.

URL: http://localhost:8989/api/news

Headers:

-   Authorization: Bearer {token}

Body: raw (JSON)

json:
`{
    "title": "News Title",
    "content": "News Content",
    "author": "Author Name"
}`

## Update News

Método: PUT

Descrição: Atualiza uma notícia existente.

URL: http://localhost:8989/api/news/{id}

Headers:

-   Authorization: Bearer {token}

Body: raw (JSON)

json:
`{
"title": "Updated News Title",
"content": "Updated News Content",
"author": "Updated Author Name"
}`

## Delete News

Método: DELETE

Descrição: Deleta uma notícia.

URL: http://localhost:8989/api/news/{id}

Headers:

-   Authorization: Bearer {token}

## Get News by ID

Método: GET

Descrição: Retorna uma notícia específica pelo ID.

URL: http://localhost:8989/api/news/{id}

Headers:

-   Authorization: Bearer {token}
