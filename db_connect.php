<?php

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
//Pas de mesure de securite ces variables sont vides sur GitHub, il faut juste inserer les infos de votre DB ci-dessus

try {
    	$conn = new mysqli($servername, $username, $password, $dbname);
    }
catch(PDOException $e)
    {
    	die("Impossible de se connecter a la base de donnees");
    }

?>