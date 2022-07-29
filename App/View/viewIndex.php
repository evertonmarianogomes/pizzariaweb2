    <?php
        $v -> layout("__template");
    ?>
    <?php $v -> start("navbar-nav"); ?> 
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="<?=url("about")?>" class="nav-link">Sobre</a></li>
        </ul>
    <?php $v -> end() ?>
    
    <div class="container pt-3">
        <h3 class="text-black-50">Pizzaria Web 2 - Login</h3>
        <p>Bem vindo a Pizzaria Web 2. Entre com o seu login e senha para continuar</p>

        <div class="row justify-content-between">
            <form action="/pizzariaweb2/" method="POST" class=" col-sm-12 col-lg-5">
                <div class="form-group">
                    <label for="loginUsuario">Login</label>
                    <input type="text" name="loginUsuario" id="loginUsuario" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="passwordUsuario">Senha</label>
                    <input type="password" name="passwordUsuario" id="passwordUsuario" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>

            
        </div>
    </div>


    <?php $v -> start("script"); ?>
    <!-- Scripts da Index -->
    <script>    
        $("#titulo p").append("Carregando tela de login, aguarde ... ");
    </script>
    <?php $v -> end(); ?>