    <?php
        $v -> layout("__template");
    ?>

    <div class="container pt-3">
        <h3 class="text-black-50">Ops!</h3>
        <hr>
        <p>Erro <?=$errorCode?>: 
        <?php
            switch($errorCode){
                case 400:
                    echo "Bad Request";
                break;
                case 404:
                    echo "Not Found";
                break;
                case 405:
                    echo "METHOD NOT ALLOWED";
                break;
                case 501:
                    echo "NOT IMPLEMENTED";
                break;
                default:
                    echo "";
            }
        ?>
        </p>

        <a href="<?=url()?>">Voltar para a tela inicial</a>


    </div>