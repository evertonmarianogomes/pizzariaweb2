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
    <?php 
        if (isset($_SESSION['user'] -> id)) : 
            $v->insert("Fragments/__navbar", ["user"=>$_SESSION["user"]]);
        endif;
    ?>

    <?= $v->section("content") ?>

    <div class="container mt-5 text-center">
        <code>
            <p>Pizzaria Web 2 v2 Alpha 1</p>
            <p>For testing purposes only. Version <?=PROJECT_VERSION?></p>
            <!-- <p>#BrunaEternamenteEmNossosCorações</p> -->
        </code>
    </div>

    <script src="/pizzariaweb2/dist/js/index.bundle.js"></script>
</body>

</html>