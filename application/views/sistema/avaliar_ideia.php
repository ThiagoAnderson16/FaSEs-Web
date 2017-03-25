<?php
$this->load->library('session');
if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) {
    include_once 'header.php';
    ?>

    <title>FaSEs - Avaliar ideia</title>


    <div class="cards-container">
        <h3>Lista de ideias:</h3>
        <?php
        foreach ($ideia as $row) {
            ?>

            <div class = "div-maior"> <!-- bootstrap, uma div grande com duas divs menores com metade do tamanho cada uma-->
                <br>
                <br>
                <div class = "div-menor-esquerda"> <!-- div esquerda -->
                    <ul class="nav nav-pills ul-lista "> <!-- ul categoria e  plataforma-->
                        <li class="espaco-entre-linhas"><p class="h7">Nome</p><label class="label-pequeno"><?= $row->nome; ?></label></li>
                        <li><p class="h7">Email</p><label name="email" class="label-pequeno"><?= $row->email; ?></label></li>
                    </ul>
                    <ul class="nav nav-pills ul-lista "> <!-- ul categoria e  plataforma-->
                        <li class="espaco-entre-linhas"><p class="h7">Categoria</p><label class="label-pequeno"><?= $row->categoria; ?></label></li>
                        <li><p class="h7">Plataforma</p><label class="label-pequeno"><?= $row->plataforma; ?></label></li>
                    </ul>
                    <ul class="nav nav-pills ul-lista"> <!-- ul sobre e  publico alvo-->
                        <li class="espaco-entre-linhas"><p class="h7">Sistema</p><label class="label-pequeno"><?= $row->sobre; ?></label></li>
                        <li><p class="h7">Público alvo</p><label class="label-pequeno"><?= $row->publico; ?></label></li>
                    </ul>
                </div>
                <br>
                <br>
                <br>
                <div class = "div-menor-direita"> <!-- div direita -->
                    <ul class=" nav nav-pills ul-lista2"> <!-- ul descrição -->
                        <li><p class="h7">Descrição geral/observações</p><label class="label-grande"><?= $row->descricao; ?></label></li>   
                    </ul>
                    <ul class=" nav nav-pills ul-lista2"> <!-- ul botão-->
                        <li><a href="aprovar?email=<?= $row->email; ?>"><button class="botao" >Aceitar</button></a></li>
                        <li><a href="aprovar?email=<?= $row->email; ?>"><button class="botao"> Recusar</button></a></li> 
                    </ul>
                </div>
            </div>

            <?php
        }
        ?>

    </div>



    <?php include_once 'footer.php'; ?>
    <?php
} else {
    header('Location: minha-ideia');
}
?>
