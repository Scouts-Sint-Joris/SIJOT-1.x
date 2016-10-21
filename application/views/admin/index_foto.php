<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">

			<!-- Nav Tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#FOTOS" role="tab" data-toggle="tab">Albums</a></li>
  				<li><a href="#Nieuw" role="tab" data-toggle="tab">Voeg album toe </a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane" id="Nieuw">
					<p>
						<?php echo $error;?>
						<?php echo form_open_multipart('Fotos/do_upload');?>

						<label for="Naam">Naam:</label>
						<input name="Naam" style="width: 22%" placeholder="Naam" class="form-control">
						<br>

						<label for="Tak">Tak:</label>
						<select class="form-control" name="Tak" style="width: 22%">
							<option value="1">Alle takken</option>
							<option value="2">Kapoenen</option>
							<option value="3">Welpen</option>
							<option value="4">Jong-givers</option>
							<option value="5">Givers</option>
							<option value="6">Jins</option>
							<option value="7">Leiding</option>
						</select>
						<br>

						<label for"URL"> Album url:</label>
						<input name="URL" style="width: 22%" placeholder="album url" class="form-control">
						<br>

						<label for="foto">Foto:</label>
						<input id="foto" type="file" name="userfile" size="20" />
						<span class="help-block">Output: 300 lengte x 200 hoogte.</span>
						<br />

						<input class="btn btn-danger" type="submit" value="Upload" />
					</p>
				</div>

				<div class="active tab-pane" id="FOTOS">
					<div class="row">
						<div class="col-md-6">
							<?php if(count($DB) == 0): ?>
								<div style="margin-top: 10px;" class="alert alert-danger">
									<p> Er zijn nog geen Foto's geupload.</p>
								</div>
							<?php else: ?>
								<p>
									<ul class="list-group">
										<?php foreach($DB as $Output): ?>
							  				<li class="list-group-item">
												<span class="fa fa-picture-o"></span> <?php echo $Output->Naam; ?>
												<a href="<?php echo base_url(). 'Fotos/delete/' .$Output->File_name; ?>" class="pull-right label label-danger">Verwijder</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</p>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
