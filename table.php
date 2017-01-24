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
				if($nomstreamer == "LIBRE")
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
				echo '<span class="legendestream">' . $row['nom'] .'<div style="background-color:'.$row['couleur'].';height:25px;margin-top:5px;"></div></span>';
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
	  
	  <?php 
		include 'var.php';
		
		for($i = 0; $i < 16; $i++)
		{
			echo "<tr>";
			echo '<td class="heure">'.$heures[$i].'</td>';
			montrerChaqueJour($heuresbrut[$i]);
			echo "</tr>";
		}
	  ?> 
		
	 
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