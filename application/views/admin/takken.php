<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php if($this->Session['Tak'] == 1): ?>
  				<li class="active"><a href="#Kapoenen" role="tab" data-toggle="tab">De kapoenen</a></li>
					<li><a href="#act_kapoenen" role="tab" data-toggle="tab">Kapoenen activiteiten</a></li>
					<li><a href="#Nieuw_kapoenen" role="tab" data-toggle="tab">Nieuwe activiteit</a></li>
				<?php elseif($this->Session['Tak'] == 2): ?>
  				<li class="active"><a href="#Welpen" role="tab" data-toggle="tab">De Welpen</a></li>
					<li><a href="#act_welpen" role="tab" data-toggle="tab">Welpen activiteiten</a></li>
					<li><a href="#Nieuw_welpen" role="tab" data-toggle="tab">Nieuwe activiteit</a></li>
				<?php elseif($this->Session['Tak'] == 3): ?>
  				<li class="active"><a href="#JongGivers" role="tab" data-toggle="tab">De Jong-givers</a></li>
					<li><a href="#act_jonggivers" role="tab" data-toggle="tab">Jong-givers activiteiten</a></li>
					<li><a href="#Nieuw_jonggivers" role="tab" data-toggle="tab">Nieuwe activiteit</a></li>
				<?php elseif($this->Session['Tak'] == 4): ?>
  				<li class="active"><a href="#Givers" role="tab" data-toggle="tab">De Givers</a></li>
					<li><a href="#act_givers" role="tab" data-toggle="tab">Givers activiteiten</a></li>
					<li><a href="#Nieuw_givers" role="tab" data-toggle="tab">Nieuwe actviteiten</a></li>
				<?php elseif($this->Session['Tak'] == 5): ?>
  				<li class="active"><a href="#Jins" role="tab" data-toggle="tab">De Jins</a></li>
					<li><a href="#act_jins" role="tab" data-toggle="tab">Jins activiteiten</a></li>
					<li><a href="#Nieuw_jins" role="tab" data-toggle="tab">Nieuwe activiteiten</a></li>
				<?php elseif($this->Session['Tak'] == 6): ?>
					<li class="active"><a href="#Leiding" role="tab" data-toggle="tab">De Leiding</a></li>
					<li><a href="" role="tab" data-toggle="tab">Activiteiten</a></li>
				<?php endif; ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php if($this->Session['Tak'] == 1): ?>
  				<div class="tab-pane active" id="Kapoenen">
  					<p>
  						<?php foreach($Kapoenen as $Kapoen): ?>
  							<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $Kapoen->ID; ?>">
  								<label for="Title"> Heading: </label>
  								<input style="width:35%;" class="form-control" id="Title" name="Title" value="<?php echo $Kapoen->Title; ?>" placeholder="Titel">
  								<br>

  								<label for="Sub">Sub Heading:</label>
  								<input style="width: 35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Kapoen->Sub_title; ?>" placeholder="Sub titel">
  								<br>

  								<label for="beschrijving">Beschrijving:</label>
  								<textarea rows="10" id="Beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $Kapoen->Beschrijving; ?></textarea>
  								<br>
  					 		<?php endforeach; ?>

  							<button class="btn btn-danger" type="submit">Wijzig!</button>
  							<button class="btn btn-danger" type="reset">Reset!</button>

          	</form>
        	</p>
      	</div>

				<div class="tab-pane" id="act_kapoenen">
					<p>
						<div class="row">
							<div class="col-sm-5 col-md-5 col-lg-5">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Datum<th>
											<th>Titel</th>
											<th></th> <!-- For functions only -->
										<tr>
									</thead>
									<tbody>
										<?php foreach($Activiteiten_Kapoenen as $Output): ?>
											<tr>
												<td><code>#<?php echo $Output->ID; ?></code></td>
												<td><?php echo $Output->Datum; ?></td>
												<td><?php echo $Output->Naam; ?></td>
												<td></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					<p>
				</div>

				<div class="tab-pane" id="Nieuw_kapoenen">
					<p>
						<form method="POST" action="<?php echo base_url(); ?>/backend/Insert_act/Kapoenen">
							<label for="Datum">Datum activiteit:</label>
							<input type="text" style="width: 35%;" id="Datum" class="form-control" name="Datum" placeholder="bv. 00/00/00">
							<br>

							<label for="Titel">Naam activiteit:</label>
							<input type="text" style="width: 35%;" id="Titel" class="form-control" name="Naam" placeholder="Naam Activiteit">
							<br>

							<label for="Beschrijving">Beschrijving activiteit:</label>
							<textarea rows="10" id="Beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"></textarea>
							<br>

							<button type="Submit" class="btn btn-success">Toevoegen</button>
							<button type="Reset" class="btn btn-danger">Reset!</button>
						</form>
					</p>
				</div>
			<?php endif; ?>

			<?php if($this->Session['Tak'] == 2): ?>
 				<div class="tab-pane active" id="Welpen">
 			  	<?php foreach($Welpen as $Welp): ?>
          	<p>
            	<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $Welp->ID; ?>">
              	<label for="Title">Heading:</label>
              	<input style="width: 35%;" class="form-control" id="Title" name="Title" value="<?php echo $Welp->Title; ?>" placeholder="Titel">
              	<br>

              	<label for="Sub">Sub heading:</label>
              	<input style="width: 35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Welp->Sub_title; ?>" placeholder="Sub titel">
              	<br>

              	<label for="beschrijving">Beschrijving</label>
              	<textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $Welp->Beschrijving; ?></textarea>
              	<br>

              	<button class="btn btn-danger" type="submit">Wijzig!</button>
              	<button class="btn btn-danger" type="reset">Reset!</button>
            	</form>
          	</p>
 			  	<?php endforeach; ?>
 				</div>

				<div class="tab-pane" id="act_welpen">
					<p>
						<div class="row">
							<div class="col-sm-5 col-md-5 col-lg-5">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Datum<th>
											<th>Titel</th>
											<th></th> <!-- For functions only -->
										<tr>
									</thead>
									<tbody>
										<?php foreach($Activiteiten_Welpen as $Output): ?>
											<tr>
												<td><code>#<?php echo $Output->ID; ?></code></td>
												<td><?php echo $Output->Datum; ?></td>
												<td><?php echo $Output->Naam; ?></td>
												<td></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</p>
				</div>

				<div class="tab-pane" id="Nieuw_welpen">
					<p>
						<form method="POST" action="<?php echo base_url(); ?>/backend/Insert_act/Welpen">
							<label for="Datum">Datum activiteit:</label>
							<input type="text" style="width: 35%;" id="Datum" class="form-control" name="Datum" placeholder="bv. 00/00/00">
							<br>

							<label for="Titel">Naam activiteit:</label>
							<input type="text" style="width: 35%;" id="Titel" class="form-control" name="Naam" placeholder="Naam Activiteit">
							<br>

							<label for="Beschrijving">Beschrijving activiteit:</label>
							<textarea rows="10" id="Beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"></textarea>
							<br>

							<button type="Submit" class="btn btn-success">Toevoegen</button>
							<button type="Reset" class="btn btn-danger">Reset!</button>
						</form>
					</p>
				</div>
			<?php endif; ?>

			<?php if($this->Session['Tak'] == 3): ?>
  			<div class="tab-pane active" id="JongGivers">
  		  	<?php foreach($JongGivers as $JongGiver): ?>
          	<p>
            	<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $JongGiver->ID; ?>">
              	<label for="Title"> Heading: </label>
              	<input style="width: 35%;" class="form-control" id="Title" name="Title" value="<?php echo $JongGiver->Title; ?>" placeholder="Titel">
              	<br>

              	<label for="Sub">Sub Heading:</label>
              	<input style="width: 35%" class="form-control" id="Sub" name="Sub_title" value="<?php echo $JongGiver->Sub_title; ?>" placeholder="Sub title">
              	<br>

              	<label for="beschrijving">Beschrijving:</label>
              	<textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $JongGiver->Beschrijving; ?></textarea>
              	<br>

              	<button class="btn btn-danger" type="submit">Wijzig!</button>
              	<button class="btn btn-danger" type="reset">Reset!</button>
            	</form>
          	</p>
  		  	<?php endforeach; ?>
  			</div>

				<div class="tab-pane" id="act_jonggivers">
					<p>
						<div class="row">
							<div class="col-sm-5 col-md-5 col-lg-5">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Datum<th>
											<th>Titel</th>
											<th></th> <!-- For functions only -->
										<tr>
									</thead>
									<tbody>
										<?php foreach($Activiteiten_JongGivers as $Output): ?>
											<tr>
												<td><code>#<?php echo $Output->ID; ?></code></td>
												<td><?php echo $Output->Datum; ?></td>
												<td><?php echo $Output->Naam; ?></td>
												<td></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</p>
				</div>

				<div class="tab-pane" id="Nieuw_jonggivers">
					<p>
						<form method="POST" action="<?php echo base_url(); ?>/backend/Insert_act/JongGivers">
							<label for="Datum">Datum activiteit:</label>
							<input type="text" style="width: 35%;" id="Datum" class="form-control" name="Datum" placeholder="bv. 00/00/00">
							<br>

							<label for="Titel">Naam activiteit:</label>
							<input type="text" style="width: 35%;" id="Titel" class="form-control" name="Naam" placeholder="Naam Activiteit">
							<br>

							<label for="Beschrijving">Beschrijving activiteit:</label>
							<textarea rows="10" id="Beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"></textarea>
							<br>

							<button type="Submit" class="btn btn-success">Toevoegen</button>
							<button type="Reset" class="btn btn-danger">Reset!</button>
						</form>
					</p>
				</div>
			<?php endif; ?>

			<?php if($this->Session['Tak'] == 4): ?>
  			<div class="tab-pane" id="Givers">
  		  	<?php foreach($Givers as $Giver): ?>
          	<p>
            	<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $Giver->ID; ?>">
              	<label for="title">Heiding:</label>
              	<input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $Giver->Title; ?>" placeholder="Titel">
              	<br>

              	<label for="Sub">Sub heading: </label>
              	<input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Giver->Sub_title; ?>" placeholder="Sub title">
              	<br>

              	<label for="beschrijving">Beschrijving:</label>
              	<textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $Giver->Beschrijving; ?></textarea>
              	<br>

              	<button class="btn btn-danger" type="submit">Wijzig!</button>
              	<button class="btn btn-danger" type="reset">Reset!</button>
            	</form>
          	</p>
  		  	<?php endforeach; ?>
  			</div>

				<div class="tab-pane" id="act_givers">
					<p>
					</p>
				</div>

				<div class="tab-pane" id="Nieuw_givers">
					<p>
					</p>
				</div>
			<?php endif; ?>

			<?php if($this->Session['Tak'] == 5): ?>
  			<div class="tab-pane" id="Jins">
  		  	<?php foreach($Jins as $jin): ?>
          	<p>
            	<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $jin->ID; ?>">
              	<label for="title">Headin:</label>
              	<input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $jin->Title; ?>" placeholder="Titel">
              	<br>

               	<label for="Sub">Sub heading: </label>
              	<input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $jin->Sub_title; ?>" placeholder="Sub title">
              	<br>

              	<label for="beschrijving">Beschrijving:</label>
              	<textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $jin->Beschrijving; ?></textarea>
              	<br>

              	<button class="btn btn-danger" type="submit">Wijzig!</button>
              	<button class="btn btn-danger" type="reset">Reset!</button>
            	</form>
          	</p>
  		  	<?php endforeach; ?>
  			</div>

				<div class="tab-pane" id="act_jins">
					<p>
					</p>
				</div>

				<div class="tab-pane" id="Nieuw_jins">
					<p>
					</p>
				</div>
			<?php endif; ?>

			<?php if($this->Session['Tak'] == 6): ?>
  			<div class="tab-pane active" id="Leiding">
  		  	<?php foreach($Leiding as $Output): ?>
          	<p>
            	<form method="POST" action="<?php echo base_url(); ?>Takken/Takken_edit/<?php echo $Output->ID; ?>">
              	<label for="title">Headin:</label>
              	<input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $Output->Title; ?>" placeholder="Titel">
              	<br>

               	<label for="Sub">Sub heading: </label>
              	<input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Output->Sub_title; ?>" placeholder="Sub title">
              	<br>

              	<label for="beschrijving">Beschrijving:</label>
              	<textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name="Beschrijving"><?php echo $Output->Beschrijving; ?></textarea>
              	<br>

              	<button class="btn btn-danger" type="submit">Wijzig!</button>
              	<button class="btn btn-danger" type="reset">Reset!</button>
            	</form>
          	</p>
  		  	<?php endforeach; ?>
  			</div>
			</div>
		<?php endif; ?>

		</div>
</div>
