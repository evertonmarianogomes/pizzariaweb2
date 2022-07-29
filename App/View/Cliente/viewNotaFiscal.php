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

 
    </head>

    <body>
        <h3 class="text-black-50"><i class="fa fa-pizza-slice"></i> Pizzaria Web 2</h3>
        <hr>
        <?php
            foreach($historicoAtual as $value):
        ?>
           <h5 class="text-black-50">Pedido #<?=$value -> id?></h5>
                <hr>
                <p>Sabor: <?=$value -> saborPizza?></p>
                <p>Quantidade: <?=$value -> qtdPizza?> </p>
                <p>Valor total: R$ <?=number_format($value -> valorTotal, 2, ",", "")?> </p>
                <p>Pedido realizado em: <?=date_format((new DateTime((String) $value -> createdAt)), "d/m/Y H:i:s")?></p>
        <?php
            endforeach;
        ?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      
    
</html>