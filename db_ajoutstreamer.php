<?php

include 'db_connect.php';	 
include 'var.php';

if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$nomstreamer = $_POST['nomstreamer'];
$couleur = "#".random_color();

$sql = "INSERT INTO streamers (nom, couleur) VALUES ('$nomstreamer','$couleur')";


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
header('Location: '.$mainurl);
exit();
?>