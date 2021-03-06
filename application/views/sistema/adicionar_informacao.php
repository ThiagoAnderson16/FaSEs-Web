<?php include 'header_sis.php'; ?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
<link rel="stylesheet" href="assets/mobirise/css/style.css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">

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


<title>FaSEs - Adicionar informação ao projeto</title>

<main class="ls-main ">
    <div class="container-fluid">

        <form id="add_informacao" action="add-informacao" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_projeto" value="<?= $id_projeto ?>"/>
            <br><br>
            <b>Texto: </b><br><br>
            <textarea class="form-control" style="height: 200px;" name="texto" required></textarea><br><br>
            <b>Imagem: </b><br><br>
            <input type="file" name="imagem" alt="Imagem" />
            <br>
            <p class="text-right"><button type="button" onclick="confirmarAddInformacao()" class="btn btn-default btn-lg active">Adicionar Informação</button></p>
        </form>
        <script>
            function confirmarAddInformacao() {
                alertify.confirm('Certifique-se de adicionar uma imagem junto a inforação. Confirmar informação?').set('onok', function (closeEvent) {
                    document.getElementById("add_informacao").submit();
                });
            }
        </script>

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
