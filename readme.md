# Pizzaria Web 2 v2 Project

O projeto "Pizzaria Web 2" é baseado em um trabalho de mesmo nome desenvolvido como requisito para a aprovação na disciplina de Desenvolvimento Web 2* do Instituto Federal de Mato Grosso do Sul no ano de 2020. Usa tecnologias como HTML, CSS e JS (TS) no Front-end e PHP no Back-end com o Banco de Dados MariaDB.
O trabalho original "Pizzaria Web 2" usava o PHP 7.4, a conexão com o BD era feita de forma manual, criando um objeto PDO e tratando manualmente as exceções. Para o CRUD, usava uma técnica chamada **GenericDAO**, que abstraia todas as etapas de execução de uma query SQL e retornava seu resultado, independente se era um SELECT, INSERT, UPDATE ou DELETE.
"Pizzaria Web 2 v2" é uma refatoração do projeto original, mudando a forma de se conectar e manipular o Banco de Dados para utilizar a ORM DataLayer by CoffeeCode (Veja mais em créditos). 

## Creditos
Aqui vão os créditos para as libs utilizadas para a construção desse projeto.

* CoffeeCode Router (A classic CoffeeCode Router is easy, fast and extremely uncomplicated. Create and manage your routes in minutes!) by Robson V. Leite -  [GitHub](https://github.com/robsonvleite/router)  
* CoffeeCode DataLayer (The Data Layer is a persistent abstraction component of your database that PDO) by Robson V. Leite  - [GitHub](https://github.com/robsonvleite/router)
* PHP Plates by The League of Extraordinary Packages -  [GitHub](https://github.com/thephpleague/plates)
* TypeScript by Microsoft - [GitHub](https://github.com/microsoft/TypeScript).
*  [Babel](https://github.com/babel/babel), [Webpack](https://github.com/webpack/webpack), [Boostrap](https://github.com/twbs/bootstrap) e [JQuery](https://github.com/jquery/jquery).