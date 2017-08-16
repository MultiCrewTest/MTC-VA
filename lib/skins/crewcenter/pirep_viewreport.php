<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content-header">
    <h1>Flight Report</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connected">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo SITE_URL?>/lib/skins/crewcenter/dist/img/airplane.png" alt="User profile picture">

                    <h3 class="profile-username text-center">Flight <?php echo $pirep->code . $pirep->flightnum; ?></h3>

                    <p class="text-muted text-center">Submitted by <?php echo $pirep->firstname.' '.$pirep->lastname?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Departure Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->depname?> (<?php echo $pirep->depicao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Arrival Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->arrname?> (<?php echo $pirep->arricao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Aircraft</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->aircraft . " ($pirep->registration)"?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Time</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->flighttime; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Date Submitted</b> <p class="pull-right" style="color: #3C8DBC"><?php echo date(DATE_FORMAT, $pirep->submitdate);?></p>
                        </li>
                        <?php
                            if($pirep->route != '')
                            {
                                echo '<li class="list-group-item"><b>Route</b> <p class="pull-right" style="color: #3C8DBC">'.$pirep->route.'</p></li>';
                            }
                        ?>
                        <li class="list-group-item"><b>Status</b>
                            <?php
                                if($pirep->accepted == PIREP_ACCEPTED)
                                    echo '<div class="label label-success pull-right">Accepted</div>';
                                elseif($pirep->accepted == PIREP_REJECTED)
                                    echo '<div class="label label-danger pull-right">Rejected</div>';
                                elseif($pirep->accepted == PIREP_PENDING)
                                    echo '<div class="label label-info pull-right">Approval Pending</div>';
                                elseif($pirep->accepted == PIREP_INPROGRESS)
                                    echo '<div class="label label-warning pull-right">Flight in Progress</div>';
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Flight Details</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Gross Revenue</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Fuel Cost</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?></p>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- Middle col -->
        <section class="col-lg-6 connected">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Route Map</h3>
                </div>
                <div class="box-body">
                    
                <!-- </div>
            </div>
        </section>
    </div>
</section> -->