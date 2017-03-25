<?php
$this->load->library('session');
if ($_SESSION['SESSION_USUARIO']['nivel'] >= 3) {
    include 'header_sis.php';
    ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
    <link rel="stylesheet" href="assets/mobirise/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <title>FaSEs - Lista de professores</title>

    <main class="ls-main ">

        <div class="container-fluid">

            <h2>Lista de professores</h2>

            <div class="row">
                <div class="content-1">
                    <form method="post" action="filtrar-professor?token=<?= $_GET['token'] ?>" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" name="filtrar_usuario" class="form-control" style="border: 1px solid #A9A9A9; height: 40px;" required>
                        </div>
                        <button type="submit" class="btn btn-default">Filtrar</button>
                    </form>

                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <?php
                $cont = count($users_projeto);
                $usuarios_do_projeto = [];
                for ($i = 0; $i < $cont; $i++) {
                    array_push($usuarios_do_projeto, $users_projeto[$i]->id_usuario);
                }

                foreach ($usuario as $prof) {
                    if (in_array($prof->idusuario, $usuarios_do_projeto)) {
                        
                    } else {
                        ?>
                        <div class="panel-group col-md-6">

                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <div class="row">    
                                        <div class="col-md-2 img-projeto">
                                            <?php
                                            if ($prof->foto != null) {
                                                echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($prof->foto) . '"/>';
                                            } else {
                                                echo '<img class="undefined" src="assets/images/default-image.jpg" />';
                                            }
                                            ?>                                
                                        </div>
                                        <div class="col-md-8"><h2><?= $prof->nome; ?></h2></div>
                                        <form action="definir-orientador-do-projeto" method="post">
                                            <input type="hidden" name="id_usuario" value="<?= $prof->idusuario ?>">
                                            <input type="hidden" name="id_projeto" value="<?= $_GET['token'] ?>">

                                            <button type="submit" class="btn btn-success">Definir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php }
                } ?>
            </div>
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