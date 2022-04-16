## Pizzaria Web 2 Changelog File

#### - Pizzaria Web 2 Alpha 1 (2.01.2510-alpha1) (16.04.2022 13:00)
Commit 2 da Alpha 1, com as seguintes alterações:
* Uso de TypeScript.
* Atualização das versões dos pacotes CoffeeCode Router e CoffeeCode DataLayer para a mais recente.
* Inclusão da constante "PROJECT_VERSION" no arquivo "config.php", que representa a versão do projeto que será exibida no Loader, no rodapé e na tela "Sobre".
* Adicionada função que habilita o efeito Blur em clientes Windows e MacOS.
* Adicionada função que desabilita o efeito Blur no Mozilla Firefox, devido a incompatibilidade desse efeito (que depende da propriedade CSS *backdrop-filter*) com este navegador.
* Adicionada função que desabilita o efeito Blur em clientes Linux, pois foi detectado alguns bugs visuais caso o mesmo esteja habilitado.

#### - Pizzaria Web 2 Alpha 1 (2.01.2501_alpha1) (24.03.2022 16:48)
Commit 1 da Alpha 1, com as seguintes alterações:
* Tela de login finalizada, enviando os parametros de login para o controlador.
* LoginController finalizado, filtrando as entradas enviadas pela tela de login e verificando se o Login e Senha existem no BD e se pertencem a um usuário. Caso afirmativo, redireciona para a tela inicial, se não, retorna para a tela de login enviando uma mensagem de erro.
* Função de Logout finalizada, encerrando a sessão do usuário e redirecionando para a tela de login.
* Controle de acesso em construção, para não permitir que uma página que requer um usuário autenticado seja acessada por um usuário não autenticado.


#### Pizzaria Web 2 (Version 1.01.1587) (23.03.2023 10:18)
Commit Inicial do Projeto.

#### - Pizzaria Web 2 (Version 1.01.2329) (22.06.2020 01:14)
Versão final da Pizzaria Web 2 Legacy, sem nenhuma modificação.