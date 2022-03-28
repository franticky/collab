<?php
session_start();
if(isset($_SESSION["email"])){
    ?>

    <!doctype html>
    <html lang="fr">
    <head>   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
        <link href="../assets/css/styles.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <title>LES FILMS</title>
    </head>

    <body>

    <header>
        <?php
        require_once "menu.php";
        ?>
    </header>

        <span class="mt-3 d-flex justify-content-end">
            <form method="post">
                <button id="btn-deconnexion" name="btn-deconnexion" class="btn btn-danger">DECONNEXION</button>
            </form>
        </span>

    <?php

        $user = "root";
        $pass = "";
        $hote = "localhost";
        $dbname = "quelfilm";

                    //      CONNEXION VIA PDO

    try {
        $basedonnees = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
        $basedonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='alert alert-success text-center p-3'>VOUS ETES CONNECTE</p>";

    }catch (PDOException $exception){
        echo "Erreur de connexion à MySql " . $exception->getMessage();
    }

                    //      REQUETE SQL

        //  Vérifier la connexion à MySql
    if($basedonnees == true){
        $nomtable = "films";
        $sql = "SELECT * FROM films";
        $filmsTableau = $basedonnees->query($sql);
    }

    ?>

    <div class="container-fluid">

        <h3 class="mt-5 text-success text-center" id="welcome" >BIENVENUE <?= $_SESSION['email'] ?></h3>

    </div>

    <div class="container">
        <div class="row">
            <h1 class="mt-5 text-info text-center">LES FILMS</h1></br></br></br></br>
            <?php
                foreach ($filmsTableau as $film){
                $annee_film = new DateTime($film['annee_film']);
            ?>

                 <div class="col-sm-12 col-lg-4 mt-5">
                    <div class="carte">
						<div class="text-center">
							<h4 class="carte-titre text-info">
							<?= $film['nom_film'] ?></h4>
							<img src="<?= $film['affiche_film'] ?>" class="card-img-top img-fluid" alt="<?= $film['nom_film'] ?>" title="<?= $film['nom_film'] ?>">
						</div>
                                    
						<div class="card-body">
							<p class="card-text">Réalisé par <?= $film['realisateur_film'] ?></p>
							<p class="card-text">L'histoire : <?= $film['resume_film'] ?></p>
							<p class="card-text text-info fw-bold">Genre : <?= $film['genre_film'] ?></p>
							<p class="card-text">Durée : <?= $film['duree_film'] ?></p>
							<p class="card-text">Recommandations :
							<?php
								if($film['recommandation_film'] == true){
									echo "OUI";
								}else{
									echo "NON";
								}
							?>
                            </p>
						
						<br />
							<div class="container-fluid d-flex justify-content-center">
								<a href="detail_film.php" class="mt-2 btn btn-info">Détails</a>
								<a href="edition_film.php?id_film=<?= $film['id_film'] ?>" class="mt-2 btn btn-success">Editer</a>
								<a href="suppression.php?id_film=<?= $film['id_film'] ?>" class="mt-2 btn btn-warning">Supprimer</a>
							</div>
						</div>
					</div>
				</div>
            <?php
                }
            ?>
        </div>
    </div>
    
    <div class="text-center">
        <form method="post"></br></br></br></br>              
            <a href="ajout_film.php?id_film=<?= $film['id_film'] ?>" class="btn btn-info">AJOUTER UN FILM</a></br></br></br></br>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

    <?php
                //  Deconnexion et Destruction de la session $_SESSION['email']
    function deconnexion(){
        var_dump("Ciao");
        echo "Vous êtes bien déconnecté";
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    }

                //  Clic sur le bouton de deconnexion
    if(isset($_POST['btn-deconnexion'])){
        deconnexion();
    }

}else{
    echo "<a href='' class='btn btn-warning'>S'inscrire</a>";
    header('Location: ../index.php');
}

