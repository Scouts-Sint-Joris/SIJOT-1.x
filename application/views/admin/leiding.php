<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#admin" role="tab" data-toggle="tab">Admin's</a></li>
                <li><a href="#leiding" role="tab" data-toggle="tab">Leiding</a></li>

                <?php if ($this->Session['Admin'] == 1): ?>
                    <li><a href="#new" role="tab" data-toggle="tab">Nieuwe Admin / Leiding</a></li>
                <?php endif; ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="admin">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <p>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam:</th>
                                    <th>Mail:</th>
                                    <th>GSM:</th>
                                    <th></th>
                                    <!-- Functies -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Admin as $Output): ?>
                                    <tr>
                                        <td><code>#<?php echo $Output->id; ?></code></td>
                                        <td><?php echo $Output->username; ?></td>

                                        <td>
                                            <?php if (valid_email($Output->Mail)): ?>
                                                <a href="mailto:<?php echo $Output->Mail; ?>"><?php echo $Output->Mail; ?></a>
                                            <?php else: ?>
                                                <?php echo $Output->Mail; ?>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo $Output->GSM; ?></td>
                                        <td>
                                            <div class="btn-toolbar">
                                                <div class="btn-group">
                                                    <a title="Account verwijderen"
                                                       href="<?php echo base_url(); ?>leiding/Leiding_delete/<?php echo $Output->id; ?>"
                                                       class="btn btn-danger btn-xs">
                                                        <span class="fa fa-close"></span>
                                                    </a>

                                                    <?php if ($Output->Blocked == 1): ?>
                                                        <a title="Blokkering opheffen" class="btn btn-xs btn-success"
                                                           href="<?php echo base_url(); ?>Leiding/Leiding_unblock/<?php echo $Output->id; ?>">
                                                            <span class="fa fa-lock"></span>
                                                        </a>
                                                    <?php elseif ($Output->Blocked == 0): ?>
                                                        <a title="Blokkering account" class="btn btn-xs btn-danger"
                                                           href="<?php echo base_url(); ?>Leiding/Leiding_block/<?php echo $Output->id; ?>">
                                                            <span class="fa fa-lock"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>

                <?php if ($this->Session['Admin'] == 1): ?>
                    <div class="tab-pane" id="new">
                        <p>

                        <form method="POST" action="<?php echo base_url(); ?>leiding/Insert_leiding">
                            <label for="Naam">Naam:</label>
                            <input class="form-control" type="text" style="width: 30%" name="Naam" placeholder="Naam"/>
                            <br>

                            <label for="Mail">Mail:</label>
                            <input class="form-control" type="text" style="width: 30%;" name="Mail" placeholder="Naam"/>
                            <br>

                            <label for="GSM">GSM-nummer:</label>
                            <input class="form-control" type="text" style="width: 30%" name="GSM"
                                   placeholder="GSM-nummer"/>
                            <br>

                            <label for='Tak'>Tak:</label>
                            <!-- Takken dropdown -->
                            <select class="form-control" style="width: 30%;" name="Tak">
                                <option value="1">Kapoenen</option>
                                <option value="2">Welpen</option>
                                <option value="3">Jong-Givers</option>
                                <option value="4">Givers</option>
                                <option value="5">Jins</option>
                                <option value="6">Administrator</option>
                            </select>
                            <!-- END -->
                            <br>

                            <button class="btn btn-success" type="submit">Toevoegen!</button>
                            <button class="btn btn-danger" type="reset">Reset!</button>
                        </form>
                        </p>
                    </div>
                <?php endif; ?>

                <div class="tab-pane" id="leiding">
                    <p>

                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam:</th>
                                    <th>Mail:</th>
                                    <th>GSM:</th>
                                    <th>Tak:</th>

                                    <?php if ($this->Session['Admin'] == 1): ?>
                                        <th></th> <!-- only used for functions -->
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Leiding as $Output): ?>
                                    <tr>
                                        <td><code>#<?php echo $Output->id; ?></code></td>
                                        <td><?php echo $Output->username; ?></td>
                                        <td>
                                            <?php if (valid_email($Output->Mail)): ?>
                                                <a href="mailto:<?php echo $Output->Mail; ?>"><?php echo $Output->Mail; ?></a>
                                            <?php else: ?>
                                                <?php echo $Output->Mail; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $Output->GSM; ?></td>

                                        <td>
                                            <?php if ($Output->Tak == 1): ?>
                                                <span class="label label-success">Kapoenen</span>
                                            <?php elseif ($Output->Tak == 2): ?>
                                                <span class="label label-success">Welpen</span>
                                            <?php elseif ($Output->Tak == 3): ?>
                                                <span class="label label-success">Jong-Givers</span>
                                            <?php elseif ($Output->Tak == 4): ?>
                                                <span class="label label-success">Givers</span>
                                            <?php elseif ($Output->Tak == 5): ?>
                                                <span class="label label-success">Jins</span>
                                            <?php endif; ?>
                                        </td>

                                        <?php if ($this->Session['Admin'] == 1): ?>
                                            <td>
                                                <div class="btn-toolbar">
                                                    <div class="btn-group">
                                                        <a title="Account" class="btn btn-xs btn-danger" href="<?php echo base_url() . 'Admin/profile/'. $Output->id .''; ?>">
                                                           <span class="fa fa-user"></span>
                                                        </a>
                                                    </div>

                                                    <div class="btn-group">
                                                        <a title="verwijder login" class="btn btn-xs btn-danger"
                                                           href="<?php echo base_url(); ?>leiding/Leiding_delete/<?php echo $Output->id; ?>">
                                                            <span class="fa fa-close"></span>
                                                        </a>
                                                    </div>

                                                    <div class="btn-group">
                                                        <?php if ($Output->Blocked == 1): ?>
                                                            <a title="blokkering opheffen"
                                                               class="btn btn-xs btn-success"
                                                               href="<?php echo base_url(); ?>leiding/Leiding_unblock/<?php echo $Output->id; ?>">
                                                                <span class="fa fa-lock"></span>
                                                            </a>
                                                        <?php elseif ($Output->Blocked == 0): ?>
                                                            <a title="blokkering account" class="btn btn-xs btn-danger"
                                                               href="<?php echo base_url(); ?>leiding/Leiding_block/<?php echo $Output->id; ?>">
                                                                <span class="fa fa-lock"></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if ($Output->Admin_role == 1): ?>
                                                            <a title="administrator rechten verwijderen"
                                                               class="btn-success btn btn-xs"
                                                               href="<?php echo base_url(); ?>leiding/Leiding_downgrade/<?php echo $Output->id; ?>">
                                                                <span class="fa fa-key"></span>
                                                            </a>
                                                        <?php elseif ($Output->Admin_role == 0): ?>
                                                            <a title="administrator rechten toewijzen"
                                                               class="btn btn-xs btn-danger"
                                                               href="<?php echo base_url(); ?>leiding/Leiding_upgrade/<?php echo $Output->id; ?>">
                                                                <span class="fa fa-key"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

