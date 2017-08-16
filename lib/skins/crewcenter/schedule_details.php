<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content-header">
    <h1>Schedule Details - <?php echo $schedule->code.$schedule->flightnum; ?></h1>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-8">
        	<table class="table table-bordered" style="border-color: #000;">
            	<tr>
                	<td>Flight Number</td>
                    <td><?php echo $schedule->code.$schedule->flightnum; ?></td>
                </tr>
            	<tr>
                	<td>Departure</td>
                    <td><?php echo $schedule->depname.' ('.$schedule->depicao.') at '. $schedule->deptime; ?></td>
                </tr>
            	<tr>
                	<td>Arrival</td>
                    <td><?php echo $schedule->arrname.' ('.$schedule->arricao.') at '. $schedule->arrtime; ?></td>
                </tr>
            	<tr>
                	<td>Route</td>
                    <td>
                    <?php
					if($schedule->route !== '') {
						echo $schedule->route;
					} else {
						echo 'N/A';
					}
					?>
                    </td>
                </tr>
            	<tr>
                	<td>METAR For <?php echo $schedule->depicao; ?></td>
                    <td>
					<?php
                    $metar = $_POST['metar'];
                    $url = 'http://metar.vatsim.net/'.$schedule->depicao.'';
                    $page = file_get_contents($url);
                    echo $page;
                    ?>
                    </td>
                </tr>
            	<tr>
                	<td>METAR For <?php echo $schedule->arricao; ?></td>
                    <td>
					<?php
                    $metar = $_POST['metar'];
                    $url = 'http://metar.vatsim.net/'.$schedule->arricao.'';
                    $page = file_get_contents($url);
                    echo $page;
                    ?>
                    </td>
                </tr>
            </table>
        	<br />
            <strong>Schedule Frequency</strong>
            <div align="center">
            <?php
            /*
                Added in 2.0!
            */
            $chart_width = '800';
            $chart_height = '170';
            
            /* Don't need to change anything below this here */
            ?>
            <div align="center" style="width: 100%;">
                <div align="center" id="pireps_chart"></div>
            </div>
            
            <script type="text/javascript" src="<?php echo fileurl('/lib/js/ofc/js/swfobject.js')?>"></script>
            <script type="text/javascript">
            swfobject.embedSWF("<?php echo fileurl('/lib/js/ofc/open-flash-chart.swf');?>", 
                "pireps_chart", "<?php echo $chart_width;?>", "<?php echo $chart_height;?>", 
                "9.0.0", "expressInstall.swf", 
                {"data-file":"<?php echo actionurl('/schedules/statsdaysdata/'.$schedule->id);?>"});
            </script>
            <?php
            /* End added in 2.0
            */
            ?>
        	</div>
        </div>
    </div>