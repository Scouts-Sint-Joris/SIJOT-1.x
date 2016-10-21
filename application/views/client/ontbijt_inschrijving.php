<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<ol class="breadcrumb border">
				<li><a href="<?php echo base_url(); ?>"><span class="fa fa-home"></span></a></li>
				<li class="active">Inschrijving ontbijt</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><!-- Sidebar -->
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Het ontbijt:</div>

        <!-- List group -->
        <div class="list-group">
          <a href="<?php echo base_url(); ?>Inschrijvingen/Ontbijt_beschrijving" class="list-group-item">Ontbijt op het groen
          <a href="<?php echo base_url(); ?>Inschrijvingen/Ontbijt_inschrijving" class="list-group-item">Ontbijt Inschrijven</a>
        </div>
      </div>
		</div><!-- END sidebar -->

		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><!-- Content -->
			<div class="panel panel-body border">
				
			    <div style="margin-top: -20px;" class="page-header">
                		   <h2 style="margin-bottom: -5px;"> Inschrijving ontbijt </h2>
              		</div>
              		<?php if(count($Datums) == 0 ): ?>
              			<div class="alert alert-danger">
              				<p> Onze excuses! U kunt zich momenteel niet inschrijven voor het ontbijt. :( </p>
              			</div>
              		<?php else: ?>
              			<form method="POST" action="<?php echo base_url(); ?>Inschrijvingen/Insert_inschrijving">
              				<label for="01">Naam:</label>
              				<input class="form-control" style="width: 35%;" placeholder="Achternaam" name="Naam" id="01" />
              				<br>

              				<label for="02">Voornaam:</label>
              				<input class="form-control"  style="width: 35%;" placeholder="Voornaam" name="Voornaam" id="02" />
              				<br>

              				<label for="03">E-mail adres:</label>
              				<input class="form-control" style="width: 35%;" placeholder="Voorbeeld@domein.be" name="Email" id="03" />
              				<br>

              				<label for="04"> Maand </label>
              				<select style="width: 35%;" class="form-control" id="04" name="Maand">
              					<?php foreach($Datums as $Output): ?>
              						<option value="<?php echo $Output->Month_nr; ?>">
              							<?php echo $Output->Month; ?>
              						</option>
              					<?php endforeach; ?>
              				</select>
              				<br>

                      <label for="05">Personen:</label>
                      <input class="form-control" style="width: 10%;" placeholder="Aantal personen" value="1" name="Personen" id="05">
                      <br>

              				<!-- Form options -->
              				<button type="submit" class="btn btn-success">Inschrijven</button>
              				<button type="reset" class="btn btn-danger">Reset formulier</button>
              			</form>
              		<?php endif; ?>
				</div>
		
		</div><!-- END Content -->
	</div>
</div>