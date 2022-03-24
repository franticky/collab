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

    <?= "Hello" ?>






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