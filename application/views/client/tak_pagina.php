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
            Wat doen we?
          </div>

          <div class="panel-body">
           <?php if(count($Activiteiten) == 0): ?>
              <span class="text-muted">Geen activiteiten beschikbaar.</span>
            <?php else: ?>
            <ul class="list-unstyled">
              <?php foreach($Activiteiten as $Activiteit): ?>
                <li>
                  <b><?php echo $Activiteit->Datum; ?>:</b>  
                  <a title="<?php echo $Activiteit->Naam; ?>" href="<?php echo base_url(); ?>">Activiteit</a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
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
              <?php echo Parsedown::instance()->setBreaksEnabled(true)->parse($Tak->Beschrijving); ?>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div>
  </div>