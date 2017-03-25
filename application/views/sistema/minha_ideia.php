<?php include 'header_sis.php'; ?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
<link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">




<title>FaSEs - Ideias disponíveis</title>

<main class="ls-main ">

    <div class="container-fluid">
        <?php
        if (isset($_SESSION['SESSION_ENVIAR_IDEIA'])) {
            $this->load->library('session');
            $this->session->unset_userdata('SESSION_ENVIAR_IDEIA');
            ?>

            <br>
            <div class="ls-alert-success">Ideia cadastrada com sucesso!</div>

        <?php } ?>

        <h1>Minhas ideias</h1>

        <!-- <h2>IDEIA 01</h2> -->
        <br>
        <br>
        <?php
        if ($ideias != NULL) {
            $cont = 0;
            foreach ($ideias as $ideia) {
                $cont++;
                ?>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <?php if($ideia->status == 2){ ?>
                                        Sua ideia foi aceita! <a href="meu-projeto" style="color: #0000FF">Visuaizar</a>
                                        <br><br>
                                    <?php } ?>
                                <div class="row">
                                    <div class="col-md-3"><b>Categoria: </b>
                                        <?php
                                        if ($ideia->categoria != null) {
                                            $tag = explode(",", $ideia->categoria);
                                            for ($i = 0; $i < count($tag); $i++) {
                                                echo '<a href="#">#' . trim($tag[$i]) . ' </a>';
                                            }
                                        } else {
                                            echo ("[NÃO INFORMADO]");
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3"><b>Plataforma: </b>
                                        <?php
                                        if ($ideia->plataforma != null) {
                                            $plataforma = explode(", ", $ideia->plataforma);
                                            for ($i = 0; $i < count($plataforma); $i++) {
                                                if ($plataforma[$i] == "celular") {
                                                    echo '<img class="undefined" src="assets/images/icon-cell.png" width="20px" height="20px" title="Smarthphone"/>';
                                                } else if ($plataforma[$i] == "desktop" || $plataforma[$i] == "computador") {
                                                    echo '<img class="undefined" src="assets/images/icon-pc.png" width="20px" height="20px" title="Desktop"/>';
                                                } else if ($plataforma[$i] == "site") {
                                                    echo '<img class="undefined" src="assets/images/icon-site.jpg" width="20px" height="20px" title="Site"/>';
                                                } else {
                                                    echo $plataforma[$i];
                                                }
                                                echo " ";
                                            }
                                            //echo $projeto->plataforma;
                                        } else {
                                            echo ("[NÃO INFORMADO]");
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3"><b>Público: </b><?= $ideia->publico ?></div>  
                                    <div class="col-md-1">
                                        <a data-toggle="collapse" href="#collapse<?= $cont ?>" class="descricao"><b>Mais +</b></a>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <?php
                                        if ($ideia->status == 0) {
                                            ?>
                                            <div class="ls-alert-info" style="width: 110px; padding: 5px; margin-bottom: 0px;">Em análise</div>
                                            <?php
                                        } else if ($ideia->status == 1) {
                                            ?>
                                            <div class="ls-alert-danger" style="width: 110px; padding: 5px; margin-bottom: 0px;">Recusada</div>
                                            <?php
                                        } else if ($ideia->status == 2) {
                                            ?>
                                            <div class="ls-alert-success" style="width: 110px; padding: 5px; margin-bottom: 0px;">Aceita</div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div id="collapse<?= $cont ?>" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>Descrição:</b> <?= $ideia->sobre ?>
                                    <br>
                                    <br>
                                    <b>Vínculo com outro sistema?:</b> <?= $ideia->vinculada ?>
                                    <br>
                                    <br>
                                    <b>Motivo de envio da ideia:</b> <?= $ideia->motivo ?>
                                    <br>
                                    <br>    
                                    <b>Palavras-chaves:</b> <?= $ideia->palavras_chaves ?>            
                                </li>
                            </ul>
                            <div class="panel-footer">
                                <?php
                                if ($ideia->feedback != null) {
                                    echo "Análise: " . $ideia->feedback;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <br>
            Não há ideia referente a seu usuário. Deseja <a href="enviar-ideia" style="color: #0000FF">enviar uma ideia</a>?
<?php } ?>

    </div>

</main>






  <!-- <script src="assets/locaweb/javascripts/locastyle.js"></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://assets.locaweb.com.br/locastyle/3.9.0/javascripts/locastyle.js" type="text/javascript"></script>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="assets/smooth-scroll/SmoothScroll.js"></script>
<script src="assets/jarallax/jarallax.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/masonry/masonry.pkgd.min.js"></script>
<script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/social-likes/social-likes.js"></script>
<script src="assets/mobirise/js/script.js"></script>

</body>
</html>
