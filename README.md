##  Desafio: Desenvolver um Sistema para o gerenciamento de um Zoológico

**Objetivo:** 
O objetivo deste desafio é demonstrar suas habilidades e conhecimentos em lógica de 
programação. Assim, saberemos como você pensa e como resolve problemas cotidianos. 

**Requisitos do sistema:** 
• Desenvolver uma aplicação web usando Angular 2+ ou React. 
o O cadastro de animais deve conter as seguintes informações: nome, descrição, data 
de nascimento, espécie, habitat e país de origem. 
o O cadastro de cuidados deve conter as seguintes informações: nome do cuidado 
(ex: Alimentação, Exame Veterinário, Vacinação, Treinamento), descrição e frequência (diária, semanal, mensal, etc.). 
o A aplicação precisa ter pelo menos uma tela para Listar, Cadastrar, Atualizar e Remover Animais e Cuidados. 
o O sistema deve consumir uma API REST. 
o Deve apresentar uma interface agradável ao usuário. 
• Desenvolver uma API REST com os métodos necessários para o funcionamento da aplicação web. 
o Utilizar uma linguagem de sua escolha. 
o Deve utilizar ao menos os métodos GET e POST. 

**Resolução**

Para este desafio, concentrei meus esforços no desenvolvimento completo da **API RESTful backend** utilizando PHP com o framework Laravel e MySQL como banco de dados. 
A API implementa as funcionalidades CRUD (Create, Read, Update, Delete) para o gerenciamento de `Animais` e seus respectivos `Cuidados`, incluindo os relacionamentos entre essas entidades.

### Tecnologias Utilizadas no Backend
* **Linguagem:** PHP 
* **Framework:** Laravel 
* **Banco de Dados:** MySQL
* **Gerenciador de Dependências:** Composer
* **Testes da API:** Postman

### Funcionalidades da API Implementadas
A API desenvolvida permite:
* **Animais:**
    * `POST /animais` (ou `/api/animais`): Cadastrar um novo animal.
    * `GET /animais` (ou `/api/animais`): Listar todos os animais.
    * `GET /animais/{id}` (ou `/api/animais/{id}`): Visualizar um animal específico (com seus cuidados, se houver).
    * `PUT /animais/{id}` (ou `/api/animais/{id}`): Atualizar os dados de um animal existente.
    * `DELETE /animais/{id}` (ou `/api/animais/{id}`): Remover um animal (com deleção em cascata dos cuidados associados).
* **Cuidados:**
    * `POST /cuidados` (ou `/api/cuidados`): Cadastrar um novo cuidado para um animal (requer `animal_id`).
    * `GET /cuidados` (ou `/api/cuidados`): Listar todos os cuidados (pode ser filtrado por `animal_id`).
    * `GET /cuidados/{id}` (ou `/api/cuidados/{id}`): Visualizar um cuidado específico (com dados do animal).
    * `PUT /cuidados/{id}` (ou `/api/cuidados/{id}`): Atualizar um cuidado existente.
    * `DELETE /cuidados/{id}` (ou `/api/cuidados/{id}`): Remover um cuidado.

---
### Desafios Encontrados e Foco da Entrega

O desafio original incluía o desenvolvimento de uma interface frontend em React ou Angular. Devido ao prazo final de entrega (11/05) **optei por concentrar meus esforços em entregar uma API RESTful backend funcional.**

Esta decisão foi tomada considerando a flexibilidade oferecida no comunicado do processo seletivo

Acredito que a API desenvolvida, utilizando PHP e Laravel, cumpre os requisitos centrais do desafio relacionados à lógica de programação, desenvolvimento de API REST (incluindo métodos GET, POST, PUT, DELETE), interação com banco de dados e implementação de validações. A API está pronta para ser consumida por uma aplicação frontend.

### Aprendizados Principais
* Desenvolvimento prático e depuração de uma API RESTful completa com Laravel.
* Desenvolvimento de um Banco de Dados utilizando MySQL.
* Modelagem de dados relacional, criação de migrations e implementação de chaves estrangeiras com constraints (como `onDelete('cascade')`).
* Implementação de validações de entrada no backend.
* Gerenciamento de um projeto com Git e GitHub.
* Importância da documentação e da comunicação clara dos desafios em um projeto.
---
### Fontes utilizadas:
* https://www.php.net/manual/pt_BR/
* https://laravel.com/docs/12.x
* https://dev.mysql.com/doc/
