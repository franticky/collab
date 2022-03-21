<?php
    $user = "root";
    $password= "";
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=quelfilm', $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p class='container alert alert-danger text-center' >connexion effectuee</p>";
            return $dbh;
    }catch(PDOException $e){
        print "error" .$e->getMessage() .">/br<";
        die();

    }
?>