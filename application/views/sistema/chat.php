<?php include 'header_sis.php'; ?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">
<link rel="stylesheet" href="assets/mobirise/css/style.css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">


<title>FaSEs - Chat</title>

<main class="ls-main ">

    <div class="container-fluid">

        <br>
        <?php
        /* var_dump($foto);
          var_dump($mensagem); */
        $i = 0;
        foreach ($foto as $ft) {
//            foreach ($mensagem as $msg) {
                ?>
                <blockquote>
                    <div class="row">
                        <div class="col-md-1">
                            <?php echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($ft[0]->foto) . '" width="30" height="30" class="img-responsive center-block"/>'; ?>
                        </div>
                        <div class="col-md-11">

                            <?= $mensagem[$i] ?>
                        </div>
                    </div>
                </blockquote>
                <?php
                $i++;
           // }
        }
        
            //echo $id_projeto[0];
        
        ?>
        <form method="post" action="mensagem">
            <input type="hidden" value="<?=$id_projeto?>" name="token">
            <textarea class="form-control" style="height: 100px;" name="mensagem" placeholder="Mensagem..." required=""></textarea>
            <p class="text-right"><button type="submit" class="btn btn-default btn-lg active">Comentar</button></p>
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
