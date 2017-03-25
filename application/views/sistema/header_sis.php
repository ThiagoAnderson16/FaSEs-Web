<!DOCTYPE html>
<?php
$this->load->library('session');
if (isset($_SESSION['SESSION_USUARIO'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="generator" content="Mobirise v2.6.1, mobirise.com">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">

            <meta name="description" content="">

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
            <link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
            <link rel="stylesheet" href="assets/css/style.css" type="text/css">

        </head>

        <body>
            <div class="ls-topbar" style="background-color: #252525 !important;">

                <!-- Barra de Notificações -->
                <div class="ls-notification-topbar">

                    <!-- Dropdown com detalhes da conta de usuário -->
                    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account" style="background-color: #252525 !important;">
                        <a href="#" class="ls-ico-user">
                            <?php
                            if ($_SESSION['SESSION_USUARIO']['foto'] != null) {
                                echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($_SESSION['SESSION_USUARIO']['foto']) . '"/>';
                            }
                            ?>
                                <!-- <img src="assets/images/edmilson.png" alt="" /> -->
                            <span class="ls-name"><?= $_SESSION['SESSION_USUARIO']['nome'] ?></span>
                        </a>

                        <nav class="ls-dropdown-nav ls-user-menu">
                            <ul>
                                <li><a class="menu-usuario" href="editar-dados">Meus dados</a></li>
                                <li><a href="logoff">Sair</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <span class="ls-show-sidebar ls-ico-menu"></span>



                <!-- Nome do produto/marca com sidebar -->
                <h1 class="ls-brand-name" style="background-color: #252525 !important;">
                    <a>
                        <small class="branco">Fábrica Softwate Escola</small>
                        FaSEs Web
                    </a>
                </h1>
            </div>


            <aside class="ls-sidebar">

                <div class="ls-sidebar-inner">
                    <a href="#"  class="ls-go-prev"><span class="ls-text"></span></a>

                    <nav class="ls-menu">
                        <ul>
                            <?php if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) { ?>
                                <li><a href="ideias-disponiveis" class="ls-ico-numbered-list" title="Ideias disponíveis">Ideias disponíveis</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['SESSION_USUARIO']['nivel'] >= 2) { ?>
                                <li><a href="projetos-lista" class="ls-ico-list" title="Lista de projetos">Lista de projetos</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) { ?>
                                <li><a href="mensagens-para-o-fases" class="ls-ico-envelope" title="Chat">SAC</a></li>
                            <?php } ?>
                            <li><a href="minha-ideia" class="ls-ico-docs" title="Chat">Minhas ideias</a></li>
                            <li><a href="meu-projeto" class="ls-ico-text" title="Chat">Meu Projeto </a></li>
                        </ul>
                    </nav>


                </div>
            </aside>
            <?php
        } else {
            echo "<script>window.location.href = 'login'</script>";
        }
        ?>
