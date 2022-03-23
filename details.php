<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details des films</title>
</head>
<body>
    <header>
        <?php
            require_once "menu.php";
        ?>
    </header>
            <div class="container-fluid">
                <span class="mt-5 d-flex justify-content-around">
                    <h3 class="mt-4 text-secondary">
                        START>
                        <?= $_SESSION['email']?>
                    </h3>
                        <form method="post">
                            <button id="btn-sortir" name="btn-sortir" class="btn btn-warning"></button>
                        </form>
                </span>
                <?php
                    $user = "root";
                    $pass = ""; 

                    try{
                            $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $pass);
                            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            echo "<p class='container alert alert-primary text-center'> Demarrage PDO MySQL </p>";

                    }catch(PDOException $e){
                        print "An error occurred" .$e->getMessage() ."<br/>";
                        die();
                    }   
                        if($dbh){
                            $sql = "SELECT * FROM questfilms WHERE id_film = ?";
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
                        <h4 class="card-title text-info"><?= $details['nom_film']?></h4>
                        <img src="<?= $details['affiche_film']?>" class="card-img-top img-fluid img-details" alt="<?= $details['nom_film']?>" title="<?= $details['nom_film'] ?>">
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $details['realisateur_film'] ?>
                        </p>
                        <p class="card-text text-primary fw-bold">
                            Realisateur: <?= $details['realisateur_film'] ?>
                        </p>
                        <p class="card-text text-primary fw-bold">
                           Annee: 
                    </div>
                </div>
            </div>
</body>
</html>