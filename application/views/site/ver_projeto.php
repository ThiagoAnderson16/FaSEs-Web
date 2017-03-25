<?php include_once 'header.php'; ?>

<title>FaSEs - Projeto</title>

<section class="project-list row" style="width: 80%;">

    <div class="row">
        <div class="col-md-4 text-center">
            <?php echo '<img class="project-logo" src="data:image/jpeg;base64,' . base64_encode($projeto[0]->logo) . '"/>'; ?>
            <h1 class="text-center"><?= $projeto[0]->nome; ?></h1>
        </div>
        <div class="col-md-8" align="justify">
            <b class="title" ><span class="description" ><?= $projeto[0]->descricao; ?></span></b>
        </div>
    </div>

    <div class="row">
        <?php 
        $x = 1;
        foreach ($informacoes as $informacao) { 
            if($x == 1){
                echo '<h1 style="margin-left: 10%;"><br><br>Atividades do projeto:</h1><br>';
                $x = 0;
            }
            ?>
            <div class="col-md-6" align="justify" style="margin-left: 10%;">
                <span class="description"> <?= $informacao->texto; ?> </span>
            </div>
            <div class="col-md-4 text-center">
                <?php
                if ($informacao->foto != null) {
                    echo '<img class="undefined" src="data:image/jpeg;base64,' . base64_encode($informacao->foto) . '" max-width="300" max-height="350" class="img-responsive"/>';
                } else {
                    echo '<img src="assets/images/default-image.jpg" style="max-height: 300px; max-width: 350px;">';
                }
                ?>
            </div>
        <?php } ?>
    </div>
<!-- tava aqui -->
    <div class="project-devs row" style="display: inline;">
<!-- veio para aqui -->
<?php
    if ($devs != null) {
        echo '<h1 style="text-align: left; margin-left: 10%;">Equipe:</h1><br>';
    }
    ?>
        <?php
        foreach ($devs as $row) {
            ?>

            <label class="col-md-3 text-center">
                <?php
                if ($row[0]->foto != null) {
                    echo '<a href="perfil?nome=' . $row[0]->nome . '" style="text-decoration: none;"><img class="dev-avatar" src="data:image/jpeg;base64,' . base64_encode($row[0]->foto) . '"/></a>';
                } else {
                    //echo '<img src="assets/images/default-image.jpg" <a href="perfil?nome=' . $row[0]->nome . '" class="dev-avatar">';
                    echo '<img src="assets/images/default-image.jpg"><a href="perfil?nome=' . $row[0]->nome . '" class="dev-avatar"></a>';
                }
                ?>

                <a href="perfil?nome=<?= $row[0]->nome; ?>" style="text-decoration: none;"><h3 class="dev-name"><?= $row[0]->nome; ?></h3></a>
            </label>
            <?php
        }
        ?>
    </div>
</section>

<?php include_once 'footer.php'; ?>		