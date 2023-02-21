# Backend Challenge 20230105
>  This is a challenge by [Coodesh](https://coodesh.com/)

## Objetivo

### Sistema do CRON
Para prosseguir com o desafio, precisaremos criar na API um sistema de atualização que vai importar os dados para a Base de Dados com a versão mais recente do [Open Food Facts](https://br.openfoodfacts.org/data) uma vez ao día. Adicionar aos arquivos de configuração o melhor horário para executar a importação.

A lista de arquivos do Open Food, pode ser encontrada em:

- https://challenges.coode.sh/food/data/json/index.txt
- https://challenges.coode.sh/food/data/json/data-fields.txt

Onde cada linha representa um arquivo que está disponível em https://challenges.coode.sh/food/data/json/{filename}.

É recomendável utilizar uma Collection secundária para controlar os históricos das importações e facilitar a validação durante a execução.

Ter em conta que:

- Todos os produtos deverão ter os campos personalizados `imported_t` e `status`.
- Limitar a importação a somente 100 produtos de cada arquivo.

### A REST API

Na REST API teremos um CRUD com os seguintes endpoints:

- `GET /`: Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.
- `PUT /products/:code`: Será responsável por receber atualizações do Projeto Web
- `DELETE /products/:code`: Mudar o status do produto para `trash`
- `GET /products/:code`: Obter a informação somente de um produto da base de dados
- `GET /products`: Listar todos os produtos da base de dados, adicionar sistema de paginação para não sobrecarregar o `REQUEST`.

## Tecnologias

Neste projeto foi usado como principal tecnologia [PHP/LARAVEL](https://laravel.com/)

### Modelagem de dados
- Devido algumas dificuldade com drivers do mongoDB e problemas com a versão do Laravel, foi usado um banco de dado relacional(SQL), Mysql.
- Temos camadas de repositório para lidar com as queries(consultas) no banco de dados.

### Arquitetura de software
- Foi usado ***Onion Architecture,*** Onde visa a divisão de responsabilidades por camadas.
- Foram aplicados também conceitos de [SOLID](https://www.digitalocean.com/community/conceptual-articles/s-o-l-i-d-the-first-five-principles-of-object-oriented-design). Como Single Responsibility Principle, Dependency Inversion Principle, Open-Closed Principle.


## Como rodar o projeto
    1 - git clone https://github.com/Canhassi12/food-api-system.git
    2 - composer install
    3 - Renomear .env.example para .env e .env.testing.example para .env.testing 
    4 - php artisan key:generate
    5 - Crie um banco de dados para o projeto
    6 - Configure seu arquivo .env

## Testes
    - O projeto contém testes unitarios e testes de features, usando também ***`MOCK`*** de dados.
    - #### Como rodar os testes
      ``` bash 
      $ php artisan test
      ```
    - Para o sistema cron o seguites comandos:
      ``` bash
      $ php artisan schedule:run  
      ```
