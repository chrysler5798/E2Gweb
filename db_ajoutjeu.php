<?php

include 'db_connect.php';	 

if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

$nomjeu = $_POST['nomdujeu'];

$sql = "INSERT INTO jeux (nomjeu) VALUES ('$nomjeu')";
if(!empty($nomjeu))
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
	echo "Le nom du jeu que vous avez entre est vide !";
}

$conn->close();
header('Location: '.$mainurl);
exit();
?>