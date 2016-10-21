<!DOCTYPE html>
<html lang="NL">
	<head>
		<title>Inschrijvingen Ontbijt</title>
	</head>
	<body>
		<table class="">
			<thead>
				<tr>
					<td>Naam: </td>
					<td>Aantal personen:</td>
					<td>Te betalen:</td>
					<td>Betaald:</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($Query as $Output): ?>
					<tr>
						<td> <?php echo $Output->Voornaam; ?> <?php echo $Output->Naam; ?></td>
						<td>
							
						</td>>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>