<style>
#bodytext{
padding:0px;
}
.bodytext{padding:5px;}
</style>
<div class="innerwrapper" style="margin-top:0px;">


</div>

<script>
$(document).ready(function(){
	 $('.carousel').carousel({
  interval: 2000
})

});
</script>
<div class="bodytext">
<div class="row">
  <div class="col-md-4">
  <div class="span3"><h3>Newest Pilots</h3>
		<?php MainController::Run('Pilots', 'RecentFrontPage', 5); ?>
		
		<h3>Statistics</h3>
	<table cellspacing="0" border="0" style="width: 210px; font-size:12px;">
	<tbody><tr>
                <td><strong>Total Hours:</strong></td>
                <td style><span class="label label-default"><?php echo StatsData::TotalHours (); ?></span></td>
               
	</tr>

		<tr>
		<td><strong>Total Flights:</strong></td>
                <td><span class="label label-default"><?php echo StatsData::TotalFlights(); ?></span></td>
               </tr>
             <tr>
           <td><strong>Miles Flown:</strong></td>
           <td><span class="label label-default"><?php echo StatsData::totalmilesflown(); ?>nm</span></td>
           </tr>
          

           
           <tr>
           <td><strong>Pilot Recruitment Status:</strong></td>
           <td><span class="label label-success">Open</span></td>
           </tr>
           <tr>
           <td><strong>Staff Recruitment Status:</strong></td>
           <td><span class="label label-danger">Closed</span></td>
           </tr>
        
	</table>
	
	<h3>Latest News</h3>
	<i>Latest News Module here</i>
	</div>
  </div>
  <div class="col-md-7" >
  <h3>About</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id velit a leo tincidunt blandit. Sed et nunc vel justo pretium fermentum. Mauris adipiscing lacus a mi dapibus gravida. Nullam vitae vulputate nibh. Morbi condimentum tempor imperdiet. Phasellus et nibh at elit hendrerit interdum. Aliquam in convallis odio, et congue ligula. Fusce a facilisis felis. Mauris malesuada nunc eu venenatis ultrices. Nunc eget est felis. Cras accumsan luctus erat non tempus. Praesent in mauris arcu. Maecenas semper nec augue nec hendrerit. Nullam eget porttitor velit. Ut eleifend velit sit amet ultrices aliquet. </p>
	<h3>Live Flights</h3>
	<?php 

$q = "SELECT * FROM phpvms_acarsdata";
$l = DB::get_results($q);
if($l != null){
?>
	<table border="0" width="100%" cellspacing="4" class="acarsmap">
<thead>
	<tr>
		<td><b>Pilot</b></td>
		<td><b>Flight Number</b></td>
		<td><b>Departure</b></td>
		<td><b>Arrival</b></td>
		<td><b>Status</b></td>
		
	</tr>
</thead>
<tbody id="pilotlist">
<?

foreach($l as $fl) {	
	$lu = strtotime($fl->lastupdate);
	$min_u = strtotime(date("Y-m-d") - 900);	
	if($lu > $min_u) {
	echo("<tr>");
	echo("<td>".$fl->pilotname."</td>");
	echo("<td>".$fl->flightnum."</td>");
	echo("<td>".$fl->depicao."</td>");
	echo("<td>".$fl->arricao."</td>");
	echo("<td>".$fl->phasedetail."</td>");
	
	echo("</tr>");
	}
}
}else{ ?>
<div class="alert alert-info">
  
  <strong>Looks Like our Pilots are taking a rest!</strong> There is no current flights online.
</div>
<?php
}
?>
</tbody>
</table>

<h3>Recent Flights</h3>
		<?php
$count = 5;
$pireps = PIREPData::getRecentReportsByCount($count);
?>

<table class="table table-striped">
   <thead>
         <tr>
           <th>Flight #</th>
           <th>Departure</th>
           <th>Arrival</th>
           <th>Duration</th>
           <th>Pilot</th>
           <th>Landing Rate</th>
         </tr>
        </thead>
<tbody>
        
 <?php

if(count($pireps) > 0)
{
  foreach ($pireps as $pirep)
  {
        $pilotinfo = PilotData::getPilotData($pirep->pilotid);
        $pilotid = PilotData::getPilotCode($pilotinfo->code, $pilotinfo->pilotid); 

        echo '<tr>';
        echo '<td>'.$pirep->code.$pirep->flightnum.'</td>';
        echo '<td>'.$pirep->depicao.'</td>';
        echo '<td>'.$pirep->arricao.'</td>';
        echo '<td>'.$pirep->flighttime.'</td>';
        echo '<td>'.$pilotinfo->firstname.' '.$pilotinfo->lastname.'</td>';
        echo '<td>'.$pirep->landingrate.'</td>';
        echo '</tr>';
  }
}
else
{
        echo '<tr><td>There are no recent flights!</td></tr>';
}
?>
   </tbody>
</table>
  </div>
  
</div>


</div>