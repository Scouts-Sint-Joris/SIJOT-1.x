<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
  			<li role="presentation" class="active"><a href="#Adressen" role="tab" data-toggle="tab">Adressen</a></li>
  			<li role="presentation"><a href="#Nieuw" role="tab" data-toggle="tab">Voeg adres toe</a></li>
  			<li role="presentation"><a href="#Mail" role="tab" data-toggle="tab">Verstuur een mail</a></li>
  		</ul>

			<!-- Tab panes -->
			<div class="tab-content">
  			<div role="tabpanel" class="tab-pane active" id="Adressen">
  				<p>
  					<div class="row">
  						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  							<?php if(count($Mailing) == 0): ?>
  								<div style="margin: 15px;" class="alert alert-danger">
  									<p> Er zijn nog geen email adressen toegevoegd </p>
  								</div>
  							<?php else: ?>
  								<table class="table table-condensed table-hover">
  									<thead>
  										<tr>
  											<th> Persoon </th>
  											<th> VZW mailing: </th>
  											<th> Ouders mailing: </th>
  											<th> Leiding mailing </th>
  											<th> Oudervergadering mailing </th>
  											<th></th>
  										</tr>
  									</thead>
  									<tbody>
  										<?php foreach($Mailing as $Mail): ?>
  											<tr>
  												<td>
  													<a href="mailto:<?php echo $Mail->Email; ?>">
  														<?php echo $Mail->Achternaam; ?> <?php echo $Mail->Voornaam; ?>
  													</a>
  												</td>

  												<td>
  													<?php if($Mail->Vzw == 1): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Inactief/Vzw/<?php echo $Mail->ID; ?>" class="label label-success">
  															Actief
  														</a>
  													<?php elseif($Mail->Vzw == 0): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Actief/Vzw/<?php echo $Mail->ID; ?>" class="label label-danger">
  															Inactief
  														</a>
  													<?php endif; ?>
  												</td>

  												<td>
  													<?php if($Mail->Ouders == 1): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Inactief/Ouders/<?php echo $Mail->ID; ?>" class="label label-success">
  															Actief
  														</a>
  													<?php elseif($Mail->Ouders == 0): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Actief/Ouders/<?php echo $Mail->ID; ?>" class="label label-danger">
  															Inactief
  														</a>
  													<?php endif; ?>
  												</td>

  												<td>
  													<?php if($Mail->Leiding == 1): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Inactief/Leiding/<?php echo $Mail->ID; ?>" class="label label-success">
  															Actief
  														</a>
  													<?php elseif($Mail->Leiding == 0): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Actief/Leiding/<?php echo $Mail->ID; ?>" class="label label-danger">
  															Inactief
  														</a>
  													<?php endif; ?>
  												</td>

  												<td>
  													<?php if($Mail->Oudervergadering == 1): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Inactief/Oudervergadering/<?php echo $Mail->ID; ?>" class="label label-success">
  															Actief
  														</a>
  													<?php elseif($Mail->Oudervergadering == 0): ?>
  														<a href="<?php echo base_url(); ?>Mailing/Actief/Oudervergadering/<?php echo $Mail->ID; ?>" class="label label-danger">
  															Inactief
  														</a>
  													<?php endif; ?>
  												</td>

  												<td>
  													<div class="btn-group">
  														<!--
  														<a href="" class="btn btn-xs btn-danger">
  															<span class="fa fa-pencil"></span>
  														</a>
  														-->

  														<a href="<?php echo base_url(); ?>Mailing/Delete_address/<?php echo $Mail->ID; ?>" class="btn btn-xs btn-danger">
  															<span class="fa fa-trash"></span>
  														</a>
  													</div>
  												</td>
  											</tr>
  										<?php endforeach; ?>
  									</tbody>
  								</table>
  							</div>
  						</div>
  					</p>
  				<?php endif; ?>
				</div>

  			<div role="tabpanel" class="tab-pane" id="Nieuw">
  				<p>
  					<form method="POST" action="<?php echo base_url(); ?>Mailing/Add_address">
  						<label for="01">Voornaam</label>
  						<input id="01" type="text" placeholder="Voornaam" name="Voornaam" class="form-control" style="width: 20%;">
  						<br>

  						<label for="02"> Achternaam: </label>
  						<input id="02" type="text" placeholder="Achternaam" name="Achternaam" class="form-control" style="width: 20%;">
  						<br>

  						<label for="03"> E-mail adres:</label>
  						<input id="03" type="text" placeholder="Naam@voorbeeld.be" name="Email" class="form-control" style="width: 20%;">
  						<br>

  						<button role="button" class="btn btn-danger" type="reset"> Reset </button>
  						<button role="button" class="btn btn-success" type="submit"> Invoegen </button>
  					</form>
  				</p>
  			</div>

  			<div role="tabpanel" class="tab-pane" id="Mail">
  				<p>
  					<form method="POST" action="<?php echo base_url(); ?>Mailing/Mail">
  						<label for="01">Mailinglist:</label>
  						<select class="form-control" name="List" style="width: 20%;" id="01">
  							<option value="Iedereen"> Iedereen </option>
  							<option value="VZW">VZW</option>
  							<option value="Ouders">Ouders</option>
  							<option value="Leiding">Leiding</option>
  							<option value="Oudervergadering">Oudervergadering</option>
  						</select>
  						<br>

  						<label for="02">Onderwerp</label>
  						<input class="form-control" id="02" type="text" placeholder="Onderwerp" name="subject" style="width: 20%;">
  						<br>

  						<label for="Bericht">Bericht:</label>
  						<textarea class="form-control" rows="8" name="Message" placeholder="Uw bericht" style="width: 40%;"></textarea>
  						<br>

  						<button role="button" type="reset" class="btn btn-danger">Reset</button>
  						<button role="button" type="submit" class="btn btn-success">Verstuur</button>
  					</form>
  				</p>
  			</div>
			</div>

		</div>
	</div>
</div>
