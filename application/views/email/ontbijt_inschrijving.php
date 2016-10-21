<!DOCTYPE html>
<html>
	<head>
		<title> Inschrijving ontbijt</title>
		<style type="text/css">
		p {
			color: #000;
		}
		</style>
	</head>
	<body>
 		<p> Geachte Heer/Mevrouw, </p>

 		<p>
 			Alvast bedankt dat u zich hebt ingeschreven voor ons ontbijt. <br />
 			Met deze mail bevestigen wij u nogmaals dat uw inschrijving goed is doorgekomen.
 			Indien de onderstaande gegevens foutief zijn. Of u deze inschrijving niet hebt ingevuld. 
 			Kan u zich wenden tot Leowillems@telenet.be. 
 			Hier onder vind u de ingevulde gegevens nog eens ter controle.
 		</p>

 		<table>
 			<tr>
 				<td> <strong> Voornaam: </strong> </td>
				<td> <?php echo $Voornaam; ?> </td>
 			</tr>
 			<tr>
 				<td> <strong> Achternaam: </strong> </td>
 				<td> <?php echo $Naam; ?> </td>
 			</tr>

 			<tr>
 				<td> <strong> E-mail adres: </strong> </td>
 				<td> <?php echo $Email; ?> </td>
 			</tr>

 			<tr>
 				<td> <strong> Aantal personen: </strong> </td>
 				<td> <?php echo $Personen; ?> </td>
 			</tr> 
 		</table>

 		<hr>
		<p>
			Deze mail notificatie is afkomstig van <a href="http://www.st-joris-turnhout.be">Scouts &amp; Gidsen - Sint-Joris, Turnhout</a> <br>
		</p>

	</body>
</html>