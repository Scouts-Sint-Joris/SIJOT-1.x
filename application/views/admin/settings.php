<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4">

			<?php foreach($Account as $Output): ?>
				<form method="POST" action="<?php echo base_url(); ?>Leiding/Settings_edit/<?php echo $Output->id; ?>" role='form'>
					<label for="01">Naam:</label>
					<input style="width: 80%;" id="01" class="form-control" type="text" value="<?php echo $Output->username; ?>" disabled placeholder="Naam">
					<br>

					<label for="02">Email:</label>
					<input name="Email" style="width: 80%;" id="02" class="form-control" type="text" value="<?php echo $Output->Mail; ?>" placeholder="Email adres.">
					<br>

					<label for="03">GSM-nummer:</label>
					<input name="GSM" style="width:80%;" value="<?php echo $Output->GSM; ?>" id="03" class="form-control" type="text" placeholder="Wachtwoord" />
					<br>

					<label for="03">Wachtwoord:</label>
					<input name="Pass" style="width:80%;" id="03" class="form-control" type="text" placeholder="Wachtwoord" />
					<span class="help-block"><i>(Laat dit leeg indien u geen nieuw WW wilt.)</i></span>

					<label for="04">Thema:</label>
					<select id="04" name="Theme" class="form-control" style="width: 80%;">
						<option value="0">Flat Design</option>
						<option value="1">Dimensionaal Design</option>
					</select>
					<br>

					<button role="button" type="submit" class="btn btn-success">Wijzig</button>
					<button role="button" type="reset" class="btn btn-danger">Reset</button>
				</form>
			<?php endforeach; ?>

		</div>
	</div>
</div>
