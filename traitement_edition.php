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
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="../assets/css/styles.css" rel="stylesheet"/>
    <title>traitement  edition</title>
</head>
<body>
    <header>
        <?php
      require_once "menu.php";
        ?>
    </header>
        <?php
            if(isset($_FILES['affiche_film'])){
                $repertoireDestination = "img/";
                $photo_film = $repertoirDestination . basename($_FILES['affiche_film']['name']);
                $_POST['affiche_film'] = $photo_film;
                    if(move_uploaded_file($_FILES['affiche_film']['tmp_name'], $photo_film)){
                        echo "<p 'container aleert alert-warning'>fichier valide & dl</p>";
                    }else{
                            echo "<p class='container alert alert-warning'>erreur du dl</p>";
                    }
            }else{
                echo"<p class='container alert alert-warning'>fichier invalide sseuls formats: png, jpg, bmp, svg, webp</p>";
            }
            $user = "root";
                    $pass = "";
                    try{ 
                        $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            echo "<p class='container alert alert-warning text-center'>systemes PDO Mysql connectés </p>";
                        
            }catch(PDOException $e){
                print "error" .$e->getMEssage(). "<br/>";
                die();
            }
                if($dbh){
                    $sql = "SELECT * FROM films WHERE id_film = ?";
                    $update = $dbh->prepare($sql);
                    $update->execute(array(
                        $_POST['nom_film'],
                        $_POST['realisateur_film'],
                        $_POST['genre_film'],
                        $_POST['annee_film'],
                        $_POST['duree_film'],
                        $_POST['pays_film'],
                        $_POST['resume_film'],
                        $_POST['recommandation_film'],
                        $_POST['affiche_film'],
                        $_GET['id__film']
                    ));
                    if($update){
                        echo "<p class='container alert alert-secondary'>mis a jour</p>";
                        echo "<div class='text-center'><a href='films.php' class='container btn btn-warning'></a></div>";
                    }else{
                        echo "<p class='alert alert-warning'>error d'ajout</p>";
                    }
        }
    }else{
        echo "<a href='' class='btn btn-danger'>inscription</a>";
    }
               
        ?>
</body>
</html>