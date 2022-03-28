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
    <title>traitement d ajouts</title>
</head>
<body>
    <header>
        <?php
            require_once "menu.php";
        ?>
    </header>
    <?php
        if(isset($_FILES['affiche_film'])){
            $repertoireDestination = "../collab/img/";
            $afficheFilm = $repertoireDestination . basename($_FILES['affiche_film']['name']);
                $_POST['affiche_film'] = $afficheFilm;

                    if(move_uploaded_file($_FILES['affiche_film']['tmp_name'], $afficheFilm)){
                        echo "<p class='container alert alert-danger'>fichier valide & dl ak success </p>";

                    }else{
                        echo "<p class='container alert alert-success'>erreur de dl</p>";
                    }
            }else{
                echo "<p class='container alert alert-primary'>invalid file only .png, .jpg, .bmp, .svg, .webp  authorised</p>";
            }
                        $user = "root";
                        $pass = "";
                            try{
                                $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
                                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                echo "<p class='container alert alert-success'>connected to PDO Mysql</p>";
                            }catch(PDOException $e){
                                print "error" .$e->getMessage() . "</br>";
                                    die();
                            }
                    if($dbh){
                        $sql = "INSERT INTO `films`(`id_film`,`nom_film`, `realisateur_film`, `scenariste_film`, `studio_film`, `genre_film`, `annee_film`, `duree_film`, `pays_film`, `resume_film`, `recommandation_film`, `affiche_film`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                            $insert = $dbh->prepare($sql);
                                $insert->bindParam(1, $_POST['id_film']);
                                $insert->bindParam(2, $_POST['nom_film']);
                                $insert->bindParam(3, $_POST['realisateur_film']);
                                $insert->bindParam(4, $_POST['scenariste_film']);
                                $insert->bindParam(5, $_POST['studio_film']);
                                $insert->bindParam(6, $_POST['genre_film']);
                                $insert->bindParam(7, $_POST['annee_film']);
                                $insert->bindParam(8, $_POST['duree_film']);
                                $insert->bindParam(9, $_POST['pays_film']);
                                $insert->bindParam(10, $_POST['resume_film']);
                                $insert->bindParam(11, $_POST['recommandation_film']);
                                $insert->bindParam(12, $_POST['affiche_film']);
                                    $insert->execute(array(
                                        $_POST['id_film'], 
                                        $_POST['nom_film'],
                                        $_POST['realisateur_film'],
                                        $_POST['scenariste_film'],
                                        $_POST['studio_film'],
                                        $_POST['genre_film'],
                                        $_POST['annee_film'],
                                        $_POST['duree_film'],
                                        $_POST['pays_film'],
                                        $_POST['resume_film'],
                                        $_POST['recommandation_film'],
                                        $_POST['affiche_film'],
                                    ));
                                            if($insert){
                                                echo "<p class='container alert alert-success'>film ajouté</p>";
                                                echo "<a href='filmS.php' class='container btn btn-primary'>voir le film</a>";
                                            }
                    }
                    
        }else{
                echo "<p class='alert alert-success'>erreur ajout</p>";
        }
        ?>

</body>
</html>
