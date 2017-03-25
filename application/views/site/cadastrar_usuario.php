<?php include_once 'header.php'; ?>

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

<div class="container col-md-6 col-md-offset-3">
    <?php
    if (isset($_SESSION['SESSION_ERRO_CADASTRO_USUARIO'])) {
        $this->session->unset_userdata('SESSION_ERRO_CADASTRO_USUARIO');
        ?>
        <br>    
        <div class="alert alert-danger" role="alert">Ops! Email ou matrícula já cadastrados no sistema!</div>
    <?php } ?>
    <form id="form_cadastro" action="cadastrar-usuario" class="form-horizontal" style="margin-top: 20px;" method="post">
        <label for="tipo_usuario">Você é?</label>
        <p>
            <select id="atribuicao" onclick="abrir_matricula()" name="tipo_usuario" id="tipo_usuario" class="selectpicker form-control" style="border: 1px solid #A9A9A9;" required>
                <option value="comunidade_externa">Comunidade</option>
                <option value="aluno">Aluno do IFRN-ZN</option>
                <option value="professor">Professor do IFRN-ZN</option>
            </select>
            <script>
                function abrir_matricula() {
                    var x = document.getElementById("atribuicao").value;

                    if (x == "aluno" || x == "professor") {
                        document.getElementById("matricula").innerHTML = "<label for='nome'>Matrícula:</label>" +
                                "<input type='number' name='matricula' id='input_matricula' class='form-control' style='border: 1px solid #A9A9A9;' placeholder='Matrícula *'/>";
                    } else {
                        document.getElementById("matricula").innerHTML = "";
                    }
                }
            </script>
        </p>
        <div id="matricula">
            <!--<label for='nome'>Matrícula:</label>
            <input type='number' id='input_matricula' class='form-control' placeholder='Matrícula' style="border: 1px solid #A9A9A9;" required/> -->
        </div>
        <br>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Seu nome *" style="border: 1px solid #A9A9A9;" required/>
        </div>
        <br>
        <div>
            <label for="nome">Idade:</label>
            <input type="number" id="idade" name="idade" class="form-control" placeholder="Sua idade *" style="border: 1px solid #A9A9A9;" required/>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email *" style="border: 1px solid #A9A9A9;">
        </div>
        <br>
        <div>
            <label for="pwd">Senha:</label>
            <input id="senha" type="password" name="senha" class="form-control" id="pwd" placeholder="Digite sua senha *" style="border: 1px solid #A9A9A9;" required>
        </div>
        <br>
        <div>
            <label for="senha_repitir">Repitir Senha:</label>
            <input id="repetir_senha" type="password" id="senha_repitir" class="form-control" placeholder="Repitqa sua senha *" style="border: 1px solid #A9A9A9;" required/>
        </div>
        <br>
        <div class="text-center">
            <button type="button" onclick="verificar_senhas()" class="btn btn-default">Cadastrar</button>
        </div>
        <script>
            function verificar_senhas() {
                //Inicio verificar senhas
                if(document.getElementById("email").value.indexOf("@") == -1){
                    alertify.confirm('Cerifique se seu endereço de email tem @').set('onok', function (closeEvent) {});                    
                } else if (document.getElementById("senha").value == document.getElementById("repetir_senha").value) {

                    var x = typeof document.getElementById("input_matricula");

                    if (document.getElementById("input_matricula") != null) {
                        /*    
                         alertify.confirm('Tem matricula ' + x).set('onok', function (closeEvent) {});
                         } else {
                         alertify.confirm('n tem matricula ' + x).set('onok', function (closeEvent) {});
                         }*/
                        //Inicio verificar se os campos n são vazios (o requided vacilou)
                        if (document.getElementById("atribuicao").value == "" ||
                                document.getElementById("input_matricula").value == "" ||
                                document.getElementById("nome").value == "" ||
                                document.getElementById("idade").value == "" ||
                                document.getElementById("email").value == "" ||
                                document.getElementById("senha").value == "" ||
                                document.getElementById("repetir_senha").value == "") {
                            alertify.confirm('Todos os campos são obrigatórios').set('onok', function (closeEvent) {
                            });

                            //Fim verificar se os campos n são vazios (o requided vacilou) 
                        } else {
                            document.getElementById("form_cadastro").submit();
                        }

                        //Fim verificar se existe input_matricula
                        //Inicio verificar se os campos n são vazios (o requided vacilou) sem o input_matricula
                    } else if (document.getElementById("atribuicao").value == "" ||
                            document.getElementById("nome").value == "" ||
                            document.getElementById("idade").value == "" ||
                            document.getElementById("email").value == "" ||
                            document.getElementById("senha").value == "" ||
                            document.getElementById("repetir_senha").value == "") {
                        alertify.confirm('Todos os campos são obrigatórios').set('onok', function (closeEvent) {

                        });

                        //Fim verificar se os campos n são vazios (o requided vacilou) sem o input_matricula
                    } else {
                        if (document.getElementById("senha").value.length < 8) {
                            alertify.confirm('Senha muito curta. Mínimo 8 caracteres').set('onok', function (closeEvent) {
                            });
                        } else {
                            document.getElementById("form_cadastro").submit();
                        }
                    }
                    //Fim verificar senhas
                } else {  //Fim verificar senhas
                    alertify.confirm('As senhas não são iguais.').set('onok', function (closeEvent) {

                    });
                }
            }
        </script>
        <br><br><br><br><br><br><br><br><br><br>
    </form>
</div>




<!-- Rodapé-->  

<footer class="mbr-section mbr-section--relative mbr-section--fixed-size footer footer-final" id="footer1-91" style="background-color: rgb(68, 68, 68);">

    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row">
            <div class="col-sm-12">
                <p class="mbr-footer__copyright"></p><p>FaSEs- IFRN Natal Zona Norte (c) 2016.</p>
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


