<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Planning E2G</title>
</head>

<body>
	
	<?php
	
		function montrerChaqueJour($heure)
		{
			for ($i = 1; $i <= 7; $i++) 
			{
				$nomstreamer = montrerSteamer(0, $i,$heure);
				$couleur = prendreCouleur($nomstreamer);
				echo "<td style='background-color:". $couleur ."'>";
				echo "<select name='" . $i ."str" . $heure ."'>";
				montrerSteamer(1, $i,$heure);
				echo "</select>
				<br/>
				<br/>";
				if(montrerSteamer(0, $i,$heure) == "LIBRE")
				{
					echo '<span style="color:white">Jeu :</span>';
				} else {
					echo 'Jeu :';
				}
				echo "<select name='" . $i ."jeu" . $heure ."'>";
				montrerJeux($i,$heure);
				echo "</select></td>";
			}
		}
		
		function switchJourSemaine($jour)
		{
			switch ($jour)
			{
				case 1:
					return "planning_lundi";
					break;
				
				case 2:
					return "planning_mardi";
					break;
				
				case 3:	
					return "planning_mercredi";
					break;
				
				case 4:
					return "planning_jeudi";
					break;				
					
				case 5:
					return "planning_vendredi";
					break;				
					
				case 6:
					return "planning_samedi";
					break;				
				
				case 7:
					return "planning_dimanche";
					break;
			}
		}
		
		function prendreCouleur($nom)
		{
			include 'db_connect.php';

			$sql = "SELECT couleur FROM streamers WHERE nom = ('$nom')";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				return $row['couleur'];
			}
		}
		
		function montrerSteamer($type, $jour, $heure)
		{
			include 'db_connect.php';
			
			if($type == 1)
			{
				$planning = switchJourSemaine($jour);
				$sql = "SELECT streamer FROM $planning WHERE heure = $heure";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<option value='" . $row['streamer'] ."'>" . $row['streamer'] ."*</option>";
				}
				$sqlListeStreamer = "SELECT nom FROM streamers";
				$result = $conn->query($sqlListeStreamer);
				while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['nom'] ."'>" . $row['nom'] ."</option>";
				}
			} else {
				$planning = switchJourSemaine($jour);
				$sql = "SELECT streamer FROM $planning WHERE heure = $heure";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				return $row['streamer'];
			}
		}
		
		function montrerJeux($jour,$heure)
		{
			include 'db_connect.php';
			
			$planning = switchJourSemaine($jour);
			$sql = "SELECT jeu FROM $planning WHERE heure = $heure";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
			echo "<option value='" . $row['jeu'] ."'>" . $row['jeu'] ."*</option>";
			}
			
			$sqlListeJeu = "SELECT nomjeu FROM jeux";
			$result = $conn->query($sqlListeJeu);
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['nomjeu'] ."'>" . $row['nomjeu'] ."</option>";
			}
		}
	?>
	<a target="_blank" href="http://www.event-to-give.com/"><img src="e2glogo.png" id="logotop"/></a>
	<?php 	
			$monday = date('d-m', strtotime('monday this week'));
			$sunday = date('d-m', strtotime('sunday this week'));
			echo '<span id="semaine">Semaine du '.$monday.' au '.$sunday.'</span><br/>';
			
			include 'db_connect.php';
			
			$sqlListeStreamer = "SELECT * FROM streamers";
			$result = $conn->query($sqlListeStreamer);
			echo '<div id="legendeframe">';
			while ($row = $result->fetch_assoc()) {
				if($row['nom'] == "LIBRE")
				{
					echo '<span class="legendestream" style="color:white;background-color:'.$row['couleur'].'">' . $row['nom'] ."</span>";
				} else {
					echo '<span class="legendestream" style="background-color:'.$row['couleur'].'">' . $row['nom'] ."</span>";
				}
			}
			echo '</div>';
	?>
	<br/>
	<table style="width:100%" >
	  <tr id="mainrow">
		<th>Heure</th>
		<th>Lundi</th> 
		<th>Mardi</th>
		<th>Mercedi</th>
		<th>Jeudi</th> 
		<th>Vendredi</th>
		<th>Samedi</th>
		<th>Dimanche</th> 
	  </tr>
	  <form name="form" action="db_maj.php" method="post">
	  <tr>
		<td class="heure">08H-09H</td>
		<?php
			montrerChaqueJour(809);
		?>
	  </tr> 
	  
	  <tr>
		<td class="heure">09H-10H</td>
		<?php
			montrerChaqueJour(910);
		?>
	  </tr>	 
	  
	  <tr>
		<td class="heure">10H-11H</td>
		<?php
			montrerChaqueJour(1011);
		?>
	  </tr>	
	  
	  <tr>
		<td class="heure">11H-12H</td>
		<?php
			montrerChaqueJour(1112);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">12H-13H</td>
		<?php
			montrerChaqueJour(1213);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">13H-14H</td>
		<?php
			montrerChaqueJour(1314);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">14H-15H</td>
		<?php
			montrerChaqueJour(1415);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">15H-16H</td>
		<?php
			montrerChaqueJour(1516);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">16H-17H</td>
		<?php
			montrerChaqueJour(1617);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">17H-18H</td>
		<?php
			montrerChaqueJour(1718);
		?>
	  </tr>	
	  
	  <tr>
		<td class="heure">18H-19H</td>
		<?php
			montrerChaqueJour(1819);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">19H-20H</td>	
		<?php
			montrerChaqueJour(1920);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">20H-21H</td>
		<?php
			montrerChaqueJour(2021);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">21H-22H</td>
		<?php
			montrerChaqueJour(2122);
		?>
	  </tr>	
	  
	  <tr>
		<td class="heure">22H-23H</td>
		<?php
			montrerChaqueJour(2223);
		?>
	  </tr>	  
	  
	  <tr>
		<td class="heure">23H-00H</td>	
		<?php
			montrerChaqueJour(2300);
		?>
	  </tr>
	 
	</table>
	
	<br/>
	
	<button type="submit" class="buttonsubmit">Mettre à jour</button>
	</form>
	<span id="attentionmsg">ATTENTION ! Avant de mettre a jour ce planning, merci de prevenir l'equipe de stream sur Discord !</span>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	
	<div id="framestreamer">
		<span class="titleframe">Ajouter un streamer</span>
		<br/>
		<div class="elementedit">
		Nom du streamer:
		<form name="form" action="db_ajoutstreamer.php" method="post">
		<input type="text" name="nomstreamer">
		</div>
		<br/>
		<button type="submit" class="buttonsubmit">Ajouter</button>
		</form>
		<br/>
		<br/>
		<br/>
		
		<hr/>
	
		<span class="titleframe">Enlever un streamer</span>
		<br/>
		<div class="elementedit">
		Nom du streamer:
		<form name="form" action="db_suppstreamer.php" method="post">
		<select name="streamer">
		<option value="default">Choisir un nom</option>
		<?php
			include 'db_connect.php';
			$sql = "SELECT nom FROM streamers";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['nom'] ."'>" . $row['nom'] ."</option>";
			}
		?>
		</select>
		</div>
		<br/>
		<button type="submit" class="buttonsubmit">Supprimer</button>
		</form>
	</div>
	</div>
	
	<div id="framejeux">
		<span class="titleframe">Ajouter un nouveau jeu</span>
		<br/>

		<div class="elementedit">
		Nom du jeu:
		<form name="form" action="db_ajoutjeu.php" method="post">
		<input type="text" name="nomdujeu">
		</div>
		<br/>
		<button type="submit" class="buttonsubmit">Ajouter</button>
		</form>
		
	</div>
	
</body>

</html>