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
    <title>LES FILMS</title>
</head>
<body>

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