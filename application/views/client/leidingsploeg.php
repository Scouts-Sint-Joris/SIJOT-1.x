<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb border">
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="<?php echo base_url(); ?>takken">Takken</a></li>
        <li class="active">
          Leidingsploeg
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

            <div style="margin-top: -20px;" class="page-header">
              <h2 style="margin-bottom: -5px;">Leidingsploeg</h2>
            </div>

            <div class="row">
              <div class="col-md-6">
                <table class="table table-condensed">
                  <?php foreach($ploeg as $Tak): ?>
                    <tr>
                      <td><a href="mailto:<?php echo $Tak->Mail; ?>"><?php echo $Tak->username; ?></a></td>

                      <td>
                        <?php if($Tak->Tak == 1): ?>
                          <span class="label label-success">Kapoenen</span>
                        <?php elseif($Tak->Tak == 2): ?>
                          <span class="label label-success">Welpen</span>
                        <?php elseif($Tak->Tak == 3): ?>
                          <span class="label label-success">Jong-givers</span>
                        <?php elseif($Tak->Tak == 4): ?>
                          <span class="label label-success">Givers</span>
                        <?php elseif($Tak->Tak == 5): ?>
                          <span class="label label-success">Jins</span>
                        <?php endif; ?>
                      </td>

                      <td><?php echo $Tak->GSM; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>