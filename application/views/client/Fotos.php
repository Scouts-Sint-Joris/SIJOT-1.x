<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb border">
                <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Foto's</li>
            </ol>
            <div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="panel panel-default border">
                        <div class="panel-heading">
                            Menu:
                        </div>

                        <div class="list-group">
                            <a href="<?php echo base_url(); ?>Fotos/Tak/2" class="list-group-item">Foto's kapoenen</a>
                            <a href="<?php echo base_url(); ?>Fotos/Tak/3" class="list-group-item">Foto's welpen</a>
                            <a href="<?php echo base_url(); ?>Fotos/Tak/4" class="list-group-item">Foto's
                                Jong-Givers</a>
                            <a href="<?php echo base_url(); ?>Fotos/Tak/5" class="list-group-item">Foto's Givers</a>
                            <a href="<?php echo base_url(); ?>Fotos/Tak/6" class="list-group-item">Foto's Jins</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-9">
                    <div class="panel panel-default border">
                        <div class="panel-body">

                            <div style="margin-top: -20px;" class="page-header">
                                <h2 style="margin-bottom: -5px;"> Foto's </h2>
                            </div>

                            <?php if(count($Foto) > 0): ?>
                            <div class="row">
                                <?php foreach($Foto as $Output): ?>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <h4><?php echo $Output->Naam; ?></h4>

                                            <p><a href="<?php echo $Output->Web_url; ?>" class="label label-default">Bekijk</a>
                                            </p>
                                        </div>
                                        <img style="width: 300px; height:150px;" src="<?php echo $Output->File_path; ?>"
                                             alt="<?php echo $Output->Naam; ?>">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <div>
                                    <?php else: ?>
                                    <div class="alert alert-danger">
                                        <p>Er zijn geen foto albums geuploads.</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div></div>
</div>
					                  
					        