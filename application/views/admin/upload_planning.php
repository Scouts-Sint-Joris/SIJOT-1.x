<div class="container">
	<div class="row">
		<div class"col-sm-12 col-md-12 col-lg-12">

			<div style="margin-top: -20px;" class="page-header">
				<h2 style="margin-bottom: -5px;"> Upload nieuw groen'tje </div>
			</div>

			<div style="width: 40%;" class="alert alert-danger">
				<p> Het groen'tje kan alleen geupload worden in <code>.PDF</code> Formaat. </p>
			</div>

			<?php echo $error;?>

			<?php echo form_open_multipart('Upload_files/do_upload');?>

			<input type="file" name="userfile" size="20" />
			<br />

			<input role="button" class="btn btn-danger" type="submit" value="Upload" />

		</div>
	</div>
</div>
