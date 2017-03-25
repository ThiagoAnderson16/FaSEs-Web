<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v2.6.1, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
        <meta name="description" content="">

        <meta charset="UTF-8">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/animate.css/animate.min.css">
        <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
        <link rel="stylesheet" href="assets/mobirise/css/style.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
        <title>FaSEs - F&aacute;brica de Software Escola</title>
    </head>

    <body>

        <section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--transparent mbr-navbar--sticky mbr-navbar--auto-collapse" id="menu-74">
            <div class="mbr-navbar__section mbr-section">
                <div class="mbr-section__container container">
                    <div class="mbr-navbar__container">
                        <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                            <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline celular">
                                <span class="mbr-brand__logo"><a href="home"><img class="mbr-navbar__brand-img mbr-brand__img" src="assets/images/logo2.png" alt="FaSEs"></a></span>
                                <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="home">FaSEs</a></span>
                            </span>
                        </div>

                        <!-- Menu -->

                        <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                        <div class="mbr-navbar__column mbr-navbar__menu">
                            <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                                <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#inicio">IN&Iacute;CIO</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#projetos">PROJETOS</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#desenvolvedores">DESENVOLVEDORES</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="cadastro">CADASTRAR-SE</a></li></ul></div>
                                <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-default" href="login">LOGIN
                                            </a></li></ul></div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- inicial -->

        <section id="inicio" class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background mbr-after-navbar" id="header1-73" style="background-image: url(assets/images/foto_farda4.jpg);">
            <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
                <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(76, 105, 114);"></div>
                <div class="mbr-box__container mbr-section__container container">
                    <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-left">
                            <div class="row"><div class=" col-sm-6">
                                    <div class="mbr-hero animated fadeInUp">
                                        <h1 class="mbr-hero__text">F&Aacute;BRICA DE SOFTWARE ESCOLA</h1>
                                        <p class="mbr-hero__subtext">Os alunos, coordenados por seus professores, tem como objetivo cumprir as demandas levantadas da melhor forma poss&iacute;vel, para que os conhecimentos sejam n&atilde;o s&oacute; aplicados dentro de sala, mas que se alcance n&iacute;vel de mercado.<br></p>
                                    </div>
                                    <div class="mbr-buttons btn-inverse mbr-buttons--left"><a class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-warning btn-green" href="enviar-ideia">MANDE SUA IDEIA</a> <a class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay" href="cadastro">CADASTRAR-SE</a></div>
                                </div></div>
                        </div></div>
                </div>
                <div class="mbr-arrow mbr-arrow--floating text-center">
                    <div class="mbr-section__container container">
                        <a class="mbr-arrow__link" href="#projetos"><i class="glyphicon glyphicon-menu-down"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projetos -->

        <section class="content-2 col-4" id="projetos" style="background-color: rgb(255, 255, 255);">

            <div class="container">
                <div class="row">
                    <?php
                    foreach ($projeto as $row) {
                        ?>
                        <div class="col-md-3">
                            <div class="thumbnail logo-normal">
                                <div class="image">
                                        <?php echo '<img class="logo-adaptavel" src="data:image/jpeg;base64,' . base64_encode($row->logo) . '"/>'; ?>
                                </div>
                            </div>

                            <div class="thumbnail" style="padding-top: 50px;">
                                <div class="caption">
                                    <div class="distancia-texto-img texto-responsivo">
                                        <h3><?= $row->nome; ?></h3>
                                        <p style="text-align: center;"><?= $row->texto_inicial; ?></p>
                                    </div>
                                    <p class="group btn-projects"><a href="detalhes-do-projeto?token=<?= $row->idprojeto; ?>" class="btn btn-default btn-green">LER MAIS</a></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>


        <section class="content-2 col-4" id="features1-77" style="background-color: #696969;">

            <div class="container">
                <div class="row">
                    <?php
                    foreach ($projeto2 as $row) {
                        ?>
                        <div class="col-md-3">
                            <div class="thumbnail logo-normal">
                                <div class="image">
                                        <?php echo '<img class="logo-adaptavel" src="data:image/jpeg;base64,' . base64_encode($row->logo) . '"/>'; ?>
                                </div>
                            </div>

                            <div class="thumbnail" style="padding-top: 50px;">
                                <div class="caption">
                                    <div class="distancia-texto-img texto-responsivo">
                                        <h3><?= $row->nome; ?></h3>
                                        <p style="text-align: center;"><?= $row->texto_inicial; ?></p>
                                    </div>
                                    <p class="group btn-projects"><a href="detalhes-do-projeto?token=<?= $row->idprojeto; ?>" class="btn btn-default btn-green">LER MAIS</a></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <a href="lista-de-projetos" class="btn-warning btn-plus-project" style="background-color: #039a68; border-color: #039a68;">Ver mais projetos</a>
        </section>


        <!-- Desenvolvedores -->

        <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="desenvolvedores" style="background-color: rgb(255, 255, 255); margin-bottom: 10%;">

            <div class="mbr-section__container container mbr-section__container--isolated">
                <div class="mbr-header mbr-header--wysiwyg row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="mbr-section__header">NOSSOS DESENVOLVEDORES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 center-block text-center">
                    <?php
                    foreach ($devs as $dev) {
                        //<img src="assets/images/default-image.jpg" width="100px" height="100px">
                        echo '<img class="undefined img-circle" src="data:image/jpeg;base64,' . base64_encode($dev->foto) . '" width="100px" height="100px" title="' . $dev->nome . '"/>';
                    }
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>


        </section>



        <!-- depoimentos 

        <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="testimonials1-88" style="background-color: rgb(255, 255, 255);">
            <div>

                <div class="mbr-section__container mbr-section__container--std-padding container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="mbr-section__header">DEPOIMENTOS SOBRE O FaSEs</h2>
                            <ul class="mbr-reviews mbr-reviews--wysiwyg row">
                                <li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="mbr-reviews__text"><p class="mbr-reviews__p">&#147;Nullam cursus sed nibh nec commodo. Ut mattis mi at magna vestibulum, vel mattis dolor vulputate. Vestibulum egestas libero sit amet nisi feugiat, id molestie quam cursus. &#148;</p></div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <div class="mbr-reviews__author-name">NANCY</div>
                                        <div class="mbr-reviews__author-bio">User</div>
                                    </div>
                                </li><li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="mbr-reviews__text"><p class="mbr-reviews__p">&#147;Curabitur dignissim tempus libero at aliquam. Sed arcu nisi, maximus sit amet nulla quis, faucibus sollicitudin lacus. Quisque sed nulla at leo cursus finibus sed hendrerit risus. Maecenas euismod faucibus ornare. Sed tellus elit, fringilla in malesuada nec, volutpat vel ligula.&#148;</p></div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <div class="mbr-reviews__author-name">JOHN</div>
                                        <div class="mbr-reviews__author-bio">User</div>
                                    </div>
                                </li><li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="mbr-reviews__text"><p class="mbr-reviews__p">&#147;In tempus arcu a urna maximus, at porta felis laoreet. Vestibulum dui ipsum, varius ac ante sed, volutpat faucibus mauris. Morbi viverra ipsum ut lacinia pretium. Vivamus sit amet quam sed lorem rhoncus gravida. &#148;</p></div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <div class="mbr-reviews__author-name">MARK</div>
                                        <div class="mbr-reviews__author-bio">User</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->


        <!-- formul�rio /sac -->

        <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="form1-89" style="background-color: rgb(239, 239, 239);">

            <div id="contato" class="mbr-section__container mbr-section__container--std-padding container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
                                <?php
                                $this->load->library('session');
                                if (isset($_SESSION['SESSION_ENVIOU_SAC'])) {
                                    $this->session->unset_userdata('SESSION_ENVIOU_SAC');
                                    ?>
                                    <div class="alert alert-success" role="alert">Mensagem enviada com sucesso</div>
                                <?php } ?>
                                <div class="mbr-header mbr-header--center mbr-header--std-padding">
                                    <h2 class="mbr-header__text">CONTATO</h2>
                                </div>
                                <div data-form-alert="true"></div>
                                <form action="entrar-em-contato" method="post" data-form-title="CONTATO">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nome" required placeholder="Nome*" data-form-field="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" required placeholder="Email*" data-form-field="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensagem" required placeholder="Mensagem" rows="7" data-form-field="Message"></textarea>
                                    </div>
                                    <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-warning btn-green">ENVIAR</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="contacts2-90" style="background-color: rgb(60, 60, 60);">

            <div class="mbr-section__container container">
                <div class="mbr-contacts mbr-contacts--wysiwyg row">
                    <div class="col-sm-6">
                        <figure class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--no-bg">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.7476699556046!2d-35.26300858523321!3d-5.749419795833282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b3abb5048b2fcb%3A0xef4f6c5edaa6d542!2sInstituto+Federal+de+Educa%C3%A7%C3%A3o%2C+Ci%C3%AAncia+e+Tecnologia+Rio+Grande+do+Norte%2C+Campus+Natal+-+Zona+Norte!5e0!3m2!1spt-BR!2sbr!4v1479997096623" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1">
                                <p class="mbr-contacts__text"><strong>ENDERE�O</strong><br>
                                    Rua Brusque, 326<br>
                                    Natal - RN, 59112-490, Brasil<br><br>
                                    <strong>CONTATO</strong><br>
                                    Email: gabin.zn@ifrn.edu.br<br>
                                    Telefone: +55 (84) 4006-9500<br>
                            </div>
                            </section>

                            <footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-91" style="background-color: rgb(68, 68, 68);">

                                <div class="mbr-section__container container">
                                    <div class="mbr-footer mbr-footer--wysiwyg row">
                                        <div class="col-sm-12">
                                            <p class="mbr-footer__copyright"></p><p><img src="assets/images/logo_ifrn.png" width="20px" /> FaSEs - IFRN Natal Zona Norte &copy; 2016.</p>
                                        </div>
                                    </div>
                                </div>
                            </footer>


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
