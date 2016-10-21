      <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand font-heading" href="/">Sint-Joris</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="<?php if($Active == 1): ?> active <?php endif; ?> dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>Takken">
                  <span class="fa fa-leaf Icon-color"></span> Takken
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="<?php echo base_url() . 'Takken/Kapoenen'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Kapoenen
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Takken/Welpen'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Welpen
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Takken/JongGivers'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Jong-givers
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Takken/Givers'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Givers
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Takken/Jins'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Jins
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url() . 'Takken/Leiding'; ?>">
                      <span class="fa fa-chevron-right"></span>
                      De Leiding
                    </a>
                  </li>
                </ul>
              </li>

              <li <?php if($Active == 2): ?> class="active" <?php endif; ?>>
                <a href="<?php echo base_url() . 'Verhuur'; ?>">
                  <span class="fa fa-home Icon-color"></span>
                  Verhuur
                </a>
              </li>

              <li <?php if($Active == 3): ?> class="active" <?php endif; ?>>
                <a href="<?php echo base_url(); ?>Fotos">
                  <span class="fa fa-camera-retro Icon-color"></span>
                  Foto's
                </a>
              </li>

              <li <?php if($Active == 4): ?> class="active" <?php endif; ?>>
                <a href="/assets/files/Planning.pdf">
                  <span class="fa fa-file-text-o Icon-color"></span>
                  Planning
                </a>
              </li>

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <span class="fa fa-asterisk Icon-color"></span> Mosselsoupe
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li><a href="/assets/files/mosselsoupe-info.docx">Info</a></li>
                  <li><a href="/assets/files/mosselsoupe-inschrijving.xls">Inschrijvings formulier</a></li>
                </ul>
              </li>

              <li <?php if($Active == 5): ?> class="active" <?php endif; ?>>
                <a class="dropdown-toggle" data-toggle="dropdown" href="">
                  <span class="fa Icon-color fa-info-circle"></span>
                  Info
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="https://groepsadmin.scoutsengidsenvlaanderen.be/groepsadmin/lidworden?groep=A4102G">
                      Lid worden
                    </a>
                  </li>
                  <li>
                    <a href=/assets/files/kamp.docx"">Kamp 2016</a>
                  </li>
                </ul>
              </li>

              <li <?php if($Active == 6): ?> class="active" <?php endif; ?>>
                <a href="mailto:Contact@st-joris-turnhout.be">
                  <span class="fa fa-envelope Icon-color"></span>
                  Contact
                </a>
              </li>
            </ul>

            <?php if($this->Session): ?>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a title="Go to backend" href="<?php echo base_url(). 'Admin'; ?>">
                    <span class="fa fa-wrench Icon-color"></span>
                    Backend
                  </a>
                </li>

                <li>
                  <a title="logout" href="<?php echo base_url(). 'backend/Logout'; ?>">
                    <span class="fa fa-power-off Icon-color"></span>
                    Logout
                  </a>
                </li>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
