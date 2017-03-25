<?php include 'header_sis.php'; ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">




    <title>FaSEs - Detalhes do projeto</title>

    <main class="ls-main ">
        <title>oi FaSEs - Ideias disponíveis</title>




        <div class="container-fluid">

            <?php
            foreach ($projetos as $projeto) {

                if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) {
                    ?>
                    <form action="detalhes-projeto" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $projeto->idprojeto ?>" name="id_projeto">
                        <p class="text-right" style="margin-top: 3%;">
                            <button type="submit" class="btn btn-default btn-lg danger">Editar</button>
                        </p>
                    </form>
                    <?php
                } else {

                    if ($_SESSION['SESSION_USUARIO']['candidato_projeto_id'] == $projeto->idprojeto) {
                        ?>
                        <br><div class="ls-alert-warning">Você já é candidato a esse projeto</div>
                        <?php
                    } else {

                        $dev_projeto = false;
                        foreach ($devs as $dev) {
                            if ($dev[0]->idusuario == $_SESSION['SESSION_USUARIO']['id_usuario']) {
                                $dev_projeto = true;
                                ?>
                                <form action="detalhes-projeto" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?= $projeto->idprojeto ?>" name="id_projeto">
                                    <input type="hidden" value="<?= $projeto->idequipe ?>" name="id_equipe">
                                    <p class="text-right" style="margin-top: 3%;">
                                        <button type="submit" class="btn btn-default btn-lg danger">Editar</button>
                                    </p>
                                </form>
                                <?php
                                break;
                            }
                        }

                        if ($dev_projeto == false) {
                            ?>
                            <form action="candidatar" method="post">
                                <input type="hidden" value="<?= $projeto->idprojeto ?>" name="id_projeto">
                                <p class="text-right" style="margin-top: 3%;">
                                    <button type="submit" class="btn btn-default btn-lg danger">Candidatar-se</button>
                                </p>
                            </form>
                            <?php
                        }
                    }
                }
                ?>

                <div class="placeholder text-center" style="margin-top: 3%;">
                    
                    <?php if($projeto->logo != NULL){
                        echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($projeto->logo) . '" style="max-width: 200px;" class="img-responsive center-block"/>'; 
                    } else { ?>
                        <img src="assets/images/default-image.jpg" width="200" height="180" class="img-responsive img-circle center-block"/>
                    <?php } ?>
                    <h1><?= $projeto->nome; ?></h1>
                </div>
                <br>
                <br>
                <table class="table">
                    <!-- On cells (`td` or `th`) -->
                    <tr>
                        <td class="">
                            <b>Categoria:</b>
                            <?php
                            if ($projeto->categoria != null) {
                                $tag = explode(",", $projeto->categoria);
                                for ($i = 0; $i < count($tag); $i++) {
                                    echo '<a href="#">#' . trim($tag[$i]) . ' </a>';
                                }
                            } else {
                                echo ("[NÃO INFORMADO]");
                            }
                            ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Plataforma: </b>
                            <?php
                            if ($projeto->plataforma != null) {
                                $plataforma = explode(", ", $projeto->plataforma);
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
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Público: </b><?= $projeto->publico; ?><br><br>
                        </td>
                    </tr>
                    <tr> 
                        <td class=""><b>Sobre: </b><?= $projeto->sobre; ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Vínculo com outro sistema: </b><?= $projeto->vinculada; ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Motivo de envio da ideia: </b><?= $projeto->motivo; ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Palavras-chaves: </b><?= $projeto->palavras_chaves; ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Texto de apresentação: </b><?= $projeto->texto_inicial; ?><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><b>Descrição: </b><?= $projeto->descricao; ?><br><br>
                        </td>
                    </tr>
                </table>
                <h3 style="margin-top: 50px;">Informações:</h3>
                <div class="row">
                    <?php foreach ($informacoes as $informacao) { ?>
                        <div class="col-md-8">
                            <p> <?= $informacao->texto; ?> </p>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if ($informacao->foto != null) {
                                echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($informacao->foto) . '" class="img-responsive"/>';
                            } else {
                                echo '<img src="assets/images/default-image.jpg" style="max-height: 300px; max-width: 350px;">';
                            }
                            ?>
                            <br><br><br>
                        </div>
                    <?php } ?>
                </div>
                <h3 style="margin-top: 50px;">Iterações:</h3>
                <table class="table">
                    <?php foreach ($iteracoes as $iteracao) { ?>
                        <tr>
                            <td class="">
                                <?= $iteracao->titulo ?>
                            </td>
                            <td class=""><a href="assets/arquivos_pdf/<?= $iteracao->arquivo ?>">Visualizar arquivo</a></td>
                            <td class="">
                                <?php
                                $data_iteracao = explode("-", $iteracao->data);
                                echo $data_iteracao[2] . '/' . $data_iteracao[1] . '/' . $data_iteracao[0];
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <h3 style="margin-top: 50px;">Equipe:</h3>
                <div class="row placeholders text-center">
                    <?php foreach ($devs as $dev) { ?>
                        <div class="col-xs-6 col-sm-2 placeholder">
                            <!-- <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive img-circle" alt="Generic placeholder thumbnail"> -->
                            <?php if($dev[0]->foto != NULL) {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($dev[0]->foto) . '" width="200" height="180" class="img-responsive img-circle"/>'; 
                            } else { ?>
                                <img src="assets/images/default-image.jpg" width="200" height="180" class="img-responsive img-circle"/>
                            <?php } ?>
                            <h4><?= $dev[0]->nome ?></h4>
                        </div>
                    <?php } ?>
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