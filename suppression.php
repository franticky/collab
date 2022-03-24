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

        <title>PHP CRUD CONNEXION</title>
    </head>
<body>
<header>
    <?php
    require_once "menu.php";
    ?>
</header>

<?php
$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='container alert alert-success text-center'>Vous êtes bien connecté à PDO MySQL</p>";

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

if($dbh){
    $sql = "SELECT * FROM film WHERE id_film = ?";
    $id_film = $_GET['id_film'];
    $request = $dbh->prepare($sql);
    $request->bindParam(1, $id_film);
    $request->execute();
    $details = $request->fetch(PDO::FETCH_ASSOC);
}
?>
    <form method="post">
        <p class="text-center text-danger">SUPPRIMER LE FILM</p>
        <p class="text-center text-danger"><?= $details['nom_film'] ?></p>
        <p class="text-center text-danger"><?= $details['resume_film'] ?></p>
        <p class="text-center text-danger"><img src="<?= $details['affiche_film'] ?>" class="img-thumbnail" alt="" title="" width="200"/>
        </p>
        <div class="d-flex justify-content-center">

            <button type="submit" name="btn-supprimer" class="btn btn-danger">Confimer</button>
            <a href="films.php" class="btn btn-secondary">Annuler</a>
        </div>

    </form>
<?php

if(isset($_POST['btn-supprimer'])){
    $sql = "DELETE FROM `films` WHERE id_film =  ?";
    $delete = $dbh->prepare($sql);
    $idfilm = $_GET['id_film'];
    $delete->bindParam(1, $idfilm);
    $delete->execute();
    if($delete){
        echo "<p class='container alert alert-success'>Votre film a bien été supprimé</p>";
        echo "<div class='container'><a href='films.php' class='mt-3 btn btn-info'>RETOUR</a></div>";
    }else{
        echo "<p class='alert alert-danger'>Erreur lors de la supression du film !</p>";
    }
   
}

}else{
    echo "<a href='' class='btn btn-info'>S'inscrire</a>";
}
?>

</body>
</html>
