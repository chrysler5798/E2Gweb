<?php

include 'db_connect.php';	 

// Check connection
if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

$nomstreamer = $_POST['nomstreamer'];

$sql = "INSERT INTO streamers (nom) VALUES ('$nomstreamer')";

if(!empty($nomstreamer))
{
	if ($conn->query($sql) === TRUE)
	{
		echo "Les données ont ete mise à jour !";
	} 
	else 
	{
		echo "Erreur: " . $sql . "<br>" . $conn->error;
	}
}
else 
{
	echo "Le nom du streamer que vous avez entre est vide !";
}

$conn->close();
header('Location:');
exit();
?>