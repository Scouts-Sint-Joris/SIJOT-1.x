<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">
				<h3>Wijzig verhuur info</h3>
			</div>

			<?php foreach($Info as $Output): ?>
			<form method="POST" action="<?php echo base_url(); ?>Verhuur/Wijzig_verhuur/<?php echo $Output->ID; ?>">
				<label for="Start">Start datum</label>
				<input id="Start" type="text "class="form-control" style="width: 30%" name="Start" value="<?php echo date('d-m-Y' ,$Output->Start_datum); ?>" Placeholder="00/00/00">
				<br>

				<label for="Eind">Eind datum:</label>
				<input id="Eind" type="text" class="form-control" style="width: 30%;" name="Eind" value="<?php echo date('d-m-Y' ,$Output->Eind_datum); ?>" placeholder="00/00/00">
				<br>

				<label for="Groep">Groep: </label>
				<input id="Groep" type="text" class="form-control" style="width: 30%;" name="Groep" value="<?php echo $Output->Groep; ?>" placeholder="Groep">
				<br>

				<label for="GSM">GSM nummer: </label>
				<input id="GSM" type="text" class="form-control" style="width: 30%;" name="GSM" value="<?php echo $Output->GSM; ?>" placeholder="GSM nummer">
				<br>

				<label for="Mail">Mail adres:</label>
				<input id="Mail" type="text" class="form-control" style="width: 30%;" name="Mail" value="<?php echo $Output->Email; ?>" placeholder="Mail adres">
				<br>

				<button role="button" type="submit" class="btn btn-success">Wijzig!</button>
				<button role="button" type="reset" class="btn btn-danger">Reset</button>
			</form>
			<?php endforeach; ?>

		</div>
	</div>
</div>
