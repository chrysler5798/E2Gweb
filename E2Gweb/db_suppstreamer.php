<?php

include 'db_connect.php';

if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

$streamer = $_POST['streamer'];

$sql = "DELETE FROM streamers WHERE nom='$streamer'";

if ($conn->query($sql) === TRUE) {
    echo "Les données ont ete mise à jour !";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location:');
exit();
?>