<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content-header">
    <h1>My Bids</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <?php
                        if(!$bids)
                        {
                            echo '<div class="callout callout-info">
                            <h4>No Bids Found</h4>
                            You have no bids. Add a bid through the flight schedules.
                            </div>';
                        } else {
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Number</th>
                                <th>Route</th>
                                <th>Aircraft</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Distance</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($bids as $bid)
                                {
                            ?>
                            <tr id="bid<?php echo $bid->bidid ?>">
                                <td><?php echo $bid->code . $bid->flightnum; ?></td>
                                <td align="center"><?php echo $bid->depicao; ?> to <?php echo $bid->arricao; ?></td>
                                <td align="center"><?php echo $bid->aircraft; ?> (<?php echo $bid->registration?>)</td>
                                <td><?php echo $bid->deptime;?></td>
                                <td><?php echo $bid->arrtime;?></td>
                                <td><?php echo $bid->distance;?>nm</td>
                                <td><a href="<?php echo url('/pireps/filepirep/'.$bid->bidid);?>">File Report</a><br />
                                    <a id="<?php echo $bid->bidid; ?>" class="deleteitem" href="<?php echo url('/schedules/removebid');?>">Remove Bid (Double click)</a><br />
                                    <a href="<?php echo url('/schedules/brief/'.$bid->id);?>">Pilot Brief</a><br />
                                    <a href="<?php echo url('/schedules/boardingpass/'.$bid->id);?>" />Boarding Pass</a>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>