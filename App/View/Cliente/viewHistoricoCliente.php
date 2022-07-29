    <?php
        $v -> layout("__template");
    ?>

    <?php $v -> start("navbar-nav"); ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="<?=url("cliente/purchaseHistory")?>" class="nav-link"><i class="fas fa-history"></i>    Histórico de pedidos</a></li>
            <li class="nav-item"><a href="<?=url("about")?>" class="nav-link">Sobre</a></li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i>  <?=$usuario["nome"]?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?=url("cliente/logout")?>" onclick="return confirm('Certeza que deseja encerrar a sessão?')">Sair</a>
                </div>
            </li>   
        </ul>
    <?php $v -> end();?>

    <div class="container pt-3">
        <h3 class="text-black-50">Histórico de compras</h3>
        <hr>
        <?php
            if (empty($historico)):
                echo '<div class="alert alert-danger">Seu histórico de compras está vazio</div>';
            else:
                foreach($historico as $value):
                    
        ?>
        
        <div class="card m-4">
            <div class="card-body">
                <h5 class="text-black-50">Pedido #<?=$value -> id?></h5>
                <hr>
                <p>Sabor: <?=$value -> saborPizza?></p>
                <p>Quantidade: <?=$value -> qtdPizza?> </p>
                <p>Valor total: R$ <?=number_format($value -> valorTotal, 2, ",", "")?> </p>
                <p>Pedido realizado em: <?=date_format((new DateTime((String) $value -> createdAt)), "d/m/Y H:i:s")?></p>
            </div>
            <div class="card-footer">
                <a href="<?=url("cliente/gerarPdf?id=".$value -> id)?>" class="btn btn-success">Gerar PDF Nota Fiscal</a>
                <form action="<?=url("cliente/email")?>" method="POST">
                    <input type="hidden" name="idPedido" id="idPedido" value="<?=$value -> id?>">
                    
                    <!-- <hr>
                    <div class="form-group">
                        <label for="emailUsuario">Enviar por email</label>
                        <input type="email" name="emailUsuario" id="emailUsuario" value="<?=$usuario["email"]?>" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar email</button> -->
                </form>
            </div>
        </div>


        <?php
                endforeach;
            endif;
        ?>
    </div>