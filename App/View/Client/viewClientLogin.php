<?php $v->layout("__template"); ?>
<style>
    body {
        background-image: url("/pizzariaweb2/images/pizza-login.jpg");
        background-size: 100% 100vh;
        background-repeat: no-repeat;
    }

    .card {
        backdrop-filter: blur(30px);
        background-color: rgba(255, 255, 255, 0);
        color: white;
    }

</style>
<main class="container pt-3">
        <div class="row justify-content-center">
            <div class="card col-sm-12 col-md-8 col-lg-6 shadow">
                <div class="card-body">
                    <div class="d-flex w-100 flex-wrap mb-5 mb-md-1">
                        <div class="pt-2 flex-grow-1">
                            <small class="">Pizzaria Web 2 - Cliente</small>
                            <h3>Acesso</h3>
                        </div>
         
                    </div>

                    <hr>

                    <form action="<?=$router->route("app.validateLogin")?>" method="post">
                        <div class="form-group mb-4">
                            <label for="login" class="form-label">Login: </label>
                            <input type="text" class="form-control" id="login" name="login" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Senha: </label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <?php if (isset($_GET["redirect"])) : ?>
                            <input type="hidden" class="form-control" id="redirect" name="redirect" required value="<?= $_GET["redirect"] ?>">
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a href="/pizzariaweb2/admin" class="btn btn-secondary ms-2">Acesso Administrativo</a>
                    </form>

                </div>
            </div>
        </div>
    </main>