<?php
$this->load->library('session');
if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) {
    include 'header_sis.php';
    ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">

    <!-- include alertify.css -->
    <link rel="stylesheet" href="assets/alertify/css/alertify.css">
    <!-- include boostrap theme  -->
    <link rel="stylesheet" href="assets/alertify/css/themes/bootstrap.css">
    <!-- include alertify script -->
    <script src="assets/alertify/alertify.js"></script>
    <script type="text/javascript">
        //override defaults
        alertify.defaults.glossary.title = 'Aviso';
        alertify.defaults.glossary.ok = 'Sim';
        alertify.defaults.glossary.cancel = 'Cancelar';
        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
    </script>

    <title>FaSEs - Ideias disponíveis</title>

    <main class="ls-main ">
        <title>FaSEs - Ideias disponíveis</title>

        <div class="container-fluid">

            <h1>Aceitar ideias</h1>

            <!-- <h2>IDEIA 01</h2> -->
            <br>
            <br>
            <?php
            $cont = 0;
            foreach ($ideias as $ideia) {
                $cont++;
                ?>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
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
                                            <div class="ls-alert-info" style="width: 110px; padding: 5px; margin-bottom: 0px;">Aguardando análise</div>
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
                                <?php if($ideia->status != 2) {?>
                                <form id="aceitar_ideia" action="aceitar-ideia" method="post">
                                    
                                    <input type="hidden" name="id_usuario" value="<?= $ideia->id_usuario ?>">
                                    <input type="hidden" name="id_ideia" value="<?= $ideia->id ?>">
                                    <input type="hidden" name="categoria" value="<?= $ideia->categoria ?>">
                                    <input type="hidden" name="plataforma" value="<?= $ideia->plataforma ?>">
                                    <input type="hidden" name="publico" value="<?= $ideia->publico ?>">
                                    <input type="hidden" name="sobre" value="<?= $ideia->sobre ?>">
                                    <input type="hidden" name="vinculada" value="<?= $ideia->vinculada ?>">
                                    <input type="hidden" name="motivo" value="<?= $ideia->motivo ?>">
                                    <input type="hidden" name="palavras_chaves" value="<?= $ideia->palavras_chaves ?>">


                                    <button type="button" onclick="Aceitar()" class="btn btn-success" style="float: left; margin-right: 5px;">Aceitar</button>
                                    <script>
                                        function Aceitar() {
                                            alertify.confirm('Aceitar ideia?').set('onok', function (closeEvent) {
                                                document.getElementById("aceitar_ideia").submit();
                                            });
                                        }
                                    </script>
                                </form>
                                <form action="mensagem-de-feedback" method="post">
                                    <input type="hidden" name="id_ideia" value="<?= $ideia->id ?>">
                                    <button type="submit" class="btn btn-danger">Recusar</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
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
    <?php
} else {
    header('Location: minha-ideia');
}
?>