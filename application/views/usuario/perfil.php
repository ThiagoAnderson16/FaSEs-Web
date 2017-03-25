<?php include_once '../header.php'; ?>

<title>FaSEs - Ideia</title>
    
    <?php echo '<img class="project-logo" src="data:image/jpeg;base64,'.base64_encode( $usuario[0]->foto ).'"/>'; ?>

      
      <section class="project-list">
        <div class="project-particulars">
          <h1 class="title"><?= $usuario[0]->nome; ?> 
              <span class="description">
                  <?= "Idade: " . $usuario[0]->idade;?><br>
                  <?= "Email: " . $usuario[0]->email;?><br>
                  <a href="<?= $usuario[0]->lattes;?>"><?= $usuario[0]->lattes; ?></a><br>
                  <a href="<?= $usuario[0]->github;?>"><?= $usuario[0]->github; ?></a><br>
              </span>
          </h1>
        </div>
        <div class="project-devs">
            
      </div>
      </section>
      
<?php include_once '../footer.php'; ?>

