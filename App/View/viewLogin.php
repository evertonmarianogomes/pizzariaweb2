<?php $v->layout("__template")?>

 <main class="container pt-3">
        <div class="row justify-content-center">
            <div class="card card-blur col-sm-12 col-md-8 col-lg-6 shadow-sm login-card">
                <div class="card-body">
                    <div class="d-flex w-100 flex-wrap mb-5 mb-md-1">
                        <div class="pt-2 flex-grow-1">
                            <small class="text-black-50">Pizzaria Web 2</small>
                            <h3>Acesso</h3>
                        </div>
                        <div class="pt-2">
                            <div class="nav-item form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkSwitch">
                                <label class="form-check-label" for="darkSwitch"><i class="fas fa-adjust"></i> Modo Escuro</label>
                            </div>
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
                    </form>
                </div>
            </div>
        </div>
    </main>