<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<ol class="breadcrumb border">
				<li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Verhuur Aanvraag</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default border">
				<div class="panel-heading">
					Menu:
				</div>

				<div class="list-group">
					<a class="list-group-item" href="<?php echo base_url(); ?>verhuur"><span class="fa fa-info-circle"> Info</a>
					<a class="list-group-item" href="<?php echo base_url() . 'verhuur/bereikbaarheid'; ?>"><span class="fa fa-asterisk"></span> Bereikbaarheid</a>
					<a class="list-group-item" href="<?php echo base_url(); ?>verhuur/verhuur_kalender"><span class="fa fa-calendar"></span> Verhuur Kalender</a>
					<a class="list-group-item" href="<?php echo base_url(); ?>verhuur/verhuur_aanvraag"><span class="fa fa-plus"></span> Verhuring aanvragen</a>
					<a class="list-group-item" href="mailto:contact@st-joris-turnhout.be"><span class="fa fa-envelope"></span> Contact</a>
				</div>
			</div>
		</div>

		<div class="col-sm-9 col-md-9 col-lg-9">
			<div class="panel panel-default border">
				<div class="panel-body">

					<?php if($this->Flash): ?>
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<div class="<?php echo  $this->Flash['Class']; ?>">
									<h4> <?php echo $this->Flash['Heading']; ?> </h4>
									<p> <?php echo $this->Flash['Message']; ?> </p>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div style="margin-top: -20px;" class="page-header">
            			<h2 style="margin-bottom: -5px;">Verhuur aanvraag</h2>
          			</div>

          			<p><span class="octicon octicon-info"></span> Het laatste weekend van een maand verhuren we niet.</p>

          			<?php echo form_open('verhuur/toevoegen_verhuur') ?>
          				<div class="form-group">	
          					<label for="Start">Start datum:</label>
          					<input style="width: 35%;" name="Start_datum" class="form-control" id="Start" placeholder="bv. 00/00/0000">
          				</div>

          				<div class="form-group">
          					<label for="Eind">Eind datum:</label>
          					<input style="width: 35%;" name="Eind_datum" class="form-control" id="Eind" placeholder="bv. 00/00/0000">
          				</div>

          				<div class="form-group">
          					<label for="Groep">Groep:</label>
          					<input style="width: 35%;" name="Groep" class="form-control" id="Groep" placeholder="Groep">
          				</div>

          				<div class="form-group">
          					<label for="GSM">GSM-nummer:</label>
          					<?php echo form_input(array('id' => 'GSM', 'name' => 'GSM', 'class' => 'form-control', 'style' => 'width: 35%;', 'placeholder' => 'GSM nummer')); ?>
          				</div>

          				<div class="form-group">
          					<label for="Email"> E-mail: </label>
          					<input style="width: 35%;" class="form-control" name="Email" id="Email" placeholder="Voorbeeld@domein.be">
          				</div>

          				<button class="btn btn-success" type="submit"> Aanvragen </button>
          				<button class="btn btn-danger" type="reset"> Reset </button>

          			</form>

				</div>
			</div>
		</div>
	</div>
</div>
