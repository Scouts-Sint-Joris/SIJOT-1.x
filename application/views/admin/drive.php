<div class="container">

  <?php if($this->Flash): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="<?php echo $this->Flash['Class']; ?>">
          <h4><?php echo $this->Flash['Heading'] ?></h4>
          <p><?php echo $this->Flash['Info']; ?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">

      <!-- Nav Tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#Bestand" role="tab" data-toggle="tab">Bestanden</a></li>
        <li><a href="#Nieuw" role="tab" data-toggle="tab">Bestand toevoegen</a></li>
      </ul>

      <div class="tab-content">
        <div class="active tab-pane" id="Bestand">
          <p>
            <div style="margin-bottom: 7px;" class="row">
              <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6">
                <?php if(count($Files) == 0): ?>
                  <div class="alert alert-warning">
                    <p> Er zijn nog geen bestanden toegevoegd aan de drive. </p>
                  </div>
                <?php else: ?>
                  <table class="table table-hover table-condensed">
                    <thead>
                      <tr>
                        <th style="width: 80%;"> Bestand: </th>
                        <th style="width: 20%;"></th> <!-- Functies -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($Files as $File): ?>
                        <?php
                          // Start icon system
                          switch ($File->file_extension) {
                            case ".pdf":
                              $icon = 'fa fa-file-pdf-o';
                              break;
                            case '.mp3';
                              $icon = 'fa fa-file-sound-o';
                              break;
                            case '.xlxs';
                              $icon = 'fa fa-excel-o';
                              break;
                            case '.docx';
                              $icon = 'fa fa-file-word-o';
                              break;
                            case '.jpg';
                              $icon = 'fa fa-file-image-o';
                              break;
                            case '.txt';
                              $icon = 'fa fa-file-text-o';
                              break;
                            default:
                              $icon = 'fa fa-file-o';
                          }
                          // End icon system
                        ?>

                        <tr>
                          <td>
                            <span class="<?php echo $icon; ?>"></span> <?php echo $File->Naam; ?>
                          </td>

                          <!-- Options -->
                          <td>
                            <div class='btn-group'>
                              <a role="button" class="btn btn-xs btn-danger" href="<?php echo base_url(). 'Drive/Delete/' .$File->file_name; ?>">
                                <span class="fa fa-trash"></span>
                              </a>

                              <a role="button" class="btn btn-xs btn-danger" href="<?php echo base_url(). 'Drive/Download/' .$File->file_name; ?>">
                                <span class="fa fa-cloud-download"></span>
                              </a>
                            </div>
                          </td>
                        </td>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
              </div>
            </div>
          </p>
        </div>
        <div class="tab-pane" id="Nieuw">
          <p>
            <div style="margin-bottom: 7px;" class="row">
              <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6">
                <!-- Upload form -->
                <?php echo form_open_multipart('Drive/Upload'); ?>
                  <label for="01"> Bestandsnaam: </label>
                  <input class="form-control" style="width: 50%;" type="text" placeholder="Bestandsnaam" name="Naam" id="01" />
                  <br />

                  <label for="foto">Bestand:</label>
                  <input id="foto" type="file" name="userfile" size="20" />
                  <br />

                  <button type="submit" class="btn btn-success">Uploaden</Button>
                </form>
                <!-- END upload form -->
              </div>
            </div>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>
