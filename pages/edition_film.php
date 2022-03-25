<?php
session_start();
if(isset($_SESSION["email"])){

    $user = "root";
    $pass = "";

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='container alert alert-info text-center'>Vous êtes bien connecté à PDO MySQL</p>";

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    if($dbh){
        $sql = "SELECT * FROM films WHERE id_film = ?";

        $id_film = $_GET['id_film'];
        $request = $dbh->prepare($sql);
        $request->bindParam(1, $id_film);
        $request->execute();
        $details = $request->fetch(PDO::FETCH_ASSOC);
    }
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
        <title>EDITER UN FILM</title>
    </head>
	
    <body>
	
    <header>
        <?php
        require_once "menu.php";
        ?>
    </header>
	
    <div class="container-fluid">
            <span class="mt-3 d-flex justify-content-around">
                <h3 class="mt-3 text-primary">BIENVENUE <?= $_SESSION['email'] ?></h3>
                <form method="post">
                    <button id="btn-deconnexion" name="btn-deconnexion" class="btn btn-danger">DECONNEXION</button>
                </form>
            </span></br></br></br></br></br></br>

        <div class="container">

            <form action="traitement_edition_film.php?id_film=<?= $details['id_film'] ?>"  id="form-update" method="post" enctype="multipart/form-data">
                <h2 class="text-info text-center">EDITER LE FILM</h2>
                <div class="text-center img-logo" id="img-logo" >
                    <img src="" alt="logo quelfilm" title="quelfilm.com">
                </div>

                <div class="mb-3">
                    <label for="nom_film" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="nom_film" name="nom_film" value="<?= $details['nom_film'] ?>" required>
                </div>
				<div class="mb-3">
                    <label for="nom_film" class="form-label">realisateur</label>
                    <input type="text" class="form-control" id="realisateur_film" name="realisateur_film" value="<?= $details['realisateur_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">scenariste</label>
                    <input type="text" class="form-control" id="scenariste_film" name="scenariste_film" value="<?= $details['scenariste_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">studio</label>
                    <input type="text" class="form-control" id="studio_film" name="studio_film" value="<?= $details['studio_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">genre</label>
                    <input type="text" class="form-control" id="genre_film" name="genre_film" value="<?= $details['genre_film'] ?>" required>
                </div>
				<div class="mb-3">
                    <label for="date_sortie" class="form-label">Sorti en </label>
                    <input type="text" class="form-control" id="annee_sortie" name="annee_film" value="<?= $details['annee_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">duree</label>
                    <input type="text" class="form-control" id="duree_film" name="duree_film" value="<?= $details['duree_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">pays</label>
                    <input type="text" class="form-control" id="pays_film" name="pays_film" value="<?= $details['pays_film'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nom_film" class="form-label">resume</label>
                    <input type="text" class="form-control" id="resume_film" name="resume_film" value="<?= $details['resume_film'] ?>" required>
                </div>
				<div class="mb-3">
                    <label for="affiche_film" class="form-label">Affiche du film</label>
                    <input type="file" class="form-control" id="affiche_film" name="affiche_film" required value="<?= $details['affiche_film'] ?>">
                </div>
                <div class="mb-3">
                    <label for="resume_film" class="form-label">Résumé</label>
                    <textarea class="form-control" rows="5" id="resume_film" name="resume_film" value="<?= $details['resume_film'] ?>" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="stock_film" class="form-label">Recommandation</label>
                    <select class="form-control" name="recommandation_film" id="recommandation_film" required>
                        <option value="0">NON</option>
                        <option value="1">OUI</option>
                    </select>
                </div>

                <div class="d-flex justify-content-around">
                    <button type="submit" name="btn-connexion" class="btn btn-warning">Mettre à jour</button>
                    <a href="films.php" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
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
            