<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content-header">
    <h1>Dashboard</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connected">
            <!-- Profile Image -->
			<!--<?php echo SITE_URL?>/lib/skins/crewcenter/dist/img/pilot.png-->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo PilotData::getPilotAvatar($pilotcode); ?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname; ?></h3>

                    <p class="text-muted text-center"><?php echo $pilotcode; ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Rank</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->rank;?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Total Flights</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->totalflights?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Hours</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->totalhours; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Transfer Hours</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->transferhours?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Money</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($userinfo->totalpay) ?></p>
                        </li>
                    </ul>

                    <a href="<?php echo url('profile/editprofile'); ?>" class="btn btn-primary btn-block"><b>Edit My Profile</b></a>
                </div>
                <!-- /.box-body -->
            </div>
			
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- VA Left Column Profile Page -->
				<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-3761068779458014"
					 data-ad-slot="5050354542"
					 data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
            <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- middle col -->
        <section class="col-lg-7 connected">

            <!-- ALERT BAR >> UNCOMMENT TO DISPLAY ALERT TO ALL USERS ON DASHBOARD -->

            <!--

            <div class="callout callout-danger">
                <h4>Important Alert</h4>
                <p>This is an alert. Customise this text and uncomment to display the alert.</p>
            </div>

            -->
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Live Flights</h3>
                </div>
                <div class="box-body">
                    <?php require 'acarsmap.php' ?>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest News</h3>
                </div>
                <div class="box-body">
                    <?php MainController::Run('News', 'ShowNewsFront', 3); ?>
                </div>
            </div>
        </section>
        <!-- middle col -->
        <!-- right col -->
        <section class="col-lg-2 connected">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo StatsData::TotalFlightsToday(); ?></h3>

                    <p>Flights Today</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plane"></i>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Newest Pilots</h3>
                </div>
                <div class="box-body">
                    <?php MainController::Run('Pilots', 'RecentFrontPage', 5); ?>
                </div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

</section>
<!-- /.content -->