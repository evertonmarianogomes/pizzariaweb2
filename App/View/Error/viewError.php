<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />

    <link rel="stylesheet" href=<?= "/pizzariaweb2/dist/css/style.css" ?>>

    <!-- Favicon PNG -->
    <link rel="shortcut icon" href="/pizzariaweb2/favicon.png" type="image/x-icon">
</head>

<body>

    <div class="toast-container top-0 end-0 position-absolute mt-1 mx-1" style="z-index: 3;">
        <?php
        if (isset($_SESSION["messages"])) {
            $v->insert("Fragments/__toast", ["message" => $_SESSION["messages"]]);
            unset($_SESSION["messages"]);
        }
        ?>
    </div>

    <?= $v->insert("Fragments/__loader") ?>
    <?= $v->insert("viewAbout") ?>



    <main class="container pt-3">
        <div class="row justify-content-center">
            <div class="card card-blur col-sm-12 col-md-8 col-lg-6 shadow-sm login-card">
                <div class="card-body">
                    <div class="d-flex w-100 flex-wrap mb-5 mb-md-1">
                        <div class="pt-2 flex-grow-1">
                            <small class="text-black-50"><i class="fas fa-pizza-slice"></i> Pizzaria Web 2</small>
                            <h3>Erro</h3>
                        </div>
                        <div class="pt-2">
                            <div class="nav-item form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkSwitch">
                                <label class="form-check-label" for="darkSwitch"><i class="fas fa-adjust"></i> Modo Escuro</label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>Ooops, ocorreu um erro.</p>
                    <h3>Erro <?= $errcode ?> -
                        <?= match ($errcode) {
                            default => "ERROR",
                            "400" => "BAD_REQUEST",
                            "404" => "NOT FOUND",
                            "405" => "METHOD NOT ALLOWED",
                            "501" => "NOT IMPLEMENTED"
                        } ?></h3>

                    <a href="<?= $router->route("app.login") ?>" class="btn btn-secondary mt-4">Voltar a página inicial</a>
                </div>
            </div>
        </div>
    </main>

    <div class="container mt-5 text-center">
        <code>
            <p>Pizzaria Web 2 Codename "Pepperoni" Alpha 1</p>
            <p>For testing purposes only. Version 2.01.2501_alpha1</p>

            <?= (BETA_CONFIG["legacyFooter"]) ? " <p>#BrunaEternamenteEmNossosCorações</p>" : ""; ?>

        </code>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="/pizzariaweb2/dist/js/index.bundle.js"></script>
</body>

</html>