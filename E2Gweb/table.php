<!DOCTYPE html>
<html>

<head>

	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
	}
	</style>

</head>

<body>
	<table style="width:100%">
	  <tr>
		<th>Heure</th>
		<th>Lundi</th> 
		<th>Mardi</th>
		<th>Mercedi</th>
		<th>Jeudi</th> 
		<th>Vendredi</th>
		<th>Samedi</th>
		<th>Dimanche</th> 
	  </tr>
	  
	  <tr>
		<td>08H-09H</td>
		<td>
			<select name="country">
				<option value="">-----------------</option>
				<?php
				$wcr=array('Alka','Khrys','Roxy');
				foreach($wcr as $key => $value):
				echo '<option value="'.$key.'">'.$value.'</option>';
				endforeach;
				?>
			</select>
		</td> 
		<td>
			<?php

			?>
		</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>09H-10H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>11H-12H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>12H-13H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>13H-14H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>14H-15H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>15H-16H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>16H-17H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>18H-19H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>19H-20H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>20H-21H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>22H-23H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>	  
	  
	  <tr>
		<td>23H-00H</td>
		<td>?</td> 
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
		<td>?</td>
	  </tr>
	 
	</table>
</body>

</html>