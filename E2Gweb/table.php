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
				if(checkIfLibre($i,$heure))
				{
					echo '<td style="background-color:#202020;">';
				} else {
					echo '<td>';
				}
				echo "<select name='" . $i ."str" . $heure ."'>";
				montrerSteamer($i,$heure);
				echo "</select>
				<br/>
				<br/>";
				
				if(checkIfLibre($i,$heure))
				{
					echo '<span style="color: white;">Jeu :</span>';
				} else {
					echo 'Jeu :';
				}
				echo "<select name='" . $i ."jeu" . $heure ."'>";
				montrerJeux($i,$heure);
				echo "</select></td>";
			}
		}
		
		function checkIfLibre($jour,$heure)
		{
			include 'db_connect.php';
			
			switch ($jour)
			{
				case 1:
					$sql = "SELECT streamer FROM planning_lundi WHERE heure = $heure";
					break;
				
				case 2:
					$sql = "SELECT streamer FROM planning_mardi WHERE heure = $heure";
					break;
				
				case 3:	
					$sql = "SELECT streamer FROM planning_mercredi WHERE heure = $heure";
					break;
				
				case 4:
					$sql = "SELECT streamer FROM planning_jeudi WHERE heure = $heure";
					break;				
					
				case 5:
					$sql = "SELECT streamer FROM planning_vendredi WHERE heure = $heure";
					break;				
					
				case 6:
					$sql = "SELECT streamer FROM planning_samedi WHERE heure = $heure";
					break;				
				
				case 7:
					$sql = "SELECT streamer FROM planning_dimanche WHERE heure = $heure";
					break;
			}
			
			
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				if($row['streamer'] == "LIBRE")
				{
					return true;
				} else {
					return false;
				}
			}		
		}
		
		function montrerSteamer($jour,$heure)
		{
			include 'db_connect.php';
			
			switch ($jour)
			{
				case 1:
					$sql = "SELECT streamer FROM planning_lundi WHERE heure = $heure";
					break;
				
				case 2:
					$sql = "SELECT streamer FROM planning_mardi WHERE heure = $heure";
					break;
				
				case 3:	
					$sql = "SELECT streamer FROM planning_mercredi WHERE heure = $heure";
					break;
				
				case 4:
					$sql = "SELECT streamer FROM planning_jeudi WHERE heure = $heure";
					break;				
					
				case 5:
					$sql = "SELECT streamer FROM planning_vendredi WHERE heure = $heure";
					break;				
					
				case 6:
					$sql = "SELECT streamer FROM planning_samedi WHERE heure = $heure";
					break;				
				
				case 7:
					$sql = "SELECT streamer FROM planning_dimanche WHERE heure = $heure";
					break;
			}
			
			
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['streamer'] ."'>" . $row['streamer'] ."*</option>";
			}
			$sqlListeStreamer = "SELECT nom FROM streamers";
			$result = $conn->query($sqlListeStreamer);
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['nom'] ."'>" . $row['nom'] ."</option>";
			}
		}
		
		function montrerJeux($jour,$heure)
		{
			include 'db_connect.php';
			
			switch ($jour)
			{
				case 1:
					$sql = "SELECT jeu FROM planning_lundi WHERE heure = $heure";
					break;
				
				case 2:
					$sql = "SELECT jeu FROM planning_mardi WHERE heure = $heure";
					break;
				
				case 3:	
					$sql = "SELECT jeu FROM planning_mercredi WHERE heure = $heure";
					break;
				
				case 4:
					$sql = "SELECT jeu FROM planning_jeudi WHERE heure = $heure";
					break;				
					
				case 5:
					$sql = "SELECT jeu FROM planning_vendredi WHERE heure = $heure";
					break;				
					
				case 6:
					$sql = "SELECT jeu FROM planning_samedi WHERE heure = $heure";
					break;				
				
				case 7:
					$sql = "SELECT jeu FROM planning_dimanche WHERE heure = $heure";
					break;
			}
			
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
	<img src="e2glogo.png" id="logotop"/>
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