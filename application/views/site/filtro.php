<?php include_once 'header.php'; ?>

<title>FaSEs - Pojeto filtrado</title>

<div class="row" style="margin-right: auto !important;">
    <div class="col-md-offset-1 col-10 content-2">
        <form method="post" action="filtrar" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" name="palavra" class="form-control" style="border: 1px solid #A9A9A9;" placeholder="Nome, tag, categoria, plataforma e outros" required>
            </div>
            <button type="submit" class="btn btn-default">Filtrar</button>
        </form>

    </div>
</div>

<!-- Projetos -->

<section class="content-2 col-4" id="projetos" style="background-color: rgb(255, 255, 255);">

    <div class="container">
        <div class="row" >
            <?php
            $cont = 0;
            foreach ($projeto as $row) {
                if ($cont == 4) {
                    echo("<hr class='break-line'>");
                    $cont = 0;
                }
                $cont++;
                ?>
                <div>
                    <div class="thumbnail">
                        <div class="image" style="height: 120px;">
                            <?php echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($row->logo) . '"/>'; ?>
                        </div>
                        <div class="caption">
                            <div style="height: 300px;">
                                <h3><?= $row->nome ?></h3>
                                <p style="text-align: justify;"><?= $row->texto_inicial; ?></p>
                            </div>
                            <p class="group btn-projects"><a href="detalhes-do-projeto?token=<?= $row->idprojeto; ?>" class="btn btn-default btn-green">LER MAIS</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>
