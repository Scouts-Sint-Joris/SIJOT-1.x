<div class="container">
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <!-- Sidebar -->
			<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Inschrijvingen</div>

          <!-- List group -->
          <div class="list-group">
            <a href="<?php echo base_url(). 'Inschrijvingen/Admin_ontbijt'; ?>" class="list-group-item">Ontbijt / Brunch</a>
          </div>
        </div>
		</div> <!-- END Sidebar -->

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7"> <!--  Content-->

			<!-- TAB Navigation -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#Inschrijvingen" role="tab" data-toggle="tab">Inschrijvingen</a></li>
				<li><a href="#Toevoegen" role="tab" data-toggle="tab">Inschrijving toevoegen</a></li>
				<li><a href="#Datums" role="tab" data-toggle="tab">Ontbijt datums</a></li>
			</ul>

			<!-- TAB panes -->
			<div class="tab-content">
  			<div class="tab-pane active" id="Inschrijvingen">
  				<p>
            <div style="padding-bottom: 15px;" class="pull-right">
              <a href="<?php echo base_url(). 'Inschrijvingen/Download_ontbijt'; ?>" Role="button" class="btn btn-info">
                <span class="octicon octicon-cloud-download"></span>  Download
              </a>
            </div>

  					<table class="table table-condensed">
  						<thead>
  							<tr>
  								<th>#</th>
  								<th>Naam:</th>
  								<th>E-mail:</th>
  								<th>Personen:</th>
  								<th>Te betalen:</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php foreach($Inschrijvingen as $Output): ?>
  								<tr>
  									<td><code> #<?php echo $Output->ID; ?></code></td>
  									<td><?php echo $Output->Voornaam; ?> <?php echo $Output->Naam; ?></td>

                    <td>
                      <?php if(valid_email($Output->Email)): ?>
                        <a href="mailto:<?php echo $Output->Email; ?>"><?php echo $Output->Email; ?></a>
                      <?php else: ?>
                        <?php echo $Output->Email; ?>
                      <?php endif; ?>
                    </td>

  									<td><?php echo $Output->Aantal_Personen; ?> Personen</td>
  									<td><?php echo $Output->Te_betalen; ?> Euro.</td>
  								</tr>
  							<?php endforeach; ?>
  						</tbody>
  					</table>
  				</p>
  			</div>

  			<div class="tab-pane" id="Toevoegen">
  			<p>
  				<?php if(count($Datums) == 0 ): ?>
              			<div class="alert alert-danger">
              				<p> Activeer eerst een datum. Voor mensen zich kunnen inschrijven </p>
              			</div>
              		<?php else: ?>
              			<form method="POST" action="<?php echo base_url(). 'Inschrijvingen/Insert_inschrijving'; ?>">
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
              				<button role="button" type="submit" class="btn btn-success">Inschrijven</button>
              				<button role="button" type="reset" class="btn btn-danger">Reset formulier</button>
              			</form>
              		<?php endif; ?>
              		</p>
  			</div>

  			<div class="tab-pane" id="Datums">
  				<p>
  					<div class="row">
  						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  							<table class="table table-condensed">
  								<thead>
  									<tr>
  										<th> Maand: </th>
  										<th> Deathline </th>
  										<th></th> <!-- Functions -->
  									</tr>
  								</thead>
  								<tbody>
  									<?php foreach($Ontbijt_datums as $Output): ?>
  										<tr>
  											<td> <?php echo  $Output->Month; ?> </td>
  											<td> <?php echo $Output->Deathline; ?> </td>
  											<td>
  												<?php if($Output->Status == 1): ?>
  													<a href="<?php echo base_url(). 'inschrijvingen/Ontbijt_stop'. $Output->ID .'/'. $Output->Month_nr; ?>" class="label label-danger">
															Sluiten
														</a>
  												<?php elseif($Output->Status == 0): ?>
  													<a href="<?php echo base_url(). 'Inschrijvingen/Ontbijt_Start/' .$Output->ID; ?>" class="label label-success">
															Vrijgeven
														</a>
  												<?php endif; ?>
  											</td>
  										</tr>
  									<?php endforeach; ?>
  								</tbody>
  							</table>
  						</div>
  					</div>
  				</p>
  			</div>
			</div>

		</div> <!-- END content -->
	</div>
</div>
