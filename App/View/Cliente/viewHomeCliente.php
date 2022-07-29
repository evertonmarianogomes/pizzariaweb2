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
        <h3 class="text-black-50">Pizzas</h3>
        <p>Bem vindo a Pizzaria Web 2, aproveite as promoções</p>
        
        <div class="row d-flex justify-content-around">
            <div class="card col-sm-12 col-lg-3 shadow-smb">
                <div class="card-body">
                    <h4 class="text-black-50">Pizza Média</h4>
                    <hr>
                    <button data-whatever="1" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Comprar</button>
                </div>
            </div>
            <div class="card col-sm-12 col-lg-3 shadow-sm">
                <div class="card-body">
                    <h4 class="text-black-50">Pizza Grande</h4>
                    <hr>
                    <button data-whatever="2" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Comprar</button>
                </div>
            </div>
            <div class="card col-sm-12 col-lg-3 shadow-sm">
                <div class="card-body">
                    <h4 class="text-black-50">Pizza Gigante</h4>
                    <hr>
                    <button data-whatever="3" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Comprar</button>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=url("cliente/comprar/")?> " method="POST">
                    <input type="hidden" id="recipient">
                    <div class="form-group">
                        <label for="saborPizza">Sabor da pizza</label>
                        <select name="saborPizza" id="saborPizza" class="form-control">
                        <?php
                            if (!empty($pizzas)) :
                                foreach($pizzas as $pizza):
                        ?>
                            
                            <option value="<?=$pizza -> id?>" data-price="<?=$pizza -> precoUnitario?>"><?=$pizza -> sabor?> 
                            (R$ <?=number_format($pizza -> precoUnitario, 2, ",", "")?>)</option>
                        <?php
                                endforeach;
                            endif;
                        ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantidadePizza">Quantidade: </label>
                        <select name="quantidadePizza" id="quantidadePizza" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Entregar em: </p>
                        <p class="form-control"><?=$usuario["endereco"]?></p>
                    </div>

                    <p id="precoTotal">Preço total: R$0,00</p>

                    
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Finalizar compra</button>
            </form>
            </div>
            </div>
        </div>
        </div>

        <?php $v -> start("script")?>

            <!-- Scripts da pagina do Cliente -->
            <script>
               $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var recipient = button.data('whatever');
                    var modal = $(this);
                    if (recipient == 1) {
                        modal.find('.modal-title').text("Pizza Média");
                    } else if (recipient == 2) {
                        modal.find('.modal-title').text("Pizza Grande");
                    } else if (recipient == 3) {
                        modal.find('.modal-title').text("Pizza Gigante");
                    }
                    
                    $("#precoTotal").html("Preco total: R$" + $("#saborPizza").find(":checked").attr("data-price") * $("#quantidadePizza").val());
                    modal.find('.modal-body #recipient').val(recipient);
                })

                $("#saborPizza").on("change", function(){
                    var precoTotal = $(this).find(":checked").attr("data-price") * $("#quantidadePizza").val();
                    $("#precoTotal").html("Preço total: R$" + precoTotal)
                });

                $("#quantidadePizza").on("change", function(){
                    var precoTotal = $(this).find(":checked").val() * $("#saborPizza").find(":checked").attr("data-price");
                    $("#precoTotal").html("Preço total: R$" + precoTotal)
                });

            </script>
            
        <?php $v -> end() ?>