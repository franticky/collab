<?php
session_start();
if(isset($_SESSION["email"])){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <title>details des films</title>
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

        <div class="container-fluid">
            <span class="mt-5 d-flex justify-content-around">
                <h3 class="mt-4 text-success">WELCOME <?= $_SESSION['email']?></h3>
            </span>

            <?php
                $user = "root";
                $pass = ""; 

                try{
                        $dbh = new PDO('mysql:host=localhost;dbname=quelfilm;charset=UTF8', $user, $pass);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        echo "<p class='container alert alert-primary text-center'>Vous êtes bien connecté</p>";

                }catch(PDOException $e){
                    print "An error occurred" .$e->getMessage() ."<br/>";
                    die();
                }   
                    if($dbh){
                        $sql = "SELECT * FROM films WHERE id_film = ?";
                            $id_film = $_GET["id_film"];
                                $request = $dbh->prepare($sql);
                                    $request->bindParam(1, $id_film);
                                        $request->execute();
                                            $details = $request->fetch(PDO::FETCH_ASSOC);
                    }
            ?>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mt-2">
                    <div class="card">
                   
                    <div class="text-center">
                        <h4 class="card-title text-info">
                            <?= $details['nom_film']?>
                        </h4>
                        <img src="<?= $details['affiche_film']?>" class="card-img-top img-fluid img-details" alt="<?= $details['nom_film']?>" title="<?= $details['nom_film'] ?>">
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Réalisateur :<?= $details['realisateur_film'] ?>
                            </p>
                        <p class="card-text text-primary fw-bold">
                            Genre : <?= $details['genre_film'] ?>
                            </p>
                        <p class="card-text text-primary fw-bold">
                            Studio : <?= $details['studio_film'] ?>
                            </p>
                        <p class="card-text text-primary fw-bold">
                            Scénariste : <?= $details['scenariste_film'] ?>
                            </p>
                        <p class="card-text text-primary fw-bold">
                           Résumé : <?= $details['resume_film'] ?>
                           </p>
                        
                        <p class="card-text text-primary fw-bold">
                           Durée : <?= $details['duree_film'] ?>
                           </p>
                        <p class="card-text text-primary fw-bold">
                           Année de sortie : <?= $details['annee_film'] ?>
                           </p>
                        <p class="card-text text-primary fw-bold">
                           Pays : <?= $details['pays_film'] ?>
                           </p>
                        <p class="card-text text-primary fw-bold">
                           Recommandation : <?= $details['recommandation_film'] ?>
                           </p>
                    </div>
                    </div>
                        </div>
            </div>
            <div class="d-flex justify-content-around">
                    <button type="submit" name="btn-retour" class="mt-3 mb-3 btn btn-info"><a href="films2.php">retour</a>    </button>
                    
            </div>
            </div>
            <?php
                    }else{
                        header("Location: ../index.php");
                    }
                    ?>
</body>
</html>