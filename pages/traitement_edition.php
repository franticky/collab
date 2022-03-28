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
    <title>TRAITEMENT EDITER FILM</title>
</head>
<body>
<header>
    <?php
    require_once "menu.php";
    ?>
</header>
<?php

if(isset($_FILES['affiche_film'])){

    $repertoireDestination = "../img/";
    $affiche_film = $repertoireDestination . basename($_FILES['affiche_film']['name']);
    $_POST['affiche_film'] = $affiche_film;

    if(move_uploaded_file($_FILES['affiche_film']['tmp_name'], $affiche_film)){
        echo "<p class='container alert alert-success'>Le fichier est valide et téléchargé avec succès !</p>";
    }else{
        echo "<p class='container alert alert-danger'>Erreur lors du téléchargement de votre fichier !</p>";
    }
}else{
    echo "<p class='container alert alert-danger'>Le fichier est invalide : seuls les formats .png, .jpg, .bmp, .svg, .webp sont autorisés !</p>";
}

$user = "root";
$pass = "";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='container alert alert-success text-center'>Vous êtes connecté</p>";

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

if($dbh){
    $sql = "UPDATE `films` SET `nom_film`=?,`realisateur_film`=?,`scenariste_film`=?,`studio_film`=?,`genre_film`=?,`annee_film`=?,`duree_film`=?,`pays_film`=?,`resume_film`=?,`recommandation_film`=?,`affiche_film`=? WHERE  id_film = ?";
    $update = $dbh->prepare($sql);
    $update->execute(array(
       
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
        $_GET['id_film']
    ));

    if($update){
        echo "<p class='container alert alert-success'>Votre film a été mis à jour avec succès !</p>";
        echo "<div class='text-center'><a href='films2.php' class='container btn btn-success'>Voir mon film</a></div> ";
    }else{
        echo "<p class='alert alert-danger'>Erreur lors de l'ajout du film</p>";
    }
}
}else{
    echo "<a href='' class='btn btn-info'>S'inscrire</a>";
}
?>

