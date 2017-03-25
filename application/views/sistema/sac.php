<?php
$this->load->library('session');
if ($_SESSION['SESSION_USUARIO']['nivel'] == 4) {
    include 'header_sis.php';
    ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
    <link rel="stylesheet" href="assets/mobirise/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <title>FaSEs - SAC</title>

    <main class="ls-main ">

        <div class="container-fluid">
            <br>
            <?php
            if (count($sac) != 0) {
                foreach ($sac as $sc) {
                    ?>
                    <blockquote>
                        <div class="row">
                            <div class="col-md-3">
                                <?= $sc->nome; ?>
                            </div>
                            <div class="col-md-7">
                                <?= $sc->email; ?>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <p><?= $sc->mensagem; ?></p>
                            </div>
                        </div>
                    </blockquote>
                    <?php
                }
            } else {
                ?>
                <div class="ls-alert-warning">Nenhuma mensagem de SAC</div>
                <?php
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
    <?php
} else {
    header('Location: minha-ideia');
}
?>