 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand font-heading" href="<?php echo base_url(); ?>">Sint-Joris</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li <?php if($Active == 1): ?> class="active" <?php endif; ?>>
                <a href="<?php echo base_url(); ?>backend"> <span class="fa fa-leaf Icon-color"></span> Takken </a>
              </li>

              <?php if($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == "Y"): ?>
                <li <?php if($Active == 2): ?> class="active" <?php endif; ?>>
                  <a href="<?php echo base_url() . 'verhuur/admin_verhuur'; ?>">
                    <span class="fa fa-home Icon-color"></span>
                    Verhuur
                  </a>
               </li>
              <?php endif; ?>

              <li <?php if($Active == 5): ?> class="active" <?php endif; ?>>
                <a href="">
                  <span class="fa fa-info-circle Icon-color"></span>
                  Info
                </a>
              </li>

              <!-- <li class="<?php if($Active == 1): ?> active <?php endif; ?> dropdown"> -->
                <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url() . 'Takken'; ?>"> -->
                  <!-- <span class="fa fa-asterisk Icon-color"></span> -->
                  <!-- Media -->
                <!-- </a> -->

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="<?php echo base_url() . 'Upload_files'; ?>">
                      <span class="fa fa-file-text-o"></span>
                      T groentje
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Fotos/Index_admin'; ?>">
                      <span class="fa fa-camera-retro"></span>
                      Foto's
                    </a>
                  </li>
                  <?php if($this->Permissions['drive'] === 'Y'): ?>
                  <li>
                    <a href="<?php echo base_url(). 'Drive'?>">
                      <span class="fa fa-cloud"></span>
                      Cloud
                    </a>
                  </li>
                  <?php endif; ?>
                </ul>
              </li>

              <?php if($this->Session['Admin'] == 1): ?>
                <li>
                  <a href="<?php echo base_url(); ?>Inschrijvingen/Admin_ontbijt">
                    <span class="fa fa-asterisk Icon-color"></span>
                    Inschrijvingen
                  </a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>Mailing">
                    <span class="fa fa-envelope Icon-color"></span>
                    Mailing
                  </a>
                </li>
              <?php endif; ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo $this->Session['username']; ?></a>

                <ul class="dropdown-menu" role="menu">
                  <?php if($this->Session['Admin'] == 1): ?>
                    <li>
                      <a href="<?php echo base_url(); ?>leiding/">
                        <span class="octicon octicon-organization"></span>
                        Leiding
                      </a>
                    </li>
                  <?php endif; ?>
                  <li>
                    <a href="<?php echo base_url() . 'issue'; ?>">
                      <span class="octicon octicon-bug"></span>
                      Meld een bug!
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . "Leiding/settings/". $this->Session['username'] .""; ?>">
                      <span class="octicon octicon-gear"></span>
                      Account configuratie
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="<?php echo base_url() . 'backend/Logout'; ?>">
                      <span class="octicon octicon-sign-out"></span>
                      Logout
                    </a>
                </li>
              </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
