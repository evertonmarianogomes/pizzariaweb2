  <!doctype html>
  <html lang="pt-BR">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.css">

      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />

      <!-- Style CSS -->
      <link rel="stylesheet" href="<?= url() ?>/App/View/Assets/css/style.css">

      <!-- Favicon PNG -->
      <link rel="shortcut icon" href="<?= url() ?>/favicon.png" type="image/x-icon">

      <!-- Page Title -->
      <title><?= $title ?></title>

    </head>

    <body>
      <!-- Loader -->
      <div class="loader_bg">
        <div class="text-center" id="titulo">
          <h2><i class="fas fa-pizza-slice"></i> Pizzaria Web 2</h2>
          <p><?= isset($mensagem) ? $mensagem : "" ?></p>
        </div>
        <div class="loader mt-3"></div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
          <a class="navbar-brand" href="<?=url()?>"><i class="fa fa-pizza-slice"></i> Pizzaria Web 2</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if ($v->section("navbar-nav")) :
              echo $v->section("navbar-nav");
            endif;
            ?>
          </div>
        </div>
      </nav>

      <?php
      if (isset($_SESSION["mensagens"])) :
        if (isset($_SESSION["mensagens"]["erro"])) :
            $titleMessage = "Erro";
            $toastTitleClass = "text-danger";
            $mensagem = $_SESSION["mensagens"]["erro"];
        elseif(isset($_SESSION["mensagens"]["sucesso"])):
          
          $titleMessage = "Sucesso";
          $toastTitleClass = "text-success";
          $mensagem = $_SESSION["mensagens"]["sucesso"];
        endif;
      ?>
        <div aria-live="polite" aria-atomic="true" style="position: relative;z-index: 2;top:2px;right: 10px;" class="">
          <div class="toast" style="position: absolute; top: 0; right: 0;width: 400px" data-delay="5400">
            <div class="toast-header">
              <strong class="mr-auto <?= $toastTitleClass ?>"><i class="fa fa-pizza-slice"></i> Pizzaria Web 2 - <?= $titleMessage ?></strong>
              <small>Now</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body"><?= $mensagem ?></div>
          </div>
        </div>

      <?php
        unset($_SESSION["mensagens"]);
      endif;
      ?>

      <?= $v->section("content") ?>

      <div class="text-center pt-5">
        <p>&copy; Pizzaria Web 2</p>
        <p>#BrunaEternamenteEmNossosCorações</p>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      <!-- Script do Loader -->
      <script>
        $(window).on("load", function() {
          $(".toast").toast("show");
          $(".container.pt-3").hide();
          setTimeout(() => {
            $(".container.pt-3").show();
            $(".loader_bg").fadeToggle();
          }, 500);
        });
      </script>

      <?= $v->section("script"); ?>
    </body>
</html>