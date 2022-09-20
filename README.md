# Api Laravel

## Como configurar o ambiente:

<p>Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas, caso não as tenhas instalado:
[Docker](https://www.docker.com/), [PHP](https://windows.php.net/download#php-8.1) Versão 8.1, 
[Composer](https://getcomposer.org/) </p>

=================
<!--ts-->
No `api-project` você precisará fazer os seguintes passos:
   * Duplice o arquivo `.env.example` para `.env`
   * Rode o comando `composer install --ignore-platform-reqs `
   * Para executar o projeto, use o comando:
      ```
      ./vendor/bin/sail docker-compose up -d
      ```
   * Vamos subir o banco e as seeders com o seguinte comando:
      ```
      ./vendor/bin/sail php artisan migrate:fresh --seed
      ```
   * Com o projeto rodando, vamos para as rotas   
## Rotas da API
A `api` conta com os seguintes end-points:
   * Visualizar, Editar e Delete é necessário passar o id do respectivo usuário.
```
listar      => localhost/api/v1/user              => GET
visualizar  => localhost/api/v1/user/{id}         => GET
cadastrar   => localhost/api/v1/user/store        => POST
editar      => localhost/api/v1/user/update/{id}  => PUT
deletar     => localhost/api/v1/user/delete/{id}  => DELETE
```

## Exemplo de json para cadastrar e atualizar o usuário
Para o cadastro de usuário todo os campos são obrigatórios, já a atualização eles são opcionais, optando por atualizar apenas um campo.

```
{
  "name":"Samuel Mascena",
  "birthday":"1999-01-08",
  "email":"samuelmascena@hotmail.com",
  "password":"abcd@123",
}
```

## Mensagem de retorno ao cadastrar com sucesso

```
{
  "success":true, "msg":"Usuário cadastrado com sucesso!"
  "
}
```

## Mensagem de Erro ao cadastrar
Uma das mensagens de erro em caso de cadastro mal sucedido será:
```
{
    "validate": true,
    "msg": {
        "email": [
            "O campo email já está sendo utilizado."
        ]
    }
}
```

Essa mensagem é resultado de uma tentativa de cadastro de usuário cujo o email utilizado já está associado a outro usuário;
<!--te-->
