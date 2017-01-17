<?php

include 'db_connect.php';

if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

$heures = array(809, 910, 1011, 1112, 1213, 1314, 1415, 1516, 1617, 1718, 1819, 1920, 2021, 2122, 2223, 2300);

for($i = 1; $i <= 7; $i++)
{
	for($j = 0; $j < 16; $j++)
	{
		$heure = $heures[$j];
		$streamer = $_POST[$i .'str'. $heure];
		$jeu = $_POST[$i .'jeu'. $heure];
		switch ($i)
		{
			case 1:
				$sql = "UPDATE planning_lundi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_lundi SET jeu=('$jeu') WHERE heure=('$heure')";
				break;
				
			case 2:
				$sql = "UPDATE planning_mardi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_mardi SET jeu=('$jeu') WHERE heure=('$heure')";	
				break;
				
			case 3:	
				$sql = "UPDATE planning_mercredi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_mercredi SET jeu=('$jeu') WHERE heure=('$heure')";
				break;
				
			case 4:
				$sql = "UPDATE planning_jeudi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_jeudi SET jeu=('$jeu') WHERE heure=('$heure')";
				break;				
					
			case 5:
				$sql = "UPDATE planning_vendredi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_vendredi SET jeu=('$jeu') WHERE heure=('$heure')";
				break;				
					
			case 6:
				$sql = "UPDATE planning_samedi SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_samedi SET jeu=('$jeu') WHERE heure=('$heure')";
				break;				
			
			case 7:
				$sql = "UPDATE planning_dimanche SET streamer=('$streamer') WHERE heure=('$heure')";
				$sql2 = "UPDATE planning_dimanche SET jeu=('$jeu') WHERE heure=('$heure')";
				break;
		}
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			echo "Les données ont ete mise à jour !";
		} else {
			echo "Erreur: " . $sql . "<br>" . $conn->error;
			echo "Erreur: " . $sql2 . "<br>" . $conn->error;
		}
	}
}

$conn->close();
header('Location:');
exit();
?>