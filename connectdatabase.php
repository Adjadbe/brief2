<?php 

$servername = "localhost";
$username ="root";
$password = "";
$dbname ="brief";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


//on definit le charset a "utf8"
$conn->exec("SET NAMES utf8");

//on definit la methode de recuperation (fetch) des données
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


catch(PDOException $e){
    //PDOException $e -> on attrape l'erreur provoquée par le new PDO en cas d'echec 
    // on affiche le message d'erreur si le new PDO echoue 

    die($e->getMessage());
}
//ici on est connectée
?>