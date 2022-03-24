<?php
session_start();
if(isset($_SESSION["email"])){
    function arreter(){
        echo "bonjour!";
        session_unset();
        session_destroy();
        header('Location: films.php');
    }
            if(isset($_POST['btn-deconnexion'])){
                arreter();
            }               
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="../assets/css/styles.css" rel="stylesheet"/>
    <a href="preconnect" href="https://fonts.googleapis.com">
    <a href="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <a href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
    <title>LES FILMS</title>
</head>

<body>
    <header>
        <?php
        require_once ("menu.php");
        ?>
    </header>
    <?php
            $user = "root";
            $pass = "";
            try{
                $dbh = new PDO('mysql:host=localhost;dbname=quelfilm;charset=UTF8', $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "<p class='container alert alert-success text-center'>PDO MySQL connexion acheived</p>";
            }catch(PDOException $e){
                    print "Error :".$e->getMEssage() ."<br/>";
                die();
            };
            ?>
            <div class="text-center">
            <img width="10%" src="../img/logo.jpg" alt="quelfilm.quelfilm" title="quelfilm.sf">
            </div>
            <div class="container-fluid">
        <span class="mt-4 d-flex justify-content-around">
            <h3 class="mt-4 text-danger">connection etablie <?= $_SESSION['email'] ?></h3>
        </span>
        
        <div class="text-center">
                <a href="ajoutDarticle.php" class="mt-4 btn btn-outline-primary">
                        Ajouter un film
                </a>
                <form method="post">
                    <button type="submit" id="btn-deconnexion" name="btn-deconnexion" class="btn btn-warning" >sortir de la connection</button>
                </form>
        </div>
            <h4 class="mt-4 text-danger">
                Les Films
            </h4>
            <div class="container">
                
            <div class="row">
            <?php 
                    foreach($statement as $film){
                        $duree = new DateTime($film['duree_film']);
                    }
            ?>
                <div class="col-sm-12 col-lg-4 mt-5">
                    <div class="carte">
                    <div class="text-center">
                                        <h4 class="carte-titre text-info">
                                            <?= $film['nom_film'] ?></h4>
                                        <img src="<?= $film['affiche_film'] ?>" class="card-img-top img-fluid" alt="<?= $film['nom_film'] ?>" title="<?= $film['nom_film'] ?>">
                                    </div>
                                    
                                    <div class="card-body">

                                        <p class="card-text"><?= $film['realisateur_film'] ?></p>
                                        <p class="card-text"><?= $film['resume_film'] ?></p>
                                        <p class="card-text text-success fw-bold">genre : <?= $film['genre_film'] ?></p>
                                        <p class="card-text"><?= $film['duree_film'] ?></p>
                                        <p class="card-text">recommandation :
                                            <?php
                                                if($film['recommandation_film'] == true){
                                                    echo "OUI";
                                                }else{
                                                    echo "NON";
                                                }
                                            ?>
                                            </p>
                                            <em class="card-text">Durée: <?= $duree->format('h-m-s') ?></em>
                                            <br />
                                            <div class="container-fluid d-flex justify-content-center">
                                                <a href="details.php?id_film=<?= $film['id_film'] ?>" class="mt-2 btn btn-success">Détails</a>
                                                <a href="edition_film.php?id_film=<?= $film['id_film'] ?>" class="mt-2 btn btn-warning">Editer</a>
                                                <a href="suppression.php?id_film=<?= $film['id_film'] ?>" class="mt-2 btn btn-danger">Supprimer</a>

                                            </div>
                    </div>

            </div>




</body>
</html>

<?php
    //Deconnexion et destruction de la session $_SESSION['email']
    function deconnexion(){
        var_dump("ciao");
        echo "ciaociao";
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    }

    //Click sur le bouton de deconnexion
    if(isset($_POST['btn-deconnexion'])){
        deconnexion();
    }

}else{
    echo "<a href='' class='btn btn-warning'>S'inscrire</a>";
    header('Location: ../index.php');
}