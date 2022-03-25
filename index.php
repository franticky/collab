<?php
    session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/styles.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <title>PROJET QUELFILM</title>
</head>

<body>

<div class="container-fluid">
    <form id="form-login" method="post">
        <div class="text-center">
            <img src="assets/img/logo.png" alt="logo quelfilm" title="QuelFilm.com">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <a href="">Mot de passe oublié ?</a>
        <br />
        <button type="submit" name="btn-connexion" class="mt-3 btn btn-info">Connexion</button>
    </form>
</div>

<?php

    function connexion(){

        $utilisateur_phpadmin = "root";
        $mot_passe_phpadmin = "";
        $dbname = "quelfilm";
        $hote = "localhost";


        try {

            $db = new PDO("mysql:host=".$hote.";dbname=".$dbname.";charset=UTF8", $utilisateur_phpadmin, $mot_passe_phpadmin);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion A MySQL via la classe PDO";

        }catch (PDOException $exception){
            echo "Erreur de connexion a PDO MySQL " . $exception->getMessage();
            var_dump($db);
            die();
        }

        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
            $emailUtilisateur = trim(htmlspecialchars($_POST['email']));
            $passwordUtilisateur = trim(htmlspecialchars($_POST['password']));

            var_dump($emailUtilisateur);
            var_dump($passwordUtilisateur);

            $sql = "SELECT * FROM admins WHERE email_admin = ? AND password_admin = ?";
            $connexion = $db->prepare($sql);
            $connexion->bindParam(1, $emailUtilisateur);
            $connexion->bindParam(2, $passwordUtilisateur);
            $connexion->execute();

            if($connexion->rowCount() >= 0){
                $ligne = $connexion->fetch();
                if($ligne){
                    $email = $ligne['email_admin'];
                    $password = $ligne['password_admin'];

                    if($emailUtilisateur === $email && $passwordUtilisateur === $password){
                        $_SESSION['email'] = $emailUtilisateur;
                        header("Location: pages/films2.php");
                    }else{
                        echo "<div class='mt-3 container'>
                    <p class='alert alert-danger p-3'>Erreur de connexion: Merci de vérifier votre email et votre mot de passe</p>
                    </div>";
                    }
                }else{
                    echo "<div class='mt-3 container'>
                    <p class='alert alert-danger p-3'>Erreur de connexion: Aucun utilisateur dans votre table</p>
                    </div>";
                }
            }else{
                echo "Votre table est vide";
            }
        }else{
            echo "Merci de remplir tous les champs";
        }
    }

    if(isset($_POST['btn-connexion'])){
        connexion();
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>