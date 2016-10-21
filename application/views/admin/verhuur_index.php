<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">

			<!-- Nav Tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#Nieuwe" role="tab" data-toggle="tab">Verhuringen</a></li>
  				<li><a href="#Verhuur" role="tab" data-toggle="tab">Verhuring toevoegen </a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="active tab-pane" id="Nieuwe">
					<p>
						<div style="margin-bottom: 7px;" class="row">
							<div class="col-md-6">
								<span class="pull-left">
									<form action="<?php echo base_url(); ?>Verhuur/Search" method="POST" class="form-inline">
										<input type="text" name="Term" placeholder="Search" class="form-control">
										<button class="btn btn-danger" type="submit">
											<span class="fa fa-search"></span>
										</button>
									</form>
								</span>
							</div>

							<div class="col-md-6">
								<span class="pull-right">

										<?php foreach($Notification as $Result) {
											$Val = $Result->Verhuur;
										}
										?>

										<?php if($Val== 1): ?>
											<a role="button" class="btn btn-success" title="Notificaties is ingeschakeld" href="<?php echo base_url(); ?>/Notifications/Verhuur_uit">
												Notificaties <span class="badge">Aan</span>
											</a>
										<?php elseif($Val == 0): ?>
											<a role="button" class="btn btn-danger" title="Notificaties zijn uitgeschakeld" href="<?php echo base_url(); ?>/Notifications/Verhuur_aan">
												Notificaties <span class="badge">Uit</span>
											</a>
										<?php else: ?>
											<a role="button" class="btn btn-warning" title="herstel" href="<?php echo base_url(); ?>Notifications/herstel_verhuur">
												Herstel
											</a>
										<?php endif; ?>


									<a href="<?php echo base_url();?>Verhuur/Download_verhuringen" class="btn btn-info">
										<span class="octicon octicon-cloud-download"></span> Download
									</a>
								</span>
							</div>
						</div>

						<table class="table table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Datum:</th>
									<th>Status:</th>
									<th>Groep:</th>
									<th>Mail:</th>
									<th>GSM</th>
									<th></th> <!-- Only used for functions -->
								</tr>
							</thead>
							<tbody>
								<?php foreach($results as $Output): ?>
									<tr>
										<td><code>#<?php echo $Output->ID; ?></code></td>
										<td><?php echo date('d-m-Y', $Output->Start_datum); ?> / <?php echo date('d-m-Y', $Output->Eind_datum); ?></td>

										<td>
											<?php if($Output->Status == 0): ?>
												<span class="label label-danger"> Nieuwe aanvraag! </span>
											<?php elseif($Output->Status == 1): ?>
												<span class="label label-warning"> Optie! </span>
											<?php elseif($Output->Status == 2): ?>
												<span class="label label-success"> Bevestigd!</span>
											<?php endif; ?>
										</td>

										<td><?php echo $Output->Groep; ?></td>

										<td>
											<?php if(valid_email($Output->Email)): ?>
												<a href="mailto:<?php echo $Output->Email; ?>">
													<?php echo $Output->Email; ?>
												</a>
											<?php else: ?>
												<?php echo $Output->Email; ?>
											<?php endif; ?>
										</td>

										<td><?php echo $Output->GSM; ?></td>

										<td>
											<div class="btn-toolbar" role="toolbar">
													<div class="btn-group">
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/verhuur_info/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-file-text"></span>
														</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/verhuur_edit/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-pencil"></span>
														</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Verhuur_delete/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-trashcan"></span>
														</a>
													</div>

												<div class="btn-group">
													<?php if($Output->Status == 1): ?>
														<a disabled class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_optie/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-opened"></span>
														</a>

														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_bevestigd/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-closed"></span>
														</a>
													<?php elseif($Output->Status == 2): ?>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_optie/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-opened"></span>
														</a>

														<a disabled class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_bevestigd/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-closed"></span>
														</a>
													<?php elseif($Output->Status == 0): ?>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_optie/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-opened"></span>
														</a>

														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_bevestigd/<?php echo $Output->ID; ?>">
															<span class="octicon octicon-issue-closed"></span>
														</a>
													<?php endif; ?>
												</div>
											</div>
										</td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<p><?php echo $links; ?></p>
					</p>
				</div>

  				<div class="tab-pane" id="Verhuur">
  					<p>
					 <form method="POST" action="<?php echo base_url(); ?>verhuur/toevoegen_verhuur">
					 	<label for="Start">Start datum:</label>
					 	<input class="form-control" style="width: 30%;" id="Start" name="Start_datum" placeholder="00/00/00">
					 	<br>

					 	<label for="Eind">Eind datum:</label>
					 	<input class="form-control" style="width: 30%;" id="Eind" name="Eind_datum" placeholder="bv. 00/00/00">
					 	<br>

					 	<label for="Groep">Groep:</label>
					 	<input class="form-control" style="width: 30%;" id="Groep" name="Groep" placeholder="Groep">
					 	<br>

					 	<label for="GSM">Gsm-nummer:</label>
					 	<input class="form-control" style="width: 30%;" id="GSM" name="GSM" placeholder="GSM nummer">
					 	<br>

					 	<label for="Mail">Email:</label>
					 	<input class="form-control" style="width: 30%;" id="Mail" name="Email" placeholder="E-mail adres">
					 	<br>

					 	<button role="button" type="submite" class="btn btn-success">Toevoegen</button>
					 	<button role="button" type="reset" class="btn btn-danger">Reset!</button>
					 </form>
  					</p>
  				</div>
  			</div>

		</div>
	</div>
</div>
