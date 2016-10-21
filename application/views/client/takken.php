<div class="container">

  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb border">
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Takken</li>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 col-sm-3 col-lg-3">
      <div class="panel panel-default border">
      	<div class="panel-heading">
      		Takken:
      	</div>
      	<div class="list-group">
      		<a class="list-group-item" href="<?php echo base_url('takken/Kapoenen'); ?>">De Kapoenen</a>
      		<a class="list-group-item" href="<?php echo base_url('takken/Welpen'); ?>">De Welpen</a>
      		<a class="list-group-item" href="<?php echo base_url('takken/JongGivers'); ?>">De Jong-givers</a>
      		<a class="list-group-item" href="<?php echo base_url('takken/Givers'); ?>">De Givers</a>
      		<a class="list-group-item" href="<?php echo base_url('takken/Jins'); ?>">De Jins</a>
      		<a class="list-group-item" href="<?php echo base_url('takken/Leiding'); ?>">De Leiding</a>
      	</div>
      </div>
    </div>	

    <div class="col-sm-9 col-md-9 col-lg-9">
      <div class="panel panel-default border">
        <div class="panel-body">
        
        <div style="margin-top: -20px;" class="page-header">
          <h2 style="margin-bottom: -5px;">Takken:</h2>
        </div>

        <?php foreach($Kapoenen as $Kapoen): ?>
          <div class="well well-sm color-kapoenen">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>/Takken/<?php echo $Kapoen->Tak; ?>">
                <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                <img class="img-kapoen color-white img-responsive img-rounded media-object" src="/assets/svg/kapoenen.svg" alt="<?php echo $Kapoen->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $Kapoen->Title; ?> <small> <?php echo $Kapoen->Sub_title; ?> </small></h4>
                
                <!-- Description -->
                <?php 
                  $text = $Kapoen->Beschrijving;
                  $result = Parsedown::instance()->parse($text);
                  echo strip_tags(word_limiter($result, $Limit));
                ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <?php foreach($Welpen as $Welp): ?>
          <div class="well well-sm color-welpen">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>/Takken/<?php echo $Welp->Tak ?>">
                <img style="width: 75px; height: 75px;" class="color-white img-responsive img-rounded media-object" src="/assets/img/welpen.png" alt="<?php echo $Kapoen->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $Welp->Title; ?> <small> <?php echo $Welp->Sub_title; ?> </small> </h4>

                  <!-- Description -->
                  <?php 
                    $text = $Welp->Beschrijving;
                    $result = Parsedown::instance()->parse($text);
                    echo strip_tags(word_limiter($result, $Limit));
                  ?>
                </div>
              </div>
          </div>
        <?php endforeach; ?>

        <?php foreach($JongGivers as $JongGiver): ?>
          <div class="well well-sm color-jonggivers">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>/Takken/<?php echo $JongGiver->Tak ?>">
                <img style="width: 75px; height: 75px;" class="color-white img-responsive img-rounded media-object" src="/assets/img/jong-givers.png" alt="<?php echo $JongGiver->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $JongGiver->Title; ?> <small> <?php echo $JongGiver->Sub_title; ?> </small> </h4>

                  <!-- Description -->
                  <?php 
                    $text = $JongGiver->Beschrijving;
                    $result = Parsedown::instance()->parse($text);
                    echo strip_tags(word_limiter($result, $Limit));
                  ?>
                </div>
              </div>
          </div>
        <?php endforeach; ?>

        <?php foreach($Givers as $Giver): ?>
          <div class="well well-sm color-givers">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>Takken/<?php echo $Giver->Tak ?>">
                <img style="width: 75px; height: 75px;" class="color-white img-responsive img-rounded media-object" src="/assets/img/givers.png" alt="<?php echo $Giver->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $Giver->Title; ?> <small> <?php echo $Giver->Sub_title; ?> </small> </h4>

                  <!-- Description -->
                  <?php 
                    $text = $Giver->Beschrijving;
                    $result = Parsedown::instance()->parse($text);
                    echo strip_tags(word_limiter($result, $Limit));
                  ?>
                </div>
              </div>
          </div>
        <?php endforeach; ?>

        <?php foreach($Jins as $Jin): ?>
          <div class="well well-sm color-jins">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>Takken/<?php $Jin->Tak; ?>">
                <img style="width: 75px; height: 75px;" class="color-white img-responsive img-rounded media-object" src="/assets/img/jins.png" alt="<?php echo $Jin->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $Jin->Title; ?> <small> <?php echo $Giver->Sub_title; ?> </small> </h4>

                <!-- Description -->
                <?php 
                  $text = $Jin->Beschrijving;
                  $result = Parsedown::instance()->parse($text);
                  echo strip_tags(word_limiter($result, $Limit));
                ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <?php foreach($Leiding as $Output): ?>
          <div class="well well-sm color-leiding">
            <div class="media">
              <a class="pull-left" href="<?php echo base_url(); ?>Takken/<?php $Output->Tak; ?>">
                <img style="width: 75px; height: 75px;" class="color-white img-responsive img-rounded media-object" src="/assets/img/leiding.png" alt="<?php echo $Output->Title; ?>">
              </a>
              <div class="media-body color-white">
                <h4 class="font-title media-heading"> <?php echo $Output->Title; ?> <small> <?php echo $Output->Sub_title; ?> </small> </h4>

                <!-- Description -->
                <?php 
                  $text = $Output->Beschrijving;
                  $result = Parsedown::instance()->parse($text);
                  echo strip_tags(word_limiter($result, $Limit));
                ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>