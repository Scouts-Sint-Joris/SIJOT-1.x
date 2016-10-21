<!DOCTYPE html>
<html lang="nl">
	<head>
		<title> Login </title>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h4> Login gegevens (st-joris-turnhout.be) </h4>

			<p> Geachte, <?php echo $Name; ?> </p>

			<p> Vanaf nu kunt u inloggen op het webplatform van http://www.st-joris-turnhout.be uw gegevens staan onderaan in de mail. bij enige vragen of opmerkingen. 
				kunt u reageren op het betreffende email adres: webmaster@st-joris-turnhout.be </p>
			
			<table class="table table-condensed table-bordered">
				<tbody>
					<tr>
						<td> <strong> Login url:: </strong> </td>
						<td> http://www.st-joris-turnhout.be/index.php/admin </td>
					</tr>
					<tr>
						<td> <strong> Email: </strong> </td>
						<td> <?php echo $Mail; ?>
					</tr>
					<tr>
						<td> <strong> Wachtwoord: </strong> </td>
						<td> <?php echo $Pass; ?>
					</tr>
				</tbody>
			</table>
			
			<hr>
			<p class="small text-muted">
				Deze mail notificatie is afkomstig van <a href="http://www.st-joris-turnhout.be">www.st-joris-turnhout.be</a> <br>
			</p>
		</div>
	</body>
</html>