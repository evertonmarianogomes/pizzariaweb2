
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/) [![PHP License](https://img.shields.io/badge/php-%3E%3D8.0.0-blue)](https://www.php.net/)
[![Version](https://img.shields.io/badge/Version-2.0.0-lightgrey)](https://github.com/evertonmarianogomes/web2template)
# Pizzaria Web 2
Olá mundo, esse é o repositório do projeto baseado em um trabalho da disciplina de Desenvolvimento Web 2* do Curso Técnico em Informática do IFMS - Campus Campo Grande.
## Stack utilizada

**Front-end:** Vue.js, Bootstrap e Inertia.JS (Client-Side)

**Back-end:** Laravel (PHP) e Intertia (Server-Side)


## Instalando

Clone o projeto

```bash
git clone https://github.com/evertonmarianogomes/pizzariaweb2
```

Entre no diretório do projeto

```bash
cd pizzariaweb2
```

Instale as dependências

```bash
composer require
```

```bash
npm install
```

- Altere as variaveis no arquivo .env (Ver seção)

- Implante o arquivo "db_pizzariaweb2.sql" (no MariaDB)

Inicie o servidor de desenvolvimento local com os comandos a seguir

```bash
php artisan serve
```

```bash
npm run dev
```

Enjoy!
## Configuração
Para usar o template, você precisar alterar alguns parametros 
no arquivo `.env` e

### Parametros no `.env`
Parametros do Projeto

- `APP_NAME` - Nome do projeto (ex: Web 2 Template)
- `APP_URL` - URL do projeto (ex: http://localhost/web2template/)
- `APP_VERSION` - Versão atual (ex: 1.00.1000-alpha1)
- `APP_RELEASE` -  Release atual (Alpha 2, Beta 1)
- `PROJECT_FAVICON` - Favicon (Icone que aparece na aba do navegador) do projeto. Coloque o arquivo na pasta `public`
- `APP_TIMEZONE` - Timezone do Projeto (Default: America/Campo_Grande)

Parametros de conexão com o Banco de Dados

- `DB_CONNECTION` - Tipo do Banco de Dados - [Consultar documentação do Laravel para ver os BD compatíveis ](https://laravel.com/docs/10.x/database#introduction)
- `DB_HOST` - Host do BD (Ex: localhost)
- `DB_PORT` - Porta do BD (Ex: 3306)
- `DB_DATABASE` - Nome da database (ex: db_web2)
- `DB_USERNAME` - Usuário de acesso ao BD (ex: bill)
- `DB_PASSWORD` - Senha de acesso ao BD (ex: bora_bill)

## Autores

- [@Everton M. Gomes](https://github.com/evertonmarianogomes)


Pizzaria Web 2 Alpha 1 - Version 2.00.1000_alpha1
