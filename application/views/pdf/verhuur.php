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
			Verhuringen: Sint-Joris Turnhout. <br>
			Aantal verhuringen: <?php echo count($Query); ?>
		</p>
		</div>

		<table class="">
			<thead>
				<tr>
					<th>Datum:</th>
					<th>Groep:</th>
					<th>Email:</th>
					<th>Tel nr:</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($Query as $Output): ?>
					<tr>
						<td><?php echo date('d-m-Y', $Output->Start_datum); ?> / <?php echo date('d-m-Y', $Output->Eind_datum); ?></td>
						<td><?php echo $Output->Groep; ?></td>
						<td><?php echo $Output->Email; ?></td>
						<td><?php echo $Output->GSM; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>