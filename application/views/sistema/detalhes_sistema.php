<?php
    include 'header_sis.php';
    $global_id_projeto = 0;
    ?>

    <meta charset="UTF-8">
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

    <title>FaSEs - Detalhes do projeto</title>

    <main class="ls-main ">

        <div class="container-fluid">

            <?php
            foreach ($projetos as $projeto) {
                $global_id_projeto = $projeto->idprojeto;
                ?>
                <form action="visualizar-projeto-editado" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $projeto->idprojeto ?>" name="id_projeto">
                    <p class="text-right" style="margin-top: 3%;">
                        <button type="submit" class="btn btn-default btn-lg danger">Finalizar edi&ccedil;&atilde;o</button>
                    </p>
                </form>
                <form action="atualizar-projeto" method="post" enctype="multipart/form-data">

                    <div class="placeholder text-center" style="margin-top: 3%;">
                        <!-- <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive center-block" alt="Generic placeholder thumbnail"> -->
                        <?php
                        if ($projeto->logo != NULL) {
                            echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($projeto->logo) . '" style="max-width: 200px;" class="img-responsive center-block"/>';
                        } else {
                            ?>
                            <img src="assets/images/default-image.jpg" width="200" height="180" class="img-responsive img-circle center-block"/>
                        <?php } ?>
                        <br><br>
                        <input class="center-block" type="file" name="logo"/>
                        <br><br>
                        <input type="text" value="<?= $projeto->nome; ?>" name="nome">

                    </div>
                    <br>
                    <br>

                    <input type="hidden" class="form-control" value="<?= $projeto->idprojeto; ?>" name="id_projeto">
                    <table class="table">
                        <!-- On cells (`td` or `th`) -->
                        <tr>
                            <td class="">
                                <b>Categoria:</b>
                                <input type="text" class="form-control" value="<?= $projeto->categoria; ?>" name="categoria">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>Plataforma: </b>
                                <input type="text" class="form-control" value="<?= $projeto->plataforma; ?>" name="plataforma">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>P&uacute;blico: </b>
                                <input type="text" class="form-control" value="<?= $projeto->publico; ?>" name="publico">
                            </td>
                        </tr>
                        <tr> 
                            <td class=""><b>Sobre: </b>
                                <input type="text" class="form-control" value="<?= $projeto->sobre; ?>" name="sobre">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>V&iacute;culo com outro sistema: </b>
                                <input type="text" class="form-control" value="<?= $projeto->vinculada; ?>" name="vinculada">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>Motivo de envio da ideia: </b>
                                <input type="text" class="form-control" value="<?= $projeto->motivo; ?>" name="motivo">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>Palavras-chaves: </b>
                                <input type="text" class="form-control" value="<?= $projeto->palavras_chaves; ?>" name="palavras_chaves">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>Texto de apresenta&ccedil;&atilde;o: </b>
                                <input type="text" class="form-control" value="<?= $projeto->texto_inicial; ?>" name="texto_inicial"  maxlength="256">
                            </td>
                        </tr>
                        <tr>
                            <td class=""><b>Descri&ccedil;&atilde;o: </b>
                                <textarea class="form-control" style="height: 200px;" name="descricao"><?= $projeto->descricao; ?></textarea>
                            </td>
                        </tr>
                    </table>

                    <p class="text-right"><button type="submit" class="btn btn-default btn-lg active">Salvar altera&ccedil;&otilde;es</button></p>
                    <br><br>
                    <h3>Informa&ccedil;&otilde;es:</h3>
                    <div class="row">
                        <?php foreach ($informacoes as $informacao) { ?>
                            <div class="col-md-8" style = "text-align: justify;">
                                <?= $informacao->texto; ?>
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

                    <div class="placeholder text-center" style="margin-top: 50px; margin-bottom: 80px;">
                        <a href="adicionar-informacao?token=<?= $projeto->idprojeto; ?>">Adicionar informa&ccedil;&atilde;o ao projeto</a>
                    </div>

                    <h3>Itera&ccedil;&otilde;es:</h3>
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
                    <div class="placeholder text-center" style="margin-top: 50px; margin-bottom: 80px;">
                        <a href="adicionar-iteracao?id=<?= $projeto->idprojeto; ?>">Adicionar itera&ccedil;&atilde;o</a>
                    </div>

                    <h3>Equipe:</h3>
                    <div class="row placeholders text-center">
                        <?php foreach ($devs as $dev) { ?>
                            <div class="col-xs-6 col-sm-2 placeholder row">
                                <?php
                                if ($dev[0]->foto != NULL) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($dev[0]->foto) . '" width="200" height="180" class="img-responsive img-circle"/>';
                                } else {
                                    ?>
                                    <img src="assets/images/default-image.jpg" width="200" height="180" class="img-responsive img-circle"/>
                                <?php } ?>
                                <h4><?= $dev[0]->nome ?></h4>
                                <?php if ($_SESSION['SESSION_USUARIO']['nivel'] >= 3) { ?>
                                    <button type="button" onclick="confirmar()" class="btn btn-danger">Excluir</button>
                                    <?php if ($dev[0]->idusuario == $projeto->id_orientador) { ?>
                                        <a href="#" title="Coordenador do projeto"><label class="glyphicon glyphicon-king" style="padding-left: 5px;"></label></a>                                        
                                        <?php
                                    } else {
                                        if ($dev[0]->idusuario == $projeto->id_lider) {
                                            ?>
                                            <a href="#" title="L&iacute;der do projeto"><label class="glyphicon glyphicon-king" style="padding-left: 5px;"></label></a>
                                        <?php } else { ?>
                                            <a href="definir-lider?token=<?= $dev[0]->idusuario ?>&clue=<?= $global_id_projeto ?>" style="color: black;" title="Definir como l&iacute;der"><label class="glyphicon glyphicon-king" style="padding-left: 5px; cursor:pointer;"></label></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <script>
                                        function confirmar() {
                                            alertify.confirm('Confirmar remo&ccedil;&atilde;o do integrante?').set('onok', function (closeEvent) {
                                                window.location.href = "excluir-aluno?idusuario=<?= $dev[0]->idusuario ?>&idprojeto=<?= $global_id_projeto ?>";
                                            });
                                        }
                                    </script>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($_SESSION['SESSION_USUARIO']['nivel'] == 4 || $_SESSION['SESSION_USUARIO']['id_usuario'] == $projeto->id_orientador) { ?>
                            <div class="col-xs-6 col-sm-2 placeholder">
                                <a href="lista-de-alunos?token=<?= $projeto->idprojeto; ?>" class="thumbnail">
                                    <img src="assets/images/plus.png" width="200" height="200" class="img-responsive img-circle" title="Adicionar membro">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </form>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                        <form action="chat" method="post">
                            <input type="hidden" name="token" value="<?= $projeto->idprojeto; ?>">
                            <button type="submit" class="btn btn-default btn-lg active">Abrir chat do projeto</button><br><br>
                        </form>
                    </div>
                    <?php if ($_SESSION['SESSION_USUARIO']['id_usuario'] == $projeto->id_lider) { ?>
                        <div class="col-md-4">
                            <form id="publicar_projeto" action="publicar-projeto" method="post">
                                <input type="hidden" name="id_projeto_publicar" value="<?= $projeto->idprojeto; ?>">

                                <button type="button" onclick="confirmarPublicacao()" class="btn btn-default btn-lg danger">Publicar projeto</button>
                                <script>
                                    function confirmarPublicacao() {
                                        alertify.confirm('Essa op&ccedil;&atilde;o far&aacute; com que seu projeto apare&ccedil;a na vitrine de projeto do FaSEs. Confirmar solicita&ccedil;&atilde;o?').set('onok', function (closeEvent) {
                                            document.getElementById("publicar_projeto").submit();
                                        });
                                    }
                                </script>

                            </form>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($_SESSION['SESSION_USUARIO']['nivel'] == 4 || $_SESSION['SESSION_USUARIO']['id_usuario'] == $projeto->id_orientador) { ?>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-md-8 col-md-offset-2">

                            <form action="definir-orientador?token=<?= $projeto->idprojeto; ?>" method="post" style="float: left; margin-right: 10px; margin-bottom: 10px;">
                                <button type="submit" class="btn btn-default btn-lg danger">Definir orientador</button>
                            </form>
                            <form id="publicar_projeto" action="publicar-projeto" method="post" style="float: left; margin-right: 10px;">
                                <input type="hidden" name="id_projeto_publicar" value="<?= $projeto->idprojeto; ?>">

                                <button type="button" onclick="confirmarPublicacao()" class="btn btn-default btn-lg danger">Publicar projeto</button>
                                <script>
                                    function confirmarPublicacao() {
                                        alertify.confirm('Essa op&ccedil;&atilde;o far&aacute; com que seu projeto apare&ccedil;a na vitrine de projeto do FaSEs. Confirmar solicita&ccedil;&atilde;o?').set('onok', function (closeEvent) {
                                            document.getElementById("publicar_projeto").submit();
                                        });
                                    }
                                </script>

                            </form>
                            <form id="projeto_concluido" action="projeto-concluido" method="post">
                                <input type="hidden" name="id_projeto_concluido" value="<?= $projeto->idprojeto; ?>">

                                <button type="button" onclick="confirmarConclusao()" class="btn btn-default btn-lg danger">Marcar projeto como conclu&iacute;do</button>
                                <script>
                                    function confirmarConclusao() {
                                        alertify.confirm('Essa op&ccedil;&atilde;o alterar&agrave; o status do seu projeto para conclu&iacute;do. Confirmar solicita&ccedil;ao?').set('onok', function (closeEvent) {
                                            document.getElementById("projeto_concluido").submit();
                                        });
                                    }
                                </script>

                            </form>
                        </div>
                    </div> 
                    <?php
                }
            }
            ?>
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