<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb border">
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="<?php echo base_url(); ?>takken">Takken</a></li>
        <li class="active">
          <?php 
            foreach($Beschrijving as $Tak) {
              echo $Tak->Title; 
            } 
          ?>
        </li>
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
            <a class="list-group-item" href="<?php echo base_url(); ?>Leiding/leidingsploeg"><span class="fa fa-asterisk"></span> Leidingsploeg </a>
            <a class="list-group-item" href="mailto:dorien.joosten@gmail.com"><span class="fa fa-envelope"></span> Contacteer hoofdleiding</a>
          </div>
        </div>
      </div>

      <div class="col-sm-9 col-md-9 col-lg-9">
        <div class="panel panel-default border">
          <div class="panel-body">
            <?php foreach($Beschrijving as $Tak): ?>
              <div style="margin-top: -20px;" class="page-header">
                <h2 style="margin-bottom: -5px;"> <?php echo $Tak->Title; ?> <small> <?php echo $Tak->Sub_title; ?> </small> </h2>
              </div>

              <!-- Description -->
              <?php
                $text = $Tak->Beschrijving;
                echo Parsedown::instance()
                              ->setBreaksEnabled(true)
                              ->parse($text);
              ?>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div>
  </div>