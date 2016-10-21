<div class="container">
	<div class="row">
		<div class="col-sm-12 col-lg-12 col-md-12">
			<div style="margin-top: -20px;" class="page-header">
            	<h2 style="margin-bottom: -5px;">Verhuur nota</h2>
          	</div>

          	<div class="row">
          		<div class="col-sm-9 col-lg-9 col-md-9">
          			
          		</div>

          		<div class="col-sm-3 col-lg-3 col-md-3">
          			<table class="table table-condensed">
          				<thead>
          					<tr>
          						<th>Verhuur details:</th>
          					</tr>
          				</thead>
          				<tbody>
          					<?php foreach($Info as $Output): ?>
          						<tr>
          							<td><strong>Datum:</strong> <?php echo $Output->Start_datum; ?> - <?php echo $Output->Eind_datum; ?></td>
          						</tr>
          						<tr>
          							<td>
          								<strong>Status:</strong> 
          								<?php if($Output->Status == 0): ?>
          									<span class="label label-danger"> Nieuwe aanvraag </span> 
          								<?php elseif($Output->Status == 1): ?>
          									<span class="label label-warning"> Optie! </span>
          								<?php elseif($Output->Status == 2): ?>
          									<span class="label label-success"> Bevestigd! </span>
          								<?php endif; ?>
          							</td>
          						</tr>
          						<tr>
          							<td><strong>Groep:</strong> <?php echo $Output->Groep; ?></td>
          						</tr>
          						<tr>
          							<td><strong>GSM-nr:</strong> <?php echo $Output->GSM; ?></td>
          						</tr>
          						<tr>
          							<td><strong>Mail:</strong> <?php echo $Output->Email; ?></td>
          						</tr>
          					<?php endforeach; ?>
          				</tbody>
          			</table>
          		</div>
          	</div>
		</div>
	</div>
</div>
