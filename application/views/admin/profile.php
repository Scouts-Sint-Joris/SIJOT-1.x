<?php foreach($user as $output): ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h1> <?php echo $output->username; ?> </h1>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <img title="profile image" class="pull-right img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100">
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
               <ul class="list-group">
                   <li class="list-group-item text-muted">Gegevens:</li>
                   <li class="list-group-item text-right">
                       <span class="pull-left">
                            <strong>Naam:</strong>
                       </span>
                       <?php echo $output->username; ?>
                   </li>
                   <li class="list-group-item text-right">
                       <span class="pull-left">
                           <strong>Laatst ingelogd:</strong>
                       </span>
                       <?php if($output->online == 'Y'): ?>
                           <span class="label label-success">Online</span>
                       <?php elseif($output->online == 'N'): ?>
                           <?php date('Y-m-d', $output->last_seen); ?>
                       <?php endif; ?>
                   </li>
                   <li class="list-group-item text-right">
                       <span class="pull-left">
                           <strong> GSM: </strong>
                       </span>
                       <?php echo $output->GSM; ?>
                   </li>
               </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Status:</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Online:</strong>
                        </span>
                        <?php if($output->online == 'Y'): ?>
                            <span class="label label-success">Online</span>
                            <?php elseif($output->online == 'N'): ?>
                            Nee
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Geblokkeerd:</strong>
                        </span>
                        <?php if($output->Blocked == 1): ?>
                            Ja
                        <?php elseif($output->Blocked == 0): ?>
                            Nee
                        <?php endif; ?>
                </ul>
            </div>
            <!-- END sidebar -->

            <!-- Main content -->
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#activity">
                            Activity log
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#rechten">
                            Gebruikers rechten.
                        </a>
                    </li>
                </ul>
                <!-- END nav tabs -->

                <!-- tab panels -->
                <div class="tab-content">
                    <div id="activity" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                                <!-- Add some space -->
                                <p></p>

                                <!-- Activity table -->
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Log bericht:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($logs as $log): ?>
                                            <tr>
                                                <td><code>#<?php echo $log->id ?></code></td>
                                                <td><?php echo $log->log_message; ?></td>
                                                <td><?php echo date('d-m-Y', $log->date); ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- End Activity table -->
                            </div>
                        </div>
                    </div>
                    <div id="rechten" class="tab-pane fade">
                        <!-- Add some space -->
                        <p></p>

                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <form method="POST" action="<?php echo base_url() . 'admin/updatePermissions/' . $output->id . '' ?>">
                                    <?php foreach($permissions as $permission): ?>
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Ja:</th>
                                            <th>Nee:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Verhuringen </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="verhuring"
                                                        value="Y"
                                                        <?php if($permission->verhuur == "Y"): ?> checked<?php endif; ?>>
                                                </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="verhuring"
                                                        value="N"
                                                        <?php if($permission->verhuur == "N"): ?> checked <?php endif; ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Mailinglist </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="mailinglist"
                                                        value="Y"
                                                        <?php if($permission->mailinglist == "Y"): ?> checked <?php endif; ?>>
                                                </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="mailinglist"
                                                        value="N"
                                                        <?php if($permission->mailinglist == "N"): ?> checked <?php endif; ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Gebruikers profielen </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="profielen"
                                                        value="Y"
                                                        <?php if($permission->profiles == "Y"): ?> checked<?php endif; ?>>
                                                </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="profielen"
                                                        value="N"
                                                        <?php if($permission->profiles == "N"): ?> checked<?php endif; ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Cloud opslag: </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="cloud"
                                                        value="Y"
                                                        <?php if($permission->drive == "Y"): ?> checked <?php endif; ?>>
                                                 </td>
                                                <td>
                                                    <input
                                                        type="radio"
                                                        name="cloud"
                                                        value="N"
                                                        <?php if($permission->drive == "N"): ?> checked <?php endif; ?>>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php endforeach; ?>

                                    <button type="submit" class="btn btn-success">
                                        Update rechten.
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tab panels -->

            </div>
            <!-- END main content -->
        </div>
    </div>
<?php endforeach; ?>