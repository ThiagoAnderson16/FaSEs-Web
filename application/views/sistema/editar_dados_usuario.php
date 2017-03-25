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
    alertify.defaults.glossary.ok = 'Ok';
    alertify.defaults.glossary.cancel = 'Cancelar';
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";
</script>

<title>FaSEs - Minha conta</title>

<main class="ls-main ">

    <div class="container-fluid">

        <form id="form_editar_dados" action="alterar-meus-dados" class="row" method="post" enctype="multipart/form-data">
            <div class="placeholder text-center" style="margin-top: 3%;">
                <?php echo '<img class="undefined img-circle" src="data:image/jpeg;base64,' . base64_encode($usuario[0]->foto) . '" width="200" height="200" class="img-responsive center-block"/>'; ?>
            <!--<img class="undefined" src="" width="200" height="180" class="img-responsive center-block"/>-->
                <br><br>
                <input class="center-block" type="file" name="foto"/>
                <br><br>
            </div>
            <label class="col-md-4">
                <b>Nome:</b><br>
                <input type="text" class="form-control" style="margin-top: 5px;" value="<?= $usuario[0]->nome ?>" name="nome">
            </label>
            <label class="col-md-4">
                <b>Idade:</b><br>
                <input type="text" class="form-control" style="margin-top: 5px;" value="<?= $usuario[0]->idade ?>" name="idade">
            </label>
            <label class="col-md-4" style="margin-bottom: 30px;">
                <b>Email:</b><br>
                <input type="text" class="form-control" style="margin-top: 5px;" value="<?= $usuario[0]->email ?>" name="email">
            </label>
            <?php if ($usuario[0]->matricula != NULL) { ?>
                <label class="col-md-4">
                    <b>Matrícula: </b><?= $usuario[0]->matricula ?>
                </label>
            <?php } ?>
            <label class="col-md-4" style="margin-bottom: 30px;">
                <b>Link do corrículo lattes:</b><br>
                <input type="text" class="form-control" style="margin-top: 5px;" value="<?= $usuario[0]->lattes ?>" name="lattes">
            </label>
            <label class="col-md-4" style="margin-bottom: 30px;">
                <b>Link do GitHub:</b><br>
                <input type="text" class="form-control" style="margin-top: 5px;" value="<?= $usuario[0]->github ?>" name="github">
            </label>


            <label class="col-md-4" style="margin-bottom: 30px; margin-top: 30px;">
                <b>Campo para alterar senha</b><br>
                <input id="nova_senha" type="password" class="form-control" style="margin-top: 5px;" value="" name="nova_senha" placeholder="Senha">
            </label>
            <label class="col-md-4" style="margin-bottom: 30px; margin-top: 30px;">
                <b>Confirmar nova senha</b><br>
                <input id="repetir_nova_senha" type="password" class="form-control" style="margin-top: 5px;" value="" name="repetir_nova_senha" placeholder="Repita a nova senha">
            </label>
            <label class="col-md-4" style="margin-bottom: 80px; margin-top: 30px;"></label>

            <script>
                function alterarSenha() {

                    var nova_senha = document.getElementById("nova_senha").value;
                    var repetir_nova_senha = document.getElementById("repetir_nova_senha").value;

                    if (nova_senha == null && repetir_nova_senha == null) {
                        document.getElementById("form_editar_dados").submit();
                    } else {
                        if (nova_senha != repetir_nova_senha) {
                            alertify.confirm('Senhas não são iguais').set('onok', function (closeEvent) {});
                        } else {
                            document.getElementById("form_editar_dados").submit();                            
                        }

                    }
                }
            </script>

            <p class="text-right" style="margin-top: 3%;">
                <button type="button" onclick="alterarSenha()" class="btn btn-default btn-lg danger">Salvar alterações</button>
            </p>
        </form>
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
