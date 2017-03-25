<?php include 'header_sis.php'; ?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
<link rel="stylesheet" href="assets/locaweb/stylesheets/locastyle.css" type="text/css">




<title>FaSEs - Ideias disponíveis</title>

<main class="ls-main ">

    <div class="container-fluid">

        <h1>Feedback da ideia</h1>
        <form action="recusar-ideia" method="post">
            <?php
            $id_ideia = $this->input->post('id_ideia');
            ?>

            <input type="hidden" name="id_ideia" value="<?= $id_ideia ?>">

            <textarea class="form-control" style="height: 200px;" name="feedback"></textarea>
            <br>
            <button type="submit" class="btn btn-default btn-lg active">Enviar feedback</button>
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
