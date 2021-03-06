<?php include 'header_sis.php'; ?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
<link rel="stylesheet" href="assets/mobirise/css/style.css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">


<title>FaSEs - Lista de projetos</title>

<main class="ls-main">

    <div class="container-fluid">

        <h1>Meu projeto</h1>

        <!-- <h2>IDEIA 01</h2> -->
        <br>
        <br>
        <?php
        if ($projetos == null) { ?>
            <div class="ls-alert-warning">Você ainda não esta vinculado a algum projeto.</div>
        <?php } else {


            $cont = 0;
            foreach ($projetos as $projeto) {
                $cont++;
                ?>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-md-2 img-projeto">
                                    <?php
                                    if ($projeto[0]->logo != null) {
                                        echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($projeto[0]->logo) . '"/>';
                                    } else {
                                        echo '<img class="undefined" src="assets/images/default-image.jpg" />';
                                    }
                                    ?></div>
                                <div class="col-md-7"><h2><?= $projeto[0]->nome ?></h2></div>
                                <div class="col-md-3">
                                    <?php if ($projeto[0]->concluido == 1) { ?>
                                        <div class="ls-alert-success text-center"><strong>Concluído</strong></div>
                                    <?php } else { ?>
                                        <div class="ls-alert-info text-center"><strong>Em desenvolvimento</strong></div>
                                    <?php } ?>
                                </div>
                            </div>

                            <h4 class="panel-title">
                                <div class="row">
                                    <div class="col-md-3"><b>Categoria: </b>
                                        <?php
                                        if ($projeto[0]->categoria != null) {
                                            $tag = explode(",", $projeto[0]->categoria);
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
                                        if ($projeto[0]->plataforma != null) {
                                            $plataforma = explode(", ", $projeto[0]->plataforma);
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
                                    <div class="col-md-3"><b>Público: </b>
                                        <?php
                                        if ($projeto[0]->publico != null) {
                                            echo $projeto[0]->publico;
                                        } else {
                                            echo ("[NÃO INFORMADO]");
                                        }
                                        ?>
                                    </div>  
                                    <div class="col-md-3">
                                        <a data-toggle="collapse" href="#collapse<?= $cont ?>" class="descricao"><b>Mais +</b></a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div id="collapse<?= $cont ?>" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>Descrição:</b> 
                                    <?php
                                    if ($projeto[0]->sobre != null) {
                                        echo $projeto[0]->sobre;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <b>Vínculo com outro sistema:</b> 
                                    <?php
                                    if ($projeto[0]->vinculada != null) {
                                        echo $projeto[0]->vinculada;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <b>Motivo de envio da ideia:</b> 
                                    <?php
                                    if ($projeto[0]->motivo != null) {
                                        echo $projeto[0]->motivo;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>
                                    <br>
                                    <br>    
                                    <b>Palavras-chaves:</b> 
                                    <?php
                                    if ($projeto[0]->palavras_chaves != null) {
                                        echo $projeto[0]->palavras_chaves;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>            
                                    <br>
                                    <br>    
                                    <b>Texto inicial:</b> 
                                    <?php
                                    if ($projeto[0]->texto_inicial != null) {
                                        echo $projeto[0]->texto_inicial;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>
                                    <br>
                                    <br>    
                                    <b>Descrição:</b> 
                                    <?php
                                    if ($projeto[0]->descricao != null) {
                                        echo $projeto[0]->descricao;
                                    } else {
                                        echo ("[NÃO INFORMADO]");
                                    }
                                    ?>
                                </li>
                            </ul>
                            <div class="panel-footer row">
                                <div class="col-md-1">
                                    <form action="visualizar-projeto" method="post">
                                        <input type="hidden" value="<?= $projeto[0]->idprojeto ?>" name="id_projeto">
                                        <input type="hidden" value="<?= $projeto[0]->idequipe ?>" name="id_equipe">
                                        <button type="submit" class="btn btn-default">Visualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
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
