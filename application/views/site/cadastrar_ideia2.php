<?php include_once 'header.php'; ?>

<html>
    <form class="form-horizontal" action="cadastrar-ideia" method="post">
        <div class="container">

            <!-- Form Name -->
            <h2 class="text-center">Casdastre sua ideia já</h2>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="fn">Sua ideia será vinculada a outro sistema?</label>  
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="vinculada" value="Sim" required>Sim
                        </label>
                        <label>
                            <input type="radio" name="vinculada" value="Não">Não         
                        </label>
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="ln">Sua ideia se encaixa melhor em:</label>  
                <div class="col-md-4">
                    <div class="checkbox" required>
                        <label>
                            <input type="checkbox" name="categoria[]" value="educacao"> Educação
                        </label>
                        <label>
                            <input type="checkbox" name="categoria[]" value="tecnologia"> Tecnologia
                        </label>
                        <label>
                            <input type="checkbox" name="categoria[]" value="ambiental"> Ambiental
                        </label>
                        <label>
                            <input type="checkbox" name="categoria[]" value="social"> Social<br>
                        </label>
                        <label>
                            <input id="outra_categoria" onclick="habilitar_categoria()" type="checkbox" name="categoria[]" value="outraCategoria" > Outro
                        </label>
                    </div>
                    <input type="hidden" id="inpur_outra_categoria" class="form-control" name="outra_categoria" style="padding: 5px 8px 5px 8px; border: 1px solid #A9A9A9;" placeholder="Qual? Separe-as por virgulas">

                    <script>
                        function habilitar_categoria() {
                            if (document.getElementById('outra_categoria').checked == true) {
                                document.getElementById('inpur_outra_categoria').type = 'text';
                            } else {
                                document.getElementById('inpur_outra_categoria').type = 'hidden';
                            }
                        }
                    </script>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="cmpny">Sua ideia vai ser usada onde?</label>  
                <div class="col-md-4" >
                    <div class="checkbox" style="float: left; margin-right: 5px;">
                        <label>
                            <input type="checkbox" name="plataforma[]" value="celular"> Celular 
                        </label>
                        <label>
                            <input type="checkbox" name="plataforma[]" value="site"> Site
                        </label>
                        <label>
                            <input type="checkbox" name="plataforma[]" value="desktop"> Computador sem internet
                        </label>
                        <label>
                            <input id="outra_plataforma" onclick="habilitar_plataforma()" type="checkbox" name="plataforma[]" value="outraPlataforma"> Outro
                        </label>
                        <input type="hidden" id="input_outra_plataforma" class="form-control" name="outra_plataforma" style="padding: 5px 8px 5px 8px; border: 1px solid #A9A9A9;" placeholder="Qual? Separe-as por virgulas">

                    </div>
                    <script>
                        function habilitar_plataforma() {
                            if (document.getElementById('outra_plataforma').checked == true) {
                                document.getElementById('input_outra_plataforma').type = 'text';
                            } else {
                                document.getElementById('input_outra_plataforma').type = 'hidden';
                            }
                        }
                    </script>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="email">A sua ideia será usada por quem?</label>  
                <div class="col-md-4">
                    <div class="checkbox" style="float: left; margin-right: 5px;">
                        <label>
                            <input type="checkbox" name="publico[]" value="Estudantes"> Estudantes
                        </label>
                        <label>
                            <input type="checkbox" name="publico[]" value="Clientes"> Meus Clientes
                        </label>
                        <label>
                            <input type="checkbox" name="publico[]" value="Funcionários"> Meus Funcionários
                        </label>
                        <label>
                            <input type="checkbox" name="publico[]" value="Idosos"> Idosos<br>
                        </label>
                        <label>
                            <input type="checkbox" name="publico[]" value="Crianças"> Crianças
                        </label>
                        <label>
                            <input id="outro_user" onclick="habilitar_usuario()" type="checkbox" name="publico[]" value="outroPublico"> Outro
                        </label>
                    </div>
                    <input type="hidden" id="outro_usuario" class="form-control" name="outro_publico" style="padding: 5px 8px 5px 8px; border: 1px solid #A9A9A9;" placeholder="Qual? Separe-as por virgulas">
                </div>
                <script>
                    function habilitar_usuario() {
                        if (document.getElementById('outro_user').checked == true) {
                            document.getElementById('outro_usuario').type = 'text';
                        } else {
                            document.getElementById('outro_usuario').type = 'hidden';
                        }
                    }
                </script>
            </div>
            <br>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" style="padding-top: 17px;">Qual o motivo de estar nos enviando sua ideia?</label>  
                <div class="col-md-4">
                    <input type="text" required class="form-control" name="motivo" style="border: 1px solid #A9A9A9;">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" style="padding-top: 17px;">Conte-nos um pouco mais sobre sua ideia.</label>  
                <div class="col-md-4">
                    <input type="text" required class="form-control" name="sobre" style="border: 1px solid #A9A9A9;" required>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-6 control-label" style="padding-top: 17px;">Ajude-nos colocando algumas palavras-chave sobre sua ideia.</label>  
                <div class="col-md-4">
                    <input type="text" required class="form-control" name="palavras_chaves" placeholder="Separe-as por vírgula" style="border: 1px solid #A9A9A9;" required/>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <div class="text-center">
                    <input class="mbr-buttons__btn btn btn-default button-center btn-green" type="submit" value="Enviar Ideia" />
                </div>
            </div>

        </div>
    </form>
    
    <br><br><br><br><br>

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


