<?php

include 'db_connect.php';
include 'var.php';

if ($conn->connect_error)
{
    die("Erreur de connexion a la DB: " . $conn->connect_error);
} 

$txt = "";

for($i = 1; $i <= 7; $i++)
{
	for($j = 0; $j < 16; $j++)
	{
		$heure = $heuresbrut[$j];
		$streamer = $_POST[$i .'str'. $heure];
		$jeu = $_POST[$i .'jeu'. $heure];
		
		switch ($i)
		{
			case 1:
				$planning = "planning_lundi";
				$today = "monday";
				$auj = "lundi ";
				break;
			
			case 2:
				$planning = "planning_mardi";
				$today = "tuesday";
				$auj = "mardi ";
				break;
			
			case 3:	
				$planning = "planning_mercredi";
				$today = "wednesday";
				$auj = "mercredi ";
				break;
			
			case 4:
				$planning = "planning_jeudi";
				$today = "thursday";
				$auj = "jeudi ";
				break;				
				
			case 5:
				$planning = "planning_vendredi";
				$today = "friday";
				$auj = "vendredi ";
				break;				
					
			case 6:
				$planning = "planning_samedi";
				$today = "saturday";
				$auj = "samedi ";
				break;				
				
			case 7:
				$planning = "planning_dimanche";
				$today = "sunday";
				$auj = "dimanche ";
				break;
		}
		
		$sqlCheckStreamer = "SELECT streamer FROM $planning WHERE heure = $heure";
		$sqlCheckJeu = "SELECT jeu FROM $planning WHERE heure = $heure";
		
		$resultStreamer = $conn->query($sqlCheckStreamer);
		$rowStreamer = $resultStreamer->fetch_assoc();
		
		$resultJeu = $conn->query($sqlCheckJeu);
		$rowJeu = $resultJeu->fetch_assoc();
		
		
		if($rowStreamer['sreamer'] != $streamer && $rowJeu['jeu'] != $jeu)
		{
			$sqlUpdateStreamer = "UPDATE $planning SET streamer=('$streamer') WHERE heure=('$heure')";
			$sqlUpdateJeu = "UPDATE $planning SET jeu=('$jeu') WHERE heure=('$heure')";
		
			if ($conn->query($sqlUpdateStreamer) === TRUE && $conn->query($sqlUpdateJeu) === TRUE) {
				echo "Les données ont ete mise à jour !";
			} else {
				echo "Erreur: " . $sqlUpdateStreamer . "<br>" . $conn->error;
				echo "Erreur: " . $sqlUpdateJeu . "<br>" . $conn->error;
			}
			
			$heuretxt = $heures[$j];
			$jour = date('d-m', strtotime($today.' this week'));
			if($streamer == "LIBRE")
			{
				$txt .= '<br/><br/>Le '.$auj.$jour.' ce sera maintenant '.$streamer.' pour le créneau de '. $heuretxt;
			} else {
				$txt .= '<br/><br/>Le '.$auj.$jour.' ce sera maintenant '.$streamer.' pour le créneau de '. $heuretxt.' sur le jeu : '.$jeu;
			}

		}
	}
}

$message = '<html><head></head><body><img src="http://164.132.145.12/e2gstream/e2glogo.png" style="width:10%"/><br/><br/><u>Bonjour</u><br/>Les modifications ci-dessous viennent d\'être mise en ligne depuis l\'interface planning de la WebTV :<br/><br/><hr/>';
$message.= $txt;
$message.= '<br/><br/><hr/><br/><br/><strong>Ceci est un message automatique, c\'est donc inutile de répondre !</strong><br/>En cas de problème, veuillez contacter Khrys sur Discord ou par mail : louis.jeancolin@gmail.com</body></html>';
$to      = 'louis.jeancolin@gmail.com';

$subject = '[WebTV] Modification';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: 164.132.145.12' . "\r\n" .
			'Reply-To: 164.132.145.12' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			
mail($to, $subject, $message, $headers);

$conn->close();
header('Location: '.$mainurl);
exit();
?>