<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

try {
    	$conn = new mysqli($servername, $username, $password, $dbname);
    }
catch(PDOException $e)
    {
    	die("Impossible de se connecter a la base de donnees");
    }

?>