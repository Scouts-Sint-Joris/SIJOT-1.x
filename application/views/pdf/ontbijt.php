<!DOCTYPE html>
<html lang="NL">
	<head>
		<title>Inschrijvingen Ontbijt</title>
		<style type="text/css">
			table {
				border-collapse: collapse;
				border: 1px solid black;
			}

			td, th {
				padding-left: 15px;
				padding-right: 15px;
				border-collapse: collapse;
				border: 1px solid black;
			}

			th {
				background-color: #e0e0e0;
			}
		</style>
	</head>
	<body>
		<div style="padding-bottom: 15px;">
		<p>
			Inschrijvingsblad: Ontbijt, Sint-Joris Turnhout. <br>
			Inschrijvingen: <?php echo count($Query); ?>
		</p>
		</div>

		<table class="">
			<thead>
				<tr>
					<th>Naam: </th>
					<th>Aantal personen:</th>
					<th>Te betalen:</th>
					<th>Betaald:</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($Query as $Output): ?>
					<tr>
						<td> <?php echo $Output->Voornaam; ?> <?php echo $Output->Naam; ?></td>
						<td> <?php echo $Output->Aantal_Personen; ?> Personen</td>
						<td><?php echo $Output->Te_betalen; ?> Euro</td>
						<td></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>