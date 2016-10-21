<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<ol class="breadcrumb border">
				<li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Verhuur kalender</li>
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

					<div style="margin-top: -20px;" class="page-header">
            			<h2 style="margin-bottom: -5px;">Verhuur kalender</h2>
          			</div>

          			<p>
          				Hier vind u wanner onze lokalen al reeds verhuurd zijn.
          				Vind u hier de datum niet dat u onze lokalen wilt huren leg dan snel je datum vast.
          				Dat doe je door dit <a href="<?php echo base_url(); ?>verhuur/verhuur_aanvraag">formulier</a> in te vullen..
          			</p>

          				<div class="row">
          					<div class="col-md-4 col-sm-4 col-lg-4">
          						<table class="table table-condensed">
          							<thead>
          								<tr>
          									<th>Start datum</th>
          									<th>Eind datum</th>
          								</tr>
          							</thead>
          							<tbody>
          								<?php foreach($Verhuringen as $Verhuur): ?>
          									<tr>
          										<td><?php echo date('d.m.Y' ,$Verhuur->Start_datum); ?></td>
          										<td><?php echo date('d.m.Y' ,$Verhuur->Eind_datum); ?></td>
          									</tr>
          								<?php endforeach; ?>
          							</tbody>
          						</table>
          					</div>
          				</div>
				</div>
			</div>
		</div>
	</div>
</div>
