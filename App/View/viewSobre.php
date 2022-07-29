    <?php
        $v -> layout("__template");
    ?>

        <?php $v -> start("navbar-nav"); ?>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="<?=url("about")?>" class="nav-link">Sobre</a></li>
        </ul>

        <?php $v -> end() ?>

        <div class="container mt-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-black-50 card-title">Sobre</h3>
                    <hr>
                    <p class="card-text">Pizzaria Web 2 é um trabalho desenvolvido para a disciplina de Desenvolvimento Web 2* do curso técnico em Informática do IFMS Campus Campo Grande no primeiro semestre de 2020 na turma 281 - INF</p>

                    <h5 class="mt-3">#BrunaEternamenteEmNossosCorações</h5>
                    <p>Durante o desenvolvimento desse trabalho, infelizmente tivemos a perda de uma grande amiga e uma pessoa incrível. Aqui fica essa singela homenagem para ela  &hearts; &hearts; &hearts;</p>
                </div>
            </div>

            <div class="card shadow-sm mt-1">
                <div class="card-body">
                    <h6 class="text-black-50 card-title">Info.Adicionais</h6>
                    <p>Pizzaria Web 2 Final Version</p>
                    <p>Versão 1.01.2329_final</p>
                    <p>Para alterar os parametros de conexão com o banco de dados, altere no arquivo config.php</p>
                </div>
            </div>
        </div>