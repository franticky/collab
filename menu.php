<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="films.php">
            <img src="img/logo.jpg" alt="quelfilm" title="quelfilm.com" width="20%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">LES FILMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">PROCHAINEMENT</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">ACTUALITES CINEMA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="administrateurs.php">ADMINISTRATEURS</a>
                </li>
            </ul>
            <form method="post" id="searchbar">
          <input class="form-control me-sm-2" type="search" name="trouver" placeholder="Vous cherchez un film?">
          <button class="btn btn-secondary my-2 my-sm-0" name="btn-trouver" type="submit">
              Trouver un film
          </button>
      </form>
      <?php
        if(isset($_POST['btn-trouver'])){
            if(isset($_POST['trouver'])){
                $chercher = $_POST['trouver'];
            }else{
                $chercher = "";
            }

            if(!empty($chercher)){
                $sql = "SELECT * FROM films WHERE nom_film LIKE '%$chercher%' OR resume_film LIKE '%$chercher%' OR realisateur_film LIKE '%$chercher%' ";
                $statement = $dbh->query($sql);
            }else{
                $sql = "SELECT * FROM films";
                $satement = $dbh->query($sdl);
            }

        }
      ?>
        </div>
    </div>
</nav>



