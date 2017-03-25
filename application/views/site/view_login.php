<!DOCTYPE html>
<html>
    <head>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v2.6.1, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
        <meta name="description" content="">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/animate.css/animate.min.css">
        <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
        <link rel="stylesheet" href="assets/mobirise/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

        <title>FaSEs - Fábrica de Software Escola</title>
    </head>

    <?php
    $this->load->library('session');
    if (isset($_SESSION['SESSION_USUARIO'])) {
        header('Location: minha-ideia');
    } else {
        ?>

        <!-- inicial -->

        <section id="inicio" class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background mbr-after-navbar" id="header1-73" style="background-image: url(assets/images/fundo-principal2.jpg);">
            <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
                <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(76, 105, 114);"></div>
                <div class="mbr-box__container mbr-section__container container">

                    <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-left">
                            <body>

                                <div class="container col-md-6 col-md-offset-3">
                                    <?php
                                    $this->load->library('session');
                                    if (isset($_SESSION['SESSION_ENVIAR_IDEIA'])) {
                                        ?>
                                        <div class="alert alert-warning" role="alert">Autentique-se para sua ideia ser cadastrada.</div>
                                    <?php } ?>
                                        
                                    <?php
                                    $this->load->library('session');
                                    if (isset($_SESSION['SESSION_FEZ_CADASTRO'])) {
                                        $this->session->unset_userdata('SESSION_FEZ_CADASTRO');
                                        ?>
                                        <div class="alert alert-success" role="alert">Cadastro realizado com sucesso! Autentique-se para acessar o sistema.</div>
                                    <?php } ?>

                                    <?php
                                    $this->load->library('session');
                                    if (isset($_SESSION['SESSION_FALHA_LOGIN'])) {
                                        $this->session->unset_userdata('SESSION_FALHA_LOGIN');
                                        ?>
                                        <div class="alert alert-danger" role="alert">Usuário ou senha inválido!</div>
                                    <?php } ?>


                                    <form class="form-signin" action="efetuar-login" method="post">
                                        <h2 class="form-signin-heading text-center" style="color: white;">Login no FaSEs Web</h2>
                                        <input id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="" type="email"><br>
                                        <label for="inputPassword" class="sr-only">Password</label>
                                        <input id="inputPassword" name="senha" class="form-control" placeholder="Senha" required="" type="password"><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="cadastro" style="text-decoration:none;"><button class="btn btn-lg btn-primary btn-block" type="button">Cadastre-se</button></a>
                                            </div>
                                        </div>

                                    </form>

                                </div> <!-- /container -->


                                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                                <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


                        </div></div>
                </div>
            </div>
        </section>

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
<?php } ?>
