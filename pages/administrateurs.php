<?php
session_start();
if(isset($_SESSION['email'])){
?>
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/styles.css" />
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

<span class="mt-3 d-flex justify-content-end">
                <form method="post">
                    <button id="btn-deconnexion" name="btn-deconnexion" class="btn btn-danger">DECONNEXION</button>
                </form>
            </span>


<h1 class="text-info text-center">LES ADMINISTRATEURS</h1>

<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=quelfilm;charset=UTF8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Vous etes connectez a PDO MySQL";
}catch (PDOException $exception){
    echo "erreur " .$exception->getMessage();
}

//requete de selection de tous les admins
$sql = "SELECT * FROM `admins`";
//On parcours les admins et on les stocke dans une variable
$admins = $db->query($sql);

?>

<div class="container">

<table class="table table-striped" id="tab-admin">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Email</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">EDITION</th>
                <th scope="col">SUPPRESSION</th>
            </tr>
        </thead>

        <tbody>
            <?php
                    //On recup notre tableau d'admin et on parcours en bouclant sur un alias
                foreach ($admins as $adm){
            ?>
                <tr>
                        <!--ici alias['intitulé de la colonne phpMyAdmin table admins']-->
                    <th scope="row"><?= $adm['id_admin'] ?></th>
                    <td><?= $adm['email_admin'] ?></td>
                    <td><?= $adm['password_admin'] ?></td>
                    <td>
                        <a href="" class="btn btn-info">EDITER</a>
                    </td>
                    <td>
                        <a href="suppimer_admin.php?id_admin=<?= $adm['id_admin'] ?>" class="btn btn-danger">SUPPRIMER</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>

    </table>

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
    header("Location: ../index.php");
}
?>

